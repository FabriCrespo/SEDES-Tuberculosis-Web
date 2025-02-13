<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Http\Controllers\Controller;

class MedicamentoController extends Controller
{
    /**
     * Mostrar todos los medicamentos. [GET] http://127.0.0.1:8000/api/medicamentos
     */
    public function index()
    {
        return response()->json(Medicamento::all(), 200);
    }

    /**
     * Crear un nuevo medicamento. [POST] http://127.0.0.1:8000/api/medicamentos
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'nullable|string',
            'fechaRegistro' => 'nullable|date',
            'fechaActualizacion' => 'nullable|date',
            'registradoPor' => 'required|integer'
        ]);

        $medicamento = Medicamento::create($request->all());

        return response()->json($medicamento, 201);
    }

    /**
     * Mostrar un medicamento específico. [GET] http://127.0.0.1:8000/api/medicamentos/{id}
     */
    public function show($id)
    {
        $medicamento = Medicamento::find($id);
        if (!$medicamento) {
            return response()->json(['message' => 'Medicamento no encontrado'], 404);
        }
        return response()->json($medicamento, 200);
    }

    /**
     * Actualizar un medicamento. [PUT] http://127.0.0.1:8000/api/medicamentos/{id}
     */
    public function update(Request $request, $id)
    {
        $medicamento = Medicamento::find($id);
        if (!$medicamento) {
            return response()->json(['message' => 'Medicamento no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'estado' => 'sometimes|string',
            'fechaRegistro' => 'sometimes|date',
            'fechaActualizacion' => 'sometimes|date',
            'registradoPor' => 'sometimes|integer'
        ]);

        $medicamento->update($request->all());

        return response()->json($medicamento, 200);
    }

    /**
     * Eliminar un medicamento. [DELETE] http://127.0.0.1:8000/api/medicamentos/{id}
     */
    public function destroy($id)
    {
        $medicamento = Medicamento::find($id);
        if (!$medicamento) {
            return response()->json(['message' => 'Medicamento no encontrado'], 404);
        }

        $medicamento->delete();
        return response()->json(['message' => 'Medicamento eliminado'], 200);
    }
}