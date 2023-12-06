 <x-layouts.app title="{{$empresa->nombre}} ">
     <script src="https://js.stripe.com/v3/"></script>

     <style>
         .my_cart_quantity {

             /* Ajusta la posición vertical según tu diseño */
             right: -30px;
             /* Ajusta la posición horizontal según tu diseño */
             background-color: red;
             /* Color de fondo del contador */
             color: white;
             /* Color del texto del contador */
             border-radius: 50%;
             /* Hace que el contador tenga forma circular */
             padding: 4px 8px;
             /* Espaciado interno del contador */
             margin-top: 10px;
         }
     </style>
     <div class="navbar-custom">
         <div class="">
             <div class="d-flex justify-content-between">
                 <div>
                     <a href="{{ route('catalogo', $empresa->nombre) }}" class="nav-link" data-bs-original-title="" data-toggle="tooltip" data-placement="top" title="ir a catalogo">
                         <i class="fa fa-shopping-bag"></i>
                         catalogo
                     </a>
                 </div>


                 <div class="ml-auto">
                     <div class="d-flex">

                         <ul class="list-unstyled topnav-menu   mb-0">
                             <li class="dropdown notification-list">
                                 <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                     <img src="/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                                     <span class="pro-user-name ml-1"> <i class="la la-angle-down"></i>
                                     </span>

                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                     <!-- item-->
                                     <div class="dropdown-item noti-title">
                                         <h5 class="m-0 text-white">
                                             Bienvenido !
                                         </h5>
                                     </div>

                                     <!-- item-->
                                     @php
                                     $user= Auth::user();

                                     @endphp
                                     <a href="#" class="dropdown-item notify-item">
                                         <i class="fe-user"></i>
                                         @auth <span> {{$user->nombre}}</span>
                                         @endauth
                                         @guest
                                         <span> Mi Perfil</span>
                                         @endguest
                                     </a>

                                     @auth
                                     <a href="/mis_pedidos/{{$user->id}}" class="cursor-pointer dropdown-item">
                                         <i class="fa fa-history"></i>
                                         <span> Mis Pedidos</span>
                                     </a>
                                     @endauth


                                     <!-- item-->

                                     @guest
                                     <a href="/login" class="dropdown-item notify-item">
                                         <i class="fa fa-acount"></i>
                                         <span>Login</span>
                                     </a>
                                     @endguest
                                     <div class="dropdown-divider"></div>

                                     <!-- item-->
                                     @auth
                                     <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                         <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="this.closest('form').submit()">
                                             <i class="fe-log-out"></i>
                                             <span>Cerrar Sesión</span>
                                         </a>
                                     </form>
                                     @endauth
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div>

     </div>
     <div class="row pt-5">

         <div class=" col ml-2 ms-0">
             <div class="table-wrapper">
                 <div class="btn-toolbar">
                     <div class="btn-group focus-btn-group">
                         <div>
                             <h3><span>FACTURA</span></h3>
                             <div class="table-responsive">
                             <a class="btn btn-danger" href="{{ route('boleta', ['boleta' => $id_pedido]) }}" target="_blank"><i class="fa fa-file-pdf"></i></a>
                                 <table class="table table-bordered table-hover mb-0">
                                     <thead class="bg-dark text-white text-nowrap">
                                         <tr>
                                             <th>ID</th>
                                             <th>Nombre</th>
                                             <th>Imagen</th>
                                             <th>Descripción</th>
                                             <th>Precio</th>
                                             <th>Cantidad</th>
                                             <th>Subtotal</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                     

                                         @foreach($pedido as $p)
                                         @php
                                         $producto = json_decode($p, true);
                                         @endphp
                                         <tr>
                                             <td>{{ $producto['id'] }}</td>
                                             <td>{{ $producto['nombre'] }}</td>
                                             <td><img src="{{ $producto['imagen'] }}" alt="Producto" height="50" width="50"></td>
                                             <td>{{ $producto['descripcion'] }}</td>
                                             <td>${{ $producto['precio'] }}</td>
                                             <td>{{ $producto['cantidad'] }}</td>
                                             <td>${{ $producto['subtotal'] }}</td>
                                         </tr>
                                         @endforeach

                                     </tbody>
                                     <tfoot>
                                         <tr class="d-flex justify-content-end">
                                             <td colspan="6" class="text-end">Total:</td>
                                             <td>${{ $total }}</td>
                                         </tr>
                                     </tfoot>
                                 </table>
                             </div>
                         </div>


                     </div>
                 </div>
             </div>
         </div>
     </div>
 <script>

    localStorage.removeItem('carrito');
</script>
 </x-layouts.app>