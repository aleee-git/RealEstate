<?php 

// Conexion a DB
include '../includes/templates/config/database.php';
$db = conectarDB();
// var_dump($db);


include '../includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Create Property</h1>
        <a href="index.php" class="boton boton-verde" style="display: inline-block;">Return</a>

        <form class="formulario">
            <fieldset>
                <legend>General Info</legend>

                <label for="titulo">Title</label>
                <input id="titulo" type="text">

                <label for="precio">Price</label>
                <input id="precio" type="number">

                <label for="imagen">Image</label>
                <input id="imagen" type="file" accept="image/jpeg, image/png">

                <label for="descripcion">Description</label>
                <textarea id="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Info</legend>

                <label for="hab">Rooms</label>
                <input id="hab" type="number" min="1" max="9">

                <label for="toilet">Bathrooms</label>
                <input id="toilet" type="number" min="1" max="9">

                <label for="parqueo">Parking Area</label>
                <input id="parqueo" type="number" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Sales Person</legend>

                <select id="">
                    <option value="" disabled selected>--- Select One ---</option>
                    <option value="1">Juan</option>
                    <option value="2">Karen</option>
                    <option value="3">Jose</option>
                </select>
            </fieldset>

            <input type="submit" class="boton boton-amarillo" value="Create">
        </form>
    </main>

<?php 

include '../includes/templates/footer.php';

?>
