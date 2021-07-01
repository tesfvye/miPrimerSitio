<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('../class/marcasModel.php');
    require('../class/productoModel.php');
    require('../class/productoTipoModel.php');
    require('../class/rutas.php');

    $marcas        = new marcasModel;
    $productos     = new ProductoModel;
    $productoTipos = new productoTipoModel;
    
    $marcas        = $marcas->getMarcas();
    $productoTipos = $productoTipos->getProductoTipos();

    if(isset($_GET['id'])){

        $id       = (int) $_GET['id'];
        $producto =  $productos->getProductoId($id);

    if (isset($_POST['confirm']) && $_POST['confirm'] == 1) {
        $sku          = trim(strip_tags($_POST['sku']));
        $nombre       = trim(strip_tags($_POST['nombre']));
        $precio       = filter_var($_POST['precio'], FILTER_VALIDATE_INT);
        $activo       = filter_var($_POST['activo'], FILTER_VALIDATE_INT);
        $marca        = filter_var($_POST['marca'], FILTER_VALIDATE_INT);
        $productoTipo = filter_var($_POST['productoTipo'], FILTER_VALIDATE_INT);
        
        if (strlen($sku) < 8) {
            $msg = 'El SKU debe contener al menos 8 caracteres.';
        }elseif (strlen($nombre) < 4) {
            $msg = 'El nombre debe contener al menos 4 caracteres.';
        }elseif (($activo) > 1) {
            $msg = 'Ingrese el estado.';
        }elseif (!$precio) {
            $msg = 'Debe ingresar un precio.';
        }elseif (!$marca) {
            $msg = 'Debe seleccionar una marca.';
        }elseif (!$productoTipo) {
            $msg = 'Debe seleccionar un tipo de producto.';
        }else{  
                $row = $productos->updateProducto($id, $sku, $nombre, $precio, $activo, $marca, $productoTipo);
                if ($row) {
                    $msg = 'ok';
                    header('Location: show.php?id='.$id.'&m='.$msg);
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
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <header>
        <?php  include('../partials/menu.php'); ?>
    </header>

    <section>
        <h1>Editar Producto</h1>

        <div class="formulario">
          
            <?php if(isset($msg)): ?>
                <p class="text-danger">
                     <?php echo $msg; ?>
                </p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="sku">SKU: </label>
                    <input type="text" name="sku" class="form-control" 
                    placeholder="Ingrese el Sku del producto" value ="<?php
                    if(isset($_POST['sku'])) echo $_POST['sku']; ?>">
                </div>

                <div>
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" class="form-control" 
                    placeholder="Ingrese el nombre del producto" value ="<?php
                    if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>">
                </div>

                <div class="form-group">
                    <label for="estado">Estado: </label>
                         <select name="activo" class="form-control">
                                    <option value="<?php echo $producto['activo'] ?>">
                                         <?php if($producto['activo'] == 1): ?>
                                            Activo
                                         <?php else: ?>
                                            Inactivo
                                         <?php endif; ?>
                                    </option>
                                         <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                         </select>
                </div>

                <div class="form-group">
                    <label for="precio">Precio: </label>
                    <input type="number" name="precio" class="form-control" 
                    placeholder="Ingrese el precio del producto" value ="<?php
                    if(isset($_POST['precio'])) echo $_POST['precio']; ?>">
                </div>
                
                <div class ="form-group">   
                    <label for="marca">Marca: </label>
                    <select name="marca" class ="form-control">
                        <option value="">Seleccione...</option>
                        
                       <?php foreach($marcas as $marca): ?>
                        <option value="<?php echo $marca['id'];?>">
                            <?php echo $marca ['nombre']; ?>
                        </option>
                       <?php endforeach;?>
                    </select>
                </div>
                <div class ="form-group">   
                    <label for="productoTipo">Tipo de Producto: </label>
                    <select name="productoTipo" class ="form-control">
                        <option value="">Seleccione...</option>

                       <?php foreach($productoTipos as $productoTipo): ?>
                        <option value="<?php echo $productoTipo['id'];?>">
                            <?php echo $productoTipo ['nombre']; ?>
                        </option>
                       <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="hidden" name="confirm" value="1">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php" class="btn btn-link">Volver</a>
                </div>

            </form>

        </div>
      
    </section>

    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer>

</body>

</html>