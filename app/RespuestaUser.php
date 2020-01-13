<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RespuestaUser extends Model
{
    use SoftDeletes;
    protected $table = 'respuesta_users';
    protected $primaryKey = 'respuesta_id';
    protected $fillable = [
        'test_user_id',
        'respuesta_id',
        'correcto',
    ];
    protected $dates = ['deleted_at'];
    protected $appends = ['pregunta', 'respuesta'];

    public function testUser()
    {
        return $this->belongsTo('App\TestUser');
    }

    public function getRespuestaAttribute()
    {
        return Respuesta::find($this->respuesta_id);
    }

    public function getPreguntaAttribute()
    {
        $pregunta_id = Respuesta::find($this->getKey())->pregunta_id;
        return Pregunta::find($pregunta_id);
    }
}

