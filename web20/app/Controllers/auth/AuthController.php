<?php 

namespace App\Controllers\Auth;


use Respect\Validation\Validator as Val;
use App\Controllers\Controller;
use App\Models\Users;

//Controlador de autenticacion
class AuthController extends Controller{

	//retorna a la vista del signup
	public function getSignUp($request, $response){

		return $this->view->render($response, 'auth/signup.twig');

	}

	//Extrae los parametros del formulario de signup los valida, crea un usuario nuevo y retorna a home
	public function postSignUp($request, $response){

		$validation = $this->validator->validate($request,[

			'email' => Val::noWhitespace()->notEmpty()->email(),
			'username' => Val::noWhitespace()->notEmpty(),
			'password' => Val::noWhitespace()->notEmpty(),
		]);


		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.signup'));
		}

		$user = Users::Create([
			'email' => $request->getParam('email'),
			'username' => $request->getParam('username'),
			'password' => password_hash($request->getParam('password') , PASSWORD_DEFAULT),

		]);

		return $response->withRedirect($this->router->pathFor('home'));
		

	}

}

 ?>