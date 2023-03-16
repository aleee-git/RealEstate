<?php 

// Importar
include '../includes/templates/config/database.php';
$db = conectarDB();

// Consultar DB para extraer la info
$query = "SELECT * FROM propiedades";

// Guardar Resultado
$result = mysqli_query($db, $query);

// Mensaje de Alerta
$mensaje = $_GET['mensaje'] ?? null;

include '../includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Real Estate Admin</h1>
        <?php if (intval($mensaje) === 1): ?>
            <p class="alerta exito">Property Registered</p>
        <?php endif; ?>
        <a href="create.php" class="boton boton-verde" style="display: inline-block;">New Property</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Title </th>
                    <th> Image </th>
                    <th> Price </th>
                    <th> Actions </th>
                </tr>
            </thead>

            <tbody>

                <?php while ($propiedad = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td> <?php echo $propiedad['idPropiedad'] ?> </td>
                    <td> <?php echo $propiedad['titulo'] ?> </td>
                    <td> <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"> </td>
                    <td> $ <?php echo $propiedad['precio'] ?> </td>
                    <td>
                        <a href="#" class="boton-rojo-block">Delete</a>
                        <a href="#" class="boton-amarillo-block">Update</a>
                    </td>
                </tr>
                <?php endwhile; ?>

            </tbody>

        </table>

    </main>

<?php 

// Cerrar conexion a DB
mysqli_close($db);

include '../includes/templates/footer.php';
?>
