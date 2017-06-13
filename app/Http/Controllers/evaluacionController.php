<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateevaluacionRequest;
use App\Http\Requests\UpdateevaluacionRequest;
use App\Repositories\evaluacionRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\materia;
use App\Models\caso;
use Auth;
use App\Models\evaluacion;

class evaluacionController extends AppBaseController
{
    /** @var  evaluacionRepository */
    private $evaluacionRepository;

    public function __construct(evaluacionRepository $evaluacionRepo)
    {
        $this->evaluacionRepository = $evaluacionRepo;
    }

    /**
     * Display a listing of the evaluacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->evaluacionRepository->pushCriteria(new RequestCriteria($request));
        $evaluacions = $this->evaluacionRepository->all();

        return view('admin.evaluacion.index')
            ->with('evaluacions', $evaluacions);
    }

    /**
     * Show the form for creating a new evaluacion.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->tipo == 'Admin'){
            $materias = materia::all();
            return view('admin.evaluacion.create')
            ->with('materias', $materias);
        }else{
            $materias = Auth::user()->persona->materias;
            return view('profesor.evaluacion.create')
            ->with('materias', $materias);
        }    
    }

    /**
     * Store a newly created evaluacion in storage.
     *
     * @param CreateevaluacionRequest $request
     *
     * @return Response
     */
    public function store(CreateevaluacionRequest $request)
    {
        $input = $request->all();

        $evaluacion = $this->evaluacionRepository->create($input);

        Flash::success('Evaluacion registrada con exito.');

        if (Auth::user()->tipo=='Admin') {
            return redirect(route('admin.evaluacions.index'));
        }else{
            return redirect(route('home'));
        }
    }

    /**
     * Display the specified evaluacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $evaluacion = $this->evaluacionRepository->findWithoutFail($id);
        $casos = caso::where('evaluacion_id', $evaluacion->id)->get();
        if (empty($evaluacion)) {
            Flash::error('Evaluacion no encontrada');

            return redirect(route('admin.evaluacions.index'));
        }
        if (Auth::User()->tipo == 'Admin') {
            return view('admin.evaluacion.show')->with('evaluacion', $evaluacion);
        }else{
            return view('profesor.evaluacion.show')
            ->with('evaluacion', $evaluacion)
            ->with('casos', $casos);
        }
        
    }

    /**
     * Show the form for editing the specified evaluacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evaluacion = $this->evaluacionRepository->findWithoutFail($id);
       
        if (empty($evaluacion)) {
            Flash::error('Evaluacion no encontrada');

            return redirect(route('admin.evaluacions.index'));
        }
        if(Auth::User()->tipo=='Admin'){
            $materias = materia::all();
            return view('admin.evaluacion.edit')
            ->with('evaluacion', $evaluacion)
            ->with('materias', $materias);
        }else{
            $materias = Auth::User()->persona->materias;
             return view('profesor.evaluacion.edit')
            ->with('evaluacion', $evaluacion)
            ->with('materias', $materias);
        }    
    }

    /**
     * Update the specified evaluacion in storage.
     *
     * @param  int              $id
     * @param UpdateevaluacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateevaluacionRequest $request)
    {
        $evaluacion = $this->evaluacionRepository->findWithoutFail($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion no encontrada');

            return redirect(route('admin.evaluacions.index'));
        }

        $evaluacion = $this->evaluacionRepository->update($request->all(), $id);

        Flash::success('Evaluacion actualizada con exito.');

        if (Auth::user()->tipo=='Admin') {
            return redirect(route('admin.evaluacions.index'));
        }else{
            return redirect(route('home'));
        }
    }

    /**
     * Remove the specified evaluacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evaluacion = $this->evaluacionRepository->findWithoutFail($id);

        if (empty($evaluacion)) {
            Flash::error('Evaluacion no econtrada.');

            return redirect(route('admin.evaluacions.index'));
        }

        $casos = caso::where('evaluacion_id',$id)->get();
        if (count($casos)>0) {
             Flash::error('Esta evaluacion aun tiene bots asignados.');

            return redirect(route('admin.materias.index')); 
        }

        $this->evaluacionRepository->delete($id);

        Flash::success('Evaluacion borrada con exito.');

        return redirect(route('admin.evaluacions.index'));
    }
}
