<?php
class BaseModel {
  protected $db;

  public function __construct() {
    $this->db = Db::getConnection();
  }

  public function get(...$args) {
    return [
      'error' => 'Метод ещё не поддерживается'
    ];
  }
  public function create(...$args) {
    return [
      'error' => 'Метод ещё не поддерживается'
    ];
  }
  public function update(...$args) {
    return [
      'error' => 'Метод ещё не поддерживается'
    ];
  }
  public function delete(...$args) {
    return [
      'error' => 'Метод ещё не поддерживается'
    ];
  }
}