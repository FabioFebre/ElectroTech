<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $fillable=[
        'marca',
        'modelo',
        'descripcion',
        'categoria_id',
        'stock',
        'precio',
        'color',
        'banner_image',

    ];

    public function Categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}


