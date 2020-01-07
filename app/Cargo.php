<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use SoftDeletes;
    protected $table = 'cargos';
    protected $primaryKey = 'cargo_id';
    protected $fillable = [
        'nivel_maximo',
        'cargo_descripcion',
    ];
    protected $dates = ['deleted_at'];
}
