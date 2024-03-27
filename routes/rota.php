<?php

$app->get('/', 'Classes\Controller\ControllerProduto::getProduto');

$app->post("/produto", "Classes\Controller\ControllerProduto::postProduto");

$app->post("/tipoproduto", "Classes\Controller\ControllerProduto::postTipoProduto");

$app->get('/vendas', 'Classes\Controller\ControllerVendas::getVenda');

$app->post('/vendas', 'Classes\Controller\ControllerVendas::postVendas');
