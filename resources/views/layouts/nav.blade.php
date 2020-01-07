<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Postulaciones OEP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @auth
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home') }}">
                <span>Dashboard</span></a>
        </li>
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
    <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Iniciar Sesión</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Registro</span></a>
    </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{url('/tests')}}">
                <i class="fas fa-fw fa-file"></i>
                <span>Test</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/preguntas')}}">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>Preguntas</span></a>
        </li>
    @endguest
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->

</ul>
