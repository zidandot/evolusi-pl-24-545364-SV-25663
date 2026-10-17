<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Tugas::latest()->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $tugas = Tugas::create($validated);

        return response()->json($tugas, 201);
    }

    public function show(Tugas $tugas): JsonResponse
    {
        return response()->json($tugas);
    }

    public function update(Request $request, Tugas $tugas): JsonResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $tugas->update($validated);

        return response()->json($tugas->refresh());
    }

    public function destroy(Tugas $tugas): Response
    {
        $tugas->delete();

        return response()->noContent();
    }
}
