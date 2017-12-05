<?php 

require_once "config.php";
require_once "vendor/autoload.php";

use Core\Database;
use Controller\UsersController;
use Controller\PreguntasController;
use Controller\RespuestasController;
use Controller\VotosController;

//Iniciar la base de datos
Database::startUp();


//Crear un nuevo usuario
//UsersController::createUser("moderador", "moderador", "moderador@mipag.com");

//Crear una nueva pregunta
//PreguntasController::createPregunta(2, "¿Que es MySql?");

//Crear una nueva respuesta
//RespuestasController::createRespuesta(1,3,"Es un sistema de gestión de bases de datos relacional");

//Crear un nuevo Voto
//VotosController::createVoto(4,1);

//Obtener Preguntas con respuestas
/*$all = PreguntasController::getQuestionsWithAnswers();
foreach ($all as $ind1 => $value1) {
	foreach ($value1 as $ind2 => $value2) {
		if ($ind2 == "pregunta") {
			echo $value2 . "<br>";
		}
		if ($ind2 == "respuestas") {
			foreach ($value2 as $ind3 => $value3) {
				foreach ($value3 as $ind4 => $value4) {
					if ($ind4 == "respuesta") {
						echo $value4 . "<br>";
					}
				}
			}
		}
	}
}*/

//Obtener preguntas con usuarios
//$all = PreguntasController::getUsersWithQuestions();
//print_r($all);
/*foreach ($all as $ind1 => $value1) {
	foreach ($value1 as $ind2 => $value2) {
		if ($ind2 == "pregunta") {
			echo $value2 . "<br>";
		}
		if ($ind2 == "users") {
			foreach ($value2 as $ind3 => $value3) {
				if ($ind3 == "username") {
					echo $value3 . "<br>";
				}
			}
		}
	}
}*/
/*$resp = RespuestasController::getAnswersWithVotes();
print_r($resp);*/

$all = UsersController::ContadorDePreguntas(1);

//$all = PreguntasController::getQuestionsWithAnswers();
//$all = PreguntasController::getAllQuestionsWithUpvotes();
print_r($all);


echo "<h1> Todo ok </h1>";
 ?>