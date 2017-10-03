<?php
class User {
  private $db;
  private $id;

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function fromArray(array $a){
    $this->email = $a["email"];
  }
}

?>
