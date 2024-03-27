<?php

namespace Classes\Controller;

use Classes\Model\Produto;
use \Classes\Page;
use \Classes\Model;
class ControllerProduto extends Model{
    public static function getProduto() {
        
        $tipoproduto = Produto::getTipoProdutos();
        $produtos = Produto::produtos();
        $page = new Page([
            'header'=>true,
            'footer'=>false
        ]);

        $page->setTpl('cadastro_produtos',[
            "tipoproduto"=>$tipoproduto,
            "produtos"=>$produtos
        ]);
    }

    public static function postProduto() {
        
        $produto = new Produto;
        $produto->setData($_POST);
        $produto->save_produto();
  
        header("Location: /");
        exit;
    }
    public static function postTipoProduto() {

        $produto = new Produto;
        $produto->setData($_POST);
        $produto->save_tipoproduto();
    
        header("Location: /");
        exit;
    
    }

    
}
