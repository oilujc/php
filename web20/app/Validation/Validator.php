<?php 

namespace App\Validation;



use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{

	//Errores de validacion
	protected $errors;

	/*Recorre las reglas y si encuentra un error 
	lo añade a los errores de validacion, si todo esta correcto se retorna a si misma
	*/
	public function validate($request, $rules)
	{
		
		foreach ($rules as $field => $rule) {

			try{
				$rule->setName(ucfirst($field))->assert($request->getParam($field));

			}catch(NestedValidationException $e) {

				$this->errors[$field] = $e->getMessages();

			}
		}

		//Crea una session para los errores	
		$_SESSION['errors'] = $this->errors;

		return $this;
	}

	//Retorna False si los errores estan vacios, si no, retorna true
	public function failed()
	{
		return !empty($this->errors);
	}
}
 ?>