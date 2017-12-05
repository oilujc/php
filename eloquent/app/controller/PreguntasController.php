<?php 
	namespace Controller;

	use Models\PreguntasModel;

	class PreguntasController {
		public static function createPregunta($usersid,$pregunta) {
			$preg = PreguntasModel::create([
				'users_id'=>$usersid,
				'pregunta'=>$pregunta,
				'visible'=>1
			]);
			return $preg;
		}
		public static function getQuestionsWithAnswers(){
			$preg = PreguntasModel::with('respuestas')->get()->toArray();
			return $preg;
		}
		public static function getUsersWithQuestions(){
			$preg = PreguntasModel::with('users')->get()->toArray();
			return $preg;
		}
		public static function getQuestionsWithUpvotes($preguntaId){
			$preg = PreguntasModel::find($preguntaId)->respuestas()->with('votos')->get()->toArray();
			return $preg;
		}
		public static function getAllQuestionsWithUpvotes(){
			$preg = PreguntasModel::with(['respuestas' => function($query){
				$query->with('votos')->get()->toArray();
			}])->get()->toArray();
			return $preg;
		}

	}
 ?>