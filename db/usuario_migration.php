<?php

require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('usuarios', function ($table) {
    $table->increments('id');
    $table->string('nome');
    $table->string('email')->unique();
    $table->string('telefone');
    $table->string('cep');
    $table->string('endereco');
    $table->string('numero');
    $table->string('bairro');
    $table->timestamps();
});