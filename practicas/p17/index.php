<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';

$app = AppFactory::create();
// /myapp/api is the api folder http://domain/myapp/api/
$app->setBasePath("/myapp/api");
$app->setBasePath("/practicas/p17");

$app->get('/', function ($request, $response, $args){
    	$response->write("Hola mundo slim");
        return $response;


});

$app->run();
?>