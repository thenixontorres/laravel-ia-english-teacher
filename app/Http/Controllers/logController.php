<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatelogRequest;
use App\Http\Requests\UpdatelogRequest;
use App\Repositories\logRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\regla;
use App\Models\entrada;
use App\Models\respuesta;
use App\Models\log;
use App\Models\contexto;
use App\Models\caso;
use App\Models\evaluacion;
use App\Models\estudiante;
use Auth;
use Carbon\Carbon;  

class logController extends AppBaseController
{
    /** @var  registroRepository */
    private $logRepository;

    public function __construct(logRepository $logRepo)
    {
        $this->logRepository = $logRepo;
    }

    /**
     * Display a listing of the registro.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->logRepository->pushCriteria(new RequestCriteria($request));
        $logs = $this->logRepository->all();

        return view('logs.index')
            ->with('logs', $logs);
    }

    /**
     * Show the form for creating a new registro.
     *
     * @return Response
     */
    public function create()
    {
        return view('logs.create');
    }

    /**
     * Store a newly created registro in storage.
     *
     * @param CreateregistroRequest $request
     *
     * @return Response
     */
    /*public function store(CreatelogRequest $request)
    {
        $input = $request->all();
        $fin = false;
        $reglas = regla::where('contexto_id', $request->contexto_actual)->get();
        foreach ($reglas as $regla) {
            $entrada = entrada::where('regla_id', $regla->id)->where('entrada','LIKE',"%$request->mensaje%")->first();
             //si consigue una entrada similar
             if (!empty($entrada)) {
                $contexto_actual = contexto::where('id', $regla->apuntador_id)->first();
                $reaccion = $regla->reaccion;
                 $caso = caso::where('id', $request->caso_id)->first();
                $respuesta = respuesta::where('regla_id', $regla->id)->first();

                $mensaje = $request->mensaje;
                //solo creo el log cuando es estudiante y es prueba
                //el mensaje y la respuesta se guarda como string
                if(Auth::user()->tipo == 'Estudiante' && $request->tipo_evaluacion == 'prueba'){
                     $log = new log();
                    $log->estudiante_id = Auth::user()->persona->estudiante->id;
                    $log->puntos = $regla->puntos;
                    $log->entrada = $mensaje;
                    $log->respuesta = $respuesta->respuesta;
                    $log->caso_id = $caso->id;
                    $log->save(); 
                 }
                
                 if ($contexto_actual->contexto == 'Final') {
                     $fin = true;
                     Flash::success('Felicitaciones! has encontrado la solucion al problema!');
                 }

                 if (Auth::user()->tipo=="Profesor") {
                 return view('profesor.caso.test')
                     ->with('contexto_actual', $contexto_actual)
                     ->with('reaccion', $reaccion)
                     ->with('caso', $caso)
                     ->with('respuesta', $respuesta)
                     ->with('mensaje', $mensaje)
                     ->with('fin', $fin);
                 }elseif(Auth::user()->tipo=="Estudiante"){
                    //pruebas
                    if($request->tipo_evaluacion == 'prueba'){
                         return view('estudiante.caso.play')
                         ->with('contexto_actual', $contexto_actual)
                         ->with('reaccion', $reaccion)
                         ->with('caso', $caso)
                         ->with('respuesta', $respuesta)
                         ->with('mensaje', $mensaje)
                         ->with('fin', $fin);
                    //practicas    
                    }elseif($request->tipo_evaluacion == 'practica'){
                         return view('estudiante.caso.test')
                         ->with('contexto_actual', $contexto_actual)
                         ->with('reaccion', $reaccion)
                         ->with('caso', $caso)
                         ->with('respuesta', $respuesta)
                         ->with('mensaje', $mensaje)
                         ->with('fin', $fin);
                    }
                }      
             }
        }
        //si despues de recorren todas las reglas no consigue ninguna entrada similar
        foreach ($reglas as $regla) {
            $entrada = entrada::where('regla_id', $regla->id)->where('entrada', 'default')->first();
            if (!empty($entrada)) {
                //en este caso mantengo en contexto
                $contexto_actual = contexto::where('id', $request->contexto_actual)->first();
                $reaccion = $regla->reaccion;
                //mantengo el mismo caso
                $caso = caso::where('id', $request->caso_id)->first();
                $respuesta = respuesta::where('regla_id', $regla->id)->first();
                $mensaje = $request->mensaje;

                if(Auth::user()->tipo == 'Estudiante' && $request->tipo_evaluacion == 'prueba'){
                    $log = new log();
                    $log->estudiante_id = Auth::user()->persona->estudiante->id;     
                    $log->puntos = $regla->puntos;
                    $log->entrada = $mensaje;
                    $log->respuesta = $respuesta->respuesta;
                    $log->caso_id = $caso->id;
                    $log->save();
                }

                if (Auth::user()->tipo=="Profesor") {
                //practicas de profesor
                return view('profesor.caso.test')
                    ->with('contexto_actual', $contexto_actual)
                    ->with('reaccion', $reaccion)
                    ->with('caso', $caso)
                    ->with('respuesta', $respuesta)
                    ->with('mensaje', $mensaje);
                }elseif(Auth::user()->tipo=="Estudiante"){
                    //pruebas
                    if ($request->tipo_evaluacion == 'prueba') {
                        return view('estudiante.caso.play')
                        ->with('contexto_actual', $contexto_actual)
                        ->with('reaccion', $reaccion)
                        ->with('caso', $caso)
                        ->with('respuesta', $respuesta)
                        ->with('mensaje', $mensaje)
                        ->with('fin', $fin);
                    //practicas    
                    }elseif($request->tipo_evaluacion == 'practica'){
                        return view('estudiante.caso.test')
                        ->with('contexto_actual', $contexto_actual)
                        ->with('reaccion', $reaccion)
                        ->with('caso', $caso)
                        ->with('respuesta', $respuesta)
                        ->with('mensaje', $mensaje)
                        ->with('fin', $fin);
                    }
                }  
            }
        }
    }*/

