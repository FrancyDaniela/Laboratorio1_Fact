<?php

namespace App\controllers;

use App\models\DetalleFactura;
use App\controllers\databaseController;

class detFactController
{
    function read()
    {
        $dataBase = new databaseController();
        $sql = "select * from contactos";
        $result = $dataBase->execSql($sql);
        $Detallefacturas = [];
        if ($result->num_rows == 0) {
            return $Detallefacturas;
        }
        while ($item = $result->fetch_assoc()) {
            $Detallefactura = new DetalleFactura();
            $referencia = " " ;
            $Detallefactura->set('cantidad', $item['cantidad']);
            $Detallefactura->set('precioUnitario', $item['precioUnitario']);
            $Detallefactura->set('idArticulo', $item['idArticulo']);
            $Detallefactura->set('refenciaFactuara', $item['refenciaFactuara']);
            array_push($Detallefacturas, $Detallefactura);
        }
        $databases->close();
        return $Detallefacturas;
    }

    function crear($DetalleFactura) 
    {
        $sql = "INSERT INTO detallefacturas (cantidad, precioUnitario, idArticulo, refenciaFactura ) VALUES (";
        $sql .= "'".$DetalleFactura->get('cantidad')."',";
        $sql .= "'".$DetalleFactura->get('precioUnitario')."',";
        $sql .= "'".$DetalleFactura->get('idArticulo')."',";
        $sql .= "'".$DetalleFactura->get('refenciaFactura')."'";
        $sql .= ")";
        $databases = new databaseController();
        $result = $databases->execSql($sql);
        $databases->close();
        return $result;
    }
}
?>