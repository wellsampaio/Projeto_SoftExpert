<?php

namespace Classes\Controller;

use Classes\Model\Vendas;
use \Classes\Page;
use \Classes\Model;
class ControllerVendas extends Model{
    public static function getVenda() {
        
        $vendas = Vendas::listVendas();
        $page = new Page([
            'header'=>true,
            'footer'=>false
        ]);

        $page->setTpl('cadastro_vendas',[
            "vendas"=>$vendas ,
        ]);
    }

    public static function postVendas() {
        
        $vendas = new Vendas;
        $vendas->setData($_POST);
        $vendas->saveVendas();
  
        header("Location: /vendas");
        exit;
    }
    

    
}
