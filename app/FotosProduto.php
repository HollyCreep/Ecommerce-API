<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotosProduto extends Model
{
    protected $table = 'produtos_fotos';
    
    protected $attributes = [ 'nome_foto' => '' ];
}
