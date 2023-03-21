<?php 

// Validar id numero
$idPropiedad = $_GET['idPropiedad'];
$idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);

if(!$idPropiedad) {
    header('Location: ./index.php');
}

// Conexion a DB
include 'includes/templates/config/database.php';
$db = conectarDB();

//Consultar DB y limita a 3 anuncios
$query = "SELECT * FROM propiedades WHERE idPropiedad = $idPropiedad";

// Obtener resultado
$result = mysqli_query($db, $query);

// Validar id exista
if(!$result->num_rows){
    header('Location: ./index.php');
}

$propiedad = mysqli_fetch_assoc($result);


include './includes/templates/header.php';

?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
        
        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Destacada">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono-dark" loading="lazy" src="/realestate/build/img/icono_wc.svg" alt="Icono">
                    <p><?php echo $propiedad['toilet']; ?></p>
                </li>

                <li>
                    <img class="icono-dark" loading="lazy" src="/realestate/build/img/icono_estacionamiento.svg" alt="Icono">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>

                <li>
                    <img class="icono-dark" loading="lazy" src="/realestate/build/img/icono_dormitorio.svg" alt="Icono">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <p class="parrafo"> <?php echo $propiedad['descripcion']; ?> </p>
        </div>
    </main>

    <?php 

    // Cerrar db
    mysqli_close($db);

    include 'includes/templates/footer.php'
    ?>
    