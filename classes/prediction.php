<?php
class Prediction {
  private $db;
  public $id;

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function fromArray(array $a){
    $this->id = $a["id"];
  }
}
?>
