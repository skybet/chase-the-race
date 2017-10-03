<?php
class PredictionManager {
  private $db;
  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function save($uid, $post){
    $stmt = $this->db->prepare("
      insert into Predictions (user_id, prediction, fastest_pit_stop, first_retiree, safety_car, tiebreaker)
      values (:uid, :pred, :fastPit, :retiree, :safetyCar, :tie)
    ");
    //var_dump($post);
    $car = 0;
    if ($post['safetyCar'] === "on") {
      $car = 1;
    }
    $r = $stmt->execute([
        'uid'  => $uid,
        'pred' => $post['winner'],
        'fastPit' => $post['fastestPitStop'],
        'retiree' => $post['retiree'],
        'safetyCar' => $car,
        'tie' => $post['tiebreaker']
    ]);
    //var_dump($r);
  }

}
?>
