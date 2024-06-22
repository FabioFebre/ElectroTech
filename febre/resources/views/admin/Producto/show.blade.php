<!-- resources/views/admin/producto/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-10" style="padding-right: 300px; padding-left: 300px;">
        <div class="max-w-xs mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="con1">
                <div class="con2">
                        @if(!empty($producto->banner_image))
                            <img src="{{ asset('images/'.$producto->banner_image) }}" alt="Banner" style="height: 250px; width: 270px;">
                        @else
                            <p>Imagen no disponible</p>
                        @endif
                        <div>
                            <h3>{{ $producto->marca }}</h3>
                            <p class="show" style="color: black"><strong>Precio: </strong> {{ $producto->modelo }}</p>
                            <p class="show" style="color: black"><strong>Descripcion: </strong> {{ $producto->descripcion }}</p>
                            <p class="show" style="color: black"><strong>Precio: </strong> ${{ $producto->precio }}</p>
                            <p class="show" style="color: black"><strong>Color: </strong> {{ $producto->color }}</p>
                        </div>
                    </div>
                </div>
            </div>  
            <div>
                <a href="{{ url('/admin/productos') }}" class="btn btn-secondary" style="margin-top: 5px;">Regresar</a>
            </div>
        </div>
    </div>
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
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</x-app-layout>
