<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RespuestaUser extends Model
{
    use SoftDeletes;
    protected $table='respuesta_users';
    protected $primaryKey='respuesta_id';
    protected $fillable=[
        'test_user_id',
        'respuesta_id',
        'correcto',
    ];
    protected $dates=['deleted_at'];
}
