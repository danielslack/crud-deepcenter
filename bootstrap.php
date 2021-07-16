<?php


require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
   "driver" => "mysql",
   "host" =>"localhost",
   "database" => "deepcenter",
   "username" => "root",
   "password" => "deepcenter",
   "port" => "3307"
]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();