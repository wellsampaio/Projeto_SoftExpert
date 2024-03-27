<?php

use \Classes\Model\Api;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;




$app->group('/api', function () use ($app) {

	$app->get("/produtos", function(Request $request, Response $response, array $args) {
		$produtos = Api::listProdutos();	
		$response->getBody()->write(json_encode($produtos));
		return $response->withHeader('Content-type', 'application/json');

	});

	$app->get("/produtos/{produto}", function(Request $request, Response $response, array $args) {
		$produto = $args['produto'];
		$listproduto = Api::getProduto($produto);	
		$response->getBody()->write(json_encode($listproduto));
		return $response->withHeader('Content-type', 'application/json');

	});

});
