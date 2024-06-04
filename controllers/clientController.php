<?php

namespace App\controllers;

use App\models\Cliente;
use App\controllers\databaseController;

class clientController
{
    function read()
    {
        $dataBase = new databaseController();
        $sql = "SELECT * FROM clientes"; // Asegúrate de que el nombre de la tabla sea correcto
        $result = $dataBase->execSql($sql);
        $clientes = [];
        if ($result !== false && $result->num_rows > 0) { // Asegúrate de que $result no sea falso
            while ($item = $result->fetch_assoc()) {
                $cliente = new Cliente();
                $cliente->set('id', $item['id']);
                $cliente->set('nombreCompleto', $item['nombreCompleto']);
                $cliente->set('tipoDocumento', $item['tipoDocumento']);
                $cliente->set('numeroDocumento', $item['numeroDocumento']);
                $cliente->set('email', $item['email']);
                $cliente->set('telefono', $item['telefono']);
                $clientes[] = $cliente;
            }
        }
        $dataBase->close();
        return $clientes;
    }

    function create($cliente)
    {
        $sql = "INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, email, telefono) VALUES (";
        $sql .= "'".$cliente->get('nombreCompleto')."',";
        $sql .= "'".$cliente->get('tipoDocumento')."',";
        $sql .= "'".$cliente->get('numeroDocumento')."',";
        $sql .= "'".$cliente->get('email')."',";
        $sql .= "'".$cliente->get('telefono')."'";
        $sql .= ")";
        $dataBase = new databaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function update($cliente)
    {
        $sql = "UPDATE clientes SET ";
        $sql .= "nombreCompleto = '".$cliente->get('nombreCompleto')."', ";
        $sql .= "tipoDocumento = '".$cliente->get('tipoDocumento')."', ";
        $sql .= "email = '".$cliente->get('email')."', ";
        $sql .= "telefono = '".$cliente->get('telefono')."' ";
        $sql .= "WHERE numeroDocumento = '".$cliente->get('numeroDocumento')."'";

        $dataBase = new databaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function delete($numeroDocumento)
    {
        $sql = "DELETE FROM clientes WHERE numeroDocumento = '".$numeroDocumento."'";

        $dataBase = new databaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }
}
?>
