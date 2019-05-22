<?php 
class CinemaModel extends BaseModel {
  public function get(...$args) {
    $cinemas = $this->db
                   ->query('SELECT * FROM `cinema`')
                   ->fetchAll();
    $res = $this->db->prepare(
      'SELECT *
         FROM `hall`
        WHERE `hall`.`ID_cinema` = :id'
    );
    foreach ($cinemas as &$item) {
      $res->execute([
        'id' => $item['ID']
      ]);
      $item['halls'] = $res->fetchAll();
    }
    unset($item);
    return $cinemas;
  }
}
