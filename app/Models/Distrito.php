<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distrito extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'distritos';
    public $fillable = [
        'nombre'
    ];
    protected $dates = ['deleted_at'];

}
