<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    use HasFactory;
    protected $table='pagos';
    protected $fillable=[
        'medio',
    ];
    public function compra()
    {
        return $this->hasMany(Compra::class);
    }
}
