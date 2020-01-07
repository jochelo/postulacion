<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisito extends Model
{
    use SoftDeletes;
    protected $table = 'requisitos';
    protected $primaryKey = 'requisito_id';
    protected $fillable=[
        'tipo_documento',
        'activo',
        'nivel_id',
        'con_archivo_adjunto'
    ];
    protected $dates = ['deleted_at'];

    public function nivel(){
        return $this->belongsTo('App\Nivel');
    }
}
