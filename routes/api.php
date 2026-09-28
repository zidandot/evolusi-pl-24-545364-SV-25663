<?php

use App\Models\Tugas;
use Illuminate\Support\Facades\Route;

Route::get('/tugas', function () {
    return response()->json(Tugas::all());
});
