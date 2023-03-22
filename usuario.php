<?php 
// Conexion a DB
include 'includes/templates/config/database.php';
$db = conectarDB();

// Crear User
$email = "Ale@correo.com";
$password = "123456"; // en DB debe ser de 60 caracteres fijos para usar Hash

// Hashear password - puede ser con PASSWORD_DEFAULT o PASSWORD_BCRYPT
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

// Guardar en DB
mysqli_query($db, $query);



?>
