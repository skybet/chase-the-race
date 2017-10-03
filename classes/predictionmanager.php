<?php
class PredictionManager {
  private $db;
  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function save($uid, $pred, $tie){
    $stmt = $this->db->prepare("
      insert into Predictions (user_id, prediction, tiebreaker)
      values (:uid, :pred, :tie)
    ");
    //echo $pred;
    $r = $stmt->execute([
        'uid'  => $uid,
        'pred' => $pred,
        'tie' => $tie
    ]);
    //var_dump($r);
  }
}
?>
