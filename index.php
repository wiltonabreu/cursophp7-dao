<?php
require_once("config.php");

$user = new Usuario();

$user->loadById(6);

//var_dump($user);
echo $user;
?>