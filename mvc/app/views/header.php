<!DOCTYPE html>
<html lang="es">
 
<head>
<title><?php echo $page["title"]; ?></title>
<meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
 
<body>
    <div class="container">
        <div class="row">
        	<div class="col-xs-12">
			
		        <h1 class="jumbotron">
		            PHP con MVC
		        </h1>
		        <nav class="navbar navbar-inverse">
		        	<ul class="nav navbar-nav">
		             	<li class="nav-item <?php echo $page["h"]; ?>"><a href="<?php echo '?c=home'; ?>">Inicio</a></li>
		        		<li class="nav-item <?php echo $page["l"]; ?>"><a href="<?php echo '?a=listar'; ?>">Cursos</a></li>
		        		<li class="nav-item"><a href="">Usuarios</a></li>
		        	</ul>
		        </nav>
    		</div>
  	  </div>
  	  <div class="row">
  	  	<div class="col-xs-12"></div>