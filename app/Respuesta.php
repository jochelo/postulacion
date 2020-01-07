<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respuesta extends Model
{
    use SoftDeletes;
    protected $table='respuestas';
    protected $primaryKey='respuesta_id';
    protected $fillable=[
        'respuesta_descripcion',
        'correcto',
        'pregunta_id',
    ];
    protected $dates=['deleted_at'];


    public function pregunta(){
        return $this->belongsTo('App\Pregunta');
    }
}
