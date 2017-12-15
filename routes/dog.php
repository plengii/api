<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post('/dog/new-dog', function(Request $request,Response $response){
    $data=$request->getParsedBody();
   // $result = (object)array(
   //     'name'=>'ลักกี้',
     //   'age'=>'1',
       // 'color'=>'black',
        //'BreedDog' =>'puddle',
        //'Address'=>'สวนลุมพินี',
        //'images'=>'lucky.jpg',
        //'message' => 'บันทึกข้อมูลน้องหมาเรียบร้อยแล้ว',
       //
   // );
    echo json_encode($data);
    
    });
    $app->post('/dog/edit-dog', function(Request $request,Response $response){
        $data=$request->getParsedBody();
        echo 'แก้ไขข้อมูลเรียบร้อยแล้ว'.json_encode($result);
    });
    $app->post('/dog/delete-dog', function(Request $request,Response $response){
        $data=$request->getParsedBody();
        echo 'ลบข้อมูลน้องหมาเรียบร้อยแล้ว ' .json_encode($data);  
            
    });
    $app->post('/dog/search-dog', function(Request $request,Response $response){
        $data=$request->getParsedBody();
        echo 'ข้อมูลที่พบทั้งหมด'.json_encode($data);    
                
    });
    $app->get('/dog/view-dog', function(){
                    
        $result = (object)array(
            'message' => 'ข้อมูลน้องหมา',
            'name'=>'ลักกี้',
            'age'=>'1',
            'color'=>'black',
            'BreedDog' =>'puddle',
            'Address'=>'สวนลุมพินี',
            'images'=>'lucky.jpg',
        );
        echo json_encode($result);   
    });
?>