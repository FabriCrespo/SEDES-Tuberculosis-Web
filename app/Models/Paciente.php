<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 * 
 * @property int $id
 * @property string|null $direccion
 * @property string|null $celularEmergencia
 * @property Carbon $fechaInicioTratamiento
 * @property int|null $idusuarioAsignado
 * 
 * @property Usuario|null $usuario
 * @property Collection|Historialmedico[] $historialmedicos
 * @property Collection|Tratamiento[] $tratamientos
 *
 * @package App\Models
 */
class Paciente extends Model
{
	protected $table = 'paciente';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaInicioTratamiento' => 'datetime',
		'idusuarioAsignado' => 'int'
	];

	protected $fillable = [
		'direccion',
		'celularEmergencia',
		'fechaInicioTratamiento',
		'idusuarioAsignado'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'idusuarioAsignado');
	}

	public function historialmedicos()
	{
		return $this->hasMany(Historialmedico::class, 'idPaciente');
	}

	public function tratamientos()
	{
		return $this->hasMany(Tratamiento::class, 'idPaciente');
	}
}
