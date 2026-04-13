<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ponente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Throwable;

class PonenteController extends Controller
{
    public function index()
    {
        try {
            $ponentes = Ponente::with('evento')->get();

            return response()->json([
                'message' => 'Ponentes recuperados correctamente.',
                'data' => $ponentes,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al recuperar los ponentes.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:ponentes,email',
            'especialidad' => 'required|string|max:255',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de entrada invalidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $ponente = Ponente::create($validator->validated());
            $ponente->load('evento');

            return response()->json([
                'message' => 'Ponente creado correctamente.',
                'data' => $ponente,
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al crear el ponente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $ponente = Ponente::with('evento')->find($id);

            if (!$ponente) {
                return response()->json([
                    'message' => 'Ponente no encontrado.',
                ], 404);
            }

            return response()->json([
                'message' => 'Ponente recuperado correctamente.',
                'data' => $ponente,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al recuperar el ponente.',
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
                Rule::unique('ponentes', 'email')->ignore($id),
            ],
            'especialidad' => 'required|string|max:255',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de entrada invalidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $ponente = Ponente::find($id);

            if (!$ponente) {
                return response()->json([
                    'message' => 'Ponente no encontrado.',
                ], 404);
            }

            $ponente->update($validator->validated());
            $ponente->load('evento');

            return response()->json([
                'message' => 'Ponente actualizado correctamente.',
                'data' => $ponente,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al actualizar el ponente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $ponente = Ponente::find($id);

            if (!$ponente) {
                return response()->json([
                    'message' => 'Ponente no encontrado.',
                ], 404);
            }

            $ponente->delete();

            return response()->json([
                'message' => 'Ponente eliminado correctamente.',
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al eliminar el ponente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
