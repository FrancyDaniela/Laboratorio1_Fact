<?php
include 'models/Model.php';
include 'controllers/databases/ConexionDBController.php';
include 'controllers/FormularioController.php';

use App\controllers\ContactoController;

$controllador = new ContactoController();
$contactos = $controllador->read();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    
</body>
</html>