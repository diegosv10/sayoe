<?php

namespace App;

use App\InfoAcadem;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model 
{
    protected $table='alumnos';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'apellido_materno', 'apellido_paterno', 'dni', 'sexo', 'fecha_nacimiento',
        'telefono', 'celular', 'direccion', 'correo_personal', 'id_usuario', 
        'id_escuela'
    ];

    public static function idAlumno ($codigo)
    {
        return (Alumno::select('id')->find($codigo))["id"];
    }

    public static function alumnosCiclo($ciclo) {
        $listId = InfoAcadem::where('ciclo', $ciclo)->get(['id_alumno']);
        return Alumno::whereIn('id', $listId)->get();
    }

    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'id_usuario', 'id');
    }

    public function escuelaProfesional()
    {
        return $this->belongsTo('App\EscuelaProfesional', 'id_escuela', 'id');
    }

    public function cursosObservados()
    {
        return $this->hasMany('App\CursoObservado', 'id_alumno', 'id');
    }

    public function infoAcadem()
    {
        return $this->hasOne('App\InfoAcadem', 'id_alumno', 'id');
    }

    public function citas()
    {
        return $this->hasMany('App\Cita', 'id_alumno', 'id');
    }

    public function perfilesPsicologicos()
    {
        return $this->hasMany('App\PerfilPsicologico', 'id_alumno', 'id');
    }
}
