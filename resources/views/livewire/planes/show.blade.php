<div>




    <h3 class="title"> Mi planes</h3>
    <button wire:click="crear_nuevo() " class="btn btn-primary" > <i class="fa fa-plus"></i>Nuevo Plan</button>
    <div class="row">
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
                        <li>Almacenamiento: {{ $plan->almacenamiento }}</li>
                        <li>Ancho de banda: {{ $plan->ancho_de_banda }}</li>
                        <li>{{ $plan->dominio ? 'Con Dominio' : 'Sin Dominio' }}</li>
                        <li>{{ $plan->usuarios }} Usuarios</li>
                        <li>{{ $plan->soporte_por_correo ? 'Email Support' : 'No Support' }}</li>
                        <li>{{ $plan->soporte_24x7 ? '24x7 Support' : 'No Support' }}</li>
                    </ul>
                    <button wire:click="eliminar_plans({{$plan->id}})" class="btn btn-danger">Eliminar</a>
                    <button wire:click="editar_plans({{$plan->id}})" class="btn btn-primary">Editar</button>
                </div>
                 
            </div>
        </div>
        @endforeach
    </div>
    <!-- Plans -->
    @if($crear_plan)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog font-weight-bold">
            <div class="modal-content " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class=" ">CREAR NUEVO PLAN</h4>
                    <button wire:click="$set('crear_plan',false)" class="btn btn-danger"> Cancelar</button>
                </div>

                

                    <div class="row form-group  ">
                        <div class="col-md-12 ">
                            <div class="d-flex ">
                                <div class="ml-3">
                                    <label for="nombre">Nombre:</label>
                                    <input wire:model="nombre" name="ciudad" type="text">

                                </div>
                                <div class="ml-3 ">

                                    <label for="logo">logo:</label>
                                    <input wire:model='logo' name="foto" type="file" id="foto">


                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2">
                                <label for="precio">Precio</label>
                                <input  wire:model="precio" name="precio" type="number" min="0" required>
                            </div> 
                             <div class="form-group ml-3 ">
                                <label  for="ancho_banda">Ancho de banda</label>
                                <input wire:model="ancho_banda"  name="ancho_banda" type="number" min="0" required>
                            </div>
                            <div class="form-group d-flex ml-3">
                                <label for="almacenamiento">Almacenamiento</label>
                                <input wire:model="almacenamiento" id="rango_alma" name="almacenamiento" oninput="capturar()" type="range" step="10" min="0" max="100">
                                <P class=" font-weight-bold" for="almacenamiento" id="valor"> </P>GB
                            </div>

                            <div class=" ml-3 ">
                                <label for="email">Dominio:</label>
                                <input wire:model="dominio" class="checkbox-circle form-group" name="numero" type="checkbox">

                            </div>
                            <div class="ml-3">
                                <label for="soporte_email">Soporte email:</label>
                                <input wire:model="soporte_email" class="checkbox-circle form-group" name="soporte_email" type="checkbox">

                            </div>
                            <div class=" ml-3">
                                <label for="soporte">Atencion 24/7:</label>
                                <input wire:model="soporte" class="checkbox-circle form-group" name="soporte" type="checkbox">

                            </div>

                            <div class="ml-3">
                                <label for="numero_usuario">Numero de Usuarios:</label>
                                <input wire:model="numero_usuario" class=" form-group" name="numero_usuario" type="number">

                            </div>

                        </div>
                        <button wire:click="crear()" class="btn btn-success ml-3"> Crear Plan</button>

                    </div>
                 
                @if($mensaje_estado)
                <span class="message badge-danger">{{ $mensaje}}</span>
                @else
                <span class="message badge-success"> {{$mensaje}}</span>

                @endif
            </div>

        </div>
    </div>
</div>
@elseif($editar_plan)
<div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog font-weight-bold">
            <div class="modal-content " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class=" ">EDITAR PLAN</h4>
                    <button wire:click="$set('editar_plan',false)" class="btn btn-danger"> Cancelar</button>
                </div>
                    <div class="row form-group  ">
                        <div class="col-md-12 ">
                            <div class="d-flex ">
                                <div class="ml-3">
                                    <label for="nombre">Nombre:</label>
                                    <input wire:model="nombreSelect" name="ciudad" type="text">

                                </div>
                                <div class="ml-3 ">

                                    <label for="logo">logo:</label>
                                    <input wire:model='logoSelect' name="foto" type="file" id="foto">


                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2">
                                <label for="precio">Precio</label>
                                <input  wire:model="precioSelect" name="precio" type="number" min="0" required>
                            </div> 
                             <div class="form-group ml-3 ">
                                <label   for="ancho_banda">Ancho de banda</label>
                                <input wire:model="ancho_bandaSelect" name="ancho_banda" type="number" min="0" required>
                            </div>
                            <div class="form-group d-flex ml-3">
                                <label for="almacenamiento">Almacenamiento</label>
                                <input wire:model="almacenamientoSelect" id="rango_alma" name="almacenamiento" oninput="capturar()" type="range" step="10" min="0" max="100">
                                <P class=" font-weight-bold" for="almacenamiento" id="valor"> </P>GB
                            </div>

                            <div class=" ml-3 ">
                                <label for="email">Dominio:</label>
                                <input wire:model="dominioSelect" class="checkbox-circle form-group" name="numero" type="checkbox">

                            </div>
                            <div class="ml-3">
                                <label for="soporte_email">Soporte email:</label>
                                <input wire:model="soporte_emailSelect" class="checkbox-circle form-group" name="soporte_email" type="checkbox">

                            </div>
                            <div class=" ml-3">
                                <label for="soporte">Atencion 24/7:</label>
                                <input wire:model="soporteSelect" class="checkbox-circle form-group" name="soporte" type="checkbox">

                            </div>

                            <div class="ml-3">
                                <label for="numero_usuario">Numero de Usuarios:</label>
                                <input wire:model="numero_usuarioSelect" class=" form-group" name="numero_usuario" type="number">

                            </div>

                        </div>
                        <button wire:click="actualizar()" class="btn btn-success ml-3"> Actualizar Plan</button>

                    </div>
                 
                @if($mensaje_estado)
                <span class="message badge-danger">{{ $mensaje}}</span>
                @else
                <span class="message badge-success"> {{$mensaje}}</span>

                @endif
            </div>

        </div>
    </div>
@endif
</div>

<script>
    function capturar() {
        const rango_alma = document.getElementById('rango_alma');
        const valor_alma = document.getElementById('valor');
        valor_alma.textContent = rango_alma.value;
    }
</script>