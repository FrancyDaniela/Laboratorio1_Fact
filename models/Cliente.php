<?php

namespace App\models;

class Cliente extends Model{
    protected $idCliente = "";
    protected $nombreCompleto = "";
    protected $tipoDocumento = "";
    protected $numDocumentoss = "";
    protected $email = "";
    protected $telefono = "";

    public function facturas(){
        return $this->hasMany(Factura::class, 'idCliente');
    }
}
?>