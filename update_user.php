<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "bootstrap.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];


$usuario = Usuario::where('id', $id)->first();

if ($usuario) {
$usuario->nome = $nome;
$usuario->email = $email;
$usuario->telefone = $telefone;
$usuario->cep = $cep;
$usuario->endereco = $endereco;
$usuario->numero = $numero;
$usuario->bairro = $bairro;
$usuario->save();
}


