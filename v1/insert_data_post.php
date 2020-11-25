<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");


include_once ('../confi/congi_student.php');
include_once ('../model/news_student.php');

$db = new Database();
$connection = $db->connect();
$student = new Student($connection);

if($_SERVER['REQUEST_METHOD'] === "POST"){
  // Submit data
  // $student->name = "Henry Peter Lei";
  // $student->email = "peterhenry@gmail.com";
  // $student->phone = "08065248712";

  $data = json_decode(file_get_contents("php://input"));
  if(!empty($data->name) &&  !empty($data->email) && !empty($data->phone)){

    // submit data
    $student->name = $data->name;
    $student->email = $data->email;
    $student->phone = $data->phone;

    if($student->insert_data()){
      http_response_code(200); // 200 means ok
      echo json_encode(array(
        "status" => 1,
        "message" => "student created successfully"
      ));
    }else {
      http_response_code(500); // 500 Internal server error
      echo json_encode(array(
        "status" => 0,
        "message" => "Failed to create student account"
      ));
    }

  }

  
}else {
  http_response_code(503); // 500 means service unavailable
    echo json_encode(array(
      "status" => 0,
      "message" => "Access denied"
    ));

  }
?>