<?php 
// Conexion a DB
include 'includes/templates/config/database.php';
$db = conectarDB();

$errores= [];

// Autenticar Usuario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar email
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email) {
        $errores[] = "Email is required or the one you enter is not valid";
    }
    if(!$password) {
        $errores[] = "Password is required";
    }

    if(empty($errores)) {
        // Validar si existe usuario
        $query = "SELECT * FROM usuarios WHERE email = '$email' ";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            // Traer la info de la DB
            $usuario = mysqli_fetch_assoc($result);

            // Confirmar si es la misma password
            $existe = password_verify($password, $usuario['password']);

            if($existe) {
                // El usuario existe
            } else {
                $errores[] = "Invalid password";
            }
        } else {
            $errores[] = "User does not exist";
        }
    }
}


include './includes/templates/header.php';
?>

    <main class="contenedor seccion contenido-centrado">

        <h1>Log in to Real Estate App</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">

            <fieldset>
                <legend>🔒 Enter Your Email and Password 🔒</legend>

                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" id="password">

            </fieldset>

            <input type="submit" value="Log in" class="boton boton-verde">

        </form>
    </main>

    <?php 

    include 'includes/templates/footer.php';

    ?>
    