<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'setting.php'; //  ลิ้งค์ไปหน้า setting DB 
//กำหนดค่า config ต่างๆ ไปใช้ใน web API
$app = new \Slim\App(["settings" => $config]); //สร้างตัวแปร app 
// สร้าง container และกำหนด PDO ไว้เชื่อมต่อกับ DB
$container = $app->getContainer();
require 'pdo.php';

require 'routes/hello.php';
require 'routes/user.php';
require 'routes/dog.php';
require 'routes/room.php';
                    
//เขียนให้ไฟล์ order จาก  client ได้
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();