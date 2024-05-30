<?php
require_once '../models/Model.php';
require_once '../models/DetalleFactura.php';
require_once '../controllers/detFactController.php';
require_once '../controllers/databaseController.php';
require_once '../controllers/artController.php'; 

use App\controllers\detFactController;
use App\models\DetalleFactura;
use App\controllers\artController; 

$controller = new detFactController();
$DetalleFactura = new DetalleFactura();
$artController = new artController(); 

$Preciounitario = null;
$referenciaFactura = null;

$articulos = $artController->read(); 


foreach ($articulos as $articulo): 
    if($articulo->get('id') == $_POST['idArticulo'] ){
       $Preciounitario = $articulo->get('precio');
    }
endforeach;


$DetalleFactura->set('cantidad', $_POST['cantidad']);
$DetalleFactura->set('precioUnitario', $Preciounitario);
$DetalleFactura->set('idArticulo', $_POST['idArticulo']);
$DetalleFactura->set('refenciaFactura', $_POST['refenciaFactura']);

$result = $controller->crear($DetalleFactura);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Fecha</title>
</head>
<body>
    <h1><?php echo $result ? 'Datos guardados' : 'No se pudo guardar el registro'; ?></h1>
    <br>
    <a href="../vista/pestDetFac.php">Agregar mas produtos a la Factura</a>
    <li><strong>cantidad:</strong> <?php echo $DetalleFactura->get('cantidad'); ?></li>
        <li><strong>Precio:</strong> <?php echo $DetalleFactura->get('precioUnitario'); ?></li>
        <li><strong>ID Aticulo:</strong> <?php echo $DetalleFactura->get('idArticulo'); ?></li>
        <li><strong>referenciaFactura:</strong> <?php echo $DetalleFactura->get('refenciaFactura'); ?></li>

        <br>
    <a href="pestFacsa.php">Volver</a>
</body>
</html>