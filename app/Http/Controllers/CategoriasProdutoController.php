<?php

namespace App\Http\Controllers;

use App\CategoriasProduto;
use Illuminate\Http\Request;

class CategoriasProdutoController extends Controller
{

    public function index()
    {
        return CategoriasProduto::all();
    }


    public function show($id)
    {
        return CategoriasProduto::find($id);
    }

    public function store(Request $request)
    {
        //
    }


    public function update(Request $request, CategoriasProduto $categoriasProduto)
    {
        //
    }

    public function destroy(CategoriasProduto $categoriasProduto)
    {
        //
    }
}
