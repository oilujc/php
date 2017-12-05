<?php 
	namespace Controller;

	use Models\RespuestasModel;

	class RespuestasController {
		public static function createRespuesta($usersid,$preguntasid,$respuesta) {
			$resp = RespuestasModel::create([
				'users_id'=>$usersid,
				'preguntas_id'=>$preguntasid,
				'respuesta' => $respuesta, 
				'visible'=>1
			]);
			return $resp;
		}
		public static function getAnswersWithVotes(){
			$resp = RespuestasModel::with('votos')->get()->toArray();
			return $resp;
		}
	}
 ?>