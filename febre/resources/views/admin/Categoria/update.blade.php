<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Editar Categoria </h1>
                    <hr />
            
                    <form action="{{ route('admin/categorias/update', $categorias->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <form action="{{ route('admin/categorias/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Categoria</label>
                                    <input type="text" name="nombre_categoria" class="form-control" placeholder="categoria" value="{{ $categorias->nombre_categoria }}" required>
                                    @error('nombre_categoria')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                <br>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <a href="{{ route('admin/productos/index') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
