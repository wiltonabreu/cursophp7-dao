<?php
require_once("config.php");

//Carrega um usuário
//$user = new Usuario();
//$user->loadById(5);

//var_dump($user);
//echo $user;

//Carrega uma lista de usuários

//$lista = Usuario::getList();

//echo json_encode($lista);


//Carrega uma lista de usuários buscando pelo login

//$search = Usuario::search("root");

//echo json_encode($search);



//Carrega usuário usando o login e a senha

$usuario = new Usuario();
$usuario->login("root","123456789");

echo $usuario;
?>