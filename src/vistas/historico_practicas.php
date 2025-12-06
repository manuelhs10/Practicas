<?php
require_once "../../config/db.php";
require_once "../modelos/EmpresaModelo.php";

$modelo = new EmpresaModelo($conexion);
// Traer todos los registros históricos
$registros = $modelo->obtenerEmpresasHistorico();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Prácticas</title>
    <link rel="stylesheet" href="../../assets/css/listado_style.css">
</head>
<body>
<h1 class="titulo-con-logo">Listado de Prácticas (Curso Actual)</h1>

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
        <th>Ciclo</th>
        <th>Inicio Curso</th>
        <th>Fin Curso</th>
        <th>Acciones</th>
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
        <td><?= htmlspecialchars($r['ciclo']) ?></td>
        <td><?= htmlspecialchars($r['inicio_curso']) ?></td>
        <td><?= htmlspecialchars($r['fin_curso']) ?></td>
        <td>
            <a href="../controladores/historico_controlador.php?accion=editar&id=<?= $r['id'] ?>">Editar</a> |
            <a href="../controladores/historico_controlador.php?accion=eliminar&id=<?= $r['id'] ?>" 
               onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="../../index.php">Volver al inicio</a>
<a href="../pdf/historico_pdf.php" target="_blank">
    <button>📄 Exportar Histórico PDF</button>
</a>

</body>
</html>
