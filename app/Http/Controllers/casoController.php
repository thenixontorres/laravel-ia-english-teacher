<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecasoRequest;
use App\Http\Requests\UpdatecasoRequest;
use App\Repositories\casoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\evaluacion;
use App\Models\contexto;
use App\Models\reaccion;
use App\Models\regla;
use App\Models\caso;
use App\Models\entrada;
use App\Models\respuesta;
use App\Models\log;
use Auth;
class casoController extends AppBaseController
{
    /** @var  problemaRepository */
    private $casoRepository;

    public function __construct(casoRepository $casoRepo)
    {
        $this->casoRepository = $casoRepo;
    }

    /**
     * Display a listing of the problema.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->casoRepository->pushCriteria(new RequestCriteria($request));
        $casos = $this->casoRepository->all();

        return view('admin.caso.index')
            ->with('casos', $casos);
    }

    /**
     * Show the form for creating a new problema.
     *
     * @return Response
     */
    public function create()
    {   
        
        $evaluacions = evaluacion::all();
        return view('admin.caso.create')
            ->with('evaluacions', $evaluacions);

    }

    //recibe id de la evaluacion
    public function micaso($id)
    {
        if(Auth::user()->tipo == 'Profesor'){
            $evaluacion = evaluacion::where('id', $id)->first();
            if (empty($evaluacion)) {
                Flash::error('Caso no encontrado.');
                return redirect()->back();
            }

            return view('profesor.caso.create')
            ->with('evaluacion', $evaluacion);
        }    
    }

    public function test($id)
    {
        if(Auth::user()->tipo == 'Profesor'){
            $caso = caso::where('id', $id)->first();
            if (empty($caso)) {
                Flash::error('Caso no encontrado.');
                return redirect()->back();
            }

            $contexto_actual = contexto::where('contexto', 'Inicio')->where('caso_id', $caso->id)->first();

            if (empty($contexto_actual)) {
                Flash::error('Este caso no tiene contexto inicial.');
                return redirect()->back();
            }

            return view('profesor.caso.test')
            ->with('caso', $caso)
            ->with('contexto_actual', $contexto_actual);
        }elseif (Auth::user()->tipo == 'Estudiante') {
            $evaluacion = evaluacion::where('id', $id)->first();
            //se obtiene un caso aleatorio de la evaluacion
            $caso = caso::where('evaluacion_id', $evaluacion->id)->orderByRaw("RAND()")->first();
            if (empty($caso)) {
                Flash::error('Esta evaluacion no tienes casos por ahora.');
                return redirect()->back();
            }

            $contexto_actual = contexto::where('contexto', 'Inicio')->where('caso_id', $caso->id)->first();

            if (empty($contexto_actual)) {
                Flash::error('Este caso no tiene contexto inicial.');
                return redirect()->back();
            }

            return view('estudiante.caso.test')
            ->with('caso', $caso)
            ->with('contexto_actual', $contexto_actual);
        }    
    }
    //profesor recibe id del caso, estudiante id de la evaluacion
    public function play($id)
    {
        if(Auth::user()->tipo == 'Profesor'){
            $caso = caso::where('id', $id)->first();
            if (empty($caso)) {
                Flash::error('Caso no encontrado.');
                return redirect()->back();
            }

            $contexto_actual = contexto::where('contexto', 'Inicio')->where('caso_id', $caso->id)->first();

            if (empty($contexto_actual)) {
                Flash::error('Este caso no tiene contexto inicial.');
                return redirect()->back();
            }

            return view('profesor.caso.play')
            ->with('caso', $caso)
            ->with('contexto_actual', $contexto_actual);
        }elseif (Auth::user()->tipo == 'Estudiante') {
            //validar que no existan otros logs

            $evaluacion = evaluacion::where('id', $id)->first();
            //obtenemos un caso aleatorio que pertenesca a la evaluacion
            $caso = caso::where('evaluacion_id', $evaluacion->id)->orderByRaw("RAND()")->first();
                        
            if (empty($caso)) {
                Flash::error('Esta evaluacion de no tiene casos practicos aun.');
                return redirect()->back();
            }
            $estudiante_id = Auth::user()->persona->estudiante->id;
            $logs = log::where('caso_id', $caso->id)->where('estudiante_id', $estudiante_id)->first();
            $count_logs = count($logs);
            if ($count_logs>0) {
                Flash::error('Ya has persentado esta evaluacion!');
                return redirect()->back();
            }
            $contexto_actual = contexto::where('contexto', 'Inicio')->where('caso_id', $caso->id)->first();

            if (empty($contexto_actual)) {
                Flash::error('Este caso no tiene contexto inicial.');
                return redirect()->back();
            }

            return view('estudiante.caso.play')
            ->with('caso', $caso)
            ->with('contexto_actual', $contexto_actual);
        }    
    }
    /**
     * Store a newly created problema in storage.
     *
     * @param CreateproblemaRequest $request
     *
     * @return Response
     */
    public function store(CreatecasoRequest $request)
    {
        $input = $request->all();

        $evaluacion = evaluacion::where('id', $request->evaluacion_id)->first();
        $caso = $this->casoRepository->create($input);

        //esqueleto
        $contexto = new contexto();
        $contexto->caso_id = $caso->id;
        $contexto->contexto = 'Inicio';
        $contexto->save();
        //regla default
        $regla = new regla();
        $regla->puntos = 1;
        $regla->contexto_id = $contexto->id;
        $regla->apuntador_id = $contexto->id;
        $regla->reaccion_id = 2;
        $regla->save();
        //entradas
        $entrada = new entrada();
        $entrada->entrada = 'default';
        $entrada->regla_id = $regla->id;
        $entrada->save();
        $salidas = ['What?', 'Huh?', '...mmm?', 'Mmmm....i am confused', 'Eh? Are you ok?', 'I am not kiddin bro..'];
        //respuestas
        foreach ($salidas as $salida) {
        $respuesta = new respuesta();
        $respuesta->respuesta = $salida;
        $respuesta->regla_id = $regla->id;
        $respuesta->save();
        }

        $contexto = new contexto();
        $contexto->caso_id = $caso->id;
        $contexto->contexto = 'Problema';
        $contexto->save();

        //reglas default
        $regla = new regla();
        $regla->puntos = 1;
        $regla->contexto_id = $contexto->id;
        $regla->apuntador_id = $contexto->id;
        $regla->reaccion_id = 2;
        $regla->save();
        //entradas
        $entrada = new entrada();
        $entrada->entrada = 'default';
        $entrada->regla_id = $regla->id;
        $entrada->save();
        $salidas = ['What?', 'Huh?', '...mmm?', 'Mmmm....i am confused', 'Eh? Are you ok?', 'I am not kiddin bro..'];
        //respuestas
        foreach ($salidas as $salida) {
        $respuesta = new respuesta();
        $respuesta->respuesta = $salida;
        $respuesta->regla_id = $regla->id;
        $respuesta->save();
        }

        $contexto = new contexto();
        $contexto->caso_id = $caso->id;
        $contexto->contexto = 'Final';
        $contexto->save();

        Flash::success('Bot registrado con exito.');

        if (Auth::user()->tipo =='Admin') {        

            return redirect(route('admin.casos.index'));

        }else{
            
            return redirect(route('profesor.casos.show', $evaluacion->id));
        }
    }

