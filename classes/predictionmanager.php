<?php
class PredictionManager {
  private $db;
  public function __construct(PDO $db = null){
    $this->db = $db;
  }

  public function save(Prediction $pred){
    if (isset($pred->id)){
      return $this->update($pred);
    }
    $stmt = $this->db->prepare("
        insert into Prediction (user, teamID)
        values(:name, :teamID)
    ");

    $r = $stmt->execute([
        'name'  => $bp->name,
        'teamID' => $bp->teamID,
    ]);
    $bp->id = $this->db->lastInsertId();
  }
}
?>
