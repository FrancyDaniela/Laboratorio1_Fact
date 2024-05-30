<?php
require_once '../controllers/artController.php';
require_once '../controllers/fcturaController.php';

use App\controllers\artController;
use App\controllers\factController;

$artController = new artController();
$articulos = $artController->read();

$factController = new factController();
$numFacturas = $factController->getCount() + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Lista de Artículos</h1>
    <ul>
        <?php foreach ($articulos as $articulo): ?>
            <li>
                <strong>Numero De Serie:</strong> <?php echo $articulo->get('id'); ?>, 
                <strong>Nombre:</strong> <?php echo $articulo->get('nombre'); ?>, 
                <strong>Precio:</strong> <?php echo $articulo->get('precio'); ?><strong>$</strong>
            </li>
        <?php endforeach; ?>
    </ul>

    <form action="../vista/resDetFac.php" method="post">     
        
        <h1 id="refenciaFactura">Referencia de la factura que se guardan los productos: <?php echo $numFacturas=$numFacturas-1; ?></h1>
        <input type="hidden" name="refenciaFactura" value="<?php echo $numFacturas; ?>">
        <h2>Detalles de la Factura</h2>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" required>
        <br>
        <label for="idArticulo">ID Artículo:</label>
        <input type="number" name="idArticulo" id="idArticulo" required>
        <br>
        <input type="submit" value="Generar Factura">
    </form>
    <br>
    <a href="pestFac.php">Regresar</a>
</body>
</html>