<?php

namespace App\Http\Controllers;

use App\FotosProduto;
use Illuminate\Http\Request;

class FotosProdutoController extends Controller
{

    public function index()
    {
        return FotosProduto::all();
    }


    public function store($produto_id,$url, $nomeFoto = '')
    {

        
        $foto = new FotosProduto;
        $foto->produto_id = $produto_id;
        $foto->url = $url;
        $foto->nome_foto = $nomeFoto ? $nomeFoto : '';  
        return $foto->save();
    }


    public function show($id)
    {
        return FotosProduto::find($id);
    }


    public function update(Request $request, FotosProduto $fotosProduto)
    {
        //
    }


    public function destroy(FotosProduto $fotosProduto)
    {
        //
    }
}
