<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tratamiento
 * 
 * @property int $id
 * @property string $fase
 * @property Carbon $fechaInicio
 * @property Carbon $fechaFin
 * @property int $dosisTotales
 * @property int $dosisCompletadas
 * @property string $extendido
 * @property int $idPaciente
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Paciente $paciente
 * @property Collection|Dosis[] $dosis
 * @property Collection|Medicamento[] $medicamentos
 *
 * @package App\Models
 */
class Tratamiento extends Model
{
	protected $table = 'tratamiento';
	public $timestamps = false;

	protected $casts = [
		'fechaInicio' => 'datetime',
		'fechaFin' => 'datetime',
		'dosisTotales' => 'int',
		'dosisCompletadas' => 'int',
		'idPaciente' => 'int',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'fase',
		'fechaInicio',
		'fechaFin',
		'dosisTotales',
		'dosisCompletadas',
		'extendido',
		'idPaciente',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function paciente()
	{
		return $this->belongsTo(Paciente::class, 'idPaciente');
	}

	public function dosis()
	{
		return $this->hasMany(Dosi::class, 'idTratamiento');
	}

	public function medicamentos()
	{
		return $this->belongsToMany(Medicamento::class, 'tratamientomedicamento', 'idTratamiento', 'idMedicamento')
					->withPivot('id', 'cantidad', 'fechaRegistro', 'registradoPor');
	}
}
