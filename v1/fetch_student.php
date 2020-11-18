<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: GET");


include_once ('../confi/congi_student.php');
include_once ('../model/news_student.php');

$db = new Database();
$connection = $db->connect();

$student = new Student($connection);

if($_SERVER["REQUEST_METHOD"] === "GET"){

  $data = $student->get_all_data();
  
    if($data->num_rows > 0){
        $students["records"] = array();
        while($row = $data->fetch_assoc()){
            
            array_push($students["records"], array(
            "id" => $row['id'],
            "name" => $row['name'],
            "email" => $row['email'],
            "mobile" => $row['mobile'],
            "status" => $row['status'],
            "created_at" => date("y-m-d", strototime($row['created_at']))
            ));
        }
        
        http_response_code(200);
        echo json_encode(array(
        "status" => 1,
        "data" => $students["records"]
        ));
    }

}else {
  http_response_code(503);
  echo json_encode(array(
    "status" => 0,
    "message" => "Access Denied"
  ));
}

?>