<?php 
///จำเป็น
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/hello', function() {
    $result = (object)array('message' => 'Hi React Native! from PHP');
    echo json_encode($result);
    });
$app->post('/register',function(Request $request,Response $response){
        
        $data =$request->getParsedBody();
        echo json_encode($data);
       // echo 'post_register'.' '. $data['username'].' '.$data['password'];
});

?>