<div class="row">
    <div class="col-xl-12 col-sm-4">
        <div class="card-box">
            <h4 class="header-title mb-3">Clientes potenciales</h4>
            <div class="table-responsive">
                <a wire:click='nuevoLeads' class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i>Agreagar Nuevo </a>

                <table class="table table-borderless table-hover table-centered m-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>email</th>
                            <th>Ganancia esperada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $leads)
                        @foreach($leads as $indice => $lead )
                        <tr class=" table border-bottom shadow-sm cursor-pointer h-4" style="height:5px;">
                            <td>
                                <h5 class="m-0 font-weight-normal">{{$indice +1}}</h5>
                            </td>
                            <td>
                                <h5 class="m-0 font-weight-normal">{{$lead->nombre}}</h5>
                            </td>

                            <td>
                                {{$lead->email}}

                            </td>
                            <td>
                                <h3> {{$lead->telefono}}</h3>

                            </td>

                            <td>
                                <a wire:click='editar_leads({{$lead->id}})' class="btn btn-xs btn-light"><i class="fa fa-edit"></i>Trabajar </a>
                                <a wire:click='eliminar_empleado({{$lead->id}})' class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i>Eliminar</a>
                                <button wire:click="crear_actividades({{$lead->id}})" class="btn btn-success ml-5"><i class="fa fa-plus">Crear Actividad</i></button>

                            </td>
                        </tr>
                        @endforeach

                        @else
                        <span> No hay Leads</span>
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
                    <h4 class="modal-title">NUEVO CLIENTE POTENCIAL</h4>
                    <button wire:click="$set('vistacrear',false)" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body bg-emerald-500">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <label for="email">Cliente:</label>
                                <select wire:model="cliente_seleccionado">
                                    <option value="">-----seleccionar---------</option>
                                    @foreach($clientes as $cliente)
                                    <option  value="{{$cliente->id}}"> {{$cliente->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group mb-3 ">
                                <label for="ganancia_esperada">Ganancia esperada</label>
                                <input wire:model="ganancia_esperada" type="number">
                            </div>
                            <div class="form-group mb-3 justify-between">
                                <button wire:click="crear_leads()" class="btn btn-success "> Crear Lead</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    @elseif($vistaedit)

    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog ">
            <div class="modal-content   " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class="modal-title">EDITAR CLIENTE POTENCIAL</h4>
                    <button wire:click="$set('vistaedit',false)" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
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

                                <label for="email">contraseña:</label>
                                <input wire:model="pas" class="form-control" name="numero" type="text" id="tel">

                                <div class="form-group mb-1">
                                    <label for="foto">Foto:</label>
                                    <input class="form-control" wire:model='foto' name="foto" type="file" id="foto">

                                </div>

                            </div>
                            <button wire:click="actualizar_leads()" class="btn btn-success"> Actualizar</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    @endif

    @if($crear_actividad)
    <div class="fixed-top inset-0 top-0 left-0 ">
        <div class="modal-dialog ">
            <div class="modal-content   " style="background-color:cadetblue; color: white;">
                <div class="modal-header">
                    <h4 class="modal-title">NUEVA ACTIVIDAD</h4>
                    <button wire:click="$set('crear_actividad',false)" type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body bg-emerald-500">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 justify-between">

                                <label for="titulo">Titulo:</label>
                                <input wire:model="actividad_titulo" class="form-control" name="titulo" type="text">
                                <label for="titulo">Fecha Incio:</label>
                                <input wire:model="actividad_f_inicio" class="form-control" name="titulo" type="date">
                                <label for="titulo">Fecha Finalizacion:</label>
                                <input wire:model="actividad_f_fin" class="form-control" name="titulo" type="date">

                                <label for="estado">Estado de Actividad:</label>
                                <select wire:model="estado_seleccionado" class=" mt-1">
                                    <option   class="form-control" value=" ">---------- Seleccionar-----------</option>

                                    @foreach($estado_actividades as $estado_actividad)
                                    <option class="form-control" value="{{$estado_actividad->id}}"> {{$estado_actividad->nombre}}</option>
                                    @endforeach
                                </select><br>
                                <label for="grupo">Designar grupo:</label>
                                <select wire:model="id_grupo_seleccionado" class=" mt-1">
                                    <option   class="form-control" value=" ">---------- Seleccionar-----------</option>

                                    @foreach($grupos as $grupo)
                                    <option class="form-control" value="{{$grupo->id}}"> {{$grupo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button wire:click="crear_nueva_actividad()" class="btn btn-success"><i class="fa fa-plus">Crear </i></button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    @endif


</div>