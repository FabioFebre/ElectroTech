<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Nueva Categoria</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif

                    <form action="{{ route('admin/categorias/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Categoria</label>
                            <input type="text" name="nombre_categoria" class="form-control" placeholder="categoria" required>
                            @error('nombre_categoria')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <br>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    
                    <div class="mt-3">
                        <a href="{{ route('admin/categorias/index') }}" class="btn btn-secondary">Regresar a categorias</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
