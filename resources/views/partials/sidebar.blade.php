<div class="slimscroll-menu">
    <!--- Sidemenu -->
    <div id="sidebar-menu">


        @php
        $usuario = auth()->user(); // Obtener el usuario autenticado
        $empresa = $usuario->empresa; // Acceder a la propiedad "empresa" del usuario
        $rol = $usuario->rol; // Acceder a la propiedad "rol" del usuario
        @endphp


        @if($empresa->nombre == 'ADM_CENTER')
        <ul class="metismenu" id="side-menu">
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    <span> CRM </span>
                </a>
            </li>

            <!-- Menú de Planes -->
            <li>
                <a href="{{route('admin_gestionar_planes')}}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Planes</span>
                    <span class="menu-arrow"></span>
                </a>
            </li>

            <!-- Menú de Empresas -->
            <li>
                <a href="{{route('admin_gestionar_empresas')}}">
                    <i class="fas fa-building"></i> <!-- Icono para Empresas -->
                    <span>Empresas</span>
                    <span class="menu-arrow"></span>
                </a>
            </li>
        </ul>

        @else
        <ul class="metismenu" id="side-menu">

            <li>
                <a href="{{route('crm_empresa')}}">
                    <i class="fas fa-home"></i>

                    <span> CRM </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Ventas</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('flujo_trabajo')}}"><i class="fas fa-tasks"></i> Mi flujo</a>
                    </li>
                    <li>
                        <a href="{{route('empresa_actividad')}}"><i class="fas fa-tasks"></i> Mi Actividades</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-money-bill-wave"></i> Mi presupuestos</a>
                    </li>
                    <li>
                        <a href="{{route('empresa_equipos')}}"><i class="fas fa-users"></i> Equipos</a>
                    </li>
                    <li>
                        <a href="{{route('empresa_clientes')}}"><i class="fas fa-user"></i> Clientes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('clientes_potenciales')}}">
                    <i class="fas fa-user"></i>
                    <span>Clientes Potenciales</span>
                    <span class="menu-arrow"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-bar"></i>
                    <span>Informe</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="#"><i class="fas fa-chart-bar"></i> Previsiones</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-chart-line"></i> Flujo</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Configuraciones</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="#"><i class="fas fa-cogs"></i> Ajustes</a>
                    </li>
                    <li>
                        <a href="{{route('empresa_empleados')}}"><i class="fas fa-user"></i> Empleados</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-tasks"></i> Tipos de actividad</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-handshake"></i> Solicitud Leads</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-globe"></i>
                    <span>Sitio Web</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('sucursales')}}"><i class="fas fa-store"></i> Sucursales</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-box"></i> Inventarios</a>
                        <ul class="nav-third-level" aria-expanded="false">
                            <li>
                                <a href="{{route('categorias')}}"><i class="fas fa-tags"></i> Categoria</a>
                            </li>  <li>
                                <a href="{{route('productos')}}"><i class="fas fa-cube"></i> Productos</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fas fa-shopping-basket"></i> Pedidos</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-user-friends"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-chart-pie"></i> Ventas</a>
                    </li>
                </ul>
            </li>
        </ul>
        @endif

    </div>
    <!-- End Sidebar -->
    <div class="clearfix"></div>
</div>
<!-- Sidebar -left -->