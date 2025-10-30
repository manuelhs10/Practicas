<?php
//prueba
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "practicas_server";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$base_datos;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión correcta a practicas_server";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
