<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$db = new mysqli("localhost", "root", "", "prueba");

//listar todos los productos
$app->get('/productos', function() use ($db,$app){
	$query = $db->query("SELECT * FROM productos");
	$productos = [];
	while($productos[] = $query->fetch_assoc());
	echo json_encode($productos);
});

//Obtener 1 producto
$app->get('/productos/{id:[0-9]+}', function(Request $request, Response $response, $args) use ($db,$app){

	$id = $args['id'];
	$query = $db->query("SELECT * FROM productos WHERE id=".$id."");
	echo json_encode($query->fetch_assoc());
});

$app->post('/productos', function(Request $request, Response $response) use ($db){
	$data = $request->getParsedBody();
	if (!empty($data)) {
		if ($data['id'] != 0) {
		$sql = "UPDATE productos SET 
								nombre = '".$data['nombre']."',
								descripcion = '".$data['descripcion']."',
								precio = '".$data['precio']."'
								WHERE id = ".$data['id']."";
		$query = $db->query($sql);
		if ($query) {
			$result = ["STATUS" => "true", "message" => "Producto actualizado correctamente"];
		}else {
			$result = ["STATUS" => "false", "message" => "Producto NO SE HA actualizado"];
		}
		echo json_encode($result);
	}else{
		$sql = "INSERT INTO productos VALUES (NULL,
								'".$data['nombre']."',
								'".$data['descripcion']."',
								'".$data['precio']."'
								)";
		$query = $db->query($sql);
		if ($query) {
			$result = ["STATUS" => "true", "message" => "Producto creado correctamente"];
		}else {
			$result = ["STATUS" => "false", "message" => "Producto NO SE HA creado"];
		}
		echo json_encode($result);
	}
	}
});

$app->delete('/productos/{id:[0-9]+}', function(Request $request, Response $response, $args) use ($db){

	$sql = "DELETE FROM productos WHERE id=".$args["id"]."";

	$query = $db->query($sql);
	if ($query) {
		$result = ["STATUS" => "true", "message" => "Producto se ha eliminado correctamente"];
	}else {
		$result = ["STATUS" => "false", "message" => "Producto NO SE HA eliminado"];

	}
	echo json_encode($result);
});

$app->run();
 ?>