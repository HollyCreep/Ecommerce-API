<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $attributes = [
        'id_fornecedor' => 1,
        'referencia' => '',
        'descricao' => '',
        'preco' => 0,
        'categoria' => 0,
        'promocao' => 0,
        'genero' => 'M',
        'cabedal' => '',
        'solado' => '',
        'altura_salto' => '',
    ];

    protected $fillable = [
        'referencia',
        'descricao',
        'preco',
        'categoria',
        'promocao',
        'genero',
        'cabedal',
        'solado',
        'altura_salto'
    ];
}
