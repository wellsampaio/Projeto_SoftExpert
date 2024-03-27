<?php

namespace Classes\Model;

use \Classes\Model;
use \Classes\DB\Sql;

class Api extends Model {

	public static function listProdutos()
	{

		$sql = new Sql();

			return $sql->select("SELECT * FROM tb_produtos");
	}

	public static function getProduto($produto)

	{

		$sql = new Sql();


			return $results = $sql->select("SELECT * FROM tb_produtos p
			JOIN tb_tipoproduto t on t.idtipoproduto = p.idtipoproduto
			where produto = :produto",[
			':produto'=>$produto
		]);
	}
}
	

?>