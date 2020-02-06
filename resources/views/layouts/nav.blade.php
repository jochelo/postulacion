<style>
    button.nav-link {
        border: none;
        background: #e2872c;
        color: white;
    }
</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Postulaciones <small>SERECI - ORURO</small> </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @auth
{{--        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home') }}">
                <span>Dashboard</span></a>
        </li>--}}
    @else
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">
                <span>INICIO</span></a>
        </li>
    @endauth
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <!-- Nav Item - Charts -->
    @guest
   <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Iniciar Sesión</span></a>
    </li>-->
    <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Postulación</span></a>
    </li>
    @else
        @if(Auth::user()->es_admin)
        <li class="nav-item">
            <form action="{{ url('/resumen-cargo') }}" method="post">
                @csrf
                <button class="nav-link" type="submit">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Resumen por Cargo</span></button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/resumen')}}">
                <i class="fas fa-fw fa-file"></i>
                <span>Resumen General</span></a>
        </li>
        <li class="nav-item">
            <form action="{{ url('resultados') }}" method="post">
                @csrf
                <button class="nav-link" type="submit">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Resultados</span></button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/tests')}}">
                <i class="fas fa-fw fa-file"></i>
                <span>Test</span></a>
        </li>
        <li class="nav-item">
            <form action="{{ url('preguntas-test') }}" method="post">
                @csrf
                <input type="hidden" name="test_id" value="0">
                <button class="nav-link" type="submit">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Preguntas</span></button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/users')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Postulantes</span></a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">
                <i class="fas fa-fw fa-file"></i>
                <span>Documentación</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/evaluacion-online')}}">
                <i class="fas fa-fw fa-pen-square"></i>
                <span>Evaluación Online</span></a>
        </li>
        @endif
    @endguest
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
</ul>
