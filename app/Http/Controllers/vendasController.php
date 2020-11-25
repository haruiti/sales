<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vendasModel;

class vendasController extends Controller
{

    protected $vendasModel;

    public function __construct()
    {
        $this->vendasModel = new vendasModel();

    }
    public function getProduct()
    {

        $product = $this->vendasModel->getProduct();

        return $product;
    }

    public function addProduct(Request $request)
    {


        $product = $this->vendasModel->getProduct($request->referencia);
        $fornecedorNome=[];

        foreach($product as $index){
            $fornecedorNome[]=$index->nome;
            $productId=$index->id;
            $preco=$index->preco;
            $prodNome=$index->prodnome;
        }

        $fornecedorNomeText=implode(", ",$fornecedorNome);
        error_log(print_r($request->vendaId, true));
        $idProdutoVenda=$this->vendasModel->addProduct($request->vendaId, $productId, $preco);


        $html="<tr><td>".$prodNome."</td><td>".$preco."</td><td>".$fornecedorNomeText."</td></tr>";

        return $html;
    }

    public function addVenda(Request $request)
    {

        $data=date("Y-m-d", strtotime($request->data));
        $cep=$request->cep;
        $rua=$request->rua;
        $numero=$request->numero;
        $complemento=$request->complemento;
        $bairro=$request->bairro;
        $cidade=$request->cidade;
        $uf=$request->uf;

        $vendaId = $this->vendasModel->addVenda($data,
                                                $cep,
                                                $rua,
                                                $numero,
                                                $complemento,
                                                $bairro,
                                                $cidade,
                                                $uf);

        return $vendaId;
    }
}
