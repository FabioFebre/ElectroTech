<?php
// app/Http/Controllers/CompraController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Comprador;
use App\Models\Pago;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function realizarCompra(Request $request)
    {
        // Validar los datos del formulario si es necesario

        // Crear el comprador si no existe o buscarlo si ya existe
        $compradors = Comprador::firstOrCreate([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);
        $pagos = Pago::firstOrCreate([
            'medio' => $request->input('metodo_pago'),
        ]);

        // Guardar la compra asociada al comprador
        $compra = new Compra([
            'comprador_id' => $compradors->id,
            'pago_id'=>$pagos->id,
            'producto' => $request->input('producto'),
            'precio' => $request->input('precio'),
            'cantidad' => $request->input('cantidad'),
            'fecha' => $request->input('fecha')
        ]);
        $compra->save();

        // Redirigir a una página de confirmación u otra vista
        return redirect()->route('confirmacion_compra');
    }
    public function index() {
        // Obtener todos los compradores con sus compras
        $compradores = Comprador::with('compras')->get();

        return view('admin.compras.index', compact('compradores'));
    }

    public function pdf($id) {

        $compradors = Comprador::find($id);
        $compras = Compra::where('comprador_id', $id)->get();
        $pagos = $compras->first() ? $compras->first()->pago : null;
        $total = $compras->sum(function($compra) {
            return $compra->cantidad * $compra->precio;
        });
        $pdf = Pdf::loadView('admin.compras.pdf', compact('compradors', 'compras', 'pagos','total'));
        return $pdf->stream();
    }
    public function eliminar($id)
    {
        // Buscar el comprador por su ID
        $comprador = Comprador::findOrFail($id);

        // Eliminar el comprador
        $comprador->delete();

        // Redirigir de vuelta con un mensaje
        return redirect()->back()->with('success', 'El comprador ha sido eliminado correctamente.');
    }
}
