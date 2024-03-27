<?php

namespace Classes\Model;


use \Classes\Model;
use \Classes\DB\Sql;

class Vendas extends Model{

    public function saveVendas()
    {
        $sql = new Sql();

        $sql->query("INSERT INTO tb_vendas (valor_total, total_impostos) VALUES(:valor_total, :total_impostos)",[
            ':valor_total' => $this->getvalor_total(),
            ':total_impostos' => $this->gettotal_impostos()
        ]);
    }

    public static function listVendas()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_vendas");
	}
}
