<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
</head>
<body>
    <?php
     include '../controllers/databases.php';
     include '../controllers/client.php';

     use App\controllers\clientController;
    use App\controllers\databaseController;

    $host = 'localhost';
    $user = 'root';
    $pwd = '';
    $datab = 'facturacion_tienda_db';

    $db = new database($host, $user, $pwd, $datab);
    $db->connect();

    $cliente = new Cliente($db);

    $nombreCompleto = $_POST['nombreCompleto'];
    $tipoDoc = $_POST['tipoDoc'];
    $numeroDoc = $_POST['numDoc'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    if ($cliente->verificarCliente($numDoc)) {
        echo 'El cliente ya está registrado en la base de datos. <a href="../vista/pestFac.php">crear factur</a>';
    } else {
       
        if ($cliente->registrarCliente($nombreCompleto, $tipoDoc, $numDoc, $email, $telefono)) {
            echo 'Cliente registrado exitosamente. <a href="../vista/pestFac.php">Crear factura</a>';
        } else {
            echo 'Error al registrar el cliente. <a href="../vista/pestCliente.php">Volver a intentar</a>';
        }
    }

    $db->close();
    ?>
    <br>
</body>
</html>