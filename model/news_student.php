<?php
class Student{
  public $name;
  public $email;
  public $phone;
  public $id;

  private $conn;
  private $table_name;

  public function __construct($db){
    $this->conn = $db;
    $this->table_name = 'table_student';
  }

  public function get_all_data(){
    
    $sql_query = "SELECT * FROM $this->table_name";
      $news_obj = $this->conn->prepare($sql_query);
      $news_obj->execute();
       return $news_obj->get_result();
  }

  //read single student data
  public function get_single_student(){

    $sql_query = "SELECT * FROM $this->table_name WHERE id = ?";

    // prepare statement
    $obj = $this->conn->prepare($sql_query);
    
    $obj->bind_param("i", $this->id);
    $obj->execute();
    $data = $obj->get_result();
    return $data->fetch_assoc();
  }

  public function insert_data(){
    $query = "INSERT INTO $this->table_name (name, email, phone) VALUE (?, ?, ?)";
    $obj = $this->conn->prepare($query);
    // sanitize the input variable => basically removes the extra
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->phone = htmlspecialchars(strip_tags($this->phone));
    // binding parameters
    $obj->bind_param("sss", $this->name,  $this->email, $this->phone);

    // execute query
    if($obj->execute()){
      return true;
    }else {
      return false;
    }
  }

} 

?>