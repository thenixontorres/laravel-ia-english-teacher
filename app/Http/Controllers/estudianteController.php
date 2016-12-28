<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateestudianteRequest;
use App\Http\Requests\UpdateestudianteRequest;
use App\Repositories\estudianteRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\estudiante;
use App\User;
use App\Models\persona;
use App\Models\materia;
use App\Models\seccion;
use App\Models\periodo;


class estudianteController extends AppBaseController
{
    /** @var  estudianteRepository */
    private $estudianteRepository;

    public function __construct(estudianteRepository $estudianteRepo)
    {
        $this->estudianteRepository = $estudianteRepo;
    }

    /**
     * Display a listing of the estudiante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estudianteRepository->pushCriteria(new RequestCriteria($request));
        $estudiantes = $this->estudianteRepository->all(); 
        return view('admin.estudiante.index')
            ->with('estudiantes', $estudiantes);
    }

    /**
     * Show the form for creating a new estudiante.
     *
     * @return Response
     */
    public function create()
    {
        $materias = materia::all();
        $periodos = periodo::all();
        return view('admin.estudiante.create')
            ->with('materias', $materias)
            ->with('periodos', $periodos);
    }

    /**
     * Store a newly created estudiante in storage.
     *
     * @param CreateestudianteRequest $request
     *
     * @return Response
     */
    public function store(CreateestudianteRequest $request)
    {
        $input = $request->all();

        $foto = $request->file('foto');
        $nombre = $request->cedula.'.'.$foto->getClientOriginalExtension();
        $ruta = public_path().'/img/fotos/';
        $foto->move($ruta, $nombre);

        $user = new user();
        $user->email = $request->email;
        $user->estado = $request->estado;
        $user->tipo = 'Estudiante';
        $user->password = bcrypt($request->password);
        $user->save();
        $user_id = $user->id;

        $persona = new persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->cedula = $request->cedula;
        $persona->foto = '/img/fotos/'.$nombre;
        $persona->user_id = $user_id;
        $persona->save();
        $persona_id = $persona->id;

        $estudiante = new estudiante();
        $estudiante->materia_id = $request->materia_id;
        $estudiante->periodo_id = $request->periodo_id;
        $estudiante->persona_id = $persona_id;
        $estudiante->save();
        
        if ($estudiante->save()) {
            Flash::success('Estudiante registrado correctamente.');
            return redirect(route('admin.estudiante.index'));    
        }else{
            Flash::error('Error al registrar el estudiante.');
            return redirect(route('admin.estudiante.create'));
        }       
    }

    /**
     * Display the specified estudiante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');

            return redirect(route('admin.estudiante.index'));
        }
        return view('admin.estudiante.show')->with('estudiante', $estudiante);
    }

    /**
     * Show the form for editing the specified estudiante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('Estudiante no encontrado');

            return redirect(route('admin.estudiante.index'));
        }
        $materias = materia::all();
        $periodos = periodo::all();
        return view('admin.estudiante.edit')
            ->with('estudiante', $estudiante)
            ->with('materias', $materias)
            ->with('periodos', $periodos);
    }

    /**
     * Update the specified estudiante in storage.
     *
     * @param  int              $id
     * @param UpdateestudianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestudianteRequest $request)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('estudiante not found');

            return redirect(route('estudiantes.index'));
        }

        $estudiante = $this->estudianteRepository->update($request->all(), $id);

        Flash::success('estudiante updated successfully.');

        return redirect(route('estudiantes.index'));
    }

    /**
     * Remove the specified estudiante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estudiante = $this->estudianteRepository->findWithoutFail($id);

        if (empty($estudiante)) {
            Flash::error('estudiante not found');

            return redirect(route('estudiantes.index'));
        }

        $this->estudianteRepository->delete($id);

        Flash::success('estudiante deleted successfully.');

        return redirect(route('estudiantes.index'));
    }
}
