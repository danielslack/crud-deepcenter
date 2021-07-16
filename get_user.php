<?php

require "bootstrap.php";

$id = $_GET['id'];

$usuarios = Usuario::where('id', $id)->first();
header('Content-Type: application/json');
echo json_encode($usuarios);
