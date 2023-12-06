<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
@php
            $usuario = auth()->user(); // Obtener el usuario autenticado
            $empresa = $usuario->empresa; // Acceder a la propiedad "empresa" del usuario
            $rol = $usuario->rol; // Acceder a la propiedad "rol" del usuario
            @endphp
    <section>
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" class="text-center">
                    <span style="font-size: 25px; font-weight: bold;">{{$empresa->nombre}}</span>
                </td>
            </tr>
            <tr>
                <td width="30%" style="vertical-align: top; padding-top: 10px; position: relative;">
                 </td>

            </tr>
        </table>
    </section>

    <section>
        <div class="table-responsive mt-4">
            <table class="table table-bordered" cellpadding="0" cellspacing="0">
                <thead class="bg-dark text-white text-nowrap text-center">
                    <tr style="cursor: pointer">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                         <th>fecha</th>
                         <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $p)
                     
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{  $p->nombre }}</td>
                         <td>{{ $p->cantidad}}</td>
                        <td>${{  $p->fecha }}</td>
                        <td>{{  $p->precio}}</td>
                        <td>${{  $p->subtotal }}</td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                     
                </tfoot>



            </table>
        </div>
    </section>

    

 


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>