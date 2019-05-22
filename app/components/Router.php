<?php
  class Router {
    
    private $routes; 
    
    public function __construct() {
      $routesPath = MAIN . '/config/routes.php';
      $this->routes = include($routesPath); 
    }
    
    public function run() {
      $url = ltrim($_SERVER['REQUEST_URI'], '/');
      
      foreach ($this->routes as $class => $list) {
        foreach ($list as $pattern) {
          if (preg_match($pattern, $url, $args)) {
            array_shift($args);
            break 2;
          }
        }
      }
      
      if ($class != 'Error') {
        $controller = new $class();
        $controller->main(...$args);
      } else {
        header('HTTP/1.1 404 Not Found');
      }
    }
  
  }


?>