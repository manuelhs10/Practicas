
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../config/db.php";
    require_once "../modelos/alta_modelo.php";

    $alta = new AltaModelo($conexion);
    $datos = [
        'emp_nombre' => $_POST['emp_nombre'],
        'ciclo' => $_POST['ciclo'],
        'emp_email' => $_POST['emp_email'],
    ];


    $alta->guardar($datos);

    echo "Datos guardados correctamente";
    echo "<a href='../../index.php'>Volver al inicio</a>";


    exit;
}
?>