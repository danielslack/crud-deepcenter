<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Usuario extends Eloquent
{
  protected $fillable = [
    'nome', 'email','telefone', 'cep', 'endereco', 'numero','bairro'
  ];
}
