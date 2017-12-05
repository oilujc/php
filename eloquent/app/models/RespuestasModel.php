<?php 
namespace Models;

use \Illuminate\Database\Eloquent\Model;

class RespuestasModel extends Model {

	protected $table = "respuestas";
	protected $fillable = [
		'users_id',
		'preguntas_id',
		'respuesta',
		'visible'];

	public function votos(){
   		return $this->hasMany('\Models\VotosModel', "respuestas_id");
	}
}

 ?>