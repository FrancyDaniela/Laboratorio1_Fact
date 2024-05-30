<?php

require_once '../controllers/databaseAct.php';
require_once '../controllers/clientAct.php';

use App\controllers\clientController;
use App\controllers\database;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
</head>
<body>
    <h1>Modificar Información del Cliente</h1>

    <?php
   
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $cliente_id = $_GET['id'];

        $host = 'localhost';
        $user = 'root';
        $pwd = '';
        $datab = 'facturacion_tienda_db';

        $db = new Database($host, $user, $pwd, $datab);
        $db->connect();

        $clientController = new clientController($db);

        $cliente = $clientController->getClienteById($cliente_id);

        if ($cliente) {
            
    ?>
            <form action="actualizarDatosCliente.php" method="post">
                <input type="hidden" name="cliente_id" value="<?php echo $cliente['id']; ?>">

                <label for="nombreCompleto">Nombre Completo:</label>
                <input type="text" name="nombreCompleto" value="<?php echo $cliente['nombreCompleto']; ?>" required>
                <br>

                <label for="tipoDocumento">Tipo Documento:</label>
                <input type="text" name="tipoDocumento" value="<?php echo $cliente['tipoDocumento']; ?>" required>
                <br>

                <label for="numeroDocumento">Número Documento:</label>
                <input type="text" name="numeroDocumento" value="<?php echo $cliente['numeroDocumento']; ?>" required>
                <br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $cliente['email']; ?>" required>
                <br>

                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" value="<?php echo $cliente['telefono']; ?>" required>
                <br>

                <input type="submit" value="Actualizar">
            </form>
    <?php
        } else {
            echo "Cliente no encontrado.";
        }
    } else {
        echo "ID de cliente no proporcionado.";
    }
    ?>

    <br>
    <a href="listClients.php">Regresar</a>
</body>
</html>