    public function chat(CreatelogRequest $request)
    {
        $input = $request->all();
        $fin = false;
        $reglas = regla::where('contexto_id', $request->contexto_actual)->get();
        foreach ($reglas as $regla) {
            $entrada = entrada::where('regla_id', $regla->id)->where('entrada','LIKE',"%$request->mensaje%")->first();
             //si consigue una entrada similar
             if (!empty($entrada)) {
                $contexto_actual = contexto::where('id', $regla->apuntador_id)->first();
                $reaccion = $regla->reaccion;
                 $caso = caso::where('id', $request->caso_id)->first(); 
                $respuesta = respuesta::where('regla_id', $regla->id)->orderByRaw("RAND()")->first();

                $mensaje = $request->mensaje;
                //solo creo el log cuando es estudiante y es prueba
                //el mensaje y la respuesta se guarda como string
                if(Auth::user()->tipo == 'Estudiante' && $request->tipo_evaluacion == 'prueba'){
                     $log = new log();
                    $log->estudiante_id = Auth::user()->persona->estudiante->id;
                    $log->coherencia = 'si';
                    if ($contexto_actual->contexto == 'Final') {
                    $log->final = 'si'; 
                    }else{
                    $log->final = 'no';    
                    }
                    $log->puntos = $regla->puntos;
                    $log->entrada = $mensaje;
                    $log->respuesta = $respuesta->respuesta;
                    $log->caso_id = $caso->id;
                    $log->save(); 
                 }
                
                 if ($contexto_actual->contexto == 'Final') {
                     $fin = true;
                     Flash::success('Felicitaciones! has encontrado la solucion al problema!');
                 }

                 if (Auth::user()->tipo=="Profesor") {
                 return view('profesor.caso.test')
                     ->with('contexto_actual', $contexto_actual)
                     ->with('reaccion', $reaccion)
                     ->with('caso', $caso)
                     ->with('respuesta', $respuesta)
                     ->with('mensaje', $mensaje)
                     ->with('fin', $fin);
                 }elseif(Auth::user()->tipo=="Estudiante"){
                    //pruebas
                    if($request->tipo_evaluacion == 'prueba'){
                         return view('estudiante.caso.play')
                         ->with('contexto_actual', $contexto_actual)
                         ->with('reaccion', $reaccion)
                         ->with('caso', $caso)
                         ->with('respuesta', $respuesta)
                         ->with('mensaje', $mensaje)
                         ->with('fin', $fin);
                    //practicas    
                    }elseif($request->tipo_evaluacion == 'practica'){
                         return view('estudiante.caso.test')
                         ->with('contexto_actual', $contexto_actual)
                         ->with('reaccion', $reaccion)
                         ->with('caso', $caso)
                         ->with('respuesta', $respuesta)
                         ->with('mensaje', $mensaje)
                         ->with('fin', $fin);
                    }
                }      
             }
        }
        //si despues de recorren todas las reglas no consigue ninguna entrada similar
        foreach ($reglas as $regla) {
            $entrada = entrada::where('regla_id', $regla->id)->where('entrada', 'default')->first();
            if (!empty($entrada)) {
                //en este caso mantengo en contexto
                $contexto_actual = contexto::where('id', $request->contexto_actual)->first();
                $reaccion = $regla->reaccion;
                //mantengo el mismo caso
                $caso = caso::where('id', $request->caso_id)->first();
                $respuesta = respuesta::where('regla_id', $regla->id)->orderByRaw("RAND()")->first();
                $mensaje = $request->mensaje;

                if(Auth::user()->tipo == 'Estudiante' && $request->tipo_evaluacion == 'prueba'){
                    $log = new log();
                    $log->estudiante_id = Auth::user()->persona->estudiante->id;     
                    $log->puntos = $regla->puntos;
                    $log->entrada = $mensaje;
                    $log->respuesta = $respuesta->respuesta;
                    $log->caso_id = $caso->id;
                    $log->final = 'no';    
                    $log->coherencia = 'no';
                    $log->save();
                }

                if (Auth::user()->tipo=="Profesor") {
                //practicas de profesor
                return view('profesor.caso.test')
                    ->with('contexto_actual', $contexto_actual)
                    ->with('reaccion', $reaccion)
                    ->with('caso', $caso)
                    ->with('respuesta', $respuesta)
                    ->with('mensaje', $mensaje);
                }elseif(Auth::user()->tipo=="Estudiante"){
                    //pruebas
                    if ($request->tipo_evaluacion == 'prueba') {
                        return view('estudiante.caso.play')
                        ->with('contexto_actual', $contexto_actual)
                        ->with('reaccion', $reaccion)
                        ->with('caso', $caso)
                        ->with('respuesta', $respuesta)
                        ->with('mensaje', $mensaje)
                        ->with('fin', $fin);
                    //practicas    
                    }elseif($request->tipo_evaluacion == 'practica'){
                        return view('estudiante.caso.test')
                        ->with('contexto_actual', $contexto_actual)
                        ->with('reaccion', $reaccion)
                        ->with('caso', $caso)
                        ->with('respuesta', $respuesta)
                        ->with('mensaje', $mensaje)
                        ->with('fin', $fin);
                    }
                }  
            }
        }
    }
    /**
     * Display the specified registro.
     *
     * @param  int $id
     *
     * @return Response
     */
    //recibe el id de la evaluacion cuando es estudiante
    public function show($id)
    {
        if (Auth::User()->tipo == 'Estudiante') {
            $evaluacion = evaluacion::where('id', $id)->first();
            $estudiante_id = Auth::User()->persona->estudiante->id;
            foreach ($evaluacion->casos as $caso) {
                $logs = log::where('caso_id', $caso->id)->where('estudiante_id',$estudiante_id)->get();
                //variables para el diagnostico
                //cantidad de iteraciones
                $count = count($logs);
                //puntos del contexto
                $elocuencia = 0;
                //si el bot entendio
                $coherencia = 0;
                $fin = false;
                if($count>0) {
                    foreach ($logs as $log) {
                        $elocuencia = $elocuencia+$log->puntos;
                        if ($log->final=='si') {
                            $fin = true;
                        }
                        if($log->coherencia == 'si'){
                            $coherencia++;
                        }
                    }
                    $elocuencia = $elocuencia/$count;
                    $elocuencia = number_format($elocuencia, 2);
                    $coherencia = $coherencia/$count;
                    $coherencia = number_format($coherencia, 2);
                    return view('estudiante.log.show')
                    ->with('logs', $logs)
                    ->with('evaluacion', $evaluacion)
                    ->with('caso', $caso)
                    ->with('count', $count)
                    ->with('coherencia', $coherencia)
                    ->with('elocuencia', $elocuencia)
                    ->with('fin', $fin);
                }                
            }
            Flash::error('Aun no has realizado esta evaluacion');
            return redirect()->back();
        }else{
            $log = $this->logRepository->findWithoutFail($id);
            if (empty($log)) {
                Flash::error('log not found');
                return redirect(route('logs.index'));
            }
            return view('logs.show')->with('log', $log);
        }
    }

