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
use App\Models\contexto;
use App\Models\entrada;
use App\Models\respuesta;
use App\Models\regla;
use Auth;

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

        //esqueleto  
        //regla default
        $regla = new regla();
        $regla->puntos = 1;
        $regla->contexto_id = $contexto->id;
        $regla->apuntador_id = $contexto->id;
        $regla->reaccion_id = 2;
        $regla->save();
        //entradas
        $entrada = new entrada();
        $entrada->entrada = 'default';
        $entrada->regla_id = $regla->id;
        $entrada->save();
        $salidas = ['What?', 'Huh?', '...mmm?', 'Mmmm....i am confused', 'Eh? Are you ok?', 'I am not kiddin bro..'];
        //respuestas
        foreach ($salidas as $salida) {
        $respuesta = new respuesta();
        $respuesta->respuesta = $salida;
        $respuesta->regla_id = $regla->id;
        $respuesta->save();
        }
        
        Flash::success('Contexto agregado con exito.');
        
        if (Auth::user()->tipo == "Admin") {
            return redirect(route('admin.casos.edit',$request->caso_id));
        }else{
            return redirect(route('profesor.casos.edit',$request->caso_id));
        }
    }

    public function update(CreatecontextoRequest $request)
    {
        $input = $request->all();
        $contexto = contexto::where('id',$request->contexto_id)->get();
        $contexto = $contexto->first();

        $contexto->contexto = $request->contexto;

        $contexto->save();

        Flash::success('Contexto actualizado con exito.');

        return redirect()->back();
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
    /*
    public function edit($id)
    {
        $contexto = $this->contextoRepository->findWithoutFail($id);

        if (empty($contexto)) {
            Flash::error('contexto not found');

            return redirect(route('contextos.index'));
        }

        return view('contextos.edit')->with('contexto', $contexto);
    }
    */

    /**
     * Update the specified contexto in storage.
     *
     * @param  int              $id
     * @param UpdatecontextoRequest $request
     *
     * @return Response
     */
    
    /*public function update($id, UpdatecontextoRequest $request)
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
    */
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
        //Averiguar si otra regla apunta hacia aca
        $reglas = regla::where('apuntador_id', $id)->get();

        if (empty($reglas) != true) {
            foreach ($reglas as $regla) {
                //si la regla pertenece a otro contexto
                if ($regla->contexto_id != $id){
                    $mensaje = $regla->contexto->contexto;
                    Flash::error('No se puede borrar porque el contexto "'.$mensaje.'" contiene reglas que apuntan hasta este contexto.');

                    return redirect()->back();
                }   
            }
        }        
        //eliminar reglas del contexto
        $reglas = regla::where('contexto_id', $id)->get();
        foreach ($reglas as $regla) {
            //eliminar entradas del contexto
            $entradas = entrada::where('regla_id',$regla->id)->get();
            foreach ($entradas as $entrada) {
                 $entrada->delete();
            }
            //eliminar respuestas del contexto
            $respuestas = respuesta::where('regla_id',$regla->id)->get();

            foreach ($respuestas as $respuesta) {
                 $respuesta->delete();
            } 
            $regla->delete();
        }

        $this->contextoRepository->delete($id);

        Flash::success('Contexto borrado con exito.');

        return redirect()->back();
    }
}
