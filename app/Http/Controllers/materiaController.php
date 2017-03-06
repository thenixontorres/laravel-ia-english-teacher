<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemateriaRequest;
use App\Http\Requests\UpdatemateriaRequest;
use App\Repositories\materiaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\persona;
use App\Models\seccion;
use App\User;
use App\Models\evaluacion;


class materiaController extends AppBaseController
{
    /** @var  materiaRepository */
    private $materiaRepository;

    public function __construct(materiaRepository $materiaRepo)
    {
        $this->materiaRepository = $materiaRepo;
    }

    /**
     * Display a listing of the materia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->materiaRepository->pushCriteria(new RequestCriteria($request));
        $materias = $this->materiaRepository->all();

        return view('admin.materia.index')
            ->with('materias', $materias);
    }

    /**
     * Show the form for creating a new materia.
     *
     * @return Response
     */
    public function create()
    {
        $seccions = seccion::all();
        $personas = persona::all();

        return view('admin.materia.create')
            ->with('seccions',$seccions)
            ->with('personas',$personas);
    }

    /**
     * Store a newly created materia in storage.
     *
     * @param CreatemateriaRequest $request
     *
     * @return Response
     */
    public function store(CreatemateriaRequest $request)
    {
        $input = $request->all();

        $materia = $this->materiaRepository->create($input);

        Flash::success('Materia registrada con exito.');

        return redirect(route('admin.materias.index'));
    }

    /**
     * Display the specified materia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia no encontrada');

            return redirect(route('admin.materias.index'));
        }

        return view('admin.materia.show')->with('materia', $materia);
    }

    /**
     * Show the form for editing the specified materia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia no encontrada.');

            return redirect(route('admin.materias.index'));
        }
        $seccions = seccion::all();
        $personas = persona::all();
        return view('admin.materia.edit')
        ->with('materia', $materia)
        ->with('seccions',$seccions)
        ->with('personas',$personas);
    }

    /**
     * Update the specified materia in storage.
     *
     * @param  int              $id
     * @param UpdatemateriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemateriaRequest $request)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia no encntrada.');

            return redirect(route('admin.materias.index'));
        }

        $materia = $this->materiaRepository->update($request->all(), $id);

        Flash::success('Materia editada con exito.');

        return redirect(route('admin.materias.index'));
    }

    /**
     * Remove the specified materia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materia = $this->materiaRepository->findWithoutFail($id);

        if (empty($materia)) {
            Flash::error('Materia no encontrada.');

            return redirect(route('admin.materias.index'));
        }

        $evaluacions = evaluacion::where('materia_id',$id)->get();
        if (count($evaluacions)>0) {
             Flash::error('Esta materia aun tiene evaluaciones.');

            return redirect(route('admin.materias.index')); 
        }else{

        
        $this->materiaRepository->delete($id);

        Flash::success('Materia borrada con exito.');

        return redirect(route('admin.materias.index'));

        }
    }
}
