<?php 
	namespace Controller;

	use Models\VotosModel;

	class VotosController {

		public static function createVoto($respuestasid, $usersid) {
			$voto = VotosModel::create([
				'respuestas_id'=>$respuestasid,
				'users_id'=>$usersid,
				'visible'=>1
			]);
			return $voto;

		}
	}
 ?>