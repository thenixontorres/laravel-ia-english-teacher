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

        return view('casos.index')
            ->with('casos', $casos);
    }

    /**
     * Show the form for creating a new problema.
     *
     * @return Response
     */
    public function create()
    {
        return view('casos.create');
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

        $caso = $this->casoRepository->create($input);

        Flash::success('caso saved successfully.');

        return redirect(route('casos.index'));
    }

    /**
     * Display the specified problema.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $caso = $this->casoRepository->findWithoutFail($id);

        if (empty($caso)) {
            Flash::error('caso not found');

            return redirect(route('casos.index'));
        }

        return view('casos.show')->with('caso', $caso);
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
            Flash::error('caso not found');

            return redirect(route('casos.index'));
        }

        return view('casos.edit')->with('caso', $caso);
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
            Flash::error('caso not found');

            return redirect(route('casos.index'));
        }

        $this->casoRepository->delete($id);

        Flash::success('caso deleted successfully.');

        return redirect(route('casos.index'));
    }
}
