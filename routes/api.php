<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Str::singular('tugas') menghasilkan "tuga", jadi nama parameter
// route harus dipaksa ke "tugas" agar cocok dengan signature controller.
Route::apiResource('tugas', PostController::class)
    ->parameters(['tugas' => 'tugas']);
