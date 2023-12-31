<x-layouts.app>


    <div id="wrapper">

        @include('partials.navbar')

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            @include('partials.sidebar')
        </div>
        <!-- Left Sidebar End -->


        <!-- ========================================================== -->
        <!-- Start Page Content here -->
        <!-- ========================================================== -->

        <div class="content-page">
            <div id="content">

                <x-content title="Emlpleado" subtitle="Empleado" name="Dashboard">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                           
                            @livewire('empleados.show')
                            
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