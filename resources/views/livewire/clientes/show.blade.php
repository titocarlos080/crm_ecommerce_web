<div>
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
                                            {{$cliente->email}}

                                        </td>
                                        <td>
                                            <h3> {{$cliente->telefono}}</h3>

                                        </td>

                                        <td>

                                            <button wire:click='editarCliente({{$cliente->id}})' class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i>Editar </button>
                                            <button wire:clik='eliminarCliente({{$cliente->id}})' class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i>Eliminar</button>

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
</div>
 