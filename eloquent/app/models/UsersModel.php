<?php 
namespace Models;

use \Illuminate\Database\Eloquent\Model;

class UsersModel extends Model {

	protected $table = "users";
	protected $fillable = [
		'username', 
		'password', 
		'email'];
}

 ?>