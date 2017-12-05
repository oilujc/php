<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Modelo del usuario
class Users extends Model {

	//Establece la tabla del modelo
	protected $table = 'usuarios';

	//Datos rellenables de la tabla
	protected $fillable = [

		'username',
		'password',
		'email',
	];

}

 ?>