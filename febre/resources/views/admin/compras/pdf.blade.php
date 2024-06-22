<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Pago</title>
    <link rel="stylesheet" href="">
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main {
            background-image: url('/images/logo.jpeg');
            background-size: 80%;
            background-position: center;
            background-attachment: fixed;
            filter: opacity(0.7);
            padding: 20px;
        }

        .content {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
        }

        h3 {
            color: black;
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
        }

        .recibo-info, .comprador-info {
            margin-bottom: 20px;
        }

        .recibo-info p, .comprador-info p {
            color: black;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            color: black;
            text-align: center;
        }

        table td {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
        }

        @media print {
            body {
                background-color: white;
            }

            .container {
                box-shadow: none;
            }

            .main {
                background: none;
                filter: none;
            }

            h3 {
                border: none;
            }
        }


    </style>

</head>
<body>
    <img src="img/logog.jpg" alt="" width="150px" height="120px">
    <div class="container">
        <main class="main">
            <div class="content">
                <h3>RECIBO DE PAGO</h3>
                
                
                <div class="comprador-info">
                    
                        <p><strong>N° recibo:</strong> {{ $compradors->id }}</p>
                        <p><strong>Fecha:</strong> {{ $compradors->created_at }}</p>
                        <br>
                        <p><strong>Nombre:</strong> {{ $compradors->nombre }}</p>
                        <p><strong>Apellidos:</strong> {{ $compradors->apellidos }}</p>
                        <p><strong>Teléfono:</strong> {{ $compradors->telefono }}</p>
                        <p><strong>Dirección:</strong> {{ $compradors->direccion }}</p>
                        <p><strong>Método de Pago:</strong> {{ $pagos->medio}}</p>
                </div>
                <br>
                <br>
                <table class="u-full-width">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Nombre</th>
                            <th>Precio Unitario</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra) 
                            <tr>
                                <td>{{ $compra->cantidad }}</td>
                                <td>{{ $compra->producto }}</td>
                                <td>S/.{{$compra->precio}}</td>
                                <td>S/.{{ $compra->cantidad * $compra->precio }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <hr>

                <strong>Total:</strong> S/.{{ $total }}
            </div>
        </main>
    </div>
</body>
</html>
