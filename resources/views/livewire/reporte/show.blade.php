<div>

    <div class="d-flex justify-content-center">


        <h3 class="text-bold">GENERAR REPORTES</h3>

    </div>
    <div>
        <span>selecciones el rango</span>
        <div class="d-flex flex-row justify-content-between ">
            <div class="m-1">
                <label for="">desde:</label>
                <input class="cursor-pointer" wire:model="fecha_inferior" type="date" name="fecha_inferior">
                <label for="">hasta:</label>
                <input class="cursor-pointer"  wire:model="fecha_superior" type="date" name="fecha_superior">
                <button wire:click="filtrar"  class=" btn-success" data-toggle="tooltip" data-placement="top" title="filtrar"><i class="fa fa-tasks "></i></button>
                <button wire:click="$set('swap',false)"  class=" btn-success" data-toggle="tooltip" data-placement="top" title="limpiar"><i class="fas fa-times"></i></button>
            </div>
            <div>
                <button wire:click="exportarExcel" class="btn btn-success m-1" data-toggle="tooltip" data-placement="top" title="generar en excel"><i class="fa fa-file-excel"> GENERAR XLS</i></button>
                <a href="{{route('filtro_pdf')}}" class="btn btn-danger  m-1" data-toggle="tooltip" data-placement="top" title="generar en pdf"><i class="fa fa-file-pdf"> GENERAR PDF</i></a>
            </div>
        </div>


    </div>
    <div class="d-flex justify-content-center">
        <table class="table table-bordered table-hover">
            <thead class="">
                <tr class="header-title">
                    <th>Nro </th>
                    <th>PRODUCTO </th>
                    <th>CANTIDAD</th>
                    <th>FECHA</th>
                    <th>PRECIO</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>

                @foreach($pedidos as $pedido)

                <tr class="text-body">
                    <td>{{$pedido->id}}</td>
                    <td>{{$pedido->nombre}}</td>
                    <td>{{$pedido->cantidad}}</td>
                    <td>{{$pedido->fecha}}</td>
                    <td>{{$pedido->precio}}</td>
                    <td>{{$pedido->subtotal}}</td>
                </tr>
                @endforeach


            </tbody>

        </table>


    </div>



</div>

<script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('alerta-fecha', (comments) => {
                alert(comments)
            });
            


        })
    </script>