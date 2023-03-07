<?php 
include './includes/templates/header.php'
?>

    <main class="contenedor seccion">
        <h1>About Us</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="/realestate/build/img/nosotros.webp" type="image/webp">
                    <source srcset="/realestate/build/img/nosotros.jpg" type="image/jpep">
                    <img loading="lazy" src="/realestate/build/img/nosotros.jpg" alt="Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Years Experience
                </blockquote>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At repellendus nulla tempora sint accusamus enim amet 
                    dolorum, ducimus odit possimus ipsa doloremque debitis hic a repellat perferendis error soluta quos.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. At repellendus nulla tempora sint accusamus enim amet 
                    dolorum, ducimus odit possimus ipsa doloremque debitis hic a repellat perferendis error soluta quos. 
                </p>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. At repellendus nulla tempora sint accusamus enim amet 
                    dolorum, ducimus odit possimus ipsa doloremque debitis hic a repellat perferendis error soluta quos. 
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>More About Us</h1>
        
        <div class="iconos-nosotros">

            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono" loading="lazy">
                <h3>Security</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet soluta cum atque excepturi non ullam commodi 
                temporibus aspernatur nam quos incidunt delectus sequi dolor dolorum, eius sapiente placeat natus dolorem.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono" loading="lazy">
                <h3>Price</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet soluta cum atque excepturi non ullam commodi 
                temporibus aspernatur nam quos incidunt delectus sequi dolor dolorum, eius sapiente placeat natus dolorem.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono" loading="lazy">
                <h3>Time</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet soluta cum atque excepturi non ullam commodi 
                temporibus aspernatur nam quos incidunt delectus sequi dolor dolorum, eius sapiente placeat natus dolorem.</p>
            </div>

        </div>
    </section>

    <?php 
    include 'includes/templates/footer.php'
    ?>
    