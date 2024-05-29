<?php
require_once '../controllers/DataBaseController.php';
require_once '../controllers/FacturaController.php';

use App\controllers\FacturaController;

$facturaController = new FacturaController();
$numFacturas = $facturaController->getCount() + 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación</title>
    <link rel="stylesheet" href="../vista/pestañaFacturaCss.css">
</head>
<body>
<div class="parent">
    <div class="div1"><h1>Informacion de la página</h1></div>
    <div class="div2">
        <h1>Crear Factura</h1>
        <form action="../vista/registroFactura.php" method="post">
            <h1 id="referencia">Referencia: <?php echo $numFacturas; ?></h1>
            <input type="hidden" name="referencia" value="<?php echo $numFacturas; ?>">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>" required>
            <br>
            <label for="numeroDocumento">Cliente:</label>
            <input type="text" name="numeroDocumento" id="numeroDocumento" required>
            <br>
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" required>
                <option value="Pagada">Pagada</option>
                <option value="Error">Error</option>
                <option value="Cambio">Cambio</option>
                <option value="Devolución">Devolución</option>
            </select>
            <br>
            <input type="submit" value="Generar Factura">
        </form>
        <h1>Buscar Factura</h1>
        <form action="detalleFactura.php" method="get">
        <label for="numeroDocumento">Número de Documento:</label>
        <input type="text" id="numeroDocumento" name="numeroDocumento" required>
        <br>
        <label for="referencia">Referencia de la Factura:</label>
        <input type="text" id="referencia" name="referencia" required>
        <br>
        <button type="submit">Buscar Factura</button>
    </form>
    </div>
    <div class="div3">
        <form action="pestañaCliente.php" method="GET">
            <input type="submit" value="Crear Cliente">
        </form>
    </div>
    <div class="div4">
        <form action="listaClientes.php" method="GET">
            <input type="submit" value="Actualizar Datos">
        </form>
    </div>
    <div class="div5">
        <form action="index.php" method="POST">
            <input type="submit" value="Cerrar Sesión">
        </form>
    </div>
</div>
</body>
</html>