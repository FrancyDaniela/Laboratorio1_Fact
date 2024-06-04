<?php
session_start(); // Iniciar sesión

require_once '../controllers/controladorUser.php';
require_once 'index.php';

// Verificar si se enviaron datos de inicio de sesión
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear una instancia del controlador de usuario
    $userController = new controladorUser();

    // Verificar las credenciales del usuario
    if ($userController->verificarCredenciales($username, $password)) {
        // Las credenciales son válidas, redirigir al usuario a la página principal
        header('Location: index.php');
        exit();
    } else {
        // Las credenciales son inválidas, mostrar un mensaje de error
        echo "<div class='mensaje-invalido'>Lo sentimos, ocurrió un error durante el inicio de sesión. Por favor, verifique sus credenciales e inténtelo de nuevo.</div>";
    }
}
?>
