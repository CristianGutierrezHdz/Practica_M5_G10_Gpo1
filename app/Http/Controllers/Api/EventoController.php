<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class EventoController extends Controller
{
    public function index()
    {
        try {
            $eventos = Evento::all();

            return response()->json([
                'message' => 'Eventos recuperados correctamente.',
                'data' => $eventos,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al recuperar los eventos.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'ubicacion' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de entrada invalidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $evento = Evento::create($validator->validated());

            return response()->json([
                'message' => 'Evento creado correctamente.',
                'data' => $evento,
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al crear el evento.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $evento = Evento::find($id);

            if (!$evento) {
                return response()->json([
                    'message' => 'Evento no encontrado.',
                ], 404);
            }

            return response()->json([
                'message' => 'Evento recuperado correctamente.',
                'data' => $evento,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al recuperar el evento.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'ubicacion' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos de entrada invalidos.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $evento = Evento::find($id);

            if (!$evento) {
                return response()->json([
                    'message' => 'Evento no encontrado.',
                ], 404);
            }

            $evento->update($validator->validated());

            return response()->json([
                'message' => 'Evento actualizado correctamente.',
                'data' => $evento,
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al actualizar el evento.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $evento = Evento::find($id);

            if (!$evento) {
                return response()->json([
                    'message' => 'Evento no encontrado.',
                ], 404);
            }

            $evento->delete();

            return response()->json([
                'message' => 'Evento eliminado correctamente.',
            ], 200);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Error al eliminar el evento.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
