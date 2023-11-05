<!DOCTYPE html>
<html>

<head>
    <title>Restablecer Contraseña</title>
    <style>
        body {
            background-color: #93cbc7;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 5px;
        }

        #nombre_empresa,
        #link {
            background-color: #275A7A;
            border-radius: 10px;
            padding: 10px;
            color: #fff;
        }

        #nombre_receptor {
            background-color: #48677b;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            width: 90%;
            color: #fff;
        }
    </style>
</head>

<body>
    @php
    $usuario = auth()->user(); // Obtener el usuario autenticado
    $empresa = $usuario->empresa; // Acceder a la propiedad "empresa" del usuario
    @endphp
    <h3 id="nombre_empresa">{{$data['empresa']}}</h3>
    <img src="{{$empresa->logo}}" alt="foto" srcset="" style="width: 50%; height: 50%;" >
    <p id="nombre_receptor">Hola {{$data['nombre']}},</p>
    <p>Recibes este correo porque has solicitado restablecer tu contraseña en nuestro sitio web.</p>
    <p>Para cambiar tu contraseña, haz clic en el siguiente enlace:</p>
    <p><a id="link" href="{{$data['link']}}">Restablecer Contraseña</a></p>
    <p>Si no solicitaste este cambio, puedes ignorar este correo y tu contraseña actual seguirá siendo válida.</p>
    <p>Gracias por utilizar nuestro servicio.</p>
    <p style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Atentamente, El Equipo de Soporte</p>
</body>

</html>