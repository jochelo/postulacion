<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregunta extends Model
{
    use SoftDeletes;
    protected $table = 'preguntas';
    protected $primaryKey = 'pregunta_id';
    protected $fillable = [
        'pregunta_titulo',
        'test_id'
    ];
    protected $dates = ['deleted_at'];
    protected $appends = ['test_titulo', 'respuestas'];

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }

    public function getTestTituloAttribute()
    {
        return Test::find($this->test_id)->titulo;
    }
    public function getRespuestasAttribute() {
        return Respuesta::where('pregunta_id', $this->pregunta_id)->get();
    }
}
