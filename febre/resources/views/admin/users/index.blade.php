<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color: black;">
            {{ __('Lista de Usuarios ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </div>
                    <hr />
                    <h3 class="text-lg font-medium text-gray-900 mb-4" style="color: black;">Usuarios Registrados</h3>

                    @php
                        $admins = $users->where('usertype', 'admin');
                        $regularUsers = $users->where('usertype', 'user');
                    @endphp

                    <h4 class="text-md font-medium text-gray-900 mb-4" style="color: black;">Administradores</h4>
                    @if ($admins->isEmpty())
                        <p class="text-gray-700" style="color: black;">No se encontraron administradores.</p>
                    @else
                        <div class="overflow-x-auto mb-6">
                            <table class="table table-hover" style="color: black;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Fecha de Creación</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $adminCounter = 1; @endphp
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $adminCounter++ }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td>
                                            <!-- Botón de eliminar con formulario -->
                                            <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <h4 class="text-md font-medium text-gray-900 mb-4" style="color: black;">Usuarios</h4>
                    @if ($regularUsers->isEmpty())
                        <p class="text-gray-700" style="color: black;">No se encontraron usuarios.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table table-hover" style="color: black;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Fecha de Creación</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $userCounter = 1; @endphp
                                    @foreach($regularUsers as $user)
                                    <tr>
                                        <td>{{ $userCounter++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <!-- Botón de eliminar con formulario -->
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>