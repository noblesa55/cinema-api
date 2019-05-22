<?php
	spl_autoload_register(function ($className) {
		$arr_directories = array(
			'/app/components/', 
			'/app/models/', 
			'/app/controllers/'
		); 
		
		foreach ($arr_directories as $directory) {
			$path = ROOT . $directory . $className . '.php'; 
			if (is_file($path)) {
				include_once($path); 
				break; 
			} 
		}
	
	});



?>