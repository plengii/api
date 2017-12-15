<?php
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Http\Message\ServerRequestInterface as Request;

//$app->get('/user/login', function(){
// $result = (object)array(
//    'message' => 'ยินดีต้อนรับ คุณ มารีญา ',
//     'date'=>'14-12-2017',
//     'time'=>'14.41pm'
// );
// echo json_encode($result);
//});
$app->post('/user/login', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    echo json_encode($data);
    echo 'post_register' . ' ' . $data['username'] . ' ' . $data['password'];
});
//-----------------------------------
$app->post('/user/register', function (Request $request, Response $response) {
    $data = $request->getParsedBody();

    $FistName = $data['FirstName'];
    $LastName = $data['LastName'];
    $Address = $data['Address'];
    $Username = $data['Username'];
    $Password = $data['Password'];
    $Email = $data['Email'];
    $Telephone = $data['Telephone'];

    $db = $this->db;
    $statement = $db->prepare("INSERT INTO User(FistName, LastName, Address, Username, Password, Email, Telephone) VALUES (:FistName,:LastName,:Address,:Username,:Password,:Email,:Telephone)");
    $statement->execute(array(':FistName' => $FistName, ':LastName' => $LastName, ':Address' => $Address, ':Username' => $Username, ':Password' => $Password, ':Email' => $Email, ':Telephone' => $Telephone)); //ส่งค่าไปวางที่ คอลั่ม name
    //เช็็คว่าเข้ามั้ย
    if ($statement->rowCount() > 0) {
        $result = (object) array(
            "messege" => "Insert Success",
            "insert_status" => 1,
        );
        echo json_encode($result);
    } else {

        $result = (object) array(
            "messege" => "Insert Error",
            "insert_status" => 0,
        );
        echo json_encode($result);
    }
    echo 'บันทึกข้อมูลเรียบร้อยแล้ว ';

});

//-----------------------------------

$app->post('/user/edit', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $UserID = $data['UserID'];
    $FistName = $data['FirstName'];
    $LastName = $data['LastName'];
    $Address = $data['Address'];
    $Username = $data['Username'];
    $Password = $data['Password'];
    $Email = $data['Email'];
    $Telephone = $data['Telephone'];

    $db = $this->db;
    $statement = $db->prepare("UPDATE User SET FistName=:FistName, LastName=:LastName, Address=:Address, Username=:Username, Password=:Password, Email=:Email, Telephone=:Telephone WHERE UserID = :UserID");
    $statement->execute(array(':UserID' => $UserID, ':FistName' => $FistName, ':LastName' => $LastName, ':Address' => $Address, ':Username' => $Username, ':Password' => $Password, ':Email' => $Email, ':Telephone' => $Telephone)); //ส่งค่าไปวางที่ คอลั่ม name
    $affected_rows = $statement->rowCount();
    //เช็็คว่าเข้ามั้ย
    if ($statement->rowCount() > 0) {
        $result = (object) array(
            "messege" => "Insert Success",
            "insert_status" => 1,
        );
        echo json_encode($result);
    } else {

        $result = (object) array(
            "messege" => "Insert Error",
            "insert_status" => 0,
        );
        echo json_encode($result);
    }
    echo 'แก้ไขข้อมูลเรียบร้อยแล้ว ';

});
//-----------------------------------
$app->get('/user/history', function () {
    $data = (object) array(
        'message' => 'ประกาศที่คุณมารีญาสร้างทั้งหมด',
        'post_id' => 'P2323',
    );
    echo json_encode($data);

});
//-----------------------------------
$app->post('/user/editpass', function (Request $request, Response $response) {

    $data = $request->getParsedBody();
    $UserID = $data['UserID'];
    $Password = $data['Password'];

    $db = $this->db;
    $statement = $db->prepare("UPDATE User SET Password=:Password WHERE UserID = :UserID");
    $statement->execute(array(':UserID' => $UserID, ':Password' => $Password)); //ส่งค่าไปวางที่ คอลั่ม name
    $affected_rows = $statement->rowCount();
    //เช็็คว่าเข้ามั้ย
    if ($statement->rowCount() > 0) {
        $result = (object) array(
            "messege" => "Insert Success",
            "insert_status" => 1
        );
        echo json_encode($result);
        echo 'แก้ไขรหัสผ่านเรียบร้อยแล้ว ' . json_encode($data);
    } else {

        $result = (object) array(
            "messege" => "Insert Error",
            "insert_status" => 0,
        );
        echo json_encode($result);
    }

});
//-----------------------------------
$app->post('/user/forgetpass', function (Request $request, Response $response) {
    $data = $request->getParsedBody();

    echo 'กรุณายืนยันตัวตนทาง e-mail ' . json_encode($data);

});
//-----------------------------------
$app->get('/user/detail', function () {
    $result = (object) array(
        'message' => 'ข้อมูลส่วนตัว',
        'name' => 'มารีญา พูนเลิศลาภ',
        'username' => 'plengii',
        'password' => 'pleng056720990',
        'address' => 'udelight@huamak',
        'phone' => '0992852898',
        'e-mail' => 'plengii_inlove@hotmail.com',

    );
    echo json_encode($result);

});
