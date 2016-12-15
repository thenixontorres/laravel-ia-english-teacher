<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateseccionRequest;
use App\Http\Requests\UpdateseccionRequest;
use App\Repositories\seccionRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class seccionController extends AppBaseController
{
    /** @var  seccionRepository */
    private $seccionRepository;

    public function __construct(seccionRepository $seccionRepo)
    {
        $this->seccionRepository = $seccionRepo;
    }

    /**
     * Display a listing of the seccion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seccionRepository->pushCriteria(new RequestCriteria($request));
        $seccions = $this->seccionRepository->all();

        return view('seccions.index')
            ->with('seccions', $seccions);
    }

    /**
     * Show the form for creating a new seccion.
     *
     * @return Response
     */
    public function create()
    {
        return view('seccions.create');
    }

    /**
     * Store a newly created seccion in storage.
     *
     * @param CreateseccionRequest $request
     *
     * @return Response
     */
    public function store(CreateseccionRequest $request)
    {
        $input = $request->all();

        $seccion = $this->seccionRepository->create($input);

        Flash::success('seccion saved successfully.');

        return redirect(route('seccions.index'));
    }

    /**
     * Display the specified seccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('seccion not found');

            return redirect(route('seccions.index'));
        }

        return view('seccions.show')->with('seccion', $seccion);
    }

    /**
     * Show the form for editing the specified seccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('seccion not found');

            return redirect(route('seccions.index'));
        }

        return view('seccions.edit')->with('seccion', $seccion);
    }

    /**
     * Update the specified seccion in storage.
     *
     * @param  int              $id
     * @param UpdateseccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateseccionRequest $request)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('seccion not found');

            return redirect(route('seccions.index'));
        }

        $seccion = $this->seccionRepository->update($request->all(), $id);

        Flash::success('seccion updated successfully.');

        return redirect(route('seccions.index'));
    }

    /**
     * Remove the specified seccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seccion = $this->seccionRepository->findWithoutFail($id);

        if (empty($seccion)) {
            Flash::error('seccion not found');

            return redirect(route('seccions.index'));
        }

        $this->seccionRepository->delete($id);

        Flash::success('seccion deleted successfully.');

        return redirect(route('seccions.index'));
    }
}
