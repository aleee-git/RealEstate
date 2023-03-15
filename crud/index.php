<?php 

$mensaje = $_GET['mensaje'] ?? null;

include '../includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Real Estate Admin</h1>
        <?php if (intval($mensaje) === 1): ?>
            <p class="alerta exito">Property Registered</p>
        <?php endif; ?>
        <a href="create.php" class="boton boton-verde" style="display: inline-block;">New Property</a>
    </main>

<?php 

include '../includes/templates/footer.php';

?>