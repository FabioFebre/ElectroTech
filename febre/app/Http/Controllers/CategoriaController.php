<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'desc')->paginate(5); // Pagina los resultados en grupos de 10
        $total = Categoria::count();
        return view('admin.categoria.home', compact('categorias', 'total'
        ));
    }


    public function create ()
    {
        return view('admin.categoria.create');
    }


    
    public function edit($id)
    {
        $categorias = Categoria::findOrFail($id);
        return view('admin.categoria.update' , compact ('categorias'));
    }
    
    public function delete($id)
    {
        try {
            Categoria::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Categoría eliminada exitosamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') { // Código de error de restricción de clave externa
                return redirect()->back()->with('error', 'No se puede eliminar la categoría porque tiene productos asociados.');
            }
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar la categoría.');
        }
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'nombre_categoria' => 'required|string',
        ]);
    
        Categoria::create($validation);
    
        return redirect()->route('admin/categorias/index')->with("success", "Categoría creada exitosamente");
    }
    
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
    
        $validation = $request->validate([
            'nombre_categoria' => 'required|string',
        ]);
    
        $categoria->nombre_categoria = $validation['nombre_categoria'];
        $categoria->save();
    
        return redirect()->route('admin/categorias/index')->with('success', 'Categoría actualizada correctamente');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombre_categoria' => 'required|string',
        ]);
    
        Categoria::create($validation);
    
        return redirect()->route('admin.categorias.index')->with("success", "Categoría creada exitosamente");
    }
    
    
}