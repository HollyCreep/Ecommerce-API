<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function index()
    {
        return Produto::all();
    }

    public function show($id)
    {
        return Produto::find($id);
    }

    public function store(Request $request)
    {
        $produto = Produto::find($request->id);
        
        if(isset($produto) && count($produto) > 0){
            return response()->json(['error' => 'Product already registered'], 400);
        }
        
        $produto = new Produto;
        $produto->referencia = $request->referencia;
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->categoria = $request->categoria;
        $produto->promocao = $request->promocao;
        $produto->genero = $request->genero ? $request->genero : '';
        $produto->cabedal = $request->cabedal;
        $produto->solado = $request->solado;
        $produto->altura_salto = $request->altura_salto;
        $produto->save();
        // $produto = Produto::create([
        //   'referencia' => $request->referencia,
        //   'descricao' => $request->descricao,
        //   'preco' => $request->preco,
        //   'categoria' => $request->categoria,
        //   'promocao' => $request->promocao,
        //   'genero' => $request->genero,
        //   'cabedal' => $request->cabedal,
        //   'solado' => $request->solado,
        //   'altura_salto' => $request->altura_salto,
          
        // ]);
        return $produto;
    }

    


    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if(!$produto){
            return response()->json(['error' => 'produto not found'], 400);
        }

        $produto->fill($request->all());

        if(!$produto->save()){
            return response()->json(['error' => 'Error on processing'], 500);
        }

        return $produto;
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if(!$produto){
            return response()->json(['error' => 'produto not found'], 400);
        }


        if(!$produto->destroy()){
            return response()->json(['error' => 'Error on processing'], 500);
        }

        return response()->json(['deleted' => true,'status' => 'Deleted successfully'], 200);
    }
}
