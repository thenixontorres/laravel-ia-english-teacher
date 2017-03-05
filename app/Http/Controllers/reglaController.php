<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatereglaRequest;
use App\Http\Requests\UpdatereglaRequest;
use App\Repositories\reglaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\regla;
use App\Models\entrada;
use App\Models\respuesta;
use App\Models\reaccion;
use App\Models\contexto;

class reglaController extends AppBaseController
{
    /** @var  reglaRepository */
    private $reglaRepository;

    public function __construct(reglaRepository $reglaRepo)
    {
        $this->reglaRepository = $reglaRepo;
    }

    /**
     * Display a listing of the regla.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reglaRepository->pushCriteria(new RequestCriteria($request));
        $reglas = $this->reglaRepository->all();

        return view('reglas.index')
            ->with('reglas', $reglas);
    }

    /**
     * Show the form for creating a new regla.
     *
     * @return Response
     */
    public function create()
    {
        return view('reglas.create');
    }

    /**
     * Store a newly created regla in storage.
     *
     * @param CreatereglaRequest $request
     *
     * @return Response
     */
    public function store(CreatereglaRequest $request)
    {
        $input = $request->all();
        $regla = new regla();
        $regla->reaccion_id = $request->reaccion_id;
        $regla->puntos = $request->puntos;
        $regla->contexto_id = $request->contexto_id;
        $regla->apuntador_id = $request->apuntador_id;
        $regla->save();

        $regla_id = $regla->id;

        $entradas = explode('#', $request->entrada);
        foreach ($entradas as $entrada) {
            $nueva = new entrada();
            $nueva->entrada = $entrada;
            $nueva->regla_id = $regla_id;
            $nueva->save();
        }

        $respuestas = explode('#', $request->respuesta);
        foreach ($respuestas as $respuesta) {
            $nueva = new respuesta();
            $nueva->respuesta = $respuesta;
            $nueva->regla_id = $regla_id;
            $nueva->save();        
        }    
            
        
        Flash::success('Regla registrada con exito.');

        return redirect()->back();
    }

    /**
     * Display the specified regla.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $regla = $this->reglaRepository->findWithoutFail($id);

        if (empty($regla)) {
            Flash::error('regla not found');

            return redirect(route('reglas.index'));
        }

        return view('reglas.show')->with('regla', $regla);
    }

    /**
     * Show the form for editing the specified regla.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $regla = $this->reglaRepository->findWithoutFail($id);
        
        $entradas = entrada::where('regla_id', $regla->id)->get();

        $respuestas = respuesta::where('regla_id', $regla->id)->get();

        $caso_id = $regla->contexto->caso->id;
        $contextos = contexto::all();
        $apuntadors = contexto::all();
        $reaccions = reaccion::all();
        if (empty($regla)) {
            Flash::error('Regla no encontrada.');

            return redirect()->back();
        }

        return view('admin.regla.edit')
            ->with('regla', $regla)
            ->with('caso_id', $caso_id)
            ->with('contextos', $contextos)
            ->with('apuntadors', $apuntadors)
            ->with('reaccions', $reaccions)
            ->with('entradas', $entradas)
            ->with('respuestas', $respuestas);
    }

    /**
     * Update the specified regla in storage.
     *
     * @param  int              $id
     * @param UpdatereglaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereglaRequest $request)
    {
        $input = $request->all();
        $regla = regla::where('id',$request->regla_id)->get();
        $regla = $regla->first();
        $regla->puntos = $request->puntos;
        $regla->contexto_id = $request->contexto_id;
        $regla->apuntador_id = $request->apuntador_id;
        $regla->reaccion_id = $request->reaccion_id;
        $regla->save(); 

        if(empty($request->entrada) != true) {
            $entradas = explode('#', $request->entrada);
            foreach ($entradas as $entrada) {
                $nueva = new entrada();
                $nueva->entrada = $entrada;
                $nueva->regla_id = $request->regla_id;
                $nueva->save();
            }   
        }
        if(empty($request->respuesta) != true) {
            $respuestas = explode('#', $request->respuesta);
            foreach ($respuestas as $respuesta) {
                $nueva = new respuesta();
                $nueva->respuesta = $respuesta;
                $nueva->regla_id = $request->regla_id;
                $nueva->save();        
            }
        }     

        Flash::success('Entrada actualizada con exito.');
        return redirect()->back();
    }

    /**
     * Remove the specified regla from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $regla = $this->reglaRepository->findWithoutFail($id);

        if (empty($regla)) {
            Flash::error('Regla no encontrada.');

            return redirect()->back();
        }

        $entradas = entrada::where('regla_id',$id)->get();
            foreach ($entradas as $entrada) {
                 $entrada->delete();
            }

        $respuestas = respuesta::where('regla_id',$id)->get();

            foreach ($respuestas as $respuesta) {
                 $respuesta->delete();
            }    

        $this->reglaRepository->delete($id);

        Flash::success('Regla eliminada con exito.');

        return redirect()->back();
    }
}
