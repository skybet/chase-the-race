<?php
class Driver {
  private $db;
  public $id;
  public $DriverName;
  

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function fromArray(array $a){
    $this->id = $a["id"];
    $this->DriverName = $a["DriverName"];

  }

}

?>
