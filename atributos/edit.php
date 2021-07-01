<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    

    require('../class/atributoModel.php');
    require('../class/rutas.php');

    $atributos = new atributoModel;
    
    if (isset($_GET['id'])) {
        
        $id = (int) $_GET['id'];
        
        $atributo = $atributos->getAtributoId($id);

        if (isset($_POST['confirm']) && $_POST['confirm'] == 1) {

            $nombre = trim(strip_tags($_POST['nombre']));

            if (!$nombre) {
                $msg = 'Ingrese el nombre del atributo';
            }else{

                $row = $atributos->updateAtributo($id, $nombre);

                if ($row) {
                    $msg = 'ok';
                    header('Location: show.php?id=' . $id . '&m=' . $msg);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <header>
        <?php include('../partials/menu.php'); ?>
    </header>

    <section>
        <h1>Editar Atributo</h1>
        <div class="contenido">
            <?php if(!empty($atributos)): ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="atributo">Atributo</label>
                        <input type="text" name="nombre" value="<?php echo $atributo['nombre']; ?>" class="form-control" placeholder="Ingrese el nombre del atributo">
                        <?php if(isset($msg)): ?>
                            <p class="text-danger">
                                <?php echo $msg; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="confirm" value="1">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="show.php?id=<?php echo $id; ?>" class="btn btn-link">Volver</a>
                    </div>
                </form>
            <?php else: ?>
                <p class="text-info">El dato no existe</p>
            <?php endif; ?>
        </div>

    </section> 

    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer> 
    
</body>

</html>