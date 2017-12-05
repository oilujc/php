<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

//Middleware


//Pagina principal
$app->get('/', function (Request $request, Response $response) {
		$nombre = $this->router->pathFor('nombre',[
			'nombre' => 'Julio'
		]);
		$edad = $this->router->pathFor('edad',[
			'edad' => 23
		]);
		$apellido = $this->router->pathFor('apellido',[
			'ape' => 'Martinez'
		]);
		$response->write("<h1>Index</h1>");
		$response->write("<a href='".$nombre."'>Nombre</a><br>");
		$response->write("<a href='".$edad."'>Edad</a><br>");
		$response->write("<a href='".$apellido."'>Apellido</a><br>");
})->setName("home");

//Retorna "Hola, {nombre indicado}"
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

//Retorna un array con los n cantidad de parametros indicados"
$app->get('/eje1[/{params:.*}]', function (Request $request, Response $response) {
    $params = explode('/', $request->getAttribute('params'));
    foreach ($params as $key) {
     	echo $key."<br>";
    }
});

//Puedes especificar que parametros quieres en la url
$app->get('/eje2/{id:[0-9]+}', function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
    echo "Numero: ".$id;
});

//Grupos de rutas
$app->group('/api', function() use ($app){
	$app->get('/nombre/{nombre}', function (Request $request, Response $response) {
   		$nombre = $request->getAttribute('nombre');
  	 	echo "Hola ".$nombre;
	})->setName('nombre');

	$app->group('/datos', function () use ($app) {
   		$app->get('/edad/{edad:[0-9]+}', function (Request $request, Response $response) {
   			$edad = $request->getAttribute('edad');
   			echo "Tu edad es: ".$edad;
		})->setName('edad');
		$app->get('/apellido/{ape:[a-zA-z]+}', function (Request $request, Response $response) {
   			$ape = $request->getAttribute('ape');
   			echo "Tu apellido es: ".$ape;
		})->setName('apellido');
		

	});
});

$app->run();

?>|