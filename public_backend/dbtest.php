<?php

// Require Composer's autoloader.
require __DIR__ . '/../vendor/autoload.php';
 
// Using Medoo namespace.
use Medoo\Medoo;
 
// Connect the database.
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'repro_test',
    'username' => 'root',
    'password' => ''
]);
 
$data = $database->select('menu', ['ItemID', 'Name']);
echo json_encode($data);
 
// [{
//     "user_name" : "foo",
//     "email" : "foo@bar.com"
// }]