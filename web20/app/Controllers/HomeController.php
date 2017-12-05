<?php 

namespace App\Controllers;

use App\Models\Users;

//Controlador home
class HomeController extends Controller{

	//Retorna a la vista del home
	public function index($request, $response){

		return $this->view->render($response, 'home.twig');

	}

}

 ?>