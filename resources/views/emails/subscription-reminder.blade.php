<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorio de Suscripción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #0073e6;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            margin: 15px 0;
        }
        .button {
            display: inline-block;
            background: #0073e6;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            color: #666;
            font-size: 0.9em;
            padding: 10px;
            background: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>TV Streaming Fassid</h2>
        </div>
        <div class="content">
            <p>Hola <strong>{{ $nombreUsuario }}</strong>,</p>
            <p>{{ $mensaje }}</p>
            <p>Para más detalles o para renovar tu suscripción, visita el siguiente enlace:</p>
            <a href="https://streaming.fassid.com" class="button">Renovar Suscripción</a>
        </div>
        <div class="footer">
            <p>TV Streaming Fassid, {{ date('Y') }}. Todos los derechos reservados.</p>
            <p><a href="https://streaming.fassid.com/contacto">Contáctanos</a></p>
        </div>
    </div>
</body>
</html>
