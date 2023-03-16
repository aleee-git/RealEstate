<?php 

// Validar el id solo sea entero
$idPropiedad = $_GET['idPropiedad'];
$idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);

// Si el id no es un entero o no existe lo redirige
if (!$idPropiedad) {
    header('Location: /realestate/crud/index.php');
}

// Conexion a DB
include '../includes/templates/config/database.php';
$db = conectarDB();

// Consultar DB para propiedades
$query = "SELECT * FROM propiedades where idPropiedad = $idPropiedad";
$result = mysqli_query($db, $query); // Guardar Resultado
$propiedad = mysqli_fetch_assoc($result);

// Consultar DB para los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta); // Guardar Resultado

// Para errores
$error = [];

// Inician con los valores previos desde DB
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$toilet = $propiedad['toilet'];
$estacionamiento = $propiedad['estacionamiento'];
$fk_vendedor = $propiedad['fk_vendedor'];
$imagenPropiedad = $propiedad['imagen'];

// Se ejecuta despues de enviar los datos
if ($_SERVER ['REQUEST_METHOD'] === 'POST') {

    $numero = "1Holi3";

    // Sanitizar Resultado = variable + filtro especifico
    $sanitizar = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
    //var_dump($sanitizar);

// mysqli_real_escape_string evita que cualquier inyeccion SQL dañe la DB
// Trae los valores ingresados - Asignar variables
$titulo = mysqli_real_escape_string($db, $_POST['titulo']);
$precio = mysqli_real_escape_string($db, $_POST['precio']);
$descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
$habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
$toilet = mysqli_real_escape_string($db, $_POST['toilet']);
$estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
$fk_vendedor = mysqli_real_escape_string($db, $_POST['fk_vendedor']);
$creado = date('Y/m/d');

$imagen = $_FILES['imagen'];

// Validar formulario, que los campos no esten vacios y se guardan en el arreglo error
if(!$titulo){
    $error[] = "Please enter a valid TITLE";
}
if(!$precio){
    $error[] = "Please enter a valid PRICE";
}
// VAlidar que la descripcion sea extensa
if(strlen($descripcion) <= 25){
    $error[] = "Please enter a valid or more especific DESCRIPTION";
}
if(!$habitaciones){
    $error[] = "Please enter a valid number of ROOMS";
}
if(!$toilet){
    $error[] = "Please enter a valid number of BATHROOMS";
}
if(!$estacionamiento){
    $error[] = "Please enter a valid number of PARKING";
}
if(!$fk_vendedor){
    $error[] = "Please choose a SALES PERSON";
}

// Validar tamaño 1mb max - Convertir de bytes a Kb
$tam = 1000 * 1000;
if($imagen['size'] > $tam) {
    $error[] = 'The image size is too large';
}

// Se insertara con condicion, solo si el arreglo de error este vacio
if(empty($error)) {

    // Crear carpeta para almacenar imagenes
    $carpetaImagenes = '../imagenes/';

    if(!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
    }

    // Nombre unico de imagen
    $nombreImagen = md5(uniqid(rand(), true)).".jpg";

    // Guardar imagen en el servidor
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);

    // Inserta en DB
    $query = "UPDATE propiedades set titulo = '$titulo', precio = $precio, descripcion = '$descripcion', 
    habitaciones = $habitaciones, toilet = $toilet, estacionamiento = $estacionamiento, fk_vendedor = $fk_vendedor
    WHERE idPropiedad = $idPropiedad";

    // Guardar en DB = conexion +  consulta
    $result = mysqli_query($db, $query);

    // Redireccionar al llenar el formulario
    if ($result) {
        //Confirmar Resultado
        //echo $query;
        header('Location: /realestate/crud/index.php?mensaje=2');
    }
}
}


include '../includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Update Property</h1>
        <a href="index.php" class="boton boton-verde" style="display: inline-block;">Return</a>

        <!-- Mostrar Errores -->
        <?php foreach($error as $errores): ?>
            <div class="alerta error">
                <?php echo $errores; ?>
            </div>
        <?php endforeach; ?>
        
        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>General Info</legend>

                <label for="titulo">Title</label>
               <input name="titulo" id="titulo" type="text" value="<?php echo $titulo; ?>">

                <label for="precio">Price</label>
                <input name="precio" id="precio" type="number" value="<?php echo $precio; ?>">

                <label for="imagen">Image</label>
                <input name="imagen" id="imagen" type="file" accept="image/jpeg, image/png">
                <img src="/imagenes/<?php echo $imagenPropiedad; ?> " class="imagen-small" alt="Imagen-Previa">

                <label for="descripcion">Description</label>
                <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Info</legend>

                <label for="habitaciones">Rooms</label>
                <input name="habitaciones" id="habitaciones" type="number" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="toilet">Bathrooms</label>
                <input name="toilet" id="toilet" type="number" min="1" max="9" value="<?php echo $toilet; ?>">

                <label for="estacionamiento">Parking Area</label>
                <input name="estacionamiento" id="estacionamiento" type="number" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Sales Person</legend>

                <select name="fk_vendedor">
                    <option value="" disabled selected>--- Select One ---</option>
                    <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $fk_vendedor === $vendedor['idVendedor'] ? 'selected' : ''; ?> value="<?php  echo $vendedor['idVendedor']; ?>"> <?php echo $vendedor['nombre']. " ".$vendedor['apellido']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" class="boton boton-amarillo" value="Update">
        </form>
    </main>

<?php 

include '../includes/templates/footer.php';

?>
