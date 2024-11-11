<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CITController;
use App\Http\Controllers\AUTController;
use App\Http\Controllers\HCAController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas del API

// Route::post('/api/CIT/crearcita', [CITController::class, 'create'])->name('citascreate'); // Recibir datos de un formulario normal
Route::get('/api/cit/doctor/{idmedicop}', [CITController::class, 'citasMedico'])->name('citasmedico');
Route::post('/api/cit/insert', [CITController::class, 'storeRecords'])->name('crearcitas');

// [ EN PRUEBAS ]
Route::post('/api/aut/enviar', [AUTController::class, 'receiveMedicalOrden'])->name('guardarordenes');
Route::post('/api/hca/enviar', [HCAController::class, 'saveMedicalRegister'])->name('guardarhistorias');
