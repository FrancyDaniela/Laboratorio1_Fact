<?php

use App\controllers\clientController;
use App\controllers\databases;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['cliente_id']) && !empty($_POST['cliente_id']) &&
        isset($_POST['nombreCompleto']) && !empty($_POST['nombreCompleto']) &&
        isset($_POST['tipoDocumento']) && !empty($_POST['tipoDocumento']) &&
        isset($_POST['numeroDocumento']) && !empty($_POST['numeroDocumento']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['telefono']) && !empty($_POST['telefono'])) {

        $cliente_id = $_POST['cliente_id'];
        $nombreCompleto = $_POST['nombreCompleto'];
        $tipoDocumento = $_POST['tipoDocumento'];
        $numeroDocumento = $_POST['numeroDocumento'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];


        require_once '../controllers/databaseAct.php';
        require_once '../controllers/clientAct.php';
        
        $host = 'localhost';
        $user = 'root';
        $pwd = '';
        $datab = 'facturacion_tienda_db';

        $db = new databases($host, $user, $pwd, $datab);
        $db->connect();

        $clientController = new clientController($db);

        if ($clientController->actualizarCliente($cliente_id, $nombreCompleto, $tipoDocumento, $numeroDocumento, $email, $telefono)) {
            echo "Cliente actualizado correctamente.";
        } else {
            echo "Error al actualizar el cliente.";
        }

        $db->close();
    } else {
        echo "Todos los campos son requeridos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
<br>
<a href="listClients.php">Volver</a>
