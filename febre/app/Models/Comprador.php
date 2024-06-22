<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    use HasFactory;
    protected $table = 'compradors';
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'direccion', 
        'telefono'];
    
    public function compras() {
        return $this->hasMany(Compra::class, 'comprador_id');
    }
}
