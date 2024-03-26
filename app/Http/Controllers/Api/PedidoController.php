<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Pedido; // Assuming Pedido is your model

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all orders
        $pedidos = Pedido::all();

        // Return response
        return response()->json(['data' => $pedidos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'id_cliente' => 'required|integer',
            'id_estabelecimento' => 'required|integer',
            'id_produto' => 'required|integer',
        ]);

        // Create order
        $retProd = Produto::find($request->id_produto);

        // Create order with current date
        $pedido = Pedido::create([
            'id_cliente' => $request->id_cliente,
            'id_estabelecimento' => $request->id_estabelecimento,
            'id_produto' => $request->id_produto,
            'quantidade' => $request->quantity,
            'valor_total' => $retProd->preco * $request->quantity,
            'data_pedido' => date('Y-m-d'), // Set the current date
            'status' => 1
        ]);

        //Update Amount user Client

        $retClient = Cliente::find($request->id_cliente);
        $retClient->update([
            'saldo_bonus' => $retClient->saldo_bonus - $retProd->preco * $request->quantity
        ]);


        // Return response
        return response()->json(['data' => $pedido], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the order by id
        $pedido = Pedido::findOrFail($id);

        // Return response
        return response()->json(['data' => $pedido]);
    }


    public function searchInvoiceByFilters($id){

        $pedidos = Pedido::with('produtos')->with('cliente')->where('id_estabelecimento', $id)->get();

        return response()->json(['invoices' => $pedidos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the order by id
        $pedido = Pedido::findOrFail($id);

        // Validate request data
        $request->validate([
            'id_cliente' => 'integer',
            'id_estabelecimento' => 'integer',
            'valor_total' => 'numeric',
            'status' => 'integer'
        ]);

        // Update order
        $pedido->update($request->all());

        // Return response
        return response()->json(['data' => $pedido]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the order by id and delete it
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        // Return response
        return response()->json(['message' => 'Pedido deleted successfully']);
    }
}
