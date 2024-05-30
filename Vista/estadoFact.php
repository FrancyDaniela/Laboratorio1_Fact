<?php
require_once '../controllers/factController.php';
require_once '../controllers/databaseController.php'; 

use App\controllers\factController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $refencia = $_POST['referencia'];
    $nuevoEstado = $_POST['nuevoEstado'];
    
    $factController = new factController();

    if ($factController->actualizarEstadoFactura($refencia, $nuevoEstado)) {
        echo 'Estado de la factura actualizado exitosamente. Deseas ver todas las facturas de estado pagadas <a href=".php">Volver</a>';
    } else {
        echo 'Error al actualizar el estado de la factura. <a href="detalleFactura.php">Volver</a>';
    }
} else {
    echo 'Método de solicitud no válido. <a href="detalleFactura.php">Volver</a>';
}
?>