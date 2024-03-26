<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estabelecimento';

    protected $fillable = ['categoria_id', 'nome', 'endereco', 'descricao'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaEstabelecimento::class, 'categoria_id', 'categoria_id');
    }
}
