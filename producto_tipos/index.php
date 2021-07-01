<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../class/productoTipoModel.php');
require('../class/rutas.php');

$productoTipos = new productoTipoModel;
$productoTipos = $productoTipos->getProductoTipos();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Productos</title>
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
                <p class="alert-success">El Tipo de Producto se registró correctamente.</p>
            <?php endif; ?>
            <h1>Tipos de Productos</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productoTipos as $productoTipos): ?>
                        <tr>
                            <td>
                                <a href="show.php?id=<?php echo $productoTipos['id']; ?>">
                                    <?php echo $productoTipos['id'] ?>
                                </a>
                            </td>
                            <td> 
                               <?php echo $productoTipos['nombre']; ?> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="enlace">
                <a href="add.php" class="btn btn-primary">Nuevo Tipo de Producto</a>
            </p>
        </div>
    </section> 

    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer> 
    
</body>

</html>