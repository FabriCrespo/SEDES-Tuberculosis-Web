<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dosis
 * 
 * @property int $id
 * @property int $numeroDosis
 * @property Carbon $fechaDosis
 * @property Carbon|null $fecha
 * @property string|null $extension
 * @property string $estado
 * @property int $idTratamiento
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Tratamiento $tratamiento
 * @property Collection|Videoseguimiento[] $videoseguimientos
 *
 * @package App\Models
 */
class Dosis extends Model
{
	protected $table = 'dosis';
	public $timestamps = false;

	protected $casts = [
		'numeroDosis' => 'int',
		'fechaDosis' => 'datetime',
		'fecha' => 'datetime',
		'idTratamiento' => 'int',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'numeroDosis',
		'fechaDosis',
		'fecha',
		'extension',
		'estado',
		'idTratamiento',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function tratamiento()
	{
		return $this->belongsTo(Tratamiento::class, 'idTratamiento');
	}

	public function videoseguimientos()
	{
		return $this->hasMany(Videoseguimiento::class, 'idDosis');
	}
}
