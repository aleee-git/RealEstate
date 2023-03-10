<?php 

// Conexion a DB
include '../includes/templates/config/database.php';
$db = conectarDB();

// Consultar DB para los vendedores
$consulta = "SELECT * FROM vendedores";
// Guardar Resultado
$resultado = mysqli_query($db, $consulta);

// Para errores
$error = [];

// Inician vacias y luego se asigna el valor
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$toilet = '';
$estacionamiento = '';
$fk_vendedor = '';

// Se ejecuta despues de enviar los datos
if ($_SERVER ['REQUEST_METHOD'] === 'POST') {

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

// Trae los valores ingresados - Asignar variables
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$habitaciones = $_POST['habitaciones'];
$toilet = $_POST['toilet'];
$estacionamiento = $_POST['estacionamiento'];
$fk_vendedor = $_POST['fk_vendedor'];
$creado = date('Y/m/d');

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

// echo "<pre>";
// var_dump($error);
// echo "</pre>";

// Se insertara con condicion, solo si el arreglo de error este vacio
if(empty($error)) {
    // Inserta en DB
    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, toilet, estacionamiento, creado, fk_vendedor)
    VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$toilet', '$estacionamiento', '$creado', '$fk_vendedor')";

    // Guardar en DB = conexion +  consulta
    $result = mysqli_query($db, $query);

    // Redireccionar al llenar el formulario
    if ($result) {
        //Confirmar Resultado
        //echo $query;
        header('Location: /realestate/crud/index.php');
    }
}
}


include '../includes/templates/header.php';
?>

    <main class="contenedor seccion">
        <h1>Create Property</h1>
        <a href="index.php" class="boton boton-verde" style="display: inline-block;">Return</a>

        <!-- Mostrar Errores -->
        <?php foreach($error as $errores): ?>
            <div class="alerta error">
                <?php echo $errores; ?>
            </div>
        <?php endforeach; ?>
        
        <form class="formulario" method="POST" action="./create.php">
            <fieldset>
                <legend>General Info</legend>

                <label for="titulo">Title</label>
               <input name="titulo" id="titulo" type="text" value="<?php echo $titulo; ?>">

                <label for="precio">Price</label>
                <input name="precio" id="precio" type="number" value="<?php echo $precio; ?>">

                <label for="imagen">Image</label>
                <input name="imagen" id="imagen" type="file" accept="image/jpeg, image/png">

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

            <input type="submit" class="boton boton-amarillo" value="Create">
        </form>
    </main>

<?php 

include '../includes/templates/footer.php';

?>
