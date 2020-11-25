<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");


include_once ('../confi/congi_student.php');
include_once ('../model/news_student.php');

$db = new Database();
$connection = $db->connect();
$student = new Student($connection);

if($_SERVER['REQUEST_METHOD'] === "POST"){

  $param = json_decode(file_get_contents("php://input"));

  if(!empty($param->id)){
      $student->id = $param->id;
      $student_data = $student->get_single_student();
      //print_r( $student_data);
      if(!empty($student_data)){

        http_response_code(200);
        echo json_encode(array(
          "status" => 1,
          "data" => $student_data
        ));
      } else {
        http_response_code(404);
        echo json_encode(array(
          "status" => 0,
          "message" => "student info not found"
        ));
      }
  }

}else {
    http_response_code(503);
    echo json_encode(array(
      "status" => 0, 
      "message" => "Access Denied"
    ));
}

?> 