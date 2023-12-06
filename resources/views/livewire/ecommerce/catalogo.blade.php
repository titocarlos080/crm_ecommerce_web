<div>
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
                <div class="d-flex ml-2 mt-2 justify-content-between ">
                    <div>
                        <select class="" name="sucursales" wire:change="cambiarcategoria($event.target.value)">
                            <option value="0">todas las categorias</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="bs-searchbox">

                        <input class="search-for-help" placeholder="buscar producto" type="text" wire:model.live='buscar'> <i class="fa fa-search"></i>

                    </div>
                </div>


                <div class="ml-auto">
                    <div class="d-flex">
                        <div class="float-md-right mb-0">
                            <sup id="cantidad_carrito" class="my_cart_quantity badge text-bg-primary" data-order-id="">0</sup>
                            <a href="{{ route('pedido', $empresa->nombre) }}" class="nav-link" data-bs-original-title="" data-toggle="tooltip" data-placement="top" title="mi carrito" title="mi carrito">
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
    <div class="p-5">
        @foreach ($categorias as $categoria)
        <h3 class="card-title text-center text-bold py-1">{{$categoria->nombre}}</h3>
        <div class="row">
            @foreach ($productos as $producto)
            @if($producto->id_categoria ==$categoria->id )
            <div class="col-lg-4  mt-2 ">
                <div class="card ">
                    <h3 class="card-title text-center text-bold py-1">{{$producto->nombre}}</h3>
                    <div class="card-body">
                        <img class="img-fluid" src="{{$producto->imagen}}" alt="Card image cap">
                        <h3 class="text-center">Nombre: <span>{{$producto->nombre}}</h3>

                        <h4 class="text-center">Precio:{{$producto->precio}}Bs</h4>
                        <p class="text-center">{{$producto->descripcion}}, Stock:{{$producto->stock}} </p>
                    </div>
                    <div class="card-footer center text-center">

                        <button {{$producto->stock == 0 ? 'disabled':''}} onclick="agregarAlCarrito('{{ json_encode($producto) }}')" class="card-link btn btn-success" data-toggle="tooltip" data-placement="top" title="agregar a carrito"><i class=" fa fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        @endforeach
    </div>

</div>

@push('js')

<script src="htt ps://unpkg.com/three@0.126.0/build/three.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

                const cantidad = () => {
                    let carritos = JSON.parse(localStorage.getItem('carrito')) || [];
                    let cant_products = 0
                    carritos.forEach((fila) => {
                        const pdto = JSON.parse(fila);
                        cant_products = cant_products + pdto.cantidad
                    })
                    return cant_products
                }

                document.getElementById('cantidad_carrito').innerHTML = cantidad()

                function agregarAlCarrito(productox) {
                    const producto = JSON.parse(productox);
                    const prod = {
                        id: producto.id,
                        nombre: producto.nombre,
                        imagen: producto.imagen,
                        descripcion: producto.descripcion,
                        precio: producto.precio,
                        categoria: producto.categoria,
                        cantidad: 1,
                        subtotal: 1 * producto.precio
                    }
                    let carrito = JSON.parse(localStorage.getItem('carrito')) || []; // Obtener el carrito existente o crear uno nuevo si no existe          
                    let nuevo_carrito = []
                    carrito.forEach((fila) => {
                        const pdto = JSON.parse(fila);
                        if (pdto.id === prod.id) {
                            prod.cantidad = pdto.cantidad + 1
                            prod.subtotal = prod.cantidad * prod.precio
                        } else {
                            nuevo_carrito.push(JSON.stringify(pdto))
                        }
                    })
                    nuevo_carrito.push(JSON.stringify(prod))
                    localStorage.setItem('carrito', JSON.stringify(nuevo_carrito));
                    document.getElementById('cantidad_carrito').innerHTML = cantidad();
                }
            
</script>
@endpush