<?php
include '../models/Model.php';
include '../models/Factura.php';
include '../models/Cliente.php';
include '../controllers/databaseController.php';
include '../controllers/factController.php';
include '../controllers/clientController.php'; 

use App\controllers\factController;
use App\models\Factura;
use App\models\Cliente;
use App\controllers\clientController;

$clientController = new clientController();
$clientes = $clientController->read();
$idcliente = null;
$result = false; 

if (is_array($clientes) && count($clientes) > 0) {
    foreach ($clientes as $cliente) { 
        if ($cliente->get('numeroDocumento') == $_POST['numeroDocumento']) { 
            $idcliente = $cliente->get('id');
            break;
        }
    }
}

if ($idcliente === null) {
    $mensaje = 'El cliente no está registrado en la base de datos <a href="../vista/pestCliente.php">deseas registrar el cliente?</a>';
} else {
    $controller = new factController();
    $factura = new Factura();
    $factura->set('referencia', $_POST['referencia']);
    $factura->set('fecha', $_POST['fecha']);
    $factura->set('idCliente', $idcliente);
    $factura->set('estado', $_POST['estado']);
    $factura->set('descuento', 0);

    $result = $controller->guardarFactura($factura);

    if ($result) {
        $mensaje = 'Datos guardados <a href="../vista/pestDetFac.php">agregar los articulos de la factura </a>';
        // Mostrar datos de la factura si se generó correctamente
        $mensaje .= '<h2>Datos de la factura:</h2>
                     <ul>
                         <li><strong>Referencia:</strong> ' . $factura->get('referencia') . '</li>
                         <li><strong>Fecha:</strong> ' . $factura->get('fecha') . '</li>
                         <li><strong>ID Cliente:</strong> ' . $factura->get('idCliente') . '</li>
                         <li><strong>Estado:</strong> ' . $factura->get('estado') . '</li>
                         <li><strong>Descuento:</strong> ' . $factura->get('descuento') . '</li>
                     </ul>';
    } else {
        $mensaje = 'No se pudo guardar el registro <a href="../vista/pestFac.php">Volver a crear la factura</a>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index2.css">
    <title>Registrar Factura</title>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>
    <br>
    <br>
    <a href="pestFac.php">Volver</a>
</body>
</html>
