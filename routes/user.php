<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//$app->get('/user/login', function(){
   // $result = (object)array(
    //    'message' => 'ยินดีต้อนรับ คุณ มารีญา ',
   //     'date'=>'14-12-2017',
   //     'time'=>'14.41pm'
   // );
   // echo json_encode($result);
//});
$app->post('/user/login',function(Request $request,Response $response){
    
    $data =$request->getParsedBody();
    echo json_encode($data);
   echo 'post_register'.' '. $data['username'].' '.$data['password'];
});

$app->post('/user/register', function(Request $request,Response $response){
    $data =$request->getParsedBody();
    echo 'บันทึกข้อมูลเรียบร้อยแล้ว '.json_encode($data);
    
});
$app->post('/user/edit', function(Request $request,Response $response){
    $data =$request->getParsedBody();
    echo 'บันทึกข้อมูลเรียบร้อยแล้ว '.json_encode($data);
    
});

$app->get('/user/history', function(){
    $data = (object)array(
        'message' => 'ประกาศที่คุณมารีญาสร้างทั้งหมด',
       'post_id' => 'P2323'
    );
    echo json_encode($data);
    
});
$app->post('/user/editpass', function(Request $request,Response $response){
  
    $data=$request->getParsedBody();
    echo 'แก้ไขรหัสผ่านเรียบร้อยแล้ว '.json_encode($data);
    
});
$app->post('/user/forgetpass', function(Request $request,Response $response){
    $data=$request->getParsedBody();

    echo 'กรุณายืนยันตัวตนทาง e-mail '.json_encode($data);
    
});
$app->get('/user/detail', function(){
    $result = (object)array(
        'message' => 'ข้อมูลส่วนตัว',
        'name' => 'มารีญา พูนเลิศลาภ',
        'username' => 'plengii',
        'password' => 'pleng056720990',
        'address' => 'udelight@huamak',
        'phone' => '0992852898',
        'e-mail' => 'plengii_inlove@hotmail.com'
       
    );
    echo json_encode($result);
    
});
?>