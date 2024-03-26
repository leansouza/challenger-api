<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoriaEstabelecimentoController;
use App\Http\Controllers\Api\EstabelecimentoController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PedidoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Routes for CategoriaEstabelecimentoController
Route::get('/categorias', [CategoriaEstabelecimentoController::class, 'index']);
Route::post('/categorias', [CategoriaEstabelecimentoController::class, 'store']);
Route::get('/categorias/{id}', [CategoriaEstabelecimentoController::class, 'show']);
Route::put('/categorias/{id}', [CategoriaEstabelecimentoController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaEstabelecimentoController::class, 'destroy']);

Route::get('/estabelecimentos', [EstabelecimentoController::class, 'index']);
Route::post('/estabelecimentos', [EstabelecimentoController::class, 'store']);
Route::get('/estabelecimentos/{id}', [EstabelecimentoController::class, 'show']);
Route::put('/estabelecimentos/{id}', [EstabelecimentoController::class, 'update']);
Route::delete('/estabelecimentos/{id}', [EstabelecimentoController::class, 'destroy']);

Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
Route::get('/produtos/estabelecimento/{id}', [ProdutoController::class, 'showByEstabelecimento']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);

Route::get('/produto/categorias', [CategoriaController::class, 'index']);
Route::post('/produto/categorias', [CategoriaController::class, 'store']);
Route::get('/produto/categorias/{id}', [CategoriaController::class, 'show']);
Route::put('/produto/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/produto/categorias/{id}', [CategoriaController::class, 'destroy']);

Route::get('/pedidos', [PedidoController::class, 'index']);
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
Route::get('/pedidos/search/{id}', [PedidoController::class, 'searchInvoiceByFilters']);
Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);

