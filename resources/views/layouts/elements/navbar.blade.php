<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bot Conversacional</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">Inicio</i>
                        <p class="hidden-lg hidden-md">Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.logout') }}" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">Salir</i>
                        <p class="hidden-lg hidden-md">Salir</p>
                    </a>
                </li>
                @endif
             </ul>   
        </div>
    </div>
</nav>