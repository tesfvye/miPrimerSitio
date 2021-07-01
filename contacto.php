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
    <title>Contacto</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <!--Aqui se ve todo el codigo por el usuario-->
    <!-- cabecera del sitio y menu de navegacion -->
    <header>
        <h1></h1>
        <!-- llamada a sitio menu.php -->
        <?php include('partials/menu.php'); ?>
    </header>
    <!-- cuerpo central de la pagina web -->
    <section>
        <?php if(isset($_GET['m']) && $_GET['m'] == 'ok'): ?>
            <p class="alert-success">El rol se ha registrado correctamente</p>
        <?php endif; ?>

        <h1>Medios de Contacto</h1>
        <h4>Puede contactarnos a través de:</h4>
        <p>Email: contacto@tapps.cl Teléfono: +56 2 56783212</p>
        <a href="https://intranet.aiep.cl">Ingrese a Intranet.</a>
    </section> 
    <!-- pie de pagina del sitio -->
    <footer>
        <?php include('partials/footer.php'); ?>
    </footer> 
    
</body>
</html>