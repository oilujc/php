<?php 
namespace App\Models;

class Capitulos{
	private $db;

	public function __construct(){
		$this->db = \Core\Database::getConnection();
	}
	public function listar(): array{
		$row = [];
		try {
			$sql = "SELECT * FROM capitulos";
			$result = $this->db->query($sql);
			while($row[] = $result->fetch_assoc());
			array_pop($row);
		} catch (\Exception $e) {
			die("No se puede generar consulta ".$e->getMessage());
		}
		return $row;
		
	}
	public function obtener($id): array{
		$row = [];
		try {
			$sql = "SELECT * FROM capitulos WHERE idcursos = $id";
			$result = $this->db->query($sql);
			while($row[] = $result->fetch_assoc());
			array_pop($row);
		} catch (\Exception $e) {
			die("No se puede generar consulta ".$e->getMessage());
		}
		return $row;
		
	}
}

 ?>