<?php 
include './includes/templates/header.php'
?>

    <main class="contenedor seccion">

        <section class="seccion contenedor">
            <h2>Houses and apartments in sales</h2>

        <?php 
        $limite = 10;
        include './includes/templates/anuncio.php';
        ?>

    </main>

    <?php 
    include 'includes/templates/footer.php'
    ?>
    