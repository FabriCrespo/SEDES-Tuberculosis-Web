<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sede
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Collection|Redsalud[] $redsaluds
 *
 * @package App\Models
 */
class Sede extends Model
{
	protected $table = 'sede';
	public $timestamps = false;

	protected $casts = [
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'nombre',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function redsaluds()
	{
		return $this->hasMany(Redsalud::class, 'idSede');
	}
}
