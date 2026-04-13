<?php

use App\Http\Controllers\Api\AsistenteController;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\PonenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::apiResource('eventos', EventoController::class);
Route::apiResource('ponentes', PonenteController::class);

Route::prefix('asistentes')->group(function () {
    Route::get('/', [AsistenteController::class, 'index'])->name('asistentes.index');
    Route::post('/', [AsistenteController::class, 'store'])->name('asistentes.store');
    Route::get('/{id}', [AsistenteController::class, 'show'])->name('asistentes.show');
    Route::put('/{id}', [AsistenteController::class, 'update'])->name('asistentes.update');
    Route::patch('/{id}', [AsistenteController::class, 'update']);
    Route::delete('/{id}', [AsistenteController::class, 'destroy'])->name('asistentes.destroy');
});
