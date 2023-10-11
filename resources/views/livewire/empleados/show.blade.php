<div>
    @if($crearEmpleado)
    <livewire:empleados.create>
        @elseif($editarEmpleado)
        <livewire:empleados.edit>
            @else
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Mis Empleados</h4>
                        <div class="table-responsive">
                            <a wire:click='nuevoEmpleado' class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i>Agreagar Nuevo </a>

                            <table class="table table-borderless table-hover table-centered m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Perfil</th>
                                        <th>Nombre</th>
                                        <th>email</th>
                                        <th>telefono</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($empleados)
                                    @foreach($empleados as $empleado )
                                
                                    <tr>
                                        <td style="width: 36px;">
                                            <img src="{{$empleado->foto}}" alt="emp-img" class="rounded-circle avatar-sm">
                                        </td>

                                        <td>
                                            <h5 class="m-0 font-weight-normal">{{$empleado->nombre}}</h5>
                                        </td>

                                        <td>
                                            {{$empleado->email}}

                                        </td>
                                        <td>
                                            <h3> {{$empleado->telefono}}</h3>

                                        </td>
                                        <td>
                                            <h3> {{$empleado->rol->nombre}}</h3>

                                        </td>
                                        <td>
                                            @if($empleado->rol->nombre === 'Empresa')
                                            <a hidden wire:click='editarEmpleado({{$empleado->id}})' class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i>Editar </a>
                                            <a hidden wire:clik='eliminarEmpleado({{$empleado->id}})' class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i>Eliminar</a>
                                            No Accion
                                            @else
                                            <a wire:click='editarEmpleado({{$empleado->id}})' class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i>Editar </a>
                                            <a wire:clik='eliminarEmpleado({{$empleado->id}})' class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i>Eliminar</a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach

                                    @else
                                    <span> No hay empleado</span>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>

            @endif
</div>