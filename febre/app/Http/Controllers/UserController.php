<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User; // Importar la clase User

class UserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios de la base de datos
        $users = User::all();

      
        // Pasar los datos de usuarios a la vista
        return view('admin.users.index', compact('users'));

    }
    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $user = User::findOrFail($id);

        // Eliminar el usuario
        $user->delete();

        // Redirigir de vuelta con un mensaje
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
