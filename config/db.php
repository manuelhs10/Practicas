<?php

//detectar si estamos dentro de Docker
$runningInDocker = file_exists('/.dockerenv');

//detectar la rama solo si NO está en Docker
if (!$runningInDocker) {
    // Detecta la rama actual de Git
    $branch = trim(shell_exec('git rev-parse --abbrev-ref HEAD'));

    // configura la base de datos según la rama
    switch($branch){
        case 'server':      $base_datos = 'practicas_server'; break;
        case 'test':        $base_datos = 'practicas_test'; break;
        case 'production':  $base_datos = 'practicas_production'; break;
        default:            $base_datos = 'practicas_server';
    }

    //fdatos de conexión xampp
    $host = "localhost";
    $usuario = "root";
    $password = "";
} else {
    //datos de conexión docker
    $base_datos = "practicas";  
    $host = "mysql";
    $usuario = "root";
    $password = "root";
}

try {
    $conexion = new PDO(
        "mysql:host=$host;dbname=$base_datos;charset=utf8",
        $usuario,
        $password
    );
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
