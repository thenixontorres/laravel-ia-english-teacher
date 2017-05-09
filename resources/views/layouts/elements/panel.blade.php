<div class="sidebar" data-color="black" data-image= "{{ asset('css/theme/assets/img/paper.jpg') }}" >
	<div class="sidebar-wrapper">
		<ul class="nav">
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
				<a onclick='active(this);' href="{{ route('admin.evaluacions.index') }}">Evaluaciones</a>
				</a>
			</li>
			<li id="cas">
				<a onclick='active(this);' href="{{ route('admin.casos.index') }}">Bots</a>
				</a>
			</li>
			<li id="rea">
				<a onclick='active(this);' href="{{ route('admin.reaccions.index') }}">Reacciones</a>
				</a>
			</li>
		</ul>
	</div>
</div>

