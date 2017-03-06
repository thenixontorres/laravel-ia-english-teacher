<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatereaccionRequest;
use App\Http\Requests\UpdatereaccionRequest;
use App\Repositories\reaccionRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\reaccion;
use App\Models\regla;


class reaccionController extends AppBaseController
{
    /** @var  reaccionRepository */
    private $reaccionRepository;

    public function __construct(reaccionRepository $reaccionRepo)
    {
        $this->reaccionRepository = $reaccionRepo;
    }

    /**
     * Display a listing of the reaccion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reaccionRepository->pushCriteria(new RequestCriteria($request));
        $reaccions = $this->reaccionRepository->all();

        return view('admin.reaccion.index')
            ->with('reaccions', $reaccions);
    }

    /**
     * Show the form for creating a new reaccion.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.reaccion.create');
    }

    /**
     * Store a newly created reaccion in storage.
     *
     * @param CreatereaccionRequest $request
     *
     * @return Response
     */
    public function store(CreatereaccionRequest $request)
    {
        $input = $request->all();
        
        $reaccion = $request->file('reaccion');
        $nombre = $request->titulo.'.'.$reaccion->getClientOriginalExtension();
        $ruta = public_path().'/img/reaccions/';
        $reaccion->move($ruta, $nombre);

        $x = new reaccion();
        $x->titulo = $request->titulo;
        $x->reaccion = '/img/reaccions/'.$nombre;
        $x->save();

        Flash::success('Reaccion guardada con exito.');

        return redirect(route('admin.reaccions.index'));
    }

    /**
     * Display the specified reaccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reaccion = $this->reaccionRepository->findWithoutFail($id);

        if (empty($reaccion)) {
            Flash::error('Reaccion no encontrada.');

            return redirect(route('admin.reaccions.index'));
        }

        return view('admin.reaccion.show')->with('reaccion', $reaccion);
    }

    /**
     * Show the form for editing the specified reaccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reaccion = $this->reaccionRepository->findWithoutFail($id);

        if (empty($reaccion)) {
            Flash::error('Reaccion no encontrada.');

            return redirect(route('admin.reaccions.index'));
        }

        return view('admin.reaccion.edit')->with('reaccion', $reaccion);
    }

    /**
     * Update the specified reaccion in storage.
     *
     * @param  int              $id
     * @param UpdatereaccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereaccionRequest $request)
    {
        $reaccion = $this->reaccionRepository->findWithoutFail($id);

        if (empty($reaccion)) {
            Flash::error('Reaccion no encontrada.');

            return redirect(route('admin.reaccions.index'));
        }

        $reaccion = $this->reaccionRepository->update($request->all(), $id);

        Flash::success('Reaccion actualizada con exito.');

        return redirect(route('admin.reaccions.index'));
    }

    /**
     * Remove the specified reaccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reaccion = $this->reaccionRepository->findWithoutFail($id);

        if (empty($reaccion)) {
            Flash::error('Reaccion no encontrada.');

            return redirect(route('admin.reaccions.index'));
        }

        $reglas = regla::where('reaccion_id',$id)->get();
        if (count($reglas)>0) {
             Flash::error('Existen reglas que aun tienen esta reaccion.');

            return redirect(route('admin.reaccions.index')); 
        }
        $this->reaccionRepository->delete($id);

        Flash::success('Reaccion eliminada con exito.');

        return redirect(route('admin.reaccions.index'));
    }
}
