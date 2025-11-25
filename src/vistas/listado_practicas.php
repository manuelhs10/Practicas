<?php
require_once "../../config/db.php";
require_once "../modelos/EmpresaModelo.php";

$modelo = new EmpresaModelo($conexion);
$registros = $modelo->obtenerEmpresas();
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
        <th>Razón Social</th>
        <th>Nombre Empresa</th>
        <th>CIF/NIF</th>
        <th>Responsable</th>
        <th>Correo Responsable</th>
        <th>Tutor</th>
        <th>Correo Tutor</th>
        <th>Dirección</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Total</th>
        <th>Compensación</th>
        <th>Cantidad mensual</th>
    </tr>
    <?php foreach($registros as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= htmlspecialchars($r['razon_social']) ?></td>
        <td><?= htmlspecialchars($r['nombre_empresa']) ?></td>
        <td><?= htmlspecialchars($r['cif_nif']) ?></td>
        <td><?= htmlspecialchars($r['resp_nombre'] . ' ' . $r['resp_apellido']) ?></td>
        <td><?= htmlspecialchars($r['resp_email']) ?></td>
        <td><?= htmlspecialchars($r['tutor_nombre'] . ' ' . $r['tutor_apellido']) ?></td>
        <td><?= htmlspecialchars($r['tutor_email']) ?></td>
        <td><?= htmlspecialchars($r['direccion']) ?></td>
        <td><?= htmlspecialchars($r['lunes']) ?></td>
        <td><?= htmlspecialchars($r['martes']) ?></td>
        <td><?= htmlspecialchars($r['miercoles']) ?></td>
        <td><?= htmlspecialchars($r['jueves']) ?></td>
        <td><?= htmlspecialchars($r['viernes']) ?></td>
        <td><?= htmlspecialchars($r['total']) ?></td>
        <td><?= htmlspecialchars($r['compensacion']) ?></td>
        <td><?= htmlspecialchars($r['cantidad_mensual']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="../../index.php">Volver al inicio</a>

</body>
</html>
