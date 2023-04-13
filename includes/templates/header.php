<?php 

if (!isset($_SESSION)){
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏠 Real Estate 🏠</title>
    <!-- CSS Style-->
    <link rel="stylesheet" href="/realestate/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/realestate/index.php">
                    <img src="/realestate/build/img/logo.svg" alt="Logo">
                </a>

                <div class="mobile-menu">
                    <img src="/realestate/build/img/barras.svg" alt="Barras">
                </div>

                <div class="derecha">
                    <img class="dark-mode" src="/realestate/build/img/dark-mode.svg" alt="Dark-mode">
                    <nav class="navegacion">
                        <a href="about.php">About</a>
                        <a href="ads.php">Ads</a>
                        <a href="blog.php">Blog</a>
                        <a href="contact.php">Contact</a>
                        <?php if($auth): ?>
                            <a href="salir.php">Log Out</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <?php 
            if ($inicio) {
                ?> 
                <h1> Houses and Apartments for Sale 😉</h1>
                <?php
            }
            ?>
            
        </div>
    </header>