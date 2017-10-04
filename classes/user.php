<?php
class User {
  private $db;
  public $id;
  public $email;
  public $domain;
  public $date;
  public $ip;

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function fromArray(array $a){
    $this->email = $a["email"];
    $this->id = $a["id"];
    $this->domain = $a["domain"];
    $this->date = $a["date_created"];
    $this->ip = $a["ip"];
  }
}

?>
