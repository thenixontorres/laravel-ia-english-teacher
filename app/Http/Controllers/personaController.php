<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepersonaRequest;
use App\Http\Requests\UpdatepersonaRequest;
use App\Repositories\personaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;
use App\Models\persona;
use App\Models\materia;
use Auth;


class personaController extends AppBaseController
{
    /** @var  personaRepository */
    private $personaRepository;

    public function __construct(personaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
    }

    /**
     * Display a listing of the persona.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->personaRepository->pushCriteria(new RequestCriteria($request));
        $personas = $this->personaRepository->all();

        return view('admin.persona.index')
            ->with('personas', $personas);
    }

    /**
     * Show the form for creating a new persona.
     *
     * @return Response
     */
    public function create()
    {   
        return view('admin.persona.create');
    }

    /**
     * Store a newly created persona in storage.
     *
     * @param CreatepersonaRequest $request
     *
     * @return Response
     */
    public function store(CreatepersonaRequest $request)
    {
        $input = $request->all();
        //si no carga una foto
        if (empty($request->foto)) {
            $nombre = 'default.png';
        }else{
        //si si carga la foto    
        $foto = $request->file('foto');
            $nombre = $request->cedula.'.'.$foto->getClientOriginalExtension();
            $ruta = public_path().'/img/fotos/';
            $foto->move($ruta, $nombre);
        }
        $persona = persona::where('cedula',$request->cedula)->get();

        if (count($persona) > 0) {
            Flash::error('La cedula ya existe.');

            return redirect()->back();    
        }

        $user = new user();
        $user->email = $request->email;
        $user->estado = $request->estado;
        $user->tipo = 'Profesor';
        $user->password = bcrypt($request->password);
        $user->save();
        $user_id = $user->id;

        $persona = new persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->cedula = $request->cedula;
        $persona->foto = '/img/fotos/'.$nombre;
        $persona->user_id = $user_id;
        $persona->save();
        Flash::success('Profesor registrado con exito.');

        return redirect(route('admin.personas.index'));
    }


    /**
     * Display the specified persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Profesor no encontrado.');

            return redirect(route('admin.personas.index'));
        }

        return view('admin.persona.show')->with('persona', $persona);
    }

    /**
     * Show the form for editing the specified persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {   
        $persona = $this->personaRepository->findWithoutFail($id);
        if (empty($persona)) {
            Flash::error('Persona no encontrada.');
            return redirect()->back();
        }
        if(Auth::user()->tipo=="Admin"){
            return view('admin.persona.edit')->with('persona', $persona);
        }elseif(Auth::user()->tipo=="Profesor"){
            return view('profesor.persona.edit')->with('persona', $persona);
        }else{
            return view('estudiante.persona.edit')->with('persona', $persona);
        }
    }

    /**
     * Update the specified persona in storage.
     *
     * @param  int              $id
     * @param UpdatepersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepersonaRequest $request)
    {
        $persona = $this->personaRepository->findWithoutFail($id);
        $user = user::where('id',$persona->user_id)->get();
        $user = $user->first();

        if (empty($persona)) {
            Flash::error('Profesor no encontrado');
            if(Auth::user()->tipo=="Admin"){
                return redirect(route('admin.personas.index'));
            }elseif(Auth::user()->tipo=="Profesor"){
                return redirect()->back();   
            }else{
                return redirect()->back();   
            }    
        }

        //si la cedula cambio...
        if ($persona->cedula != $request->cedula) {
            //conseguir otras personas con la misma cedula
            $otras_personas = persona::where('cedula',$request->cedula)->get();
            //si otra persona posee esa cedula..
            if (count($otras_personas) > 0) {
                Flash::error('La cedula ya existe.');

                return redirect()->back();    
            }   
        }
            $user->email = $request->email;
            if($request->estado != null){
                $user->estado = $request->estado;
            }
            if (empty($request->password) == false) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->cedula = $request->cedula;

        //si no carga una foto nueva
        if (empty($request->foto)) {
            $persona->save();
            if(Auth::user()->tipo=="Admin"){
                Flash::success('Profesor actualizado con exito.');
                return redirect(route('admin.personas.index'));
            }else{
                Flash::success('Perfil actualizado con exito.');
                return redirect()->route('home');   
            }    
        }else{
        //si carga una nueva foto
            if (file_exists(public_path().$persona->foto)) {
                unlink(public_path().$persona->foto);        
            }

            $foto = $request->file('foto');
            $nombre = $request->cedula.'.'.$foto->getClientOriginalExtension();
            $ruta = public_path().'/img/fotos/';
            $foto->move($ruta, $nombre);
            $persona->foto = '/img/fotos/'.$nombre;;
            $persona->save();

            if(Auth::user()->tipo=="Admin"){
                Flash::success('Profesor actualizado con exito.');
                return redirect(route('admin.personas.index'));
            }else{
                Flash::success('Perfil actualizado con exito.');
                return redirect()->route('home');   
            }   
        }    

        if(Auth::user()->tipo=="Admin"){
            Flash::success('Profesor actualizado con exito.');
            return redirect(route('admin.personas.index'));
        }else{
            Flash::success('Perfil actualizado con exito.');
            return redirect()->route('home');   
        }   
    }

    /**
     * Remove the specified persona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Profesor no encontrado.');

            return redirect(route('admin.personas.index'));
        }

        $materias = materia::where('persona_id',$id)->get();
        if (count($materias)>0) {
             Flash::error('Este Profesor aun esta asignado a una materia.');

            return redirect(route('admin.personas.index')); 
        }else{

        $user_id = $persona->user_id;
        $user = user::where('id',$user_id)->get();
        $user = $user->first();
        $user->delete();

        if (file_exists(public_path().$persona->foto) && $persona->foto != '/img/fotos/default.png' ){
                unlink(public_path().$persona->foto);        
            }            
        $this->personaRepository->delete($id);

        Flash::success('Persona borrada con exito.');

        return redirect(route('admin.personas.index'));

        }
    }
}
