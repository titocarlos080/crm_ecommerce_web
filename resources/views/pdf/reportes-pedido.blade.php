<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
</head>

<body>
    <h3 style="text-align: center;"> Boleta de Pedido</h3>
    <div style="display: block;width: 100%;">
        <section>
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td colspan="2" class="text-center">
                        <span style="font-size: 25px; font-weight: bold;">EMPRESA:</span>
                    </td>

                    <td colspan="2" class="text-left pl-0 ">
                        @php
                        $user= Auth::user();
                        $empresa= Auth::user()->empresa;
                        $total=0;
                        @endphp
                        <h4>CLIENTE: {{$user->nombre}}</h4>
                        <p>Fecha: <?php echo date("d/m/Y"); ?></p>
                    </td>
                </tr>
                <tr>
                    <td width="30%" style="vertical-align: top; padding-top: 10px; position: relative;">
                        <img src="{{$empresa->logo}} " alt="img" height="50">
                        <h3 style="color: #409C9C;">{{$empresa->nombre}}</h3>

                    </td>

                </tr>
            </table>
        </section>

    </div>


    <div style="margin-top: 12px;">
        <table>
            <thead style="border: 1px solid black;">
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>

            </thead>
            <tbody style="border: 1px solid black;">
                @foreach($pedidos as $index => $pedido)
                <tr>
                    <td>{{$index+1}} </td>
                    <td>{{$pedido->nombre }}</td>
                    <td>{{$pedido->descripcion}} </td>
                    <td>{{$pedido->cantidad}} </td>
                    <td>{{$pedido->precio}} </td>
                    <td>{{$pedido->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>TOTAL</td>
                <td>{{round($monto_total,2)}} Bs</td>

            </tr>

        </table>

    </div>
    <div style="margin-top:15px;">
        <p>
            Gracias por confiar en Nosostros..
        </p>
    </div>




    <div class="d-inline-grid" >
        <div>

            <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" alt="" title="HELLO" width="50" height="50" />
        </div>

    </div>

</body>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 

</html>