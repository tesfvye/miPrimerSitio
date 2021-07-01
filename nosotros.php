<?php
require('class/rutas.php');
?>
<!--Estructura del DOM (Document Object Model)-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Primera Página</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <!--Aqui se ve todo el codigo por el usuario-->
    <!-- cabecera del sitio y menu de navegacion -->
    <header>
        <h1></h1>
        <!-- navegador principal del sitio -->
        <?php include('partials/menu.php'); ?>
        <!-- fin navegador -->
    </header>
    <!-- cuerpo central de la pagina web -->
    <section>
        <h1>Nuestra Página</h1>
        <!-- lado derecho de la pagina -->
        <article class="derecho">
            <img src="img/img_empresa.jpeg" alt="Imagen Empresa" style="width: 96%; margin-right:4%">
        </article>
        <!-- lado izquierdo de la pagina -->
        <article class="izquierdo">
            <div class="texto">
                <p>Sitio web creado en el ramo Taller de Aplicaciones para Internet.</p>
                <p>Profesor: Segundo Galdames Henriquez.</p>
                <p>Sección: 3500 AIEP 2021.</p>
            </div>
            <div class="video">
                <iframe width="640" height="360" src="https://www.youtube.com/embed/FBM4cdml6Qs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            
        </article>
    </section> 
    <!-- pie de pagina del sitio -->
    <footer>
        <?php include('partials/footer.php'); ?>
    </footer> 
    
</body>
</html>