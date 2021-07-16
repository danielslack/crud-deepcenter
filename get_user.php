<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "bootstrap.php";

// Recupera o id do usuário passado por paramtro em GET

$id = $_GET['id'];

// Localiza o usuário na base de dados e devolve um objeto JSON
$usuarios = Usuario::where('id', $id)->first();
header('Content-Type: application/json');
echo json_encode($usuarios);
