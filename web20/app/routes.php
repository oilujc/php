<?php 

//Ruta home
$app->get('/' , 'HomeController:index')->setName('home');


//Llamada GET de signup
$app->get('/auth/signup' , 'AuthController:getSignUp')->setName('auth.signup');

//Llamada POST de signup
$app->post('/auth/signup' , 'AuthController:postSignUp');


 ?>