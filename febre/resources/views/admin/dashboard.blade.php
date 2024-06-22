<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cuenta Administrativa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="btn-group" role="group">
                        <a href="categorias" class="btn btn-primary" style="margin-right: 10px">Agregar Categorias</a>
                        <a href="productos" class="btn btn-primary" style="margin-right: 10px;">Agregar Productos</a>
                        <a href="compras" class="btn btn-primary" style="margin-right: 10px;">Ver compras</a>
                        <a href="users" class="btn btn-primary"style="margin-right: 10px;" >Ver usuarios</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Estilos para el contenedor principal */
        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        /* Estilos para el grupo de botones */
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            /* Espacio entre botones */
        }

        /* Estilos para los botones */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border: 2px solid transparent;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #1e88e5;
            border-color: #1e88e5;
            color: #fff;
        }

        .btn-primary {
            background-color: #2196f3;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #1e88e5;
            border-color: #1e88e5;
        }
    </style>
</x-app-layout>