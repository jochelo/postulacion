<?php

use App\Cargo;
use App\Nivel;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $cargo = Cargo::create([
            'nivel_maximo' => 1,
            'cargo_descripcion' => 'Administrador',
        ]);
        $nivel = Nivel::create([
            'nivel_numero' => 0,
            'nivel_descripcion' => 'Postulacion',
            'numero_requisitos' => 0
        ]);

        User::create([
            'nombres' => 'Admin',
            'apellido_paterno' => 'Admin',
            'apellido_materno' => 'Admin',
            'numero_carnet' => '0',
            'expedicion' => 'OR',
            'foto_carnet' => '/',
            'estado_civil' => 'Soltero',
            'fecha_nacimiento' => '1990-05-16',
            'lugar' => 'Oruro',
            'nacionalidad' => 'Bolivia',
            'direccion' => 'Direccion',
            'telefono_celular' => '0',
            'email' => 'admin@serecioruro.com',
            'password' => bcrypt('Admin2020$$'),
            'sexo' => 'varon',
            'academico_grado' => 'Licenciatura',
            'academico_gestion' => 2019,
            'academico_institucion' => 'UTO',
            'academico_titulo' => 'Ingeniero',
            'credencializacion_fotografia' => 'foto',
            'nivel_id' => $nivel->nivel_id,
            'cargo_id' => $cargo->cargo_id,
            'es_admin' => true,
            'disponibilidad' => true
        ]);
        $cargos = [
            'Coordinador General',
            'Coordinador Provincia',
            'Notario Operador',
            'Auxiliar Administrativo Financiero',
            'Capacitador Control de Calidad',
            'Tecnico Logistica',
            'Tecnico de Sorporte Informatico',
            'Tecnico Auxiliar',
            'Tecnico en Comunicacion en Informacion',
            'Comunicador Social',
        ];
        foreach ($cargos as $cargoItem) {
            Cargo::create([
                'nivel_maximo' => 1,
                'cargo_descripcion' => $cargoItem
            ]);
        }
    }
}
