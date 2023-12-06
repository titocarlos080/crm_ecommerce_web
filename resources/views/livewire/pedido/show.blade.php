<div>
    <div class="row ">
        <div class="col-sm-4 col-lg-12">
            <div class=" row d-flex justify-content-between">
                <h3 class="font-weight-bold "><i class="fas fa-shopping-cart"></i> PEDIDOS</h3>
                <div>
                 <i class="fa fa-filter"></i>
               
                <select  wire:model="id_estado" wire:change="filtar_pedido">
                <option value="0"> todos los pedidos </option>
                   
                    @foreach($this->estados() as $estado)

                    <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                    @endforeach

                </select>
                </div>
            </div>
            @if ($pedidos)
            <table class="table table-bordered bg-dots-darker">
                <thead>
                    <tr class="justify-center">
                        <th> ID </th>
                        <th> NUMERO </th>
                        <th> ESTADO </th>
                        <th><i class="fas fa-ellipsis-v"> Opciones </i></th>
                    </tr>
                </thead>
                @foreach($pedidos as $index => $pedido)
                <tr>
                    <td>
                        {{$index+1}}
                    </td>
                    <td>
                        {{$pedido->id}}
                    </td>
                    <td>
                        <select wire:model="estado_seleccionado" wire:change="cambiar_estado({{$pedido->id}})">
                            @foreach($this->estados() as $estado)

                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                            @endforeach

                        </select>


                        {{$pedido->estado_pedido->nombre}}
                    </td>
                    <td>
                        <button wire:click="eliminar_pedido({{$pedido->id}})" class="btn btn-danger">Eliminar</button>
                    </td>

                </tr>
                @endforeach
            </table>
            @else
            <p> no hay pedidos</p>
            @endif
        </div>

    </div>



</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('producto-creado', (comments) => {
            alert(comments)
        });
        Livewire.on('producto-error', (comments) => {
            alert(comments)
        });
        Livewire.on('producto-editado', (comments) => {
            alert(comments)
        });
        Livewire.on('pedido-cambio_estado', (comments) => {
            alert(comments)
        });
        Livewire.on('pedido-eliminado', (comments) => {
            alert(comments)
        });


    })
</script>