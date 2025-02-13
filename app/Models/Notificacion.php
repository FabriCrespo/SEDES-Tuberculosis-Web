<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notificacion
 * 
 * @property int $id
 * @property string $mensaje
 * @property Carbon $fechaNotificacion
 * @property string|null $leido
 * @property int $idUsuario
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Notificacion extends Model
{
	protected $table = 'notificacion';
	public $timestamps = false;

	protected $casts = [
		'fechaNotificacion' => 'datetime',
		'idUsuario' => 'int',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'mensaje',
		'fechaNotificacion',
		'leido',
		'idUsuario',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'idUsuario');
	}
}
