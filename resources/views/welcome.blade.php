 <x-layouts.app>
     <style>
         #login_modal {
             transition: opacity duration ease-in-out 2s;

         }
     </style>

     <div class="content ">
         <!-- Start Content-->
         <div class="container-fluid " style=" background-image: url(https://img.freepik.com/vector-premium/fondo-tecnologia-datos-digitales-alta-tecnologia_29971-1153.jpg);
                                       background-size: cover;
                    background-attachment: fixed; /* Optional: Keeps the background fixed while scrolling */
                 margin: 0;
                padding: 0;
                        ">
             <!-- start page title -->
             <div class="col-lg-12 col-sm-2 text-white">

                 <div class="row   ">
                     <div class="col-12">

                         <div class="d-flex mt-3 justify-content-between align-items-center">
                             <h4 class="page-title font-weight-bold  text-white">BIENVENIDOS A CRM</h4>
                             <button onclick="abrirModal()" class="btn btn-primary  "><i class="fe-log-in"></i> Login</button>

                         </div>

                         <div class=" d-flex justify-content-between">
                             <div class="bg-soft-info rounded p-2">
                                 <p>En nombre de todo el equipo, te damos una cálida bienvenida </p>
                                 <p> a nuestra plataforma de comercio electrónico integrada con CRM.</p>
                                 <p> gestión de relaciones con tus clientes.</p>
                                 <p> Estamos encantados de tenerte aquí y ser parte de tu viaje en la</p>
                             </div>
                             <div class=" bg-soft-info rounded p-2">
                                 <p>En nombre de todo el equipo, te damos una cálida bienvenida </p>
                                 <p> a nuestra plataforma de comercio electrónico integrada con CRM.</p>
                                 <p> Estamos encantados de tenerte aquí y ser parte de tu viaje en la</p>
                                 <p> gestión de relaciones con tus clientes.</p>
                             </div>

                         </div>
                     </div>
                 </div>


             </div>
             <!-- end page title -->

             <div class="row justify-content-center">
                 <div class="col-xl-10">

                     <!-- Pricing Title-->
                     <div class="text-center  text-white mb-4">
                         <h3 class="mb-2">Nuestros <b>Planes</b></h3>
                         <p class="  w-50 m-auto">
                             Elige la mejor opcion para crecer tu empresa
                         </p>
                     </div>

                     <!-- Plans -->
                     <div class="row my-3">
                         @foreach ($planes as $plan)
                         <div class="col-md-4">
                             <div class="card card-pricing">
                                 <div class="card-body text-center">
                                     <p class="card-pricing-plan-name font-weight-bold text-uppercase">{{ $plan->nombre }}</p>
                                     <span class="card-pricing-icon text-danger">
                                        <div>

                                            <img src="{{ $plan->logo}}" alt="img_plan" srcset="" style="width: 64px; height: 64px;">
                                        </div>
                                     </span>
                                     <h2 class="card-pricing-price">${{ $plan->precio }} <span>/ Mensual</span></h2>
                                     <ul class="card-pricing-features">
                                         <li>Almacenamiento: {{ $plan->almacenamiento }} GB</li>
                                         <li>Ancho de banda: {{ $plan->ancho_de_banda }} GB</li>
                                         <li>DOMINIO:{{ $plan->dominio ? 'Con Dominio' : 'Sin Dominio' }}</li>
                                         <li>{{ $plan->usuarios }} Usuarios</li>
                                         <li> Email:{{ $plan->soporte_por_correo ? 'Email Support' : 'No Support' }}</li>
                                         <li> Soporte: {{ $plan->soporte_24x7 ? '24x7 Support' : 'No Support' }}</li>
                                     </ul>
                                     <a href="/registro?id={{ $plan->id }}" class="btn btn-success waves-effect waves-light mt-4 mb-2 width-sm">Acceder</a>
                                 </div>
                             </div>
                         </div>
                         @endforeach
                     </div>
                     <!-- end row -->

                 </div> <!-- end col-->
             </div>
             <!-- end row -->

         </div> <!-- container -->

         <div id="login_modal" class="fixed-top inset-0 top-0 left-0 ">
             <div class="modal-dialog font-weight-bold">
                 <div class="modal-content " style="background-color:cadetblue; color: white;">
                     <div class="modal-header">
                         <a href="/">
                             <!-- NOMBRE EMPRESA -->
                             <span>CRM</span>
                         </a>
                         <h5 class="title">Iniciar Sesión</h5>

                         <button onclick="cerrarModal()" class="btn btn-danger "> X</button>
                     </div>
                     <div class="card-body p-4">

                         <form action="/login" method="POST">
                             @csrf
                             <div class="form-group mb-3">
                                 <label for="email">Correo Electrónico:</label>
                                 <input class="form-control" name="email" type="email" id="email" value="{{ old('email') }}" placeholder="Ingrese su correo electrónico" autofocus>
                                 @error('email')
                                 <span class="error text-danger">* {{ $message }}</span>
                                 @enderror
                             </div>

                             <div class="form-group mb-1">
                                 <label for="password">Contraseña:</label>
                                 <div class="input-group">
                                     <input class="form-control" name="password" type="text" id="password" placeholder="Ingrese su contraseña">
                                     <div class="input-group-append">
                                         <button type="button" id="showPassword" class="btn btn-secondary">Mostrar</button>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-12 text-right">
                                     <p> <a href="{{route('contrasena_ovidada')}}" class="text-muted ml-1">¿Olvidaste tu contraseña?</a></p>
                                 </div>
                             </div>

                             <div class="form-group mb-0 text-center">
                                 <button class="btn btn-dark btn-block" type="submit"> INGRESAR </button>
                             </div>

                         </form>


                     </div>
                 </div>
             </div>
         </div>

     </div> <!-- content -->


 </x-layouts.app>

 <script>
     function abrirModal() {
         document.getElementById('login_modal').style.display = 'block'

     }

     function cerrarModal() {
         document.getElementById('login_modal').style.display = 'none'

     }

     cerrarModal();
 </script>