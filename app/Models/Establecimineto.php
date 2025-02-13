<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Establecimineto
 * 
 * @property int $id
 * @property string $nombre
 * @property string $telefono
 * @property int $idRedSalud
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Redsalud $redsalud
 * @property Collection|Historialmedico[] $historialmedicos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Establecimineto extends Model
{
	protected $table = 'establecimineto';
	public $timestamps = false;

	protected $casts = [
		'idRedSalud' => 'int',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'nombre',
		'telefono',
		'idRedSalud',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function redsalud()
	{
		return $this->belongsTo(Redsalud::class, 'idRedSalud');
	}

	public function historialmedicos()
	{
		return $this->hasMany(Historialmedico::class, 'idEstablecimineto');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'idEstablecimineto');
	}
}
