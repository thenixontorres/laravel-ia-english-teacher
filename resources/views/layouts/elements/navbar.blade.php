<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
				<li><img class="logo" src="{{ asset('img/logo.png') }}" alt="">
                </li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
	            <li>
	            	<a href="{{ route('home') }}#inicio">INICIO</a>
	            </li>
                <li>
                	<a href="{{ route('home') }}#practicas" >PRECTICAS</a>
                </li>
                <li>
                	<a href="{{ route('home') }}#evaluaciones">EVALUACIONES</a>
                </li>
                <li>
                    <a href="{{ route('admin.estudiante.index') }}">PANEL DE CONTROL</a>
                </li>
                @if(Auth::user())
                <li><a href="{{ route('auth.logout') }}"> SALIR </a>
                </li>    
                @endif     
  
            </ul>
        </div>
    </div>
</div>