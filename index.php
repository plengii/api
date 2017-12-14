<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hi', function() {

    echo 'ว่าไง';
});
$app->get('/dog/new-dog', function(){


});
$app->get('/dog/edit-dog', function(){
    
});
$app->get('/dog/delete-dog', function(){
        
        
});
$app->get('/dog/search-dog', function(){
            
            
});
$app->get('/dog/view-dog', function(){
                
                
});
$app->get('/user/login', function(){
    
    
});
$app->get('/user/register', function(){
    echo 'regis';
    
});
$app->get('/user/edit', function(){
    
    
});

$app->get('/user/history', function(){
    
    
});
$app->get('/user/editpass', function(){
    
    
});
$app->get('/user/forgetpass', function(){
    
    
});
$app->get('/user/detail', function(){
    
    
});
//เขียนให้ไฟล์ order จาก  client ได้
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();