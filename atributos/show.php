<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require('../class/atributoModel.php');
    require('../class/rutas.php');

    //verificar que la variable id enviada desde index.php ha ingresado en esta pagina
    if (isset($_GET['id'])) {
        # guardar la variable GET id en una variable manejable
        $id = (int) $_GET['id']; //parseamos la variable id obligandola a que sea un numero entero
        $atributos = new atributoModel;
        $atributos = $atributos->getAtributoId($id);

       /*  echo '<pre>';
        print_r($atributo);exit;
        echo '</pre>'; */
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atributos</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <header>
        <?php include('../partials/menu.php'); ?>
    </header>

    <section>
        <div class="contenido">
            <?php if(isset($_GET['m']) && $_GET['m'] == 'ok'): ?>
                <p class="alert-success">El Atributo se ha modificado correctamente.</p>
            <?php endif; ?>
            <h1>Atributos</h1>
            <!-- verificar que el arreglo atributos tenga datos -->
            <?php if($atributos):?>
                <table class="table">
                    <tr>
                        <th>ID:</th>
                        <td> <?php echo $atributos['id']; ?> </td>
                    </tr>
                    <tr>
                        <th>Nombre Atributo:</th>
                        <td> <?php echo $atributos['nombre']; ?> </td>
                </table>
                <p class="enlace">
                    <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-primary">Editar</a>
                    <a href="index.php" class="btn btn-link">Volver</a>
                </p>
            <?php else: ?>
                <p class="text-info">El dato no existe.</p>
            <?php endif; ?>
        </div>
    </section> 

    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer> 
    
</body>
</html>