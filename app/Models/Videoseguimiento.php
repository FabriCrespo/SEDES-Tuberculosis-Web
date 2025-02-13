<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Videoseguimiento
 * 
 * @property int $id
 * @property int $idDosis
 * @property string $video
 * @property string|null $descripcion
 * @property Carbon $fechaGrabacion
 * @property string|null $estado
 * @property Carbon|null $fechaRegistro
 * @property Carbon|null $fechaActualizacion
 * @property int $registradoPor
 * 
 * @property Dosis $dosi
 *
 * @package App\Models
 */
class Videoseguimiento extends Model
{
	protected $table = 'videoseguimiento';
	public $timestamps = false;

	protected $casts = [
		'idDosis' => 'int',
		'fechaGrabacion' => 'datetime',
		'fechaRegistro' => 'datetime',
		'fechaActualizacion' => 'datetime',
		'registradoPor' => 'int'
	];

	protected $fillable = [
		'idDosis',
		'video',
		'descripcion',
		'fechaGrabacion',
		'estado',
		'fechaRegistro',
		'fechaActualizacion',
		'registradoPor'
	];

	public function dosi()
	{
		return $this->belongsTo(Dosi::class, 'idDosis');
	}
}
