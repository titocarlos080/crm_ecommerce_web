<!DOCTYPE html>
<html>

<head>
    <title>Estado de Pedido</title>
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
    
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore deleniti maiores id dolores eligendi quibusdam laborum ducimus 
        possimus ipsa dignissimos at iste nostrum, consectetur ea saepe quod atque? Ea, blanditiis!</p>
 <p id="nombre_receptor">Hola {{$data['nombre']}},</p>
    <p>Su pedido numero  {{$data['pedido'] }} esta : {{$data['estado']}} .</p>
     <p>Gracias por confiar en nosotros.</p>
    <p style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Atentamente, El Equipo de ventas</p>
</body>

</html>