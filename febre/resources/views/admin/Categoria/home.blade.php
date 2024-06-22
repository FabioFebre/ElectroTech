<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h1 class="mb-0">Lista de Categorias</h1>
                        <div>
                            <a href="{{ route('admin/categorias/create') }}" class="btn btn-primary mr-2">Agregar</a>
                            <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </div>
                    <hr />
                    
                    {{-- Mensajes de éxito y error --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categorias as $categoria)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $categoria->nombre_categoria }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <a href="{{ route('admin/categorias/edit', ['id'=>$categoria->id]) }}" class="btn btn-secondary">Editar</a>
                                        <a href="{{ route('admin/categorias/delete', ['id'=>$categoria->id]) }}" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="3">No se encontraron categoria.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>