<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito de Compras') }}
        </h2>
    </x-slot>
    <main id="vista-carrito" class="main" style="display: none;">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div id="carrito-container" class="bg-white p-3 shadow-sm rounded">
                    <h5 class="text-center">Productos</h5>
                        <div class="table-responsive">
                            <table id="carrito-table" class="table table-hover">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="carrito-body"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="margin: 50px auto;">
                    <div class="bg-white p-3 shadow-sm rounded mb-3">
                        <h5 class="text-center">Resumen de la Compra</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <tfoot>
                                    <tr>
                                        <td>Productos (<span id="contador-carrito" class="contador-carrito">0</span>)</td>
                                        <td class="text-end">Total:</td>
                                        <td id="carrito-total"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <a href="{{ route('formulario_compra') }}" class="btn btn-success w-100">Continuar compra</a>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" id="vaciar-carrito" class="btn btn-danger w-45">Vaciar Carrito</a>
                        <button class="btn btn-primary w-45" onclick="regresar()">Seguir comprando</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="carrito-vacio-msg" style="display: none;">
        <div class="con1">
            <div class="con2">
                <img src="{{ asset('img/car-vacio.png') }}" alt="" style="width: 90px; height: 85px;">
                <div>
                    <h1>Tu carrito está vacío</h1>
                    <p>Agrega productos a tu carrito.</p>
                </div>
            </div>
        </div>
        <div class="con3">
            <a href="{{ route('dashboard') }}" id="volver" class="btn btn-secondary">Volver</a>
        </div>
    </div> 
    <style>
        /* Estilos para el carrito de compras */
        #volver {
            padding-top: 6px;
            width: 200px;
            height: 40px;
        }
        .con3 {
            margin-top: 1rem;
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 12px;
            width: 100%;
        }
        .con1 {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 12px;
        }
        .con2 {
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 2rem;
        }
        #carrito-vacio-msg {
            align-items: center;
            padding: 20px;
            margin: 50px auto; /* Centrado vertical y horizontal */
            background-color: white; /* Color de fondo suave */
            border-radius: 10px; /* Bordes redondeados */
            width: 50%; /* Ancho del mensaje */
            box-shadow: 0px 0px 10px lightslategrey; /* Sombra suave */
        }

        #carrito-vacio-msg h1 {
            font-weight: bold;
            font-size: 18px;
            color: black; /* Color de texto */
        }
        #carrito-vacio-msg p {
            font-size: 15px;
            color: black; /* Color de texto */
            margin-bottom: 0px;
        }

        #carrito-container {
            margin: 50px auto;
            border-radius: 8px;
            border: 1px solid #eaeaea;
            padding: 16px;
            background-color: #fff;
        }
        .table-responsive {
            border-radius: 8px;
            border: 1px solid #eaeaea;
            padding: 16px;
            background-color: #fff;
        }

        #carrito-container .table thead {
            background-color: #007bff;
            color: white;
        }

        #carrito-container .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        #carrito-total {
            font-weight: bold;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn-group .btn {
            margin-right: 4px;
        }

        .bg-primary {
            background-color: #007bff !important;
        }

        .btn {
            border-radius: 50px;
            padding: 10px 20px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: #f5f5f5;
        }

        .table td {
            padding: 0.75rem;
        }

        .table th {
            padding: 0.75rem;
            font-weight: bold;
        }


        /* Estilos para botones de acción en la página del carrito */
        .d-flex {
            display: flex;
        }

        .d-flex .w-100 {
            width: 100%;
        }

        .d-flex .w-45 {
            width: 45%;
        }

        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column;
                align-items: stretch;
            }

            .d-flex .w-45 {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carritoBody = document.getElementById('carrito-body');
            const carritoTotal = document.getElementById('carrito-total');
            const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
            const carritoContainer = document.getElementById('vista-carrito'); // Contenedor del carrito
            const carritoVacioMsg = document.getElementById('carrito-vacio-msg');
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            // Función para actualizar la vista del carrito
            function actualizarCarritoVista() {
                // Limpiar el cuerpo de la tabla del carrito
                while (carritoBody.firstChild) {
                    carritoBody.removeChild(carritoBody.firstChild);
                }

                if (carrito.length === 0) {
                    carritoContainer.style.display = 'none'; // Ocultar contenedor del carrito
                    carritoVacioMsg.style.display = 'block'; // Mostrar mensaje de carrito vacío
                } else {
                    carritoContainer.style.display = 'block'; // Mostrar contenedor del carrito
                    carritoVacioMsg.style.display = 'none'; // Ocultar mensaje de carrito vacío
                }

                // Renderizar cada producto en el carrito
                carrito.forEach(producto => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${producto.nombre}</td>
                        <td>${producto.precio}</td>
                        <td>
                            <input type="number" class="cantidad" data-id="${producto.id}" value="${producto.cantidad}" min="1">
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger borrar-producto" data-id="${producto.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                </svg>
                            </a>
                        </td>
                    `;
                    carritoBody.appendChild(row);
                });


                // Guardar el carrito en el localStorage antes de cerrar la ventana
                window.addEventListener('beforeunload', function(e) {
                    localStorage.setItem('carrito', JSON.stringify(carrito));
                });

                // Agregar eventos a los botones de borrar producto y a los inputs de cantidad
                const botonesBorrar = document.querySelectorAll('.borrar-producto');
                botonesBorrar.forEach(boton => {
                    boton.addEventListener('click', borrarProducto);
                });

                const inputsCantidad = document.querySelectorAll('.cantidad');
                inputsCantidad.forEach(input => {
                    input.addEventListener('change', actualizarCantidad);
                    actualizarContadorCarrito(); // Actualizar el contador al cargar la página
                });

                actualizarTotal();
            }

            // Función para borrar un producto del carrito
            function borrarProducto(event) {
                event.preventDefault();
                const idProducto = event.target.getAttribute('data-id');
                carrito = carrito.filter(producto => producto.id !== idProducto);

                actualizarCarritoVista();
                localStorage.setItem('carrito', JSON.stringify(carrito));
            }

            // Función para actualizar la cantidad de un producto en el carrito
            function actualizarCantidad(event) {
                const input = event.target;
                const idProducto = input.getAttribute('data-id');
                const nuevaCantidad = parseInt(input.value);

                const producto = carrito.find(item => item.id === idProducto);
                if (producto) {
                    producto.cantidad = nuevaCantidad;
                    actualizarContadorCarrito(); // Actualizar el contador cuando cambia la cantidad
                }

                localStorage.setItem('carrito', JSON.stringify(carrito));
                actualizarTotal();

                // Despachar un evento personalizado para notificar a la página principal sobre el cambio en el carrito
                console.log('Evento carritoActualizado disparado desde la página del carrito');
                const carritoActualizadoEvent = new Event('carritoActualizado');
                window.dispatchEvent(carritoActualizadoEvent);
            }

            // Función para actualizar el contador del carrito
            function actualizarContadorCarrito() {
                const totalProductos = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
                const contadorCarrito = document.querySelectorAll('.contador-carrito');
                contadorCarrito.forEach(contador => {
                    contador.textContent = totalProductos;
                });
            }

            // Agregar evento al botón de vaciar carrito
            vaciarCarritoBtn.addEventListener('click', (event) => {
                event.preventDefault();
                carrito = [];
                actualizarCarritoVista();
                localStorage.setItem('carrito', JSON.stringify([]));
            });

            function actualizarTotal() {
                let total = 0;
                carrito.forEach(producto => {
                    total += producto.precio * producto.cantidad;
                });
                carritoTotal.textContent = `$${total.toFixed(2)}`;
            }
            // Actualizar la vista del carrito y el contador al cargar la página
            actualizarCarritoVista();
            actualizarContadorCarrito();
        });

        function regresar() {
            window.location.href = "{{ route('dashboard') }}";
        }
    </script>

</x-app-layout>