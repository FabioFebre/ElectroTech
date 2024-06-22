<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Ventas') }}
            </h2>
            <div class="ml-4">
                 <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </div>
    </x-slot>
    <style>
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
    </style>
    <div class="py-12">
        <div class="max-w-7xl w-full sm:px-6 lg:px-8">
            @php
                // Inicializar un array para almacenar totales por comprador
                $compradoresConTotales = [];
                $sumaTotal = 0; // Variable para almacenar la suma total de todos los bloques

                // Iterar sobre cada comprador
                foreach ($compradores as $comprador) {
                    // Inicializar el total a pagar para este comprador
                    $totalPagar = 0;

                    // Iterar sobre las compras de este comprador
                    foreach ($comprador->compras as $compra) {
                        // Sumar el precio total de cada compra al total a pagar del comprador
                        $totalPagar += $compra->precio * $compra->cantidad;
                    }

                    // Sumar al total general
                    $sumaTotal += $totalPagar;

                    // Guardar el comprador junto con su total a pagar en el array
                    $compradoresConTotales[] = [
                        'comprador' => $comprador,
                        'totalPagar' => $totalPagar,
                    ];
                }

                // Encontrar el total a pagar más alto y su comprador asociado
                $totalPagarMasAlto = 0;
                $compradorConTotalMasAlto = null;

                foreach ($compradoresConTotales as $item) {
                    if ($item['totalPagar'] > $totalPagarMasAlto) {
                        $totalPagarMasAlto = $item['totalPagar'];
                        $compradorConTotalMasAlto = $item['comprador'];
                    }
                }
            @endphp

            @if (count($compradoresConTotales) === 0)
                <div id="carrito-vacio-msg" class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 flex items-center justify-center">
                    <!-- Contenedor del mensaje -->
                    <div class="p-6 text-gray-900 text-center">
                        <div class="con1 ">
                            <div class="con2 ">
                                <img src="{{ asset('img/car-vacio.png') }}" alt="" style="width: 90px; height: 85px;">
                                <div>
                                    <h1 class="mb-2 text-xl font-semibold">Tu lista de ventas está vacía</h1>
                                    <p class="text-gray-700">No se encontraron ventas registradas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($compradoresConTotales as $item)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 relative">
                        <!-- Información del comprador -->
                        <div class="p-6 text-gray-900">
                            <h4 class="text-md font-medium text-gray-900 mb-2">Comprador: {{ $item['comprador']->nombre }} {{ $item['comprador']->apellidos }}</h4>
                            @if ($item['comprador']->compras->isEmpty())
                                <!-- Mostrar mensaje de compras vacías -->
                                <p class="text-gray-700">No se encontraron compras para este comprador.</p>
                            @else
                                <div class="overflow-x-auto mb-4">
                                    <table class="table table-hover">
                                        <!-- Encabezados de la tabla -->
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item['comprador']->compras as $compra)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $compra->producto }}</td>
                                                    <td>${{ $compra->precio }}</td>
                                                    <td>{{ $compra->cantidad }}</td>
                                                    <td>${{ number_format($compra->precio * $compra->cantidad, 2) }}</td>
                                                    <td>{{ $compra->fecha }}</td>
                                                    <!-- No colocar botón de eliminar aquí -->
                                                </tr>
                                            @endforeach
                                            <!-- Mostrar total a pagar por comprador -->
                                            <tr>
                                                <td colspan="5"></td>
                                                <td class="font-semibold">Total a pagar:</td>
                                                <td class="font-semibold">${{ number_format($item['totalPagar'], 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                        <!-- Botón de eliminar en la parte inferior -->
                        <div class="absolute bottom-0 left-0 mb-2 ml-2">
                            <form action="{{ route('eliminar.comprador', ['id' => $item['comprador']->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar Comprador</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <!-- Mostrar el total a pagar más alto -->
                @if ($compradorConTotalMasAlto)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 relative">
                        <!-- Fondo con el icono de compra -->
                        <div class="absolute inset-0 flex items-center justify-center bg-gray-200 opacity-50 rounded-lg">
                            <svg class="h-16 w-16 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 7c0-1.1.9-2 2-2s2 .9 2 2M2 3h20l-3 13H5l-3-13zm18 4H4"></path>
                                <circle cx="6" cy="21" r="1"></circle>
                                <circle cx="18" cy="21" r="1"></circle>
                            </svg>
                        </div>

                        <!-- Contenido principal -->
                        <div class="p-6 text-gray-900 relative z-10">
                            <h4 class="text-md font-medium text-gray-900 mb-2">La venta más alta:</h4>
                            <p class="text-md font-medium text-gray-900 mb-2">${{ number_format($totalPagarMasAlto, 2) }}</p>
                            <p class="text-gray-700">Para el comprador: {{ $compradorConTotalMasAlto->nombre }} {{ $compradorConTotalMasAlto->apellidos }}</p>
                        </div>
                    </div>
                @endif

                <!-- Mostrar suma total de todas las ventas -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h4 class="text-md font-medium text-gray-900 mb-2">Suma total de todas las ventas:</h4>
                        <p class="text-md font-medium text-gray-900">${{ number_format($sumaTotal, 2) }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>