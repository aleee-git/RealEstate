<?php 
// Conexion a DB
include 'includes/templates/config/database.php';
$db = conectarDB();

// Crear User
$email = "correo@correo.com";
$password = "123456";

$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password');";

// Guardar en DB
mysqli_query($db, $query);

?>