<!-- admin/productos/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Nuevo Producto</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('admin/productos/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca" required>
                            @error('marca')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo del Producto</label>
                            <input type="text" name="modelo" class="form-control" placeholder="Modelo" required>
                            @error('modelo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Descripcion del Producto</label>
                            <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" required>
                            @error('modelo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Categoría del producto</label>
                            <select name="categoria_id" class="form-control" required>
                                <option value="">SELECCIONAR</option>
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" name="stock" class="form-control" placeholder="Stock" required>
                            @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" name="precio" class="form-control" placeholder="Precio" required>
                            @error('precio')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" name="color" class="form-control" placeholder="Color del producto" required>
                            @error('color')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="banner_image" class="form-label">Imagen del Banner</label>
                            <input type="file" name="banner_image" class="form-control">
                            @error('banner_image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    
                    <div class="mt-3">
                        <a href="{{ route('admin/productos/index') }}" class="btn btn-secondary">Regresar a productos</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
