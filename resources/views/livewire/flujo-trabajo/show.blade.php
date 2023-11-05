<div class="">
    <div>
        <center>
            <h4>Flujo de trabajo</h4>
        </center>
    </div>

    <div class="row header-title">
        
        @foreach($estados as $estado)
        <div class="border-right ">
            <div class="col border-bottom text-bold">{{ $estado->nombre }} </div>
            @foreach($actividades as $actividad)
            @if($estado->id == $actividad->id_estado)
            <div class="card-box border-dark ">
                <div class="card-title"> <i class="fa fa-tasks"></i> {{ $actividad->titulo }}  </div>
                <div class="card-title"> <i class="fa fa-calendar"></i> {{ $actividad->fecha_inicio }}   </div>
                <div class="card-title"> <i class="fa fa-calendar"></i> {{ $actividad->fecha_fin }}  </div>
                
            </div> 
            @endif
            @endforeach

        </div>
        @endforeach
    </div>
</div>
<script>



</script>