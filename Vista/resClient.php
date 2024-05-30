<?php
include '../models/Model.php';
include '../models/Cliente.php';
include '../controllers/clientController.php';
include '../controllers/databaseController.php';

use App\controllers\clientController;
use App\models\Cliente;

$controller = new clientController();
$cliente = new CLiente();
$cliente->set('nombreCompleto', $_POST['nombreCompleto']);
$cliente->set('tipoDocumento', $_POST['tipoDocumento']);
$cliente->set('numeroDocumento', $_POST['numeroDocumento']);
$cliente->set('email', $_POST['email']);
$cliente->set('telefono', $_POST['telefono']);

$result = $controller->create($cliente);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Fecha</title>
</head>
<body>
    <h1><?php echo $result?'Datos guardados':'No se pudo guardar el registro'; ?></h1>
    <br>
    <a href="../vista/inicio.php">Volver</a>
</body>
</html>