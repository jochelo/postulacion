<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregunta extends Model
{
    use SoftDeletes;
    protected $table='preguntas';
    protected $primaryKey='pregunta_id';
    protected $fillable=[
        'pregunta_titulo',
        'test_id'
    ];
    protected $dates=['deleted_at'];

    public function test(){
        return $this->belongsTo('App\Test');
    }
    public function respuestas(){
        return $this->hasMany('App\Respuesta');
    }
}