    public function prof_show($estudiante_id, $evaluacion_id){
        $evaluacion = evaluacion::where('id', $evaluacion_id)->first();
        $estudiante = estudiante::where('id', $estudiante_id)->first();
            foreach ($evaluacion->casos as $caso) {
                $logs = log::where('caso_id', $caso->id)->where('estudiante_id',$estudiante->id)->get();
                //variables para el diagnostico
                //cantidad de iteraciones
                $count = count($logs);
                //puntos del contexto
                $elocuencia = 0;
                //si el bot entendio
                $coherencia = 0;
                $fin = false;
                if (count($logs)>0) {
                    //ini
                     foreach ($logs as $log) {
                        $elocuencia = $elocuencia+$log->puntos;
                        if ($log->final=='si') {
                            $fin = true;
                        }
                        if($log->coherencia == 'si'){
                            $coherencia++;
                        }
                    }
                    $elocuencia = $elocuencia/$count;
                    $elocuencia = number_format($elocuencia, 2);
                    $coherencia = $coherencia/$count;
                    $coherencia = number_format($coherencia, 2);
                    return view('profesor.log.show')
                    ->with('logs', $logs)
                    ->with('evaluacion', $evaluacion)
                    ->with('caso', $caso)
                    ->with('count', $count)
                    ->with('coherencia', $coherencia)
                    ->with('elocuencia', $elocuencia)
                    ->with('fin', $fin);
                    //fin
                }                
            }
            Flash::error('Este estudiante aun no ha realizado esta evaluacion');
            return redirect()->back();
    }
    /**
     * Show the form for editing the specified registro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            Flash::error('log not found');

            return redirect(route('logs.index'));
        }

        return view('logs.edit')->with('log', $log);
    }

    /**
     * Update the specified registro in storage.
     *
     * @param  int              $id
     * @param UpdateregistroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelogRequest $request)
    {
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            Flash::error('log not found');

            return redirect(route('logs.index'));
        }

        $log = $this->logRepository->update($request->all(), $id);

        Flash::success('log updated successfully.');

        return redirect(route('logs.index'));
    }

    /**
     * Remove the specified registro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            Flash::error('log not found');

            return redirect(route('logs.index'));
        }

        $this->logRepository->delete($id);

        Flash::success('log deleted successfully.');

        return redirect(route('logs.index'));
    }
}
