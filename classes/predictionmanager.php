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

  public function getWinnerList($post){
    $car = 0;
    if ($post['safetyCar'] === "on") {
      $car = 1;
    }

    $stmt = $this->db->prepare("
      SELECT users.email, predictions.tiebreaker 
      FROM Users 
      INNER JOIN Predictions
      ON users.id = predictions.user_id 
      WHERE (predictions.prediction = :winner AND 
      predictions.fastest_pit_stop = :pitstop AND 
      predictions.first_retiree = :retiree AND 
      predictions.safety_car = :safetycar)");
    
    $stmt->execute([
      'winner' => $post['winner'],
      'pitstop' => $post['fastestPitStop'],
      'retiree' => $post['retiree'],
      'safetycar' => $car
      ]);
    
    $results = $stmt->fetchAll();
    
    return $results;
  }
}
?>
