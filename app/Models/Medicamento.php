<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicamento
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Collection|Tratamiento[] $tratamientos
 *
 * @package App\Models
 */
class Medicamento extends Model
{
	protected $table = 'medicamento';
	public $timestamps = false;

	protected $casts = [
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function tratamientos()
	{
		return $this->belongsToMany(Tratamiento::class, 'tratamientomedicamento', 'idMedicamento', 'idTratamiento')
					->withPivot('id', 'cantidad', 'fechaRegistro', 'registradoPor');
	}
}
