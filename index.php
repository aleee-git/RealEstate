<?php 
$inicio = true;

include './includes/templates/header.php'
?>
    <main class="contenedor seccion">
        <h1>More About Us</h1>
        
        <div class="iconos-nosotros">

            <div class="icono">
                <img src="/realestate/build/img/icono1.svg" alt="Icono" loading="lazy">
                <h3>Security</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet soluta cum atque excepturi non ullam commodi 
                temporibus aspernatur nam quos incidunt delectus sequi dolor dolorum, eius sapiente placeat natus dolorem.</p>
            </div>

            <div class="icono">
                <img src="/realestate/build/img/icono2.svg" alt="Icono" loading="lazy">
                <h3>Price</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet soluta cum atque excepturi non ullam commodi 
                temporibus aspernatur nam quos incidunt delectus sequi dolor dolorum, eius sapiente placeat natus dolorem.</p>
            </div>

            <div class="icono">
                <img src="/realestate/build/img/icono3.svg" alt="Icono" loading="lazy">
                <h3>Time</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet soluta cum atque excepturi non ullam commodi 
                temporibus aspernatur nam quos incidunt delectus sequi dolor dolorum, eius sapiente placeat natus dolorem.</p>
            </div>

        </div>
    </main>

    <section class="seccion contenedor">
        <h2> Available Houses and Apartments </h2>

        <?php 

        // Limita la cantidad de anuncios a mostrar (3)
        $limite = 3;
        include './includes/templates/anuncio.php';

        ?>

        <div class="alinear-derecha">
            <a href="ads.php" class="boton-amarillo">See All</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Find Your Dream House</h2>
        <p>Fill out the form and a representative will contact you as soon as possible</p>
        <a href="contact.php" class="boton-amarillo">Contact Us</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Our Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/realestate/build/img/blog1.webp" type="image/webp">
                        <source srcset="/realestate/build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="/realestate/build/img/blog1.jpg" alt="Imagen">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="view.html">
                        <h4>Terrace on the roof of your house</h4>
                        <p class="info-meta"> Updated on <span> February 24, 2023 </span> by: <span> Ale </span> </p>
                        <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. A praesentium tempore error aliquid, architecto sit velit facilis quod incidunt.</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="/realestate/build/img/blog2.webp" type="image/webp">
                        <source srcset="/realestate/build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="/realestate/build/img/blog2.jpg" alt="Imagen">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="view.php">
                        <h4>Guide to decorating your house</h4>
                        <p class="info-meta"> Updated on <span> February 24, 2023 </span> by: <span> Ale </span> </p>
                        <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. A praesentium tempore error aliquid, architecto sit velit facilis quod incidunt.</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimonials</h3>
            <div class="testimonial">
                <blockquote>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores aperiam aut odit voluptate possimus temporibus voluptatibus sit assumenda.
                </blockquote>
                <p>- Ale Ramirez</p>
            </div>
        </section>
    </div>

    <?php 

    include 'includes/templates/footer.php';
    
    ?>


