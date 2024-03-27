<?php

namespace Classes\Model;


use \Classes\Model;
use \Classes\DB\Sql;

class Produto extends Model{

    public function save_tipoproduto()
    {
        $sql = new Sql();

        $sql->query("INSERT INTO tb_tipoproduto (tipoproduto, icms, pis, cofins) VALUES(:tipoproduto, :icms, :pis, :cofins)",[
            ':tipoproduto' => $this->gettipoproduto(),
            ':icms' => $this->geticms(),
            ':pis' => $this->getpis(),
            ':cofins' => $this->getcofins()
        ]);
    }

    public function save_produto()
    {
        $sql = new Sql();

        $sql->query("INSERT INTO tb_produtos (produto, idtipoproduto, preco) VALUES(:produto, :idtipoproduto, :preco)",[
            ':produto' => $this->getproduto(),
            ':idtipoproduto' => $this->getidtipoproduto(),
            ':preco' => $this->getpreco()
            
        ]);
    }


    public static function getTipoProdutos()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_tipoproduto");
	}

    public static function produtos()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_produtos p JOIN tb_tipoproduto t on t.idtipoproduto = p.idtipoproduto");
	}
}
