<?php 
session_start();
ob_start();
require_once("vendor/autoload.php");

$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails'=>true,
]];
$app = new \Slim\App($config);

require_once("routes/rota.php");
require_once("routes/rota_api.php");
$app->run();
ob_end_flush();

