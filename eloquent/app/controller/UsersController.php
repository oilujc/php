<?php 
	namespace Controller;

	use Models\UsersModel;
	use Models\PreguntasModel;

	class UsersController {

		public static function createUser($username, $password, $email) {
			$user = UsersModel::create([
				'username'=>$username,
				'password'=>$password,
				'email'=>$email
			]);
			return $user;

		}
		public static function ContadorDePreguntas($usersid){
			$preg = PreguntasModel::where('users_id', $usersid)->count();
			return $preg;
		}
	}
 ?>