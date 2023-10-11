<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <h4 class="header-title mb-3">Mis Empresas</h4>
                <div class="table-responsive">
 
                    <table class="table table-borderless table-hover table-centered m-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($empresas)
                            @foreach($empresas as $empresa )

                            <tr>

                                <td>
                                    <h5 class="m-0 font-weight-normal">{{$empresa->nombre}}</h5>
                                </td>

                                <td>
                                    {{$empresa->email}}

                                </td>
                                <td>
                                    <h3> {{$empresa->descripcion}}</h3>

                                </td>

                            </tr>
                            @endforeach

                            @else
                            <span> No hay Empresas</span>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->

    </div>




</div>