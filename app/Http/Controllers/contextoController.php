<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecontextoRequest;
use App\Http\Requests\UpdatecontextoRequest;
use App\Repositories\contextoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class contextoController extends AppBaseController
{
    /** @var  contextoRepository */
    private $contextoRepository;

    public function __construct(contextoRepository $contextoRepo)
    {
        $this->contextoRepository = $contextoRepo;
    }

    /**
     * Display a listing of the contexto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contextoRepository->pushCriteria(new RequestCriteria($request));
        $contextos = $this->contextoRepository->all();

        return view('contextos.index')
            ->with('contextos', $contextos);
    }

    /**
     * Show the form for creating a new contexto.
     *
     * @return Response
     */
    public function create()
    {
        return view('contextos.create');
    }

    /**
     * Store a newly created contexto in storage.
     *
     * @param CreatecontextoRequest $request
     *
     * @return Response
     */
    public function store(CreatecontextoRequest $request)
    {
        $input = $request->all();

        $contexto = $this->contextoRepository->create($input);

        Flash::success('Contexto agregado con exito.');

        return redirect(route('admin.caso.edit',$request->caso_id));
    }

    /**
     * Display the specified contexto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contexto = $this->contextoRepository->findWithoutFail($id);

        if (empty($contexto)) {
            Flash::error('contexto not found');

            return redirect(route('contextos.index'));
        }

        return view('contextos.show')->with('contexto', $contexto);
    }

    /**
     * Show the form for editing the specified contexto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contexto = $this->contextoRepository->findWithoutFail($id);

        if (empty($contexto)) {
            Flash::error('contexto not found');

            return redirect(route('contextos.index'));
        }

        return view('contextos.edit')->with('contexto', $contexto);
    }

    /**
     * Update the specified contexto in storage.
     *
     * @param  int              $id
     * @param UpdatecontextoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecontextoRequest $request)
    {
        $contexto = $this->contextoRepository->findWithoutFail($id);

        if (empty($contexto)) {
            Flash::error('contexto not found');

            return redirect(route('contextos.index'));
        }

        $contexto = $this->contextoRepository->update($request->all(), $id);

        Flash::success('contexto updated successfully.');

        return redirect(route('contextos.index'));
    }

    /**
     * Remove the specified contexto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contexto = $this->contextoRepository->findWithoutFail($id);

        if (empty($contexto)) {
            Flash::error('Contexto no encontrado');

            return redirect()->back();
        }

        $this->contextoRepository->delete($id);

        Flash::success('Contexto borrado con exito.');

        return redirect()->back();
    }
}
