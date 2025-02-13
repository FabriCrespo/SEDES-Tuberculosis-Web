<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
      /**
     * Mostrar todos los usuarios.
     */
    public function index()
    {
        return response()->json(Usuario::all(), 200);
    }

    /**
     * Crear un nuevo usuario.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|string|unique:usuario,ci',
            'nombres' => 'required|string',
            'primerApellido' => 'required|string',
            'segundoApellido' => 'nullable|string',
            'celular' => 'required|string',
            'sexo' => 'required|string|in:M,F',
            'fechaNacimiento' => 'required|date',
            'nombre_usuario' => 'required|string|unique:usuario,nombre_usuario',
            'contraseña' => 'required|string|min:6',
            'rol' => 'required|string',
            'idEstablecimineto' => 'required|integer|exists:establecimineto,id',
            'estado' => 'required|string',
            'fechaRegistro' => 'nullable|date',
            'fechaActualizacion' => 'nullable|date',
            'registradoPor' => 'nullable|integer'
        ]);

        // Encriptar la contraseña antes de guardarla
        $usuarioData = $request->all();
        $usuarioData['contraseña'] = bcrypt($request->contraseña);

        $usuario = Usuario::create($usuarioData);

        return response()->json($usuario, 201);
    }

    /**
     * Mostrar un usuario específico.
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($usuario, 200);
    }

    /**
     * Actualizar un usuario.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'ci' => 'sometimes|string|unique:usuario,ci,' . $id,
            'nombres' => 'sometimes|string',
            'primerApellido' => 'sometimes|string',
            'segundoApellido' => 'sometimes|string',
            'celular' => 'sometimes|string',
            'sexo' => 'sometimes|string|in:M,F',
            'fechaNacimiento' => 'sometimes|date',
            'nombre_usuario' => 'sometimes|string|unique:usuario,nombre_usuario,' . $id,
            'contraseña' => 'sometimes|string|min:6',
            'rol' => 'sometimes|string',
            'idEstablecimineto' => 'sometimes|integer|exists:establecimineto,id',
            'estado' => 'sometimes|string',
            'fechaRegistro' => 'sometimes|date',
            'fechaActualizacion' => 'sometimes|date',
            'registradoPor' => 'sometimes|integer'
        ]);

        // Si se envía una nueva contraseña, encriptarla
        if ($request->has('contraseña')) {
            $usuario->contraseña = bcrypt($request->contraseña);
        }

        $usuario->update($request->except('contraseña'));

        return response()->json($usuario, 200);
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado'], 200);
    }
}
