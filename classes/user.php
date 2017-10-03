<?php
class User {
  private $db;
  public $id;
  public $email;

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function fromArray(array $a){
    $this->email = $a["email"];
    $this->id = $a["id"];
  }
}

?>
