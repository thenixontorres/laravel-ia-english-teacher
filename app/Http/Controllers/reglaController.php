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

        $regla = $this->reglaRepository->create($input);

        Flash::success('regla saved successfully.');

        return redirect(route('reglas.index'));
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

        if (empty($regla)) {
            Flash::error('regla not found');

            return redirect(route('reglas.index'));
        }

        return view('reglas.edit')->with('regla', $regla);
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
        $regla = $this->reglaRepository->findWithoutFail($id);

        if (empty($regla)) {
            Flash::error('regla not found');

            return redirect(route('reglas.index'));
        }

        $regla = $this->reglaRepository->update($request->all(), $id);

        Flash::success('regla updated successfully.');

        return redirect(route('reglas.index'));
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
            Flash::error('regla not found');

            return redirect(route('reglas.index'));
        }

        $this->reglaRepository->delete($id);

        Flash::success('regla deleted successfully.');

        return redirect(route('reglas.index'));
    }
}
