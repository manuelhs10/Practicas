<?php
require_once "../../config/db.php";
require_once "../modelos/alta_modelo.php";

$alta = new AltaModelo($conexion);
$registros = $alta->obtenerEmpresas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Prácticas</title>
    <link rel="stylesheet" href="../../assets/css/listado_style.css">

</head>
<body>

<h1>Listado de Prácticas</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ciclo</th>
        <th>Email</th>
    </tr>
    <?php foreach($registros as $r): ?>
    <tr>
        <td><?php echo $r['id']; ?></td>
        <td><?php echo htmlspecialchars($r['emp_nombre']); ?></td>
        <td><?php echo htmlspecialchars($r['ciclo']); ?></td>
        <td><?php echo htmlspecialchars($r['emp_email']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="../../index.php">Volver al inicio</a>

</body>
</html>
