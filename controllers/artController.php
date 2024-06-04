<?php

namespace App\controllers;

require_once '../models/Articulo.php'; 
require_once 'databaseController.php';

use App\models\Articulo;
use App\controllers\databaseController;

class artController
{
    function read()
    {
        
        $dataBase = new databaseController();

    
        $sql = "SELECT * FROM articulos";

    
        $result = $dataBase->execSql($sql);

    
        $Articulos = [];

    
        if ($result->num_rows == 0) {
            return $Articulos;
        }

    
        while ($item = $result->fetch_assoc()) {
    
            $Articulo = new Articulo();
            $Articulo->set('id', $item['id']);
            $Articulo->set('nombre', $item['nombre']);
            $Articulo->set('precio', $item['precio']);

        
            array_push($Articulos, $Articulo);
        }

    
        $dataBase->close();

    
        return $Articulos;
    }
}
?>
