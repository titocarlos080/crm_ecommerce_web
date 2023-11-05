<div>

    <div>
        <h3 class="title"> Categorias</h3>
    </div>

    <div class="row bg bg-soft-success">
        @foreach($sucursales as $sucursal)
        <div class="col-md-4 p-2 ">
            <div class="card">
                <button wire:click="vista_crear({{$sucursal->id}})" class="btn btn-primary"> <i class="fa fa-plus"></i>Nueva Categoria</button>
                <div class="card-body">
                    <h4 class="title font-weight-bold"> {{$sucursal->nombre}}</h4>
                    @foreach($categorias as $categoria)
                    @if($sucursal->id == $categoria->id_sucursal)
                     
                        <div class="card-box bg-soft-purple">
                            <h5>CATEGORIA: {{$categoria->nombre}}</h5>
                            <button wire:click="vista_editar({{$categoria->id}})" class="btn btn-primary">Editar</button>
                            <button wire:click="eliminar_categoria({{$categoria->id}})" class="btn btn-danger">Eliminar</button>
                        </div>

                    
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($show_vista)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog font-weight-bold">
            <div class="modal-content " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class=" ">CREAR NUEVA CATEGORIA</h4>
                    <button wire:click="$set('show_vista',false)" class="btn btn-danger"> Cancelar</button>
                </div>
                <div class="row form-group  ">
                    <div class="col-md-12 ">
                        <div class="d-flex ">
                            <div class="ml-3">
                                <label for="nombre">Nombre:</label>
                                <input wire:model="nombre" name="nombre" type="text">

                            </div>

                        </div>

                    </div>
                    <button wire:click="crear_categoria()" class="btn btn-success ml-3"> Crear Categoria</button>



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
                    <h4 class=" ">Editar Categoria</h4>
                    <button wire:click="$set('show_editar',false)" class="btn btn-danger"> Cancelar</button>
                </div>



                <div class="row form-group  ">
                    <div class="col-md-12 ">
                        <div class="d-flex ">
                            <div class="ml-3">
                                <label for="nombre_seleccionda">Nombre:</label>
                                <input wire:model="nombre_seleccionda" name="nombre_seleccionda" type="text">

                            </div>

                        </div>

                    </div>
                    <button wire:click="editar_categoria" class="btn btn-success ml-3">Guardar</button>



                </div>

            </div>

        </div>
    </div>
    @endif

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('categoria-creada', (comments) => {
                alert(comments)
            });
            Livewire.on('categoria-error', (comments) => {
                alert(comments)
            });
            Livewire.on('categoria-actualizado', (comments) => {
                alert(comments)
            });
            Livewire.on('categoria-eliminada', (comments) => {
                alert(comments)
            });


        })
    </script>
</div>