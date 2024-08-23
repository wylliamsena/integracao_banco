<?php

use App\Http\Controllers\usuarioController;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// declaramos uma rota para executar a fusão store
Route::post('/usuario', [usuarioController::class, 'store']);