    /**
     * Display the specified problema.
     *
     * @param  int $id
     *
     * @return Response
     */
    //recibe id del caso en admin y id de la evaluacion en profesor
    public function show($id)
    {
        if (Auth::user()->tipo =='Admin') {
            $caso = $this->casoRepository->findWithoutFail($id);

            if (empty($caso)) {
                Flash::error('caso not found');

                return redirect(route('casos.index'));
            }

            return view('casos.show')->with('caso', $caso);
        }else{
            $evaluacion = evaluacion::where('id', $id)->first();
            $casos = caso::where('evaluacion_id', $evaluacion->id)->get();
             return view('profesor.caso.index')
                ->with('evaluacion', $evaluacion)
                ->with('casos', $casos);
        }
    }

    /**
     * Show the form for editing the specified problema.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('Bot no encontrado.');

            return redirect()->back();
        }

        $contextos = contexto::where('caso_id',$caso->id)->get();
        $apuntadors = contexto::where('caso_id',$caso->id)->get();
        $reaccions = reaccion::all();
       
        if (Auth::user()->tipo=='Admin') {
            return view('admin.caso.edit')
            ->with('caso', $caso)
            ->with('contextos', $contextos)
            ->with('apuntadors', $apuntadors)
            ->with('reaccions', $reaccions);
        }else{
            return view('profesor.caso.edit')
            ->with('caso', $caso)
            ->with('contextos', $contextos)
            ->with('apuntadors', $apuntadors)
            ->with('reaccions', $reaccions);
        }
        
    }

    /**
     * Update the specified problema in storage.
     *
     * @param  int              $id
     * @param UpdateproblemaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecasoRequest $request)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('caso not found');

            return redirect(route('casos.index'));
        }

        $caso = $this->casoRepository->update($request->all(), $id);

        Flash::success('caso updated successfully.');

        return redirect(route('casos.index'));
    }

    /**
     * Remove the specified problema from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('Bot no encontrado.');

            return redirect(route('admin.casos.index'));
        }

        //eliminar contexto del caso
        $contextos = contexto::where('caso_id', $id)->get();
            foreach ($contextos as $contexto) {
                //eliminar reglas del contexto
                $reglas = regla::where('contexto_id', $contexto->id)->get();
                foreach ($reglas as $regla) {
                    //eliminar entradas del contexto
                    $entradas = entrada::where('regla_id',$regla->id)->get();
                    foreach ($entradas as $entrada){
                        $entrada->delete();
                     }
                    //eliminar respuestas del contexto
                    $respuestas = respuesta::where('regla_id',$regla->id)->get();
                    foreach ($respuestas as $respuesta) {
                         $respuesta->delete();
                    } 
                    $regla->delete();
                }
                $contexto->delete();
            }
        $this->casoRepository->delete($id);

        Flash::success('Caso borrado con exito.');

        if (Auth::user()->tipo == 'Admin') {
        
        return redirect(route('admin.casos.index'));

        }else{
            return redirect()->back();
        }
    }
}
