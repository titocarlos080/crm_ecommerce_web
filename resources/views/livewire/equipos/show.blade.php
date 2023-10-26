<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Mis equipos</h4>
            <div class="table-responsive">
                <a wire:click="$set('vistacrear',true)" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i>Crear Equipos </a>

                <table class="table table-borderless table-hover table-centered m-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $equipos)
                        @foreach($equipos as $indice =>$equipo )
                        <tr>
                            <td>
                                <h5 class="m-0 font-weight-normal">{{$indice}}</h5>
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-normal">{{$equipo->nombre}}</h5>
                            </td>
                            <td>
                                <a wire:click='ver_equipo({{$equipo->id}})' class="btn btn-xs btn-light"><i class="fa fa-edit"></i>Ver </a>
                                <a wire:click='eliminar_equipo({{$equipo->id}})' class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i>Eliminar</a>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <span> No hay Equipos</span>
                        @endif
                    </tbody>

                </table>

            </div>
        </div>
    </div> <!-- end col -->
    @if($vistacrear)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog ">
            <div class="modal-content   " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class="modal-title">NUEVO EQUIPO</h4>
                    <button wire:click="$set('vistacrear',false)" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body bg-emerald-500">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group mb-3 ">
                                <label for="nombre">Nombre Equipo:</label>
                                <input wire:model="nombre" type="text">
                            </div>
                            <div class="form-group mb-3 justify-between">
                                <button wire:click="crear_equipo()" class="btn btn-success "> Crear Equipo</button>
                            </div>
                            @if($estado_mensaje)
                            <p class="bg-danger tim"> {{$mensaje}}</p>
                            @else
                            <p class="bg-success"> {{$mensaje}}</p>

                            @endif

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    @elseif($agregar_miembros)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog ">
            <div class="modal-content   " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class="modal-title">MIEMBROS DE EQUIPO</h4>
                    <button wire:click="$set('agregar_miembros',false)" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body bg-emerald-500">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 justify-between">
                                <h4>agregar personas al equipo</h4>

                                <label for="email">Seleccionar usuario:</label>
                                <select wire:model="usuario_para_grupo">
                                    <option value="">----------seleccionar----------</option>
                                    @foreach($usuarios_no_miembros as $usuarios_miembro)
                                    <option class="form-control" value="{{$usuarios_miembro->id}}"> {{$usuarios_miembro->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button wire:click="agregar_miembro()" class="btn btn-success  "><i class="fa fa-plus">Agregar </i></button>
                            
                            <ul class="mt-1"> Miembros
                                @foreach($usuarios_miembros as $usuarios_miembro)
                                <option class="form-control" value="{{$usuarios_miembro->id}}"> {{$usuarios_miembro->nombre}}</option>
                                @endforeach
                            </ul>


                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    @endif

</div>