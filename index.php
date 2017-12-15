<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'setting.php';

$app = new \Slim\App(["settings" => $config]);

$app = new \Slim\App;
require 'routes/hello.php';
require 'routes/user.php';
require 'routes/dog.php';
                    
//เขียนให้ไฟล์ order จาก  client ได้
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();