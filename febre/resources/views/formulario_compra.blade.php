<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario de Compra') }}
        </h2>
    </x-slot>
    
    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .metodo-pago-form {
            display: none; /* Ocultar por defecto todos los formularios de métodos de pago */
        }
    </style>
    
    
    <main class="main">
        <div class="form-container">
            <h3 class="form-header">Datos del Cliente</h3>
            <form id="form-compra" action="{{ route('realizar_compra') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="metodo_pago" class="form-label">Método de Pago:</label>
                    <select id="metodo_pago" name="metodo_pago" class="form-control" required onchange="toggleMetodoPagoForm()">
                        <option value="">Seleccione un método de pago</option>
                        <option value="Tarjeta">Tarjeta de Crédito/Débito</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Transferencia-Bancaria">Transferencia Bancaria</option>
                    </select>
                </div>
                
                <!-- Formulario de Tarjeta de Crédito/Débito -->
                <div class="metodo-pago-form Tarjeta-form">
                    <div class="mb-3">
                        <label for="numero_tarjeta" class="form-label">Número de Tarjeta:</label>
                        <input type="text" id="numero_tarjeta" name="numero_tarjeta" class="form-control" placeholder="Ingrese el número de su tarjeta">
                    </div>
                    <div class="mb-3">
                        <label for="titular_tarjeta" class="form-label">Titular de la Tarjeta:</label>
                        <input type="text" id="titular_tarjeta" name="titular_tarjeta" class="form-control" placeholder="Ingrese el nombre del titular de la tarjeta">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                        <input type="text" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control" placeholder="MM/AA">
                    </div>
                    <div class="mb-3">
                        <label for="cvv" class="form-label">CVV:</label>
                        <input type="text" id="cvv" name="cvv" class="form-control" placeholder="Ingrese el código de seguridad (CVV)">
                    </div>
                </div>
                
                <!-- Formulario de PayPal -->
                <div class="metodo-pago-form PayPal-form">
                    <div class="mb-3">
                        <label for="correo_paypal" class="form-label">Correo Electrónico de PayPal:</label>
                        <input type="email" id="correo_paypal" name="correo_paypal" class="form-control" placeholder="Ingrese su correo electrónico de PayPal">
                    </div>
                </div>
                
                <!-- Formulario de Transferencia Bancaria -->
                <div class="metodo-pago-form Transferencia-Bancaria-form">
                    <div class="mb-3">
                        <label for="banco_destino" class="form-label">Banco de Destino:</label>
                        <input type="text" id="banco_destino" name="banco_destino" class="form-control" placeholder="Ingrese el nombre del banco de destino">
                    </div>
                    <div class="mb-3">
                        <label for="numero_cuenta" class="form-label">Número de Cuenta:</label>
                        <input type="text" id="numero_cuenta" name="numero_cuenta" class="form-control" placeholder="Ingrese el número de cuenta bancaria">
                    </div>
                </div>
                
                <input type="hidden" name="carrito" id="carrito">
                <button type="submit" class="btn btn-primary w-100">Confirmar Compra</button>
            </form>
        </div>
    </main>

    <script>
        function toggleMetodoPagoForm() {
            const metodoPagoSelect = document.getElementById('metodo_pago');
            const todasLasForms = document.querySelectorAll('.metodo-pago-form');

            todasLasForms.forEach(form => {
                form.style.display = 'none'; // Oculta todos los formularios de métodos de pago
            });

            if (metodoPagoSelect.value !== '') {
                const formularioMostrar = document.querySelector(`.${metodoPagoSelect.value}-form`);
                if (formularioMostrar) {
                    formularioMostrar.style.display = 'block'; // Muestra el formulario correspondiente al método de pago seleccionado
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const formCompra = document.getElementById('form-compra');
            const carritoInput = document.getElementById('carrito');
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            formCompra.addEventListener('submit', () => {
                carritoInput.value = JSON.stringify(carrito);
            });
        });
    </script>
</x-app-layout>
