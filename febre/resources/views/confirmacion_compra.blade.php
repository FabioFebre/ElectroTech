<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl" style="color: black;">
            {{ __('Confirmación de Compra') }}
        </h2>
    </x-slot>
    <div class="pedido">
        <div class="contai">
            <div class="contai2">
                <div class="imagen">
                    <img src="{{ asset('img/check.png') }}" alt="">
                </div>
                <div>
                    <h1>¡Gracias por tu Compra!</h1>
                    <p>Tu solicitud de compra fue recibida</p>
                    <p><strong>N° recibo:</strong> {{ $compradors->id }}</p>
                    <p><strong>Fecha de solicitud de compra:</strong> {{ $compradors->created_at }}</p>
                    <div style="background-color: rgba(255, 255, 255, 0.5); padding: 20px;">
                        <a href="{{ route('admin.compras.pdf', ['id' => $compradors->id]) }}" class="btn btn-success" target="_blank" >Ver comprobante</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary" onclick="limpiarCarritoYRegresar()">Regresar a la tienda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        
        p{
            color: black;
        }
        img {
            width: 200px;
            margin: auto;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        .pedido {
            align-items: center;
            padding: 20px;
            margin: 50px auto; /* Centrado vertical y horizontal */
            background-color: white; /* Color de fondo suave */
            border-radius: 10px; /* Bordes redondeados */
            width: 50%; /* Ancho del mensaje */
            box-shadow: 0px 0px 10px lightslategrey; /* Sombra suave */
        }
        .contai2 {
            text-align: center;
            align-items: center;
            flex-direction: row;
            gap: 2rem;
        }   
        .contai {
            display: flex;
            text-align: center;
            align-items: center;
            flex-direction: column;
            gap: 2rem;
        }
    </style>

    <script>
        function limpiarCarritoYRegresar() {
            // Limpiar el carrito al volver
            localStorage.setItem('carrito', JSON.stringify([]));

            // Redirigir a la página principal
            window.location.href = "{{ route('dashboard') }}";
        }
    </script>
</x-app-layout>
