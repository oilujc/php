<?php 
namespace Models;

use \Illuminate\Database\Eloquent\Model;



class PreguntasModel extends Model {

	protected $table = "preguntas";
	protected $fillable = [
		'users_id', 
		'pregunta', 
		'visible'];

	public function respuestas(){
		return $this->hasMany('\Models\RespuestasModel', 'preguntas_id');
	}
	public function users(){
		return $this->belongsTo('\Models\UsersModel', 'users_id');
	}
	
}

 ?>