<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'numero_carnet',
        'expedicion',
        'estado_civil',
        'fecha_nacimiento',
        'lugar',
        'nacionalidad',
        'direccion',
        'telefono_celular',
        'email',
        'sexo',
        'academico_grado',
        'academico_gestion',
        'academico_institucion',
        'academico_titulo',
        'credencializacion_fotografia',
        'telefono',
        'fax',
        'casilla_postal',
        'numero_libreta_militar',
        'aprobado',
        'nivel_completo',
        'es_admin',
        'nivel_id',
        'cargo_id',
        'password',
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function cargo(){
        return $this->belongsTo('App\Cargo');
    }
    public function nivel(){
        return $this->belongsTo('App\Nivel');
    }
}
