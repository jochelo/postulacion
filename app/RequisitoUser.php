<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequisitoUser extends Model
{
    use SoftDeletes;
    protected $table='requisito_users';
    protected $primaryKey='requisito_user_id';
    protected $fillable=[
        'user_id',
        'nivel_id',
        'requisito_id',
        'archivo',
        'con_archivo_adjunto',
    ];
    protected $dates=['deleted_at'];
}
