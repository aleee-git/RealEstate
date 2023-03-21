<?php 
// Conexion a DB
include './includes/templates/config/database.php';
$db = conectarDB();

//Consultar DB y limita a 3 anuncios
$query = "SELECT * FROM propiedades limit $limite";

// Obtener resultado
$result = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">

    <!-- Itera el div por cada anuncio que hay -->
    <?php while($propiedad = mysqli_fetch_assoc($result)): ?>

<div class="anuncio">
    <!-- Traer imagen de DB -->
        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">

    <div class="contenido-anuncio">
        <h3><?php echo $propiedad['titulo']; ?></h3>
        <p><?php echo $propiedad['descripcion']; ?></p>
        <p class="precio">$<?php echo $propiedad['precio']; ?></p>

        <ul class="iconos-caracteristicas">

            <li>
                <img class="icono-dark" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                <p><?php echo $propiedad['toilet']; ?></p>
            </li>

            <li>
                <img class="icono-dark" src="build/img/icono_estacionamiento.svg" alt="icono wc" loading="lazy">
                <p><?php echo $propiedad['estacionamiento']; ?></p>
            </li>

            <li>
                <img class="icono-dark" src="build/img/icono_dormitorio.svg" alt="icono wc" loading="lazy">
                <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>
        </ul>

        <a href="Ad.php?idPropiedad=<?php echo $propiedad['idPropiedad']; ?>" class="boton boton-amarillo-block"> See Property </a>
        
    </div>
</div>
<?php endwhile; ?>

</div>

<?php 
mysqli_close($db);
?>
