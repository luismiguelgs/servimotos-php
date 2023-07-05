<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'motos';
    public $fillable = [
        'placa',
        'fecha_ultimo_afina',
        'recorre_dia',
        'kilometraje',
        'marca_id',
        'modelo_id',
        'fecha_afinamiento',
        'fecha_soat',
        'doi',
        'nombre_apellido',
        'celular',
        'whatsapp',
        'distrito_id',
        'email'
    ];
    protected $dates = ['deleted_at'];
 
}
