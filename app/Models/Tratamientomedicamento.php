<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tratamientomedicamento
 * 
 * @property int $id
 * @property int $idTratamiento
 * @property int $idMedicamento
 * @property int $cantidad
 * @property Carbon|null $fechaRegistro
 * @property int $registradoPor
 * 
 * @property Tratamiento $tratamiento
 * @property Medicamento $medicamento
 *
 * @package App\Models
 */
class Tratamientomedicamento extends Model
{
	protected $table = 'tratamientomedicamento';
	public $timestamps = false;

	protected $casts = [
		'idTratamiento' => 'int',
		'idMedicamento' => 'int',
		'cantidad' => 'int',
		'fechaRegistro' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'idTratamiento',
		'idMedicamento',
		'cantidad',
		'fechaRegistro',
		'registradoPor'
	];

	public function tratamiento()
	{
		return $this->belongsTo(Tratamiento::class, 'idTratamiento');
	}

	public function medicamento()
	{
		return $this->belongsTo(Medicamento::class, 'idMedicamento');
	}
}
