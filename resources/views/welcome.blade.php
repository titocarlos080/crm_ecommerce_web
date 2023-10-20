 <x-layouts.app>


     <div class="content">
         <!-- Start Content-->
         <div class="container-fluid">
             <!-- start page title -->
             <div class="row">
                 <div class="col-12">
                     <div class="page-title-box">
                         <div class="page-title-right">
                             <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                                 <li class="breadcrumb-item active">Planes</li>
                             </ol>
                             <a href="{{route('login')}}" class="btn btn-primary"><i class="fe-log-in">Login</i></a>

                         </div>
                         <h4 class="page-title text-bold">BIENVENIDOS A CRM </h4>
                         <span>software de gestion empresarial </span>
                     </div>
                 </div>
             </div>
             <!-- end page title -->

             <div class="row justify-content-center">
                 <div class="col-xl-10">

                     <!-- Pricing Title-->
                     <div class="text-center mb-4">
                         <h3 class="mb-2">Nuestros <b>Planes</b></h3>
                         <p class="text-muted w-50 m-auto">
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
                                         <i class="fe-users"></i>
                                     </span>
                                     <h2 class="card-pricing-price">${{ $plan->precio }} <span>/ Mensual</span></h2>
                                     <ul class="card-pricing-features">
                                         <li>{{ $plan->almacenamiento }}</li>
                                         <li>{{ $plan->ancho_de_banda }}</li>
                                         <li>{{ $plan->dominio ? 'Con Dominio' : 'Sin Dominio' }}</li>
                                         <li>{{ $plan->usuarios }} Usuarios</li>
                                         <li>{{ $plan->soporte_por_correo ? 'Email Support' : 'No Support' }}</li>
                                         <li>{{ $plan->soporte_24x7 ? '24x7 Support' : 'No Support' }}</li>
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

     </div> <!-- content -->


     @include('partials.footer')
 </x-layouts.app>