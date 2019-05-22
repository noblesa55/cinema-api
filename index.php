<?php
	// 1. Общие настройки 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL); 
	session_start(); 
	

	var_dump($_SERVER);
	// 2. Подключение файлов к системе 
	define('ROOT', dirname(__FILE__)); 
	require_once(ROOT . '/app/config/config.php'); 
	require_once(ROOT . '/app/components/Autoload.php'); 
	
	// 3. Установка соединения с базой данных 
	
	// 4. Вызов Router 
	$router = new Router(); 
	$router -> run(); 
	
	
?>