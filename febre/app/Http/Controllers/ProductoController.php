<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->orderBy('id', 'desc')->paginate(10); // Pagina los resultados en grupos de 5
        $total = Producto::count();
        return view('admin.producto.home', compact('productos', 'total'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.producto.create', compact('categorias'));
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|integer', // Cambiado de 'nombre_categoria' a 'categoria_id'
            'stock' => 'required|string',
            'precio' => 'required|numeric',
            'color' => 'required|string',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Asegura que banner_image sea una imagen válida
        ]);

        $imageName = null;
        if ($request->hasFile('banner_image')) {
            $imageObject = $request->file('banner_image');
            $imageExtension = $imageObject->getClientOriginalExtension();
            $newImageName = time() . '.' . $imageExtension;
            $imageObject->move(public_path('images'), $newImageName);
            $imageName = $newImageName;
        }

        $data = [
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id,
            'stock' => $request->stock,
            'precio' => $request->precio,
            'color' => $request->color,
            'banner_image' => $imageName,
        ];

        Producto::create($data);

        return redirect()->route('admin/productos/index')->with("success", "Producto creado exitosamente");
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario de edición
        return view('admin.producto.update', compact('producto', 'categorias'));
    }
    
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validation = $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|integer', // Cambiado de 'nombre_categoria' a 'categoria_id'
            'stock' => 'required|string',
            'precio' => 'required|numeric',
            'color' => 'required|string',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Asegura que banner_image sea una imagen válida
        ]);

        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->color = $request->color;

        if ($request->hasFile('banner_image')) {
            $imageObject = $request->file('banner_image');
            $imageExtension = $imageObject->getClientOriginalExtension();
            $newImageName = time() . '.' . $imageExtension;
            $imageObject->move(public_path('images'), $newImageName);
            $producto->banner_image = $newImageName;
        }

        $producto->save();

        return redirect()->route('admin/productos/index')->with('success', 'Producto actualizado correctamente');
    }

    public function delete($id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->delete()) {
            session()->flash('success', 'Producto eliminado correctamente');
        } else {
            session()->flash('error', 'Hubo un problema al eliminar el producto');
        }
        return redirect()->route('admin/productos/index');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.producto.show', compact('producto'));
    }
}
