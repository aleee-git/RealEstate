<?php 
include './includes/templates/header.php'
?>

    <main class="contenedor seccion">
        <h1>Contact</h1>

        <picture>
            <source srcset="/realestate/build/img/destacada3.webp" type="image/webp">
            <source srcset="/realestate/build/img/destacada3..jpg" type="image/jpeg">
            <img loading="lazy" src="/realestate/build/img/destacada3..jpg" alt="Imagen">
        </picture>

        <h2>Fill out the Form</h2>
        <form class="formulario"> 
            <fieldset>
                <legend>Personal Information </legend>

                <label for="nombre">Name</label>
                <input type="text" id="nombre">

                <label for="email">E-Mail</label>
                <input type="email" id="email">

                <label for="telefono">Phone</label>
                <input type="tel" id="telefono">

                <label for="mensaje">Message</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Information</legend>
                <label for="mensaje">Sale or Purchase</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Select One --</option>
                    <option value="compra">Compra</option>
                    <option value="venta">Venta</option>
                </select>

                <label for="precio">Price or Budget </label>
                <input type="number" id="precio">
            </fieldset>

            <fieldset>
                <legend>Contact</legend>
                <p>How you would like to be contacted?</p>
                <div class="forma-contacto">
                    <label for="llamada">Phone</label>
                    <input name="contacto" type="radio" id="llamada">
                    <label for="correo">E-Mail</label>
                    <input name="contacto" type="radio" id="correo">
                </div>

                <p>If you choose phone, chose date and time</p>
                <label for="fecha">Date</label>
                <input type="date" id="fecha">
                
                <label for="hora">Time</label>
                <input type="time" id="hora" max="18:00" min="09:00">
            </fieldset>

            <input type="submit" class="boton-amarillo" value="Enviar">
        </form>
    </main>

    <?php 
    include 'includes/templates/footer.php'
    ?>
    