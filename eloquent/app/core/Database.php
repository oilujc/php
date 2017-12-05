<?php 
namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {

	static function startUp() {
		$capsule = new Capsule;
		$capsule->addConnection([
		 'driver' => DBDRIVER,
		 'host' => DBHOST,
		 'database' => DBNAME,
		 'username' => DBUSER,
		 'password' => DBPASS,
		 'charset' => 'utf8',
		 'collation' => 'utf8_unicode_ci',
		 'prefix' => ''
		]);
		// Setup the Eloquent ORM… 
		$capsule->bootEloquent();
	}

}

 ?>