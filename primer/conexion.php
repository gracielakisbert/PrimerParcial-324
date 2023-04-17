<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bdgraciela';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
 /* echo 'Conexion establecida con la Base de Datos: '.$database;*/
} catch (PDOException $e) {
  die('Connexion Fallida: ' . $e->getMessage());
}

?>