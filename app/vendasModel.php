<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class vendasModel extends Model
{


    public function getProduct($referencia=null){


        if($referencia == null){

            try {
                return DB::table("sales.produto")
                ->select("id", "nome", "referencia", "preco")
                ->orderBy("nome")
                ->get();

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }else{
            try {


                $query= "SELECT fornecedor.nome, preco, produto.id, produto.nome as prodnome FROM PRODUTO
                        INNER JOIN produto_fornecedor on produto.id=produto_fornecedor.produto_id
                        INNER JOIN fornecedor on fornecedor.id=produto_fornecedor.fornecedor_id
                        WHERE referencia= $referencia";

                return DB::select($query);


            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

    }

    public function addVenda($data,
                            $cep,
                            $rua,
                            $numero,
                            $complemento,
                            $bairro,
                            $cidade,
                            $uf)
    {
        try {
            $id = DB::table('sales.venda')->insertGetId([
                'data' => $data,
                'endereco' => $rua,
                'cep' => $cep,
                'numero' => $numero,
                'complemento' => $complemento,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'estado' => $uf,

            ]);

            return $id;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addProduct($vendaId, $produtoId, $preço)
    {
        try {
            $id = DB::table('sales.venda_produto')->insertGetId([
            'venda_id' => $vendaId,
            'produto_id' => $produtoId,
            'preco' => $preço,

            ]);

            return $id;
        } catch (\Exception $e) {
            return $e->getMessage();
            }
        }

        public function finalizaVenda($vendaId, $total)
        {
            try {

                $query = "UPDATE sales.venda SET valor_total='$total'
                WHERE id='$vendaId'";
                return DB::update($query);

            } catch (\Exception $e) {
                return $e->getMessage();
                }
        }
}
