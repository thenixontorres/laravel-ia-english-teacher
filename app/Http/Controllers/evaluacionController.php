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

        return view('evaluacions.index')
            ->with('evaluacions', $evaluacions);
    }

    /**
     * Show the form for creating a new evaluacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('evaluacions.create');
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

        Flash::success('evaluacion saved successfully.');

        return redirect(route('evaluacions.index'));
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

        if (empty($evaluacion)) {
            Flash::error('evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        return view('evaluacions.show')->with('evaluacion', $evaluacion);
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
            Flash::error('evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        return view('evaluacions.edit')->with('evaluacion', $evaluacion);
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
            Flash::error('evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        $evaluacion = $this->evaluacionRepository->update($request->all(), $id);

        Flash::success('evaluacion updated successfully.');

        return redirect(route('evaluacions.index'));
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
            Flash::error('evaluacion not found');

            return redirect(route('evaluacions.index'));
        }

        $this->evaluacionRepository->delete($id);

        Flash::success('evaluacion deleted successfully.');

        return redirect(route('evaluacions.index'));
    }
}
