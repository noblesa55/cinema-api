<?php

abstract class BaseController {
	protected $model;
  protected $answer = [];
    
  // send answer to client - to do
  protected function sendAnswer() {
    header('HTTP/1.1 200 OK');
    header('Content-type: application/json');
    echo json_encode($this->answer, JSON_UNESCAPED_UNICODE);
  }
  
  protected function showNotFound() {
    header('HTTP/1.1 404 Not Found');
  }

  // Используемый метод не поддерживается
  protected function showNotAllowed() {
    header('HTTP/1.1 405 Method Not Allowed');
  }

  // Плохой запрос (переданы не все необходимые параметры)
  protected function showBadRequest() {
    header('HTTP/1.1 400 Bad Request');
  }

  // Неверное значение token
  protected function showUnauthorized() {
    header('HTTP/1.1 401 Unauthorized');
  }

  // 500 ошибка сервера
  protected function showInternalError() {
    header('HTTP/1.1 500 Fatal');
  }

  public function main(...$args) {
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
      case 'GET':
        $this->get(...$args);
        break;
      case 'POST':
        $this->create(...$args);
        break;
      case 'PUT':
        $this->update(...$args);
        break;
      case 'DELETE':
        $this->delete(...$args);
        break;
      default: 
        $this->showNotAllowed();
    }
  }
  private function get(...$args) {
    $this->answer = $this->model->get(...$args);
    $this->sendAnswer();
  }
  private function create(...$args) {
    $this->answer = $this->model->create(...$args);
    $this->sendAnswer();
  }
  private function update(...$args) {
    $this->answer = $this->model->update(...$args);
    $this->sendAnswer();
  }
  private function delete(...$args) {
    $this->answer = $this->model->delete(...$args);
    $this->sendAnswer();
  }
}