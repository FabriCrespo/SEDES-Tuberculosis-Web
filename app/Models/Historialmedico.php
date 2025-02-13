<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Historialmedico
 * 
 * @property int $id
 * @property string $descripcion
 * @property string $imagen
 * @property int $idPaciente
 * @property int $idEstablecimineto
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Paciente $paciente
 * @property Establecimineto $establecimineto
 *
 * @package App\Models
 */
class Historialmedico extends Model
{
	protected $table = 'historialmedico';
	public $timestamps = false;

	protected $casts = [
		'idPaciente' => 'int',
		'idEstablecimineto' => 'int',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'imagen',
		'idPaciente',
		'idEstablecimineto',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function paciente()
	{
		return $this->belongsTo(Paciente::class, 'idPaciente');
	}

	public function establecimineto()
	{
		return $this->belongsTo(Establecimineto::class, 'idEstablecimineto');
	}
}
