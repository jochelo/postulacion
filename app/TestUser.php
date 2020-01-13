<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestUser extends Model
{
    use SoftDeletes;
    protected $table='test_users';
    protected $primaryKey='test_user_id';
    protected $fillable=[
        'nota',
        'user_id',
        'test_id',
        'nivel_id',
    ];
    protected $dates=['deleted_at'];
    protected $appends = ['user', 'respuestas'];
    public function respuestaUsers(){
        return $this->hasMany('App\RespuestaUser');
    }

    public function getUserAttribute() {
        return User::find($this->user_id);
    }
    public function getRespuestasAttribute() {
        return RespuestaUser::where('test_user_id', $this->getKey())->get();
    }

}
