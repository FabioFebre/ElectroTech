<!-- admin/productos/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="mb-0">Lista de Productos</h1>
                        <div>
                            <a href="{{ route('admin/productos/create') }}" class="btn btn-primary mr-2">Agregar</a>
                            <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Descripcion</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Color</th>
                                <th>Banner Image</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productos as $producto)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $producto->marca }}</td>
                                <td class="align-middle">{{ $producto->modelo }}</td>
                                <td class="align-middle">{{ $producto->descripcion}}</td>
                                <td class="align-middle">{{ $producto->categoria->nombre_categoria }}</td>
                                <td class="align-middle">{{ $producto->stock }}</td>
                                <td class="align-middle">{{ $producto->precio }}</td>
                                <td class="align-middle">{{ $producto->color }}</td>
                                <td class="align-middle">
                                    @if(!empty($producto->banner_image))
                                    <img style="height: 80px; width: 100px;" src="{{ asset('images/'.$producto->banner_image) }}" alt="Banner">
                                    @else
                                    Not available
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <a href="{{ route('admin/productos/edit', ['id'=>$producto->id]) }}" class="btn btn-secondary">Editar</a>
                                        <a href="{{ route('admin/productos/delete', ['id'=>$producto->id]) }}" class="btn btn-danger">Eliminar</a>
                                        <a href="{{ route('admin/productos/show', ['id'=>$producto->id]) }}" class="btn btn-success">Detalle</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="9">No se encontraron productos.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
