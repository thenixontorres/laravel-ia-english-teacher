<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreaterespuestaRequest;
use App\Http\Requests\UpdaterespuestaRequest;
use App\Repositories\respuestaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\respuesta;

class respuestaController extends AppBaseController
{
    /** @var  respuestaRepository */
    private $respuestaRepository;

    public function __construct(respuestaRepository $respuestaRepo)
    {
        $this->respuestaRepository = $respuestaRepo;
    }

    /**
     * Display a listing of the respuesta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->respuestaRepository->pushCriteria(new RequestCriteria($request));
        $respuestas = $this->respuestaRepository->all();

        return view('respuestas.index')
            ->with('respuestas', $respuestas);
    }

    /**
     * Show the form for creating a new respuesta.
     *
     * @return Response
     */
    public function create()
    {
        return view('respuestas.create');
    }

    /**
     * Store a newly created respuesta in storage.
     *
     * @param CreaterespuestaRequest $request
     *
     * @return Response
     */
    public function store(CreaterespuestaRequest $request)
    {
        $input = $request->all();

        $respuesta = $this->respuestaRepository->create($input);

        Flash::success('respuesta saved successfully.');

        return redirect(route('respuestas.index'));
    }

    /**
     * Display the specified respuesta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $respuesta = $this->respuestaRepository->findWithoutFail($id);

        if (empty($respuesta)) {
            Flash::error('respuesta not found');

            return redirect(route('respuestas.index'));
        }

        return view('respuestas.show')->with('respuesta', $respuesta);
    }

    /**
     * Show the form for editing the specified respuesta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $respuesta = $this->respuestaRepository->findWithoutFail($id);

        if (empty($respuesta)) {
            Flash::error('respuesta not found');

            return redirect(route('respuestas.index'));
        }

        return view('respuestas.edit')->with('respuesta', $respuesta);
    }

    /**
     * Update the specified respuesta in storage.
     *
     * @param  int              $id
     * @param UpdaterespuestaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterespuestaRequest $request)
    {
        $input = $request->all();
        $respuesta = respuesta::where('id',$request->respuesta_id)->get();
        $respuesta = $respuesta->first();
        $respuesta->respuesta = $request->respuesta_name;
        $respuesta->save();    
        Flash::success('Respuesta actualizada con exito.');

        return redirect()->back();
    }

    /**
     * Remove the specified respuesta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $respuesta = $this->respuestaRepository->findWithoutFail($id);

        if (empty($respuesta)) {
            Flash::error('Respuesta no encontrada.');

            return redirect()->back();
        }

        $this->respuestaRepository->delete($id);

        Flash::success('Respuesta eliminada con exito.');

        return redirect()->back();
    }
}
