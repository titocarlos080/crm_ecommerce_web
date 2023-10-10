 <x-layouts.app>

     <div class="content-page">
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
                             </div>
                             <h4 class="page-title">Acceder</h4>
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
                             <div class="col-md-4">
                                 <div class="card card-pricing  ">
                                     <div class="card-body text-center">
                                         <p class="card-pricing-plan-name font-weight-bold text-uppercase">Basico</p>
                                         <span class="card-pricing-icon text-danger">
                                             <i class="fe-users"></i>
                                         </span>
                                         <h2 class="card-pricing-price">Grutuito <span>/ </span></h2>
                                         <ul class="card-pricing-features">
                                             <li>1 GB Storage</li>
                                             <li>50 GB Bandwidth</li>
                                             <li>No Domain</li>
                                             <li>1 User</li>
                                             <li>Email Support</li>
                                             <li>no Support</li>
                                         </ul>
                                         <button class="btn btn-danger waves-effect waves-light mt-4 mb-2 width-sm"><a href="/login">Sign Up</a></button>
                                     </div>
                                 </div> <!-- end Pricing_card -->
                             </div> <!-- end col -->
                             <div class="col-md-4">
                                 <div class="card card-pricing">
                                     <div class="card-body text-center">
                                         <p class="card-pricing-plan-name font-weight-bold text-uppercase">Paquete Profesional</p>
                                         <span class="card-pricing-icon text-danger">
                                             <i class="fe-users"></i>
                                         </span>
                                         <h2 class="card-pricing-price">$19 <span>/ Month</span></h2>
                                         <ul class="card-pricing-features">
                                             <li>10 GB Storage</li>
                                             <li>50 GB Bandwidth</li>
                                             <li>No Domain</li>
                                             <li>1 User</li>
                                             <li>Email Support</li>
                                             <li>24x7 Support</li>
                                         </ul>
                                         <a href="/login" class="btn btn-danger waves-effect waves-light mt-4 mb-2 width-sm">Sign Up</a>
                                     </div>
                                 </div> <!-- end Pricing_card -->
                             </div> <!-- end col -->

                             <div class="col-md-4">
                                 <div class="card card-pricing card-pricing-recommended">
                                     <div class="card-body text-center">
                                         <p class="card-pricing-plan-name font-weight-bold text-uppercase">Paquete empresarial</p>
                                         <span class="card-pricing-icon text-info">
                                             <i class="fe-award"></i>
                                         </span>
                                         <h2 class="card-pricing-price text-info">$29 <span>/ Month</span></h2>
                                         <ul class="card-pricing-features">
                                             <li>50 GB Storage</li>
                                             <li>900 GB Bandwidth</li>
                                             <li>2 Domain</li>
                                             <li>10 User</li>
                                             <li>Email Support</li>
                                             <li>24x7 Support</li>
                                         </ul>
                                         <button class="btn btn-info waves-effect waves-light mt-4 mb-2 width-sm"><a href="/login">Sign Up</a></button>

                                     </div>
                                 </div> <!-- end Pricing_card -->
                             </div> <!-- end col -->


                         </div>
                         <!-- end row -->

                     </div> <!-- end col-->
                 </div>
                 <!-- end row -->

             </div> <!-- container -->

         </div> <!-- content -->


     </div>
     @include('partials.footer')
 </x-layouts.app>
 