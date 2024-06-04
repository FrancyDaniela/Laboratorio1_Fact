<?php
namespace App\controllers; 

use mysqli;

class controladorUser
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db = 'facturacion_tienda_db';
    private $conex;

    function __construct()
    {
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->pwd,
            $this->db
        );
    }

    function validarUsuario($usuario, $password)
    {
        $stmt = $this->conex->prepare("SELECT * FROM usuarios WHERE usuario = ? AND pwd = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
        
            return true;
        } else {
        
            return false;
        }

        $stmt->close();
    }

    function close()
    {
        $this->conex->close();
    }
}


$controlador = new controladorUser();

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario']; 
    $password = $_POST['password']; 

    if ($controlador->validarUsuario($usuario, $password)) {
    
        header("Location: pestFac.php");
        exit;
    } else {
    
        header("Location: valUser.php");
        exit;
    }
}
?>