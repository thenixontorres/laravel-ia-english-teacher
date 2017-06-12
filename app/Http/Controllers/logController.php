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
    public function store(CreatelogRequest $request)
    {
        $input = $request->all();
        
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
                $log = new log();
                $log->estudiante_id = '1';
                $log->puntos = $regla->puntos;
                $log->entrada_id = $entrada->id;
                $log->respuesta_id = $respuesta->id;
                $log->caso_id = $caso->id;
                $log->save();
                return view('profesor.caso.test')
                    ->with('contexto_actual', $contexto_actual)
                    ->with('reaccion', $reaccion)
                    ->with('caso', $caso)
                    ->with('respuesta', $respuesta)
                    ->with('mensaje', $mensaje);
            }
        }

        //si no consigue ninguna entrada similar
        foreach ($reglas as $regla) {
            $entrada = entrada::where('regla_id', $regla->id)->where('entrada', 'default')->first();
            if (!empty($entrada)) {
                $contexto_actual = contexto::where('id', $request->contexto_actual)->first();
                $reaccion = $regla->reaccion;
                $caso = caso::where('id', $request->caso_id)->first();
                $respuesta = respuesta::where('regla_id', $regla->id)->first();
                $mensaje = $request->mensaje;
                $log = new log();
                $log->estudiante_id = '1';
                $log->puntos = $regla->puntos;
                $log->entrada_id = $entrada->id;
                $log->respuesta_id = $respuesta->id;
                $log->caso_id = $caso->id;
                $log->save();
                return view('profesor.caso.test')
                    ->with('contexto_actual', $contexto_actual)
                    ->with('reaccion', $reaccion)
                    ->with('caso', $caso)
                    ->with('respuesta', $respuesta)
                    ->with('mensaje', $mensaje);
            }
        }

        //$log = $this->logRepository->create($input);

        return redirect()->back();
    }

    /**
     * Display the specified registro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $log = $this->logRepository->findWithoutFail($id);

        if (empty($log)) {
            Flash::error('log not found');

            return redirect(route('logs.index'));
        }

        return view('logs.show')->with('log', $log);
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
