<div class="bg-gray-500">
    @if($crearCliente)
    <livewire:clientes.create>
        @elseif($editarCliente)
        <livewire:clientes.edit>
            @else
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Mis Clientes</h4>
                        <div class="table-responsive">
                            <a wire:click='nuevoEmpleado' class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i>Agreagar Nuevo </a>

                            <table class="table table-borderless table-hover table-centered m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Perfil</th>
                                        <th>Nombre</th>
                                        <th>email</th>
                                        <th>telefono</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($clientes)
                                    @foreach($clientes as $cliente )

                                    <tr>
                                        <td style="width: 36px;">
                                            <img src="{{$cliente->foto}}" alt="emp-img" class="rounded-circle avatar-sm">
                                        </td>

                                        <td>
                                            <h5 class="m-0 font-weight-normal">{{$cliente->nombre}}</h5>
                                        </td>

                                        <td>
                                            <h5>
                                                {{$cliente->email}}
                                            </h5>

                                        </td>
                                        <td>
                                            <h3> {{$cliente->telefono}}</h3>

                                        </td>

                                        <td>

                                            <div>
                                                <button wire:click="editar_cliente({{$cliente->id}})" class="btn btn-light"><i class="fa fa-edit"></i>Editar </button>

                                            </div>
                                            <div>
                                                <button wire:click="eliminar_cliente({{$cliente->id}})" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i>Eliminar</button>

                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach

                                    @else
                                    <span> No hay Clientes</span>
                                    @endif
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div> <!-- end col -->

            </div>

            @endif
            @if($open)
            <div class="fixed-top inset-0 top-0 left-0 ">
                <div class="modal-dialog ">
                    <div class="modal-content bg-gray-500">
                        <div class="modal-header">
                            <h4 class="modal-title">EDITAR CLIENTE</h4>
                            <button wire:click="cerrar_editar()" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                        </div>
                        <div class="modal-body bg-emerald-500">

                            <div class="row">
                                <div class="col-md-12">
          

                                        <div class="form-group mb-3">
                                            <label for="nombre">Nombre:</label>
                                            <input wire:model="userEdit.nombre" class="form-control" name="ciudad" type="text">


                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">Correo:</label>
                                            <input wire:model="userEdit.email" class="form-control" name="calle" type="email">

                                            <label for="email">Numero:</label>
                                            <input wire:model="userEdit.telefono" class="form-control" name="numero" type="number" id="tel">

                                            <div class="form-group mb-1">
                                                <label for="foto">Foto:</label>
                                                <input class="form-control" wire:model='userEdit.foto' name="foto" type="file" id="foto">

                                            </div>

                                        </div>
                                        <button wire:click="actualizar_cliente()" class="btn btn-success"> Actualizar Cliente</button>
                                    


                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            @endif

</div>