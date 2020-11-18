<?php
class Student{
  public $name;
  public $email;
  public $phone;

  private $conn;
  private $table_name;

  public function __construct($db){
    $this->conn = $db;
    $this->table_name = 'table_student';
  }

  public function get_all_data(){
    
    $sql_query = "SELECT * FROM $this->table_name";
      $news_obj = $this->conn->prepare($sql_query);
      $news_obj ->execute();
      return $news_obj->get_result();
  }

} 

?>