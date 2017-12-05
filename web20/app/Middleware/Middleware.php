<?php 

namespace App\Middleware;

//Clase para evaluar las rutas antes o despues
class Middleware
{
	protected $container;

	public function __construct($container)
	{
		$this->container = $container;
	}
}

 ?>