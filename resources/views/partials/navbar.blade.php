<!-- Topbar Start -->
<div class="navbar-custom bg-opacity-100">

    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1"> <i class="la la-angle-down"></i>

                </span>
            </a>
            @php
                $usuario  = auth()->user(); // Obtener el usuario autenticado
                $empresa = $usuario->empresa; // Acceder a la propiedad "empresa" del usuario
                $rol = $usuario->rol; // Acceder a la propiedad "rol" del usuario
                @endphp

            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0 text-white">
                        Bienvenido !
                    </h5>
                </div>

                <!-- item-->


                <a href="#" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>{{$usuario->nombre}}</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Configuración</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="this.closest('form').submit()">
                        <i class="fe-log-out"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </form>

            </div>
        </li>

        <span class="mr-2"></span>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="#" class="logo text-center mt-1">
            <span class="logo-lg">
                <!-- <img src="" alt="img" height="50"> -->

                <!-- <span class="logo-lg-text-light">Xeria</span> -->
              
                 <h2 >{{$empresa->nombre}} </h2>
                {{$rol->nombre}}  

            </span>
             <span class="logo-sm">
                <span class="logo-sm-text-dark">CRM</span>
                <!-- <img src="#" alt="df" height="20"> -->
                

            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </li>

    </ul>

    <!-- <form class="app-search ">
        <div class="app-search-box">
            <div class="input-group ">
                <input type="text" class="form-control " placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn" type="submit">
                        <i class="fe-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form> -->




</div>
<!-- end Topbar -->