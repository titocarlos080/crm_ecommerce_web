<div>
    <div class="row ">
        <div class="col-sm-4 col-lg-12">
            <h3 class="font-weight-bold "><i class="fas fa-store"></i> MIS SUCURSALES</h3>
            @if ($sucursales)
            <button wire:click="crear_vista" class="btn btn-success"> crear nuevo </button>
            <table class="table table-bordered bg-dots-darker">
                <thead>
                    <tr class="justify-center">
                        <th> ID </th>
                        <th> NOMBRE </th>
                        <th><i class="fas fa-ellipsis-v"> Opciones </i></th>

                    </tr>
                </thead>

                @foreach($sucursales as $count => $sucursal)
                <tr>
                    <td>
                        {{$count+1}}
                    </td>
                    <td>
                        {{$sucursal->nombre}}
                    </td>
                    <td>
                        <button wire:click="editar_sucursal({{$sucursal->id}})" class="btn btn-primary">Editar</button>
                        <button wire:click="eliminar_sucursal({{$sucursal->id}})" class="btn btn-danger">Eliminar</button>
                    </td>

                </tr>


                @endforeach

            </table>
            @else
            <p> no hay sucursales</p>
            <button wire:click="crear_vista" class="btn btn-success"> crear nuevo </button>
            @endif


        </div>

    </div>







    @if($crear_sucursal)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog font-weight-bold">
            <div class="modal-content " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class=" ">CREAR NUEVO SUCURSAL</h4>
                    <button wire:click="$set('crear_sucursal',false)" class="btn btn-danger"> Cancelar</button>
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
                    <button wire:click="crear_nuevo_sucursal()" class="btn btn-success ml-3"> Crear Sucursal</button>



                </div>

            </div>

        </div>
    </div>

    @endif @if($editar_sucursales)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog font-weight-bold">
            <div class="modal-content " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class=" ">EDITAR SUCURSAL</h4>
                    <button wire:click="$set('editar_sucursales',false)" class="btn btn-danger"> Cancelar</button>
                </div>



                <div class="row form-group  ">
                    <div class="col-md-12 ">
                        <div class="d-flex ">
                            <div class="ml-3">
                                <label for="nombre_seleccinado">Nombre:</label>
                                <input wire:model="nombre_seleccinado" name="nombre_seleccinado" type="text">

                            </div>

                        </div>

                    </div>
                    <button wire:click="actualizar_sucursal()" class="btn btn-success ml-3"> Guardar</button>



                </div>

            </div>

        </div>
    </div>

    @endif

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('sucursal-creada', (comments) => {
                alert(comments)
            });
            Livewire.on('crear-error', (comments) => {
                alert(comments)
            });


        })
    </script>
</div>