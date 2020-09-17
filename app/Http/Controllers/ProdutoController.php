<?php

namespace App\Http\Controllers;

// use App\FotosProduto;
use App\Produto;
// use App\FotosProdutos;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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
        $produto->fornecedor_id = intval($request->idFornecedor);
        $produto->referencia = $request->referencia;
        $produto->descricao = $request->descricao;
        $produto->preco = doubleval($request->preco);
        $produto->categorias_produtos = intval($request->categoria);
        $produto->genero = $request->genero ? $request->genero : '';
        $produto->promocao = $request->promocao ? doubleval($request->promocao) : 0;
        $produto->cabedal = $request->materialCabedal;
        $produto->solado = $request->materialSolado;
        $produto->altura_salto = $request->alturaSalto;
        if($produto->save()){
            if($request->fotosProduto){
                foreach ($request->fotosProduto as $key => $foto) {
                    $fotosProduto = new FotosProdutoController();
                    $fotosProduto->store($produto->id, $foto['src']);
                }
            }

            $grade = new GradesProdutoController();
            $sequencia = $grade->getMaxSequencia();
            for ($i=$request->tam_min; $i < $request->tam_max; $i++) {
                $grade->store($produto->id, $i, $sequencia);
            }
        }
        return $this->getAllProdutosFornecedor($request->idFornecedor);
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


        if(!$produto->destroy($id)){
            return response()->json(['error' => 'Error on processing'], 500);
        }

        return response()->json(['deleted' => true,'status' => 'Deleted successfully'], 200);
    }

    public function fotos($id){
        return Produto::find($id)->fotos;
    }

    public function grades($id){
        return Produto::find($id)->grades;
    }

    public function getAllProdutosFornecedor($idFornecedor){
        $retorno = [];
        if($produtos = \DB::table('produtos')
                        ->leftJoin('produtos_fotos','produto_id','=','id')
                        ->where(['fornecedor_id' => $idFornecedor])
                        ->orderBy('id', 'ASC')
                        ->get())
        {
            foreach ($produtos as $key => $produto) {
                $foto = [
                    'url' => $produto->url ? $produto->url : '',
                    'nome' => $produto->nome_foto ? $produto->nome_foto : ''
                ];

                if(isset($retorno[$produto->id])){
                    array_push($retorno[$produto->id]->fotosProduto, $foto);
                }else{
                    $produto->fotosProduto = [];
                    array_push($produto->fotosProduto, $foto);
                    unset($produto->url);
                    unset($produto->nome_foto);
                    $retorno[$produto->id] = $produto;
                }
            }
        }
        return $retorno;
        
    }
}
