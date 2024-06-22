<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        // Lógica para mostrar una lista de compras
        $pagos = Pago::all(); // Por ejemplo, obtener todas las compras

        return view('pago', ['pagos' => $pagos]);
    }
}
