<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepersonaRequest;
use App\Http\Requests\UpdatepersonaRequest;
use App\Repositories\personaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class personaController extends AppBaseController
{
    /** @var  personaRepository */
    private $personaRepository;

    public function __construct(personaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
    }

    /**
     * Display a listing of the persona.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->personaRepository->pushCriteria(new RequestCriteria($request));
        $personas = $this->personaRepository->all();

        return view('personas.index')
            ->with('personas', $personas);
    }

    /**
     * Show the form for creating a new persona.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created persona in storage.
     *
     * @param CreatepersonaRequest $request
     *
     * @return Response
     */
    public function store(CreatepersonaRequest $request)
    {
        $input = $request->all();

        $persona = $this->personaRepository->create($input);

        Flash::success('persona saved successfully.');

        return redirect(route('personas.index'));
    }

    /**
     * Display the specified persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('persona not found');

            return redirect(route('personas.index'));
        }

        return view('personas.show')->with('persona', $persona);
    }

    /**
     * Show the form for editing the specified persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('persona not found');

            return redirect(route('personas.index'));
        }

        return view('personas.edit')->with('persona', $persona);
    }

    /**
     * Update the specified persona in storage.
     *
     * @param  int              $id
     * @param UpdatepersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepersonaRequest $request)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('persona not found');

            return redirect(route('personas.index'));
        }

        $persona = $this->personaRepository->update($request->all(), $id);

        Flash::success('persona updated successfully.');

        return redirect(route('personas.index'));
    }

    /**
     * Remove the specified persona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('persona not found');

            return redirect(route('personas.index'));
        }

        $this->personaRepository->delete($id);

        Flash::success('persona deleted successfully.');

        return redirect(route('personas.index'));
    }
}
