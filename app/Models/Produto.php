<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produto';

    protected $fillable = ['nome', 'descricao', 'preco', 'id_estabelecimento', 'id_categoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'id_estabelecimento', 'id_estabelecimento');
    }

}
