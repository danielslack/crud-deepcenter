<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "bootstrap.php";

// Recupera as informações do usuário passado por parametro POST

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];

// Cria o usuário na base de dados.
$user = Usuario::create([
    'nome' => $nome,
    'email' => $email,
    'telefone' => $telefone,
    'cep' => $cep,
    'endereco' => $endereco,
    'numero' => $numero,
    'bairro' => $bairro
]);


