<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaEstabelecimento extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoria_id';
    protected $fillable = ['nome'];
}
