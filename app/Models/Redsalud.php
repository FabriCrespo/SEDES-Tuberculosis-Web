<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Redsalud
 * 
 * @property int $id
 * @property string $nombre
 * @property int $idSede
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Sede $sede
 * @property Collection|Establecimineto[] $estableciminetos
 *
 * @package App\Models
 */
class Redsalud extends Model
{
	protected $table = 'redsalud';
	public $timestamps = false;

	protected $casts = [
		'idSede' => 'int',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'nombre',
		'idSede',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function sede()
	{
		return $this->belongsTo(Sede::class, 'idSede');
	}

	public function estableciminetos()
	{
		return $this->hasMany(Establecimineto::class, 'idRedSalud');
	}
}
