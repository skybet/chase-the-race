<?php
include 'Validation/FormValidation.php';
class PredictionManager {
  private $db;
  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function save($uid, $post){
    $validationManager = new formValidation();

    $tiebreak = (int)$post['tiebreaker'];

    $stmt = $this->db->prepare("
      insert into Predictions (user_id, prediction, fastest_pit_stop, first_retiree, safety_car, tiebreaker)
      values (:uid, :pred, :fastPit, :retiree, :safetyCar, :tie)
    ");
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
        'tie' => $tiebreak
    ]);
  }

  public function getWinnerList($post){
    $car = 0;
    if ($post['safetyCar'] === "on") {
      $car = 1;
    }

    $stmt = $this->db->prepare("
      SELECT users.email, users.domain, users.ip, predictions.tiebreaker 
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

  public function getIPCount($ip){
    $stmt = $this->db->prepare("
      SELECT COUNT(ip) FROM Users WHERE ip = :ip");
  
    $stmt->execute(['ip' => $ip]);
    
    $ipCount = $stmt->fetch();

    return $ipCount;
  }

  public function getDomainCount($domain){
    $stmt = $this->db->prepare("
      SELECT COUNT(domain) FROM Users WHERE domain = :domain");
  
    $stmt->execute(['domain' => $domain]);
    
    $domainCount = $stmt->fetch();

    return $domainCount;
  }
}
?>
