<?php 
class SeanceModel extends BaseModel {
  public function get(...$args) {
    $res = $this->db->prepare(
      'SELECT s.`ID`
             ,h.`name` AS `hall`
             ,m.`name` AS `movie`
             ,TIME(s.`datetime`) AS `time`
             ,s.`price`
         FROM `seance` s
         JOIN `hall` h ON s.`ID_hall` = h.`ID`
         JOIN `movies` m ON s.`ID_movie` = m.`ID`
        WHERE h.`ID_cinema` = :id
          AND DATE(s.`datetime`) = :date'
    );
    $res->execute([
      'id' => $args[0],
      'date' => $args[1]
    ]);
    return $res->fetchAll();
  }
}
