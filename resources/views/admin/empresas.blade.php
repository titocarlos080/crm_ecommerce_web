<x-layouts.app>


    <div id="wrapper">

        @include('partials.navbar')

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            @include('partials.sidebar')
        </div>
        <!-- Left Sidebar End -->
        @php
        $usuario = auth()->user(); // Obtener el usuario autenticado
        $empresa = $usuario->empresa; // Acceder a la propiedad "empresa" del usuario
        $rol = $usuario->rol; // Acceder a la propiedad "rol" del usuario
        @endphp


        <!-- ========================================================== -->
        <!-- Start Page Content here -->
        <!-- ========================================================== -->

        <div class="content-page">
            <div id="content">

 
                <x-content title="Dashboard" subtitle="Dashboard" name="Dashboard">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                @livewire('empresas.show')
                            </div>
                        </div>
                    </div>
                </x-content>
              
            </div>

            @include('partials.footer')
        </div>

        <!-- ========================================================== -->
        <!-- End Page content -->
        <!-- ========================================================== -->

    </div>
</x-layouts.app>