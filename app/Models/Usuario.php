<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $ci
 * @property string $nombres
 * @property string $primerApellido
 * @property string $segundoApellido
 * @property string|null $celular
 * @property string $sexo
 * @property Carbon $fechaNacimiento
 * @property string $nombre_usuario
 * @property string $contraseña
 * @property string $rol
 * @property int $idEstablecimineto
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Establecimineto $establecimineto
 * @property Collection|Notificacion[] $notificacions
 * @property Paciente $paciente
 * @property Collection|Paciente[] $pacientes
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	public $timestamps = false;

	protected $casts = [
		'fechaNacimiento' => 'datetime',
		'idEstablecimineto' => 'int',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'ci',
		'nombres',
		'primerApellido',
		'segundoApellido',
		'celular',
		'sexo',
		'fechaNacimiento',
		'nombre_usuario',
		'contraseña',
		'rol',
		'idEstablecimineto',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function establecimineto()
	{
		return $this->belongsTo(Establecimineto::class, 'idEstablecimineto');
	}

	public function notificacions()
	{
		return $this->hasMany(Notificacion::class, 'idUsuario');
	}

	public function paciente()
	{
		return $this->hasOne(Paciente::class, 'id');
	}

	public function pacientes()
	{
		return $this->hasMany(Paciente::class, 'idusuarioAsignado');
	}
}
