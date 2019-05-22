<?php 
class CinemaController extends BaseController {
  public function __construct() {
    $this->model = new CinemaModel();
  }
}