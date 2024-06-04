<?php
include '../models/Model.php';
include '../models/Cliente.php';
include '../controllers/clientController.php';
include '../controllers/databaseController.php';

use App\controllers\clientController;
use App\models\Cliente;

$controller = new clientController();
$cliente = new Cliente();

// Verificar si se enviaron los datos del formulario
if (isset($_POST['nombreCompleto']) && isset($_POST['tipoDocumento']) && isset($_POST['numeroDocumento']) && isset($_POST['email']) && isset($_POST['telefono'])) {
    $cliente->set('nombreCompleto', $_POST['nombreCompleto']);
    $cliente->set('tipoDocumento', $_POST['tipoDocumento']);
    $cliente->set('numeroDocumento', $_POST['numeroDocumento']);
    $cliente->set('email', $_POST['email']);
    $cliente->set('telefono', $_POST['telefono']);

    // Intentar crear el cliente
    $result = $controller->create($cliente);

    // Mostrar mensaje de salida según el resultado
    if ($result) {
        echo '<h1>Datos guardados</h1>';
    } else {
        echo '<h1>No se pudo guardar el registro</h1>';
    }
} else {
    echo '<h1>No se enviaron datos del formulario</h1>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
</head>
<body>
    <br>
    <a href="../vista/inicio.php">Volver</a>
</body>
</html>
