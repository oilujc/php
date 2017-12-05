<?php 
namespace App\Models;

use Exception;

class Cursos{

	private $db;

	public function __construct(){
		$this->db = \Core\Database::getConnection();
	}
	public function listar(): array{
		$row = [];
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
			$sql = "SELECT * FROM cursos";
			$result = $this->db->query($sql);
			while($row[] = $result->fetch_assoc());
			array_pop($row);
		} catch (Exception $e) {
			die("Error al generar consulta ".$e->getMessage());
		}
		
		return $row;
	}
	public function obtener($id): array{

		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
			$sql = "SELECT * FROM cursos WHERE idcursos = $id";
			$result = $this->db->query($sql);
			return $result->fetch_assoc();
		} catch (Exception $e) {
			die("Error al generar consulta ".$e->getMessage());
		}
		
	}
}

 ?>