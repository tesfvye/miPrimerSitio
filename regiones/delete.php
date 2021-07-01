<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../class/regionModel.php');
require('../class/rutas.php');

$region = new regionModel;

if (isset($_POST['confirm']) && $_POST['confirm'] == 1) {
    
    $id = (int) $_POST['id'];

    $row = $region->deleteRegion($id);

    if ($row) {
        $msg = 'ok';
        header('Location: index.php?e=' . $msg);
    }
}