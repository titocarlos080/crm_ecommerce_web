<div>
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
                  


                <div class="ml-auto">
                    <div class="d-flex">
                        <div class="float-md-right mb-0">
                            <sup id="cantidad_carrito" class="my_cart_quantity badge text-bg-primary" data-order-id="">0</sup>
                            <a href="#" class="nav-link" data-bs-original-title="" data-toggle="tooltip" data-placement="top" title="mi carrito" title="mi carrito">
                                <i class="fa fa-shopping-cart"></i>

                            </a>
                        </div>
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
        <div class="col mx-5 ">
          

        </div>
        <div class=" col">
            <div class="table-wrapper">
                <div class="btn-toolbar">
                    <div class="btn-group focus-btn-group">
                        <div class="table-responsive" data-pattern="priority-columns">



                            <h3><span>MI CARRITO</span></h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead class="bg-dark text-white text-nowrap">
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>IMAGEN</th>
                                            <th>DESCRIPCION</th>
                                            <th>PRECIO</th>
                                             <th>CANTIDAD</th>
                                            <th>SUB_TOTAL</th>
                                            <th>ACCION</th>

                                        </tr>

                                    </thead>
                                    <tbody id="tabla_carrito">

                                    </tbody>
                                </table>
                                <div>
                                    @if(session('pedido'))
                                    <div class="alert alert-success">
                                        {{ session('pedido') }}

                                        <a href="/reportes/pago/{{ session('pedido_id') }}">Descargar PDF</a>
                                        <script>
                                            localStorage.removeItem('carrito')
                                        </script>
                                    </div>
                                    @endif

                                    @if(session('nopedido'))
                                    <div class="alert alert-danger ">
                                        {{ session('nopedido') }}
                                    </div>
                                    @endif
                                </div>

                                <form action="/session" method="post">
                                    @csrf
                                    <textarea style="display: none;" name="carrito" id="carrito" cols="30" rows="10">
                                    </textarea>
                                    <button id="btnRealizarcompra" type="submit" class="btn btn-success"> Finalizar compra </button>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //----------------------------------------------------------------------------
       

        



        //----------------------------------------------------------------------------

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("carrito").value = productos();
         });

        function productos() {
            const carritoJSON = JSON.parse(localStorage.getItem('carrito'));
            return JSON.stringify(carritoJSON);
        };


        const tablaCarrito = document.getElementById('tabla_carrito')
        const carritoJSON = localStorage.getItem('carrito');
        const carrito = JSON.parse(carritoJSON);
        var i = 0,
            aux = 0;
        carrito.forEach((productoStrim) => {
            i++
            const producto = JSON.parse(productoStrim);
            
            aux = aux + producto.cantidad;
            const fila = document.createElement('tr');
            fila.innerHTML = `
                       <td>${i}</td>
                       <td>${producto.nombre}</td>
                       <td>
                       <img src="${producto.imagen}" alt="prod" round  height="64" width="64"  srcset="">
                        </td>
                       <td>${producto.descripcion}</td>
                       <td>${producto.precio} Bs</td>
                     
                       <td>${producto.cantidad}</td>
                       <td>${producto.cantidad*producto.precio} Bs</td>
                       <td> <a onclick="eliminar(${producto.id})"  >         <i class="btn btn-danger">X</i>
                        </a>
                        </td>  

                       `;
            tablaCarrito.appendChild(fila);
            console.log('hola mundo ');
        })
        document.getElementById('cantidad_carrito').innerHTML = aux

        if (aux == 0) {
            document.getElementById('btnRealizarcompra').style.display = 'none';
            document.getElementById('tabla_carrito').style.innerHTML = 'No hay pedidio';

        } else {
            document.getElementById('btnRealizarcompra').style.display = 'blok';
        }

        function eliminar(id) {
            localStorage.removeItem('carrito');
            let carrito_nuevo = JSON.parse(localStorage.getItem('carrito')) || []; // Obtener el carrito existente o crear uno nuevo si no existe
            let cant = 0;
            carrito.forEach((productoStrim) => {
                const producto = JSON.parse(productoStrim);
                if (producto.id != id) {
                    carrito_nuevo.push(JSON.stringify(producto))
                    cant = producto.cantidad + cant
                }
            })
            localStorage.setItem('carrito', JSON.stringify(carrito_nuevo));
            location.reload();
        }

        function cerrarModal() {
            const model = document.getElementById('modal');
            model.style.display = 'none'
        }

        function abrirModal(id) {

            const model = document.getElementById('modal');
            model.style.display = 'block'
        }
        cerrarModal();

    </script>
</div>