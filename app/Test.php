<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;
    protected $table='tests';
    protected $primaryKey='test_id';
    protected $fillable=[
        'titulo',
        'descripcion',
        'activo',
        'num_preguntas',
        'nivel_id',
        'cargo_id',
    ];
    protected $dates=['deleted_at'];
}
