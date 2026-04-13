<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asistente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Throwable;

class AsistenteController extends Controller
{
    public function index()
    {
        try {
            $asistentes = Asistente::with('evento')->get();

            return response()->json([
                'message' => 'Asistentes recuperados correctamente.',
                'data' => $asistentes,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al recuperar los asistentes.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:asistentes,email',
            'telefono' => 'required|string|max:20',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de entrada invalidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $asistente = Asistente::create($validator->validated());
            $asistente->load('evento');

            return response()->json([
                'message' => 'Asistente creado correctamente.',
                'data' => $asistente,
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al crear el asistente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $asistente = Asistente::with('evento')->find($id);

            if (!$asistente) {
                return response()->json([
                    'message' => 'Asistente no encontrado.',
                ], 404);
            }

            return response()->json([
                'message' => 'Asistente recuperado correctamente.',
                'data' => $asistente,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al recuperar el asistente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('asistentes', 'email')->ignore($id),
            ],
            'telefono' => 'required|string|max:20',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de entrada invalidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $asistente = Asistente::find($id);

            if (!$asistente) {
                return response()->json([
                    'message' => 'Asistente no encontrado.',
                ], 404);
            }

            $asistente->update($validator->validated());
            $asistente->load('evento');

            return response()->json([
                'message' => 'Asistente actualizado correctamente.',
                'data' => $asistente,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al actualizar el asistente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $asistente = Asistente::find($id);

            if (!$asistente) {
                return response()->json([
                    'message' => 'Asistente no encontrado.',
                ], 404);
            }

            $asistente->delete();

            return response()->json([
                'message' => 'Asistente eliminado correctamente.',
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al eliminar el asistente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
