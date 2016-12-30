<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateentradaRequest;
use App\Http\Requests\UpdateentradaRequest;
use App\Repositories\entradaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class entradaController extends AppBaseController
{
    /** @var  entradataRepository */
    private $entradaRepository;

    public function __construct(entradaRepository $entradaRepo)
    {
        $this->entradaRepository = $entradaRepo;
    }

    /**
     * Display a listing of the entrada.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->entradaRepository->pushCriteria(new RequestCriteria($request));
        $entradas = $this->entradaRepository->all();

        return view('entradas.index')
            ->with('entradas', $entradas);
    }

    /**
     * Show the form for creating a new entrada.
     *
     * @return Response
     */
    public function create()
    {
        return view('entradas.create');
    }

    /**
     * Store a newly created entrada in storage.
     *
     * @param CreateentradaRequest $request
     *
     * @return Response
     */
    public function store(CreateentradaRequest $request)
    {
        $input = $request->all();

        $entrada = $this->entradaRepository->create($input);

        Flash::success('entrada saved successfully.');

        return redirect(route('entradas.index'));
    }

    /**
     * Display the specified entrada.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entrada = $this->entradaRepository->findWithoutFail($id);

        if (empty($entrada)) {
            Flash::error('entrada not found');

            return redirect(route('entradas.index'));
        }

        return view('entradas.show')->with('entrada', $entrada);
    }

    /**
     * Show the form for editing the specified entrada.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entrada = $this->entradaRepository->findWithoutFail($id);

        if (empty($entrada)) {
            Flash::error('entrada not found');

            return redirect(route('entradas.index'));
        }

        return view('entradas.edit')->with('entrada', $entrada);
    }

    /**
     * Update the specified entrada in storage.
     *
     * @param  int              $id
     * @param UpdateentradaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateentradaRequest $request)
    {
        $entrada = $this->entradaRepository->findWithoutFail($id);

        if (empty($entrada)) {
            Flash::error('entrada not found');

            return redirect(route('entradas.index'));
        }

        $entrada = $this->entradaRepository->update($request->all(), $id);

        Flash::success('entrada updated successfully.');

        return redirect(route('entradas.index'));
    }

    /**
     * Remove the specified entrada from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entrada = $this->entradaRepository->findWithoutFail($id);

        if (empty($entrada)) {
            Flash::error('entrada not found');

            return redirect(route('entradas.index'));
        }

        $this->entradaRepository->delete($id);

        Flash::success('entrada deleted successfully.');

        return redirect(route('entradas.index'));
    }
}
