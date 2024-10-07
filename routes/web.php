<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CITController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas del API

// Route::post('/api/CIT/crearcita', [CITController::class, 'create'])->name('citascreate'); // Recibir datos de un formulario normal
Route::get('/api/cit/doctor/{idmedicop}', [CITController::class, 'citasMedico'])->name('citasmedico');
Route::post('/api/cit/insert', [CITController::class, 'storeRecords'])->name('crearcitas');
