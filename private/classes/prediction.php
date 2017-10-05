<?php
class Prediction {
  private $db;
  public $uid;

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function fromArray(array $a){
    $this->uid = $a["id"];
    $this->prediction = $a["prediction"];
  }
}
?>
