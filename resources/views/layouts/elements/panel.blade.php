<div class="sidebar" data-color="black" data-image= "{{ asset('css/theme/assets/img/paper.jpg') }}" >
	<div class="sidebar-wrapper">
		<ul class="nav">
			@if(Auth::user()->tipo	== 'Admin')
			<li id="est">
				<a onclick='active("est");' href="{{ route('admin.estudiantes.index') }}">Estudiantes</a>
				</a>
			</li>
			<li id="per">
				<a onclick='active("per");' href="{{ route('admin.personas.index') }}">Profesores</a>
				</a>
			</li>
			<li id="mat">
				<a onclick='active("mat");' href="{{ route('admin.materias.index') }}">Materias</a>
				</a>
			</li>
			<li li="eva">
				<a onclick='active("eva");' href="{{ route('admin.evaluacions.index') }}">Evaluaciones</a>
				</a>
			</li>
			<li id="cas">
				<a onclick='active("cas");' href="{{ route('admin.casos.index') }}">Bots</a>
				</a>
			</li>
			<li id="rea">
				<a onclick='active("rea");' href="{{ route('admin.reaccions.index') }}">Reacciones</a>
				</a>
			</li>
			@elseif(Auth::user()->tipo	== 'Profesor')
			<li id="mmat">
				<a onclick='active("rea");' href="{{ route('home').'#materias' }}">Mis Materias</a>
				</a>
			</li>
			<li id="meva">
				<a onclick='active("rea");' href="{{ route('home').'#evaluacions' }}">Mis Evaluaciones</a>
				</a>
			</li>
			<li id="muser">
				<a onclick='active("rea");' href="{{ route('profesor.personas.edit', Auth::user()->persona->id) }}">Mi Usuario</a>
				</a>
			</li>
			@else
			<li id="mmat">
				<a onclick='active("rea");' href="{{ route('home').'#materias' }}">Mi Materia</a>
				</a>
			</li>
			<li id="meva">
				<a onclick='active("rea");' href="{{ route('home').'#evaluacions' }}">Mis Evaluaciones</a>
				</a>
			</li>
			<li id="meva">
				<a onclick='active("rea");' href="{{ route('home').'#practicas' }}">Mis Practicas</a>
				</a>
			</li>
			<li id="muser">
				<a onclick='active("rea");' href="{{ route('estudiante.personas.edit', Auth::user()->persona->id) }}">Mi Usuario</a>
				</a>
			</li>
			@endif
		</ul>
	</div>
</div>

