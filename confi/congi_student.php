<?php
class Database{
  private $hostname;
  private $username;
  private $password;
  private $dbname;
  public $conn;

  public function connect(){
    $this->hostname = 'localhost';
    $this->username = 'Elitesam';
    $this->password = '2014414292elitesam';
    $this->dbname = 'my_api_oop';

    $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);

    if($this->conn->connect_errno){
    print_r($this->conn->connect_errno);
    exit;
  } else{
   //print_r($this->conn);
   return $this->conn;
  }
  }
}
  // $kel = new database();
  // $vic = $kel->connect();

?>