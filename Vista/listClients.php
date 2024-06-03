<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes Registrados</title>
</head>
<body>
    <h1>Lista de Clientes Registrados</h1>
    <table border="1">
        <tr>
            <th>Nombre Completo</th>
            <th>Tipo Documento</th>
            <th>Número Documento</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php

        include '../controllers/databaseAct.php';
        include '../controllers/clientAct.php';

        use App\controllers\clientController;
        use App\controllers\databases;

        $host = 'localhost';
        $user = 'root';
        $pwd = '';
        $datab = 'facturacion_tienda_db';

        $db = new databases($host, $user, $pwd, $datab);
        $db->connect();
        $clienteController = new clientController($db);

        $clientes = $clienteController->getAllClientes();

        if ($clientes) {
            
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>{$cliente['nombreCompleto']}</td>";
                echo "<td>{$cliente['tipoDocumento']}</td>";
                echo "<td>{$cliente['numeroDocumento']}</td>";
                echo "<td>{$cliente['email']}</td>";
                echo "<td>{$cliente['telefono']}</td>";
                echo "<td><a href='modifyClients.php?id={$cliente['id']}'>Modificar lista</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay clientes registrados.</td></tr>";
        }
        
        $db->close();
        ?>
    </table>
    <br>
    <a href="../vista/pestFac.php">Volver</a>
</body>
</html>