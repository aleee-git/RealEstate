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

// Envia el id a eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPropiedad = $_POST['idPropiedad'];
    $idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);

    if ($idPropiedad) {

        // Elimina archivo
        $query = "SELECT imagen FROM propiedades WHERE idPropiedad = $idPropiedad";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink("../imagenes/".$propiedad['imagen']);

        // Elimina propiedad
        $query = "DELETE FROM propiedades WHERE idPropiedad = $idPropiedad";
        $resultado = mysqli_query($db, $query);
        
        if($resultado) {
        header('Location: /realestate/crud/index.php?mensaje=3');
        }
    }
}

include '../includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Real Estate Admin</h1>
        <?php if (intval($mensaje) === 1): ?>
            <p class="alerta exito">Property Registered</p>
        <?php elseif (intval($mensaje) === 2): ?>
            <p class="alerta exito">Property Updated</p>
        <?php elseif (intval($mensaje) === 3): ?>
            <p class="alerta exito">Property Deleted</p>
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
                    <td> <img src="/realestate/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-small"> </td>
                    <td> $ <?php echo $propiedad['precio'] ?> </td>
                    <td>
                        <form  method="POST" class="wp-100">
                            <!-- Se pasa el id de la propiedad a eliminar -->
                            <input type="hidden" name="idPropiedad" value="<?php echo $propiedad['idPropiedad']; ?>">
                            <input class="boton-rojo-block" type="submit" value="Delete">
                        </form>
                        <!-- Se lleva el id seleccionado para no perder la info -->
                        <a href="update.php?idPropiedad=<?php echo $propiedad['idPropiedad']  ?>" class="boton-amarillo-block">Update</a>
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
