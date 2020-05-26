<?php

namespace App\Http\Controllers;

use App\GradesProduto;
use Illuminate\Http\Request;

class GradesProdutoController extends Controller
{

    public function index()
    {
        return GradesProduto::all();
    }

    public function show($id)
    {
       return GradesProduto::find($id);
    }

    public function store($idProduto, $tamanho, $sequencia)
    {
        $grade = GradesProduto::create([
            'produto_id' => $idProduto,
            'tamanho' =>$tamanho,
            'sequencia' => $sequencia
        ]);
        return $grade;
    }
    
    public function update(Request $request, GradesProduto $gradesProduto)
    {
        //
    }

    public function destroy(GradesProduto $gradesProduto)
    {
        //
    }

    public function getMaxSequencia(){
        return GradesProduto::max('sequencia') + 1;
    }
}
