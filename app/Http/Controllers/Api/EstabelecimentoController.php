<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estabelecimento;

class EstabelecimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estabelecimentos = Estabelecimento::with('categoria')->get();
        return response()->json(['estabelecimentos' => $estabelecimentos], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'categoria_id' => 'required|integer|exists:categoria_estabelecimentos,categoria_id',
            'endereco' => 'required|string',
        ]);

        $estabelecimento = Estabelecimento::create($request->all());
        return response()->json($estabelecimento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estabelecimento = Estabelecimento::find($id);
        if (!$estabelecimento) {
            return response()->json(['message' => 'Estabelecimento not found'], 404);
        }
        return response()->json($estabelecimento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estabelecimento = Estabelecimento::find($id);
        if (!$estabelecimento) {
            return response()->json(['message' => 'Estabelecimento not found'], 404);
        }

        // Validate the incoming request
        $request->validate([
            'id_categoria_estabelecimento' => 'required|integer',
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'telefone' => 'required|string'
        ]);

        $estabelecimento->update($request->all());
        return response()->json($estabelecimento, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estabelecimento = Estabelecimento::find($id);
        if (!$estabelecimento) {
            return response()->json(['message' => 'Estabelecimento not found'], 404);
        }
        $estabelecimento->delete();
        return response()->json(null, 204);
    }
}

