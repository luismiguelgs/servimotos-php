<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'modelos';
    public $fillable = [
        'nombre',
        'marca_id'
    ];
    protected $dates = ['deleted_at'];
}
