<?php
class UserManager {
  private $db;

  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function insertUser($email){
    $stmt = $this->db->prepare("
    insert into Users (email)
    values (:email)
    ");

    $r = $stmt->execute([
        'email' => $email
    ]);
  }

}

?>
