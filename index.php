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

//$usuario = new Usuario();
//$usuario->login("root","123456789");

//echo $usuario;


/* Criando novo usuário
$aluno = new Usuario("Aluno2", "@lun0@2");

$aluno->insert();

echo $aluno;


// Update

$usuario = new Usuario();

$usuario->loadById(9);

$usuario->update("Professor", "Pr0fess0R");

echo $usuario;
*/

//Excluir um usuário
$usuario = new Usuario();

$usuario->loadById(6);

$usuario->delete();

echo $usuario;

?>