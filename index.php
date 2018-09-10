<?php
require_once("config.php");

$user = new Usuario();

$user->loadById(5);

var_dump($user);

?>