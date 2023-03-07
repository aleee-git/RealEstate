<?php 
include './includes/templates/header.php'
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Lake House</h1>

        <picture>
            <source srcset="/realestate/build/img/destacada2.webp" type="image/webp">
            <source srcset="/realestate/build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="/realestate/build/img/destacada2.jpg" alt="Destacada">
        </picture>

        <p class="info-meta"> Updated on <span> February 24, 2023 </span> by: <span> Ale </span> </p>

        <div class="resumen-propiedad">
            <p class="parrafo">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At repellendus nulla tempora sint accusamus enim amet 
                dolorum, ducimus odit possimus ipsa doloremque debitis hic a repellat perferendis error soluta quos.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. At repellendus nulla tempora sint accusamus enim amet 
                dolorum, ducimus odit possimus ipsa doloremque debitis hic a repellat perferendis error soluta quos. 
            </p>
            <p class="parrafo">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. At repellendus nulla tempora sint accusamus enim amet 
                dolorum, ducimus odit possimus ipsa doloremque debitis hic a repellat perferendis error soluta quos. 
            </p>

        </div>

    </main>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="about.html">About</a>
                <a href="ads.html">Ads</a>
                <a href="blog.html">Blog</a>
                <a href="contact.html">Contact</a>
            </nav>
        </div>
        <p class="copyright">All Rights Reserved by Ale 2023 &copy;</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>
