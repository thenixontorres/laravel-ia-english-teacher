<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">@if(Auth::user()) {{ 'Hola, '.Auth::user()->email }}  @endif</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                <li>
                    <a href="{{ route('home') }}">
                        <i class="icon-home"></i> Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.logout') }}">
                        <i class="icon-power-off"></i> Salir
                    </a>
                </li>
                @endif
             </ul>   
        </div>
    </div>
</nav>