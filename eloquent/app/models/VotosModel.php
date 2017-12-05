<?php 
namespace Models;

use \Illuminate\Database\Eloquent\Model;

class VotosModel extends Model {

	protected $table = "votos";
	protected $fillable = [
		'respuestas_id', 
		'users_id', 
		'visible'];
}

 ?>