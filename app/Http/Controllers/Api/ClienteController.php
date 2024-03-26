<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente; // Import the Cliente model

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all clientes
        $clientes = Cliente::all();

        // Return the list of clientes as JSON response
        return response()->json(['clientes' => $clientes], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nome' => 'required|string',
        ]);

        // Create the new cliente
        $cliente = Cliente::create($validatedData);

        // Return the newly created cliente as JSON response
        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the cliente by ID
        $cliente = Cliente::findOrFail($id);

        // Return the cliente as JSON response
        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nome' => 'string',
            'email' => 'email|unique:clientes,email,'.$id,
            'senha' => 'string',
            'saldo_bonus' => 'numeric',
        ]);

        // Find the cliente by ID
        $cliente = Cliente::findOrFail($id);

        // Update the cliente with the validated data
        $cliente->update($validatedData);

        // Return the updated cliente as JSON response
        return response()->json($cliente, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the cliente by ID and delete it
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        // Return a success message
        return response()->json(['message' => 'Cliente deleted successfully'], 200);
    }
}
