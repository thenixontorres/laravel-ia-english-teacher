<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateperiodoRequest;
use App\Http\Requests\UpdateperiodoRequest;
use App\Repositories\periodoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class periodoController extends AppBaseController
{
    /** @var  periodoRepository */
    private $periodoRepository;

    public function __construct(periodoRepository $periodoRepo)
    {
        $this->periodoRepository = $periodoRepo;
    }

    /**
     * Display a listing of the periodo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->periodoRepository->pushCriteria(new RequestCriteria($request));
        $periodos = $this->periodoRepository->all();

        return view('periodos.index')
            ->with('periodos', $periodos);
    }

    /**
     * Show the form for creating a new periodo.
     *
     * @return Response
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Store a newly created periodo in storage.
     *
     * @param CreateperiodoRequest $request
     *
     * @return Response
     */
    public function store(CreateperiodoRequest $request)
    {
        $input = $request->all();

        $periodo = $this->periodoRepository->create($input);

        Flash::success('periodo saved successfully.');

        return redirect(route('periodos.index'));
    }

    /**
     * Display the specified periodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('periodo not found');

            return redirect(route('periodos.index'));
        }

        return view('periodos.show')->with('periodo', $periodo);
    }

    /**
     * Show the form for editing the specified periodo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('periodo not found');

            return redirect(route('periodos.index'));
        }

        return view('periodos.edit')->with('periodo', $periodo);
    }

    /**
     * Update the specified periodo in storage.
     *
     * @param  int              $id
     * @param UpdateperiodoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperiodoRequest $request)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('periodo not found');

            return redirect(route('periodos.index'));
        }

        $periodo = $this->periodoRepository->update($request->all(), $id);

        Flash::success('periodo updated successfully.');

        return redirect(route('periodos.index'));
    }

    /**
     * Remove the specified periodo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodo = $this->periodoRepository->findWithoutFail($id);

        if (empty($periodo)) {
            Flash::error('periodo not found');

            return redirect(route('periodos.index'));
        }

        $this->periodoRepository->delete($id);

        Flash::success('periodo deleted successfully.');

        return redirect(route('periodos.index'));
    }
}
