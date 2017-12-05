<?php 

namespace App\Middleware;

/*Va a evaluar si hay errores en el signup, si los hay creara una variable global
para luego poder llamarlos desde las vistas */
class ValidationErrorsMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
 		

 		if (isset($_SESSION['errors'])) 
		{ 
			$this->container->view->getEnvironment()->addGlobal('errors',$_SESSION['errors']); 
			unset ($_SESSION['errors']); 
		}

        $response =  $next($request, $response);

        return $response;
	}
}

 ?>