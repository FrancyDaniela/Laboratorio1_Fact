<?php

namespace App\models;

class DetalleFactura extends Model{
    protected $cantidad = 0;
    protected $precioUnitario = 0;
    protected $idArticulo = 0;
    protected $referenciaFactura = 0;

    public function factura(){
        return $this->belongsTo(Factura::class, 'referenciaFactura');
    }
    public function articulo(){
        return $this->belongsTo(Articulo::class, 'idArticulo');
    }
    public function precio(){
        return $this->belongsTo(Articulo::class, 'precioUnitario');
    }
}
?>