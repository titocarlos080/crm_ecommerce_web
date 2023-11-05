<div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">Gestionar Producto</h4>
                <button wire:click='vista_crear' class="btn btn-success"><i class="fa fa-plus">Nuevo Producto</i></button>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>IMAGEN</th>
                                <th>DESCRIPCION</th>
                                <th>STOCK</th>
                                <th>PRECIO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td> {{$producto->id}}</td>
                                <td> {{$producto->nombre}}</td>

                                <td>
                                    @if ($producto->imagen)
                                    <img src="{{ $producto->imagen }}" height="64" width="64" alt="Imagen del producto">
                                    @else
                                    <img src="{{ asset('storage/imagenes/default.jpg') }}" alt="Imagen predeterminada">
                                    @endif
                                </td>
                                <td> {{$producto->descripcion}}</td>
                                @if ($producto->stock == 0)
                                <td class="bg-danger text-white">{{ $producto->stock }} AGOTADO</td>
                                @elseif ($producto->stock <= 5) <td class="bg-warning text-white">{{ $producto->stock }} SUMINISTAR</td>
                                    @else
                                    <td class="bg-success text-white">{{ $producto->stock }} DISPONIBLE</td>
                                    @endif
                                    <td> {{$producto->precio}}</td>
                                    <td>
                                        <button wire:click="opcion_show({{$producto->id}})" class="btn btn-primary"> <i class="fas fa-stack-exchange "></i>Ver</button>
                                        <button wire:click="vista_editar({{$producto->id}})" class="btn btn-primary"> <i class="fas fa-edit"></i>Editar</button>
                                        <button wire:click="eliminar_producto({{$producto->id}})" class="btn btn-danger"> <i class="fas fa-trash-alt"></i>Eliminar</button>
                                    </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

            </div> <!-- end card-box -->
        </div> <!-- end col -->


    </div>

    @if($show)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog font-weight-bold">
            <div class="modal-content " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h3> PRODCUCTO </h3>
                    <button wire:click="$set('show',false)" class="btn btn-danger"> Cancelar</button>
                </div>

                <div class="row form-group  ">
                    <div class="col-md-12 ">
                        <div class="d-flex ">
                            <div class="col-12 ">
                                 
                                    <span>Nombre</span>
                                    {{$nombre}}

                                    <div class="d-flex align-content-center">
                                        <img src="{{$imagen}}" alt="img">

                                    </div>
                                    <span>Descripcion</span>
                                    <h4> {{$descripcion}}</h4>
                                    <P> En Stock:{{$stock}}</P>
                                    <P> Costo: {{$costo}}</P>
                                    <P> Precio:{{$precio}}</P>
 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($show_crear)
    <div class="fixed-top inset-0 top-0 left-0">
        <div class="modal-dialog font-weight-bold   ">
            <div class="modal-content width-lg " style="background-color:cadetblue; color: white; ">
                <div class="modal-header ">

                    <h4 class="">CREAR PRODUCTO</h4>
                    <button wire:click="$set('show_crear',false)" class="btn btn-danger"> Cancelar</button>

                </div>
                <div class="row form-group  ">
                    <div class="col-lg-12 ">
                        <div class="d-flex ">

                            <div class="col-log-12 p-2  ">
                                <select class="form-control" name="sucursales" wire:change="cambiar_sucursal($event.target.value)">
                                    <option value="">---------Seleccionar una sucursal----------</option>
                                    @foreach($sucursales as $sucursal)
                                    <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                    @endforeach
                                </select>


                                <label class="mt-2">
                                    <span>Nombre</span>
                                    <input type="text" wire:model="nombre">
                                </label> <label>
                                    <span>Imagen</span>
                                    <input type="file" wire:model="imagen"></input>
                                    @if($imagen)
                                    <img src="{{ $imagen->temporaryUrl() }}" width="64" height="64" alt="" srcset="">
                                    @endif
                                </label>
                                <label>
                                    <span>Descripcion</span>
                                    <textarea wire:model="descripcion"></textarea>
                                </label>
                                <br>
                                <label>
                                    <span>Stock</span>
                                    <input type="number" min="0" wire:model="stock"></input>
                                </label><br>
                                <label>
                                    <span>Precio</span>
                                    <input type="number" min="0" wire:model="precio"></input>
                                </label><br><label>
                                    <span>Costo</span>
                                    <input type="number" min="0" wire:model="costo"></input>
                                </label><br>
                                <Label for="categoria">
                                    Categoria:
                                </Label>
                                <select name="categoria" wire:change="cambiar_categoria($event.target.value)">
                                    <option value="">---------seleccionar---------</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                    <button wire:click="crear_producto()" wire:target="imagen" wire:loading.attr="disabled" class="btn btn-success ml-3"> Guardar Producto</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($show_editar)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog font-weight-bold">
            <div class="modal-content " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class=" ">EDITAR PRODUCTO</h4>
                    <button wire:click="$set('show_editar',false)" class="btn btn-danger"> Cancelar</button>
                </div>
                <div class="row form-group  ">
                    <div class="col-lg-12 ">
                        <div class="d-flex ">

                            <div class="col-log-12 p-2  ">
                                 


                                <label class="mt-2">
                                    <span>Nombre</span>
                                    <input type="text" wire:model="nombre_edit">
                                </label> <label>
                                    <span>Imagen</span>
                                    <input type="file" wire:model="imagen_edit"></input>
                                    @if($imagen_edit)
                                    <img src="{{ $imagen_edit->temporaryUrl() }}" width="64" height="64" alt="" srcset="">
                                    @else
                                    <img src="{{ $imagen}}" width="64" height="64" alt="" srcset="">
                                    
                                     

                                    @endif
                                </label>
                                <label>
                                    <span>Descripcion</span>
                                    <textarea wire:model="descripcion_edit"></textarea>
                                </label>
                                <br>
                                <label>
                                    <span>Stock</span>
                                    <input type="number" min="0" wire:model="stock_edit"></input>
                                </label><br>
                                <label>
                                    <span>Precio</span>
                                    <input type="number" min="0" wire:model="precio_edit"></input>
                                </label><br><label>
                                    <span>Costo</span>
                                    <input type="number" min="0" wire:model="costo_edit"></input>
                                </label><br>
                                <Label for="categoria">
                                    Categoria:
                                </Label>
                               

                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                    <button wire:click="editar_producto()" wire:target="imagen_edit" wire:loading.attr="disabled" class="btn btn-success ml-3"> Guardar</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('producto-creado', (comments) => {
                alert(comments)
            });
            Livewire.on('producto-error', (comments) => {
                alert(comments)
            });
            Livewire.on('producto-editado', (comments) => {
                alert(comments)
            });
            Livewire.on('producto-error-editado', (comments) => {
                alert(comments)
            });
            Livewire.on('producto-eliminado', (comments) => {
                alert(comments)
            });


        })
    </script>
</div>