<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Tugas;

Route::get('/', function () {
    return view('landing');
});

Route::get('/', function () {
    return response()->json(Tugas::all());
});

Route::resource('posts', PostController::class);
