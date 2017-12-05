<?php 
namespace Core;

use mysqli, Exception;

class Database{
	private static $db;

	public static function getConnection(){
		if (empty(self::$db)){
			mysqli_report(MYSQLI_REPORT_STRICT);
			try {
				$mysql = new mysqli("localhost", "root", "", "cursosonline");
				self::$db = $mysql;
			} catch (Exception $e) {
				
			}
			
		}
		return self::$db;
	}

}

 ?>