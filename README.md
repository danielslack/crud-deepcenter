APP demo de CRUD em PHP 7.+ utilizando Eloquent ORM, Bootstrap e Mysql

Instruções para instalação

Copiar as arquivos para a pasta app para a htdocs do Apache

Editar o arquivo em bootstrap.php para incluir as informações de conexão com o banco de dados:

$capsule->addConnection([
   "driver" => "mysql",
   "host" =>"localhost",
   "database" => "database_name",
   "username" => "root",
   "password" => "password",
   "port" => "3307"
]);

No browser acessar o arquivo localizado em DB\usuario_migration.php
http://localhost/app/db/usuario_migration.php

Acessar a aplicação no endereço:
http://localhost/app/index.php
