<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivel extends Model
{
    use SoftDeletes;
    protected $table = 'niveles';
    protected $primaryKey = 'nivel_id';
    protected $fillable = [
        'nivel_numero',
        'nivel_descripcion',
        'num_requisitos',
    ];
    protected $dates = ['deleted_at'];
    public function users(){
        return $this->hasMany('App\User');
    }
    public function tests(){
        return $this->hasMany('App\Test');
    }
    public function requisitos(){
        return $this->hasMany('App\Requisito');
    }
}
