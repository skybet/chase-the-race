<?php
class UserManager {
  private $db;

  public function __construct(PDO $db = null) {
    $this->db = $db;
  }

  public function insertUser($email) {
    $stmt = $this->db->prepare("
      insert into Users (email)
      values (:email)");

    $r = $stmt->execute([
      'email' => $email
    ]);
  }
  public function byEmail($email) {
    $r = $this->db->prepare(
      "select id, email
      from Users
      where email = :email");
    $r->execute(['email' => $email]);

    $users = [];

    // var_dump($obj);
    foreach ($r as $row){
      //var_dump($row);
      $user = new User();
      $user->fromArray($row);
      $users[] = array_push($users, $user);
    }
    //echo $users[0]->id;
    return $users[0];
  }

  public function doesEmailExist($email)
 {
    $r = $this->db->prepare(
      "select email
      from Users
      where email= :email");

      $r->execute(['email' => $email]);


      if (count($r->fetchAll()) > 0){

              return true;

            }
      else {
        return false;
      }

  }

}

?>
