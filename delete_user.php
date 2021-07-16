<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "bootstrap.php";

/*
Recupera as informações de email e id do usuário.
*/
$email = $_GET['email'];
$id = $_GET['id'];

// Localiza o usuário na base de dados
$usuario = Usuario::where('id', $id)->first();


// Se encontrou o usuário então aplica a exclusão.
if($usuario){ 
$usuario->delete();
}

