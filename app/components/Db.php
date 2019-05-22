<?php
	class Db {
		public static function getConnection() {
			$paramsPath = MAIN . '/config/db_params.php';
			$params = include($paramsPath); 
			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']};charset={$params['charset']}"; 
			$opt = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			$pdo = new PDO($dsn, $params['user'], $params['password'], $opt); 
			return $pdo; 
		}
	
	}

?>