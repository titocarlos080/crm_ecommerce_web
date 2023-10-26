<div class="row">
    <div class="col-xl-12">
        <div class="card-box ">
            <h4 class="header-title mb-3">Mis Actividades</h4>
               <button wire:click="$set('crear_estado',true)" class="btn btn-success"><i class="fa fa-star"></i>Estados</button>
            <div class="table-responsive">
                @if( $actividades)
                <table class="table table-borderless table-hover table-centered m-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nro</th>
                            <th>Titulo</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de finalizacion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($actividades as $indice => $actividad )
                        <tr  >
                            <td>
                                <h5 class="m-0 font-weight-normal">{{$indice +1}}</h5>
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-normal">{{$actividad->titulo}}</h5>
                            </td>

                            <td>
                                <h5>  {{date('d-m-y',strtotime($actividad->fecha_inicio))}}</h5>

                            </td>
                            <td>
                                
                                <h5>  {{date('d-m-y',strtotime($actividad->fecha_fin))}}</h5>

                            </td>
                            <td>
                                <h5 > {{$actividad->estado}}</h5>

                            </td>

                            <td>
                                <a wire:click='eliminar_actividad({{$actividad->id}})' class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i>Eliminar</a>
                                <a wire:click='editar_actividad({{$actividad->id}})' class="btn btn-xs btn-light"><i class="fa fa-edit"></i>Editar </a>
                                <button wire:click="crear_tareas({{$actividad->id}})" class="btn btn-success ml-5"><i class="fa fa-plus">Crear Tarea</i></button>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>

                </table>
                @else
                <span> No hay actividades</span>
                @endif
            </div>
        </div>
    </div> <!-- end col -->

    @if($crear_tarea)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog ">
            <div class="modal-content   " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class="modal-title">NUEVA TAREA</h4>
                    <button wire:click="$set('crear_tarea',false)" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <!-- id | contenido | finalizado | id_grupo_usuario | id_actividad -->
                <div class="modal-body bg-emerald-500">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 justify-between">
                                <label for="contenido">Contenido:</label>
                                <input wire:model="contenido" class="form-control" name="titulo" type="text">
                                <label>Finalizado:</label>
                                <input wire:model="finalizado" type="checkbox"><br>
                                <label>Asignar a:</label>
                                <select wire:model="encargado_tarea">
                                    <option value="">------seleccionar---------</option>
                                    @foreach($encargados as $encargado)
                                    <option class="form-control" value="{{$encargado->id}}"> {{$encargado->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button wire:click="crear_nueva_tarea()" class="btn btn-success"><i class="fa fa-plus">Crear </i></button>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    @endif
    @if($crear_estado)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog ">
            <div class="modal-content   " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class="modal-title">NUEVO ESTADO</h4>
                    <button wire:click="$set('crear_estado',false)" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body bg-emerald-500">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 justify-between">

                                <label for="titulo">Nombre:</label>
                                <input wire:model="estado_nombre" class="form-control" name="titulo" type="text">
                                <label for="estado">Todos mis estados:</label>
                                <select  class=" mt-1">
                                    @foreach($estados as $estado)
                                    <option class="form-control" value="{{$estado->id}}"> {{$estado->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button wire:click="crear_estados()" class="btn btn-success"><i class="fa fa-plus">Agregar estado </i></button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    @endif
</div>