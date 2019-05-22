<?php 
class HallController extends BaseController {
  public function __construct() {
    $this->model = new HallModel();
  }
}