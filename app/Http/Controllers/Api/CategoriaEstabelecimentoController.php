<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaEstabelecimento;

class CategoriaEstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all categories
        $categorias = CategoriaEstabelecimento::all();

        // Return response
        return response()->json(['categorias' => $categorias], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        // Create new category
        $categoria = CategoriaEstabelecimento::create([
            'nome' => $request->nome
        ]);

        // Return response
        return response()->json(['categoria' => $categoria], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find category by ID
        $categoria = CategoriaEstabelecimento::find($id);

        // Check if category exists
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        // Return response
        return response()->json(['categoria' => $categoria], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find category by ID
        $categoria = CategoriaEstabelecimento::find($id);

        // Check if category exists
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        // Validate request
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        // Update category
        $categoria->update([
            'nome' => $request->nome
        ]);

        // Return response
        return response()->json(['categoria' => $categoria], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find category by ID
        $categoria = CategoriaEstabelecimento::find($id);

        // Check if category exists
        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        // Delete category
        $categoria->delete();

        // Return response
        return response()->json(['message' => 'Categoria deletada com sucesso'], 200);
    }
}
