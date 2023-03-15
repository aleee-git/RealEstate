<?php 

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
                <tr>
                    <td> 1 </td>
                    <td> Lake House </td>
                    <td> <img src="/src/img/anuncio1.jpg" class="imagen-tabla"></td>
                    <td> $100,000.00</td>
                    <td>
                        <a href="#" class="boton-rojo-block">Delete</a>
                        <a href="#" class="boton-amarillo-block">Update</a>
                    </td>
                </tr>
            </tbody>

        </table>

    </main>

<?php 
include '../includes/templates/footer.php';
?>
