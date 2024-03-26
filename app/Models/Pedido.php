<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cliente',
        'id_estabelecimento',
        'id_produto',
        'quantidade',
        'data_pedido',
        'valor_total',
        'status'
    ];


    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'id_produto', 'id_produto');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}
