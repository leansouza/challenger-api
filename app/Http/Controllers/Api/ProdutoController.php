<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto; // Assuming you have a Produto model

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all produtos
        $produtos = Produto::with('categoria')->with('estabelecimento')->get();

        // Return response

        return response()->json(['produtos' => $produtos], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'id_categoria' => 'required|numeric',
            'id_estabelecimento' => 'required|exists:estabelecimentos,id_estabelecimento'
        ]);

        // Create new produto
        $produto = Produto::create($validatedData);

        // Return response
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the produto
        $produto = Produto::findOrFail($id);

        // Return response
        return response()->json($produto);
    }


    public function showByEstabelecimento($idEstabelecimento){
        $produtos = Produto::with('categoria', 'estabelecimento')->where('id_estabelecimento', $idEstabelecimento)->get();


        return response()->json(['produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate request data
        $validatedData = $request->validate([
            'nome' => 'string',
            'descricao' => 'nullable|string',
            'preco' => 'numeric',
            'id_estabelecimento' => 'exists:estabelecimentos,id_estabelecimento'
        ]);

        // Find the produto
        $produto = Produto::findOrFail($id);

        // Update produto
        $produto->update($validatedData);

        // Return response
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the produto
        $produto = Produto::findOrFail($id);

        // Delete produto
        $produto->delete();

        // Return response
        return response()->json(['message' => 'Produto deleted successfully']);
    }
}
