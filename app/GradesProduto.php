<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradesProduto extends Model
{
    protected $table = 'produtos_grade';

    protected $fillable = [
        'produto_id', 'tamanho', 'sequencia',
    ];
}
