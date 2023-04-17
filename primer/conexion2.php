<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bdgraciela';

$conn = new mysqli($server, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//echo "Conexión exitosa";

?>