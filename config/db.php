<?php
// Detecta la rama actual de Git
$branch = trim(shell_exec('git rev-parse --abbrev-ref HEAD'));

// Configura la base de datos según la rama
switch($branch){
    case 'server':
        $base_datos = 'practicas_server';
        break;
    case 'test':
        $base_datos = 'practicas_test';
        break;
    case 'production':
        $base_datos = 'practicas_production';
        break;
    default:
        $base_datos = 'practicas_server'; // Por seguridad, usar server por defecto
}

// Datos de conexión
//mini prueba
$host = "localhost";
$usuario = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$base_datos;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Conectado a $base_datos correctamente"; // Solo para pruebas
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
