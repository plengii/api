<?php
///จำเป็น
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;
//route สำหรับดึงข้อมูลมาใช้
$app->get('/rooms', function (Request $request, Response $response) {
    // ดึง DB มาใช้
    $db = $this->db;
    try {

        $statement = $db->prepare("SELECT * FROM room");
        $statement->execute();
        $results = $statement->fetchAll();

        echo json_encode($results);
    } catch (PDOException $e) {
        echo var_dump($e);

    }
});
//route สำหรับส่งข้อมูลไปยัง DB 
$app->post('/rooms/new', function(Request $request,Response $response){
    $data =$request->getParsedBody();
    $roomName = $data['roomName'];
    $db=$this->db;
    $statement=$db->prepare("INSERT INTO room(name) VALUES (:roomName)");
    $statement->execute(array(':roomName'=>$roomName));//ส่งค่าไปวางที่ คอลั่ม name 
    //เช็็คว่าเข้ามั้ย 
if($statement->rowCount()>0){
    $result = (object) array(
"messege" => "Insert Success",
"insert_status" => 1
    );
echo json_encode($result);
}else{

    $result = (object) array(
        "messege" => "Insert Error",
        "insert_status" => 0
            );
            echo json_encode($result);
}

   // echo json_encode($data);

 // echo "/rooms/ new post".$roomName;

});
?>