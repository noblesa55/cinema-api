<?php 
class SeanceController extends BaseController {
  public function __construct() {
    $this->model = new SeanceModel();
  }
}