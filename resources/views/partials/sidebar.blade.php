    <div class="slimscroll-menu  "  >
        <!--- Sidemenu -->
        <div id="sidebar-menu" >


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
                <li>
                    <a href="{{route('realizar_backup')}}">
                        <i class="fas fa-database"></i> <!-- Icono para Empresas -->
                        <span>Realizar Backup</span>
                        <span class="menu-arrow"></span>
                    </a>
                </li>
            </ul>

            @else
            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="{{ route('crm_empresa') }}">
                        <i class="fas fa-home"></i>
                        <span> CRM </span>
                    </a>
                </li>

                @if(verificar_permiso('ventas'))
                <li>
                    <a href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Ventas</span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        @if(verificar_permiso('flujo_trabajo'))
                        <li>
                            <a href="{{ route('flujo_trabajo') }}"><i class="fas fa-tasks"></i> Mi flujo</a>
                        </li>
                        @endif

                        @if(verificar_permiso('empresa_actividad'))
                        <li>
                            <a href="{{ route('empresa_actividad') }}"><i class="fas fa-tasks"></i> Mi Actividades</a>
                        </li>
                        @endif

                        @if(verificar_permiso('mi_presupuestos'))
                        <li>
                            <a href="#"><i class="fas fa-money-bill-wave"></i> Mi presupuestos</a>
                        </li>
                        @endif

                        @if(verificar_permiso('empresa_equipos'))
                        <li>
                            <a href="{{ route('empresa_equipos') }}"><i class="fas fa-users"></i> Equipos</a>
                        </li>
                        @endif

                        @if(verificar_permiso('empresa_clientes'))
                        <li>
                            <a href="{{ route('empresa_clientes') }}"><i class="fas fa-user"></i> Clientes</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(verificar_permiso('clientes_potenciales'))
                <li>
                    <a href="{{ route('clientes_potenciales') }}">
                        <i class="fas fa-user"></i>
                        <span>Clientes Potenciales</span>
                        <span class="menu-arrow"></span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span>Informe</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if(verificar_permiso('informes'))
                        <li>
                            <a href="{{route('informes')}}"><i class="fas fa-chart-bar"></i> Informes</a>
                        </li>
                        @endif

                        @if(verificar_permiso('reportes'))
                        <li>
                            <a href="{{route('reportes')}}"><i class="fas fa-chart-line"></i> Reporte</a>
                        </li>
                        @endif
                    </ul>
                </li>

                @if(verificar_permiso('configuraciones'))
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Configuraciones</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if(verificar_permiso('ajustes'))
                        <li>
                            <a href="{{route('ajustes')}}"><i class="fas fa-cogs"></i> Ajustes</a>
                        </li>
                        @endif

                        @if(verificar_permiso('empresa_empleados'))
                        <li>
                            <a href="{{ route('empresa_empleados') }}"><i class="fas fa-user"></i> Empleados</a>
                        </li>
                        @endif

                        @if(verificar_permiso('tipos_actividad'))
                        <li>
                            <a href="#"><i class="fas fa-tasks"></i> Tipos de actividad</a>
                        </li>
                        @endif

                        @if(verificar_permiso('solicitud_leads'))
                        <li>
                            <a href="#"><i class="fas fa-handshake"></i> Solicitud Leads</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                <li>
                    <a href="#">
                        <i class="fas fa-globe"></i>
                        <span>Sitio Web</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @if(verificar_permiso('sucursales'))
                        <li>
                            <a href="{{ route('sucursales') }}"><i class="fas fa-store"></i> Sucursales</a>
                        </li>
                        @endif

                        <li>
                            <a href="#"><i class="fas fa-box"></i> Inventarios</a>
                            <ul class="nav-third-level" aria-expanded="false">
                                @if(verificar_permiso('categoria'))
                                <li>
                                    <a href="{{ route('categorias') }}"><i class="fas fa-tags"></i> Categoria</a>
                                </li>
                                @endif

                                @if(verificar_permiso('productos'))
                                <li>
                                    <a href="{{ route('productos') }}"><i class="fas fa-cube"></i> Productos</a>
                                </li>
                                @endif
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('pedidos')}}"><i class="fas fa-shopping-basket"></i> Pedidos</a>
                        </li>

                        <li>
                            <a href="#"><i class="fas fa-user-friends"></i> Clientes</a>
                        </li>

                        <li>
                            <a href="{{route('catalogo_admin',['empresa'=>$empresa->nombre])}}"><i class="fas fa-chart-pie"></i> Web</a>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Función para redirigir a la ruta según la combinación de teclas
            function redirectToRoute(keyCombination, route) {
                $(document).keydown(function(event) {
                    // Verificar si la tecla 'Ctrl' está presionada y la tecla coincide
                    if (event.shiftKey && event.key === keyCombination) {
                        window.location.href = route;
                    }
                });
            }

            // Configuración de atajos de teclado

            redirectToRoute('c', '{{ route("crm_empresa") }}');
            redirectToRoute('b', '{{ route("flujo_trabajo") }}');
            redirectToRoute('c', '{{ route("empresa_actividad") }}');
            redirectToRoute('w', '{{ route("clientes_potenciales") }}');
            redirectToRoute('e', '{{ route("empresa_clientes") }}');
            redirectToRoute('f', '{{ route("empresa_actividad") }}');
            redirectToRoute('g', '{{ route("empresa_empleados") }}');
            redirectToRoute('p', '{{ route("productos") }}');
            redirectToRoute('q', '{{ route("empresa_equipos") }}');
            redirectToRoute('r', '{{ route("empresa_gestionar_pedidos") }}');
            redirectToRoute('s', '{{ route("sucursales") }}');

        });
    </script>