<?php
require "bootstrap.php";

$email = $_GET['email'];
$id = $_GET['id'];

$usuario = Usuario::where('id', $id)->first();

if($usuario){ 
$usuario->delete();
}

