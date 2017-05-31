<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatenotaRequest;
use App\Http\Requests\UpdatenotaRequest;
use App\Repositories\notaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\nota;
use App\Models\estudiante;
use Auth;



class notaController extends AppBaseController
{
    /** @var  notaRepository */
    private $notaRepository;

    public function __construct(notaRepository $notaRepo)
    {
        $this->notaRepository = $notaRepo;
    }

    /**
     * Display a listing of the nota.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->notaRepository->pushCriteria(new RequestCriteria($request));
        $notas = $this->notaRepository->all();

        return view('notas.index')
            ->with('notas', $notas);
    }

    /**
     * Show the form for creating a new nota.
     *
     * @return Response
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created nota in storage.
     *
     * @param CreatenotaRequest $request
     *
     * @return Response
     */
    public function store(CreatenotaRequest $request)
    {
        $input = $request->all();

        $nota = $this->notaRepository->create($input);

        Flash::success('nota saved successfully.');

        return redirect(route('notas.index'));
    }

    /**
     * Display the specified nota.
     *
     * @param  int $id
     *
     * @return Response
     */
    //recibe id del estudiante
    public function show($id)
    {
        $notas = nota::where('estudiante_id', $id)->get();
        $estudiante = estudiante::where('id', $id)->first();
        if (empty($nota)) {
            Flash::error('Este estudiante no tiene ninguna nota registrada.');

            return redirect()->back();
        }
        if (Auth::user()->tipo=='Admin') {
            return view('admin.nota.show')->with('notas', $notas);
        }else{
            return view('profesor.nota.show')->with('notas', $notas);
        }
    }

    /**
     * Show the form for editing the specified nota.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            Flash::error('nota not found');

            return redirect(route('notas.index'));
        }

        return view('notas.edit')->with('nota', $nota);
    }

    /**
     * Update the specified nota in storage.
     *
     * @param  int              $id
     * @param UpdatenotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenotaRequest $request)
    {
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            Flash::error('nota not found');

            return redirect(route('notas.index'));
        }

        $nota = $this->notaRepository->update($request->all(), $id);

        Flash::success('nota updated successfully.');

        return redirect(route('notas.index'));
    }

    /**
     * Remove the specified nota from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nota = $this->notaRepository->findWithoutFail($id);

        if (empty($nota)) {
            Flash::error('nota not found');

            return redirect(route('notas.index'));
        }

        $this->notaRepository->delete($id);

        Flash::success('nota deleted successfully.');

        return redirect(route('notas.index'));
    }
}
