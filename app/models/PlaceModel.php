<?php 
class PlaceModel extends BaseModel {
  public function get(...$args) {
    $res = $this->db->prepare(
      'SELECT p.`row`
             ,p.`number`
             ,ifnull(t.`ID_status`, 0) as `ID_status`
             ,ifnull(st.`name`, "Свободно") AS `status`
         FROM `seance` s
         JOIN `place` p ON s.`ID_hall` = p.`ID_hall`
         LEFT JOIN `ticket` t ON t.`ID_seance` = s.`ID`
          AND t.`row` = p.`row`
          AND t.`number` = p.`number`
         LEFT JOIN `status` st ON t.`ID_status` = st.`ID`
        WHERE s.`ID` = :id
        ORDER BY p.`row`, p.`number`'
    );
    $res->execute([
      'id' => $args[0]
    ]);
    return $res->fetchAll();
  }
}
