<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Comprador;
use App\Models\Compra;
use App\Models\Pago;


class CarritoController extends Controller
{
    public function mostrarCarrito()
    {
        $productos = Producto::all();
        return view('carrito', compact('productos'));
    }

    public function formularioCompra()
    {
        return view('formulario_compra');
    }

    public function realizarCompra(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'metodo_pago' => 'required'
        ]);
        
        $compradorData = $request->only(['nombre', 'apellidos', 'direccion', 'telefono']);
        $compradors = Comprador::create($compradorData);

        $metodoPago = $request->input('metodo_pago');
        $pagos = Pago::create(['medio' => $metodoPago]); // Ajustado a 'metodo_pago'

        $carrito = json_decode($request->input('carrito'), true);

        foreach ($carrito as $producto) {
            Compra::create([
                'comprador_id' => $compradors->id,
                'pago_id' => $pagos->id,
                'producto' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => $producto['cantidad'],
            ]);
        }

        return redirect()->route('confirmacion_compra', ['comprador' => $compradors->id]);
    }

    public function confirmacionCompra($id)
    {
        $compradors = Comprador::find($id);
        $compras = Compra::where('comprador_id', $id)->get();
        $pagos = $compras->first() ? $compras->first()->pago : null;

        return view('confirmacion_compra', compact('compradors', 'compras','pagos'));
        
    }
}
