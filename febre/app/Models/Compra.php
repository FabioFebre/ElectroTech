<?php

// app/Models/Compra.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['comprador_id', 'pago_id','producto', 'precio', 'cantidad'];

    public function comprador()
    {
        return $this->belongsTo(Comprador::class, 'comprador_id');
    }
    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }
}
