<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateestudianteRequest;
use App\Http\Requests\UpdateestudianteRequest;
use App\Repositories\estudianteRepository;
use App\Repositories\personaRepository;
use App\Repositories\userRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\estudiante;
use App\User;
use App\Models\persona;
use App\Models\materia;
use App\Models\seccion;
use App\Models\periodo;
use Auth;

class estudianteController extends AppBaseController
{
    /** @var  estudianteRepository */
    private $estudianteRepository;
    private $personaRepository;
    private $userRepository;


    public function __construct(estudianteRepository $estudianteRepo)
    {
        $this->estudianteRepository = $estudianteRepo;
    }

    /**
     * Display a listing of the estudiante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estudianteRepository->pushCriteria(new RequestCriteria($request));
        $estudiantes = $this->estudianteRepository->all(); 
        return view('admin.estudiante.index')
            ->with('estudiantes', $estudiantes);
    }

    //Admin - Profesor
    public function create()
    {   
        $periodos = periodo::all();
        if(Auth::User()->tipo=="Admin"){
            $materias = materia::all();
        return view('admin.estudiante.create')
            ->with('materias', $materias)
            ->with('periodos', $periodos);
        }elseif(Auth::User()->tipo=="Profesor"){
            $materias = Auth::User()->persona->materias;
            return view('profesor.estudiante.create')
            ->with('materias', $materias)
            ->with('periodos', $periodos);
        }     
    }

    /**
     * Store a newly created estudiante in storage.
     *
     * @param CreateestudianteRequest $request
     *
     * @return Response
     */
    public function store(CreateestudianteRequest $request)
    {
        $input = $request->all();

        $otra_persona = persona::where('cedula',$request->cedula)->get();

        if (count($otra_persona) > 0) {
            Flash::error('La cedula ya existe.');

            return redirect()->back();    
        }


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

        $user = new user();
        $user->email = $request->email;
        $user->estado = $request->estado;
        $user->tipo = 'Estudiante';
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
        $persona_id = $persona->id;

        $estudiante = new estudiante();
        $estudiante->materia_id = $request->materia_id;
        $estudiante->periodo_id = $request->periodo_id;
        $estudiante->persona_id = $persona_id;
        $estudiante->save();
        if(Auth::User()->tipo=="Admin"){
            if ($estudiante->save()) {
                Flash::success('Estudiante registrado correctamente.');
                return redirect(route('admin.estudiantes.index'));    
            }else{
                Flash::error('Error al registrar el estudiante.');
                return redirect(route('admin.estudiantes.create'));
            } 
        }elseif(Auth::User()->tipo=="Profesor"){
            if ($estudiante->save()) {
                Flash::success('Estudiante registrado correctamente.');
                return redirect()->back();    
            }else{
                Flash::error('Error al registrar el estudiante.');
                return redirect()->back();
            }
        }           
    }

    //Admin
    public function show($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');

            return redirect(route('admin.estudiantes.index'));
        }
        return view('admin.estudiante.show')->with('estudiante', $estudiante);
    }

    //Profesor
    public function mis_estudiantes_show($id)
    {
        $estudiantes = estudiante::where('materia_id', $id)->get();
        $materia = materia::where('id',$id)->get();
        $materia = $materia->first();
        if (empty($estudiantes)) {
            Flash::error('Esta materia no tiene Estudiantes Inscritos');

            return redirect()->back();
        }
        return view('profesor.estudiante.show')
            ->with('estudiantes', $estudiantes)
            ->with('materia', $materia);
    }

    //Admin - Profesor
    public function edit($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');
                return redirect()->back();
        }
        $materias = materia::all();
        $periodos = periodo::all();
        if(Auth::User()->tipo=="Admin"){
        return view('admin.estudiante.edit')
            ->with('estudiante', $estudiante)
            ->with('materias', $materias)
            ->with('periodos', $periodos);
       }elseif(Auth::User()->tipo=="Profesor"){
            return view('profesor.estudiante.edit')
            ->with('estudiante', $estudiante)
            ->with('materias', $materias)
            ->with('periodos', $periodos);
       }     
    }

    /**
     * Update the specified estudiante in storage.
     *
     * @param  int              $id
     * @param UpdateestudianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestudianteRequest $request)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);
        $persona = persona::where('id',$estudiante->persona_id)->get();
        $persona = $persona->first();
        $user = user::where('id',$persona->user_id)->get();
        $user = $user->first();

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado.');
            return redirect()->back();
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
            $user->estado = $request->estado;
            if (empty($request->password) == false) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $estudiante->periodo_id = $request->periodo_id;
            $estudiante->save();        

            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
            $persona->cedula = $request->cedula;

            //si no carga una foto nueva
            if (empty($request->foto)) {
                $persona->save();
                Flash::success('Estudiante actualizado con exito.');
                if(Auth::User()->tipo=="Admin"){
                    return redirect(route('admin.estudiantes.index'));
                }elseif(Auth::User()->tipo=="Profesor"){
                    return redirect()->back();
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
                $persona->foto = '/img/fotos/'.$nombre;
                $persona->save();
                Flash::success('Estudiante actualizado con exito.');
                
                if(Auth::User()->tipo=="Admin"){
                    return redirect(route('admin.estudiantes.index'));
                }elseif(Auth::User()->tipo=="Profesor"){
                    return redirect()->back();
                }
            }

        Flash::success('Estudiante actualizado con exito.');
      
        if(Auth::User()->tipo=="Admin"){
            return redirect(route('admin.estudiantes.index'));
        }elseif(Auth::User()->tipo=="Profesor"){
            return redirect()->back();
        }
    }

    /**
     * Remove the specified estudiante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);
        
        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');
            return redirect(route('admin.estudiantes.index'));
        }

            $persona_id = $estudiante->persona_id;
            $persona = persona::where('id',$persona_id)->get();
            $persona = $persona->first();

            if (file_exists(public_path().$persona->foto) && $persona->foto != '/img/fotos/default.png' ){
                unlink(public_path().$persona->foto);        
            }
            
            $user_id = $persona->user_id;
            $user = user::where('id',$user_id)->get();
            $user = $user->first();

            $user->delete();
            $persona->delete();
            $this->estudianteRepository->delete($id);

        Flash::success('Estudiante borrado exitosamente.');

        return redirect(route('admin.estudiantes.index'));
    }
}
