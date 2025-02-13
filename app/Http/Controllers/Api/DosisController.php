<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Dosis;
use App\Http\Controllers\Controller;

class DosisController extends Controller
{
    //TENDRIA QUE SER UNA TRANSACCION: REGISTRAR DOSIS Y VIDEOSEGUIMIENTO EN 1 METODO 
    //AGREGAR UN METODO SUPER GET DONDE NO SOLO MUESTRE DATOS DE 1 TABLA SINO DE VARIAS TABLAS 

    /**
     * PARA HACER CORRER LARAVEL: php artisan serve --port=8000
     * Mostrar todas las dosis.  [GET]   http://127.0.0.1:8000/api/dosis
     */
    public function index() 
    {   
        return response()->json(Dosis::all(), 200);
    }

    /**
     * Crear una nueva dosis. [POST]   http://127.0.0.1:8000/api/dosis
     */
    public function store(Request $request)
    {  // !cambios
        $request->validate([
            'numeroDosis' => 'required|integer',
            'fechaDosis' => 'required|date',
            'fecha' => 'nullable|date',
            'extension' => 'nullable|string',
            'estado' => 'nullable|string',
            'idTratamiento' => 'required|integer|exists:tratamientos,id',
            'fechaRegistro' => 'nullable|date',
            'fechaActualizacion' => 'nullable|date',
            'registradoPor' => 'nullable|integer'
        ]);

        // $dosis = Dosis::create($request->all());

        // return response()->json($dosis, 201);
        //FALTA REGISTRAR UNA DOSIS CON SU VIDEO PARA LA PARTE MOVIL


    }

    /**
     * Mostrar una dosis específica. [GET]    http://127.0.0.1:8000/api/dosis/1
     */
    public function show($id)   // !cambios
    {
        //POSIBLEMENTE AGREGAR LA LISTA DE TODOS LOS VIDEOS A ESA DOSIS
        $dosis = Dosis::find($id);
        if (!$dosis) {
            return response()->json(['message' => 'Dosis no encontrada'], 404);
        }
        return response()->json($dosis, 200);
    }

    /**
     * Actualizar una dosis. [PUT] http://127.0.0.1:8000/api/dosis/1
     */
    public function update(Request $request, $id)
    {
        
        $dosis = Dosis::find($id);
        if (!$dosis) {
            return response()->json(['message' => 'Dosis no encontrada'], 404);
        }

        $request->validate([
            'numeroDosis' => 'sometimes|integer',
            'fechaDosis' => 'sometimes|date',
            'fecha' => 'sometimes|date',
            'extension' => 'sometimes|string',
            'estado' => 'sometimes|string',
            'idTratamiento' => 'sometimes|integer|exists:tratamientos,id',
            'fechaRegistro' => 'sometimes|date',
            'fechaActualizacion' => 'sometimes|date',
            'registradoPor' => 'sometimes|integer'
        ]);

        $dosis->update($request->all());

        return response()->json($dosis, 200);
    }

    /**
     * Eliminar una dosis.  [DELETE] http://127.0.0.1:8000/api/dosis/1
     */
    public function destroy($id)
    { 
        $dosis = Dosis::find($id);
        if (!$dosis) {
            return response()->json(['message' => 'Dosis no encontrada'], 404);
        }

        $dosis->delete();
        return response()->json(['message' => 'Dosis eliminada'], 200);
    }
}
