<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $attributes = [
        'fornecedor_id' => 0,
        'referencia' => '',
        'descricao' => '',
        'preco' => 0,
        'ratings' => 0,
        'reviews' => 0,
        'categorias_produtos' => 0,
        'grade' => 0,
        'promocao' => 0,
        'genero' => '',
        'cabedal' => '',
        'solado' => '',
        'altura_salto' => '',
    ];


    public function fotos (){
        return $this->hasMany('App\FotosProduto');
    }
    
    public function grades (){
        return $this->hasMany('App\GradesProduto');
    }
}
