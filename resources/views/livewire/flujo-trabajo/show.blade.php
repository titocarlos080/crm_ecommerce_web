<div class="">
    <div>
        <center>
            <h4>Flujo de trabajo</h4>
        </center>
    </div>

    <div class="row header-title">

        @foreach($estados as $estado)
        <div class="border-right d-lg-block d-sm-flex">
            <div class="col border-bottom text-bold">{{ $estado->nombre }} </div>
            @foreach($actividades as $actividad)
            @if($estado->id == $actividad->id_estado)
            <div class="card-box bg-soft-success m-2">
                <div class="card-title"> <i class="fa fa-tasks"></i> {{ $actividad->titulo }} </div>
                <div class="card-title"> <i class="fa fa-calendar"></i> {{ $actividad->fecha_inicio }} </div>
                <div class="card-title"> <i class="fa fa-calendar"></i> {{ $actividad->fecha_fin }} </div>
                <div class="bg-soft-purple">
                    <center>
                        <h4>tareas</h4>
                    </center>
                    @foreach($tareas as $tarea)
                    @if($actividad->id == $tarea->id_actividad)

                    <p>* {{$tarea->contenido}}
                    <i class=" fas fa-edit" data-toggle="tooltip" data-placement="top" title="Realizar tarea"></i>
                    </p>
                    @endif
                    @endforeach
                </div>
                <center>

                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Revisar actividad"> <i class="fa fa-eye"></i> </button>
                </center>
            </div>
            @endif
            @endforeach

        </div>
        @endforeach
    </div>
</div>
<script>



</script>