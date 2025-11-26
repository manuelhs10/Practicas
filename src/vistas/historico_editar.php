<?php
// Asegúrate de que $registro está definido antes de incluir este archivo
if (!isset($registro)) {
    echo "Registro no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Práctica</title>
    <link rel="stylesheet" href="../../assets/css/form_style.css">
</head>
<body>
    <h1>Editar Práctica</h1>

    <form action="../controladores/historico_controlador.php?accion=editar&id=<?= $registro['id'] ?>" method="POST">
        <fieldset>
            <legend>Datos de la Empresa</legend>

            <label>Razón Social:</label>
            <input type="text" name="razon_social" value="<?= htmlspecialchars($registro['razon_social']) ?>" required>

            <label>Nombre Empresa:</label>
            <input type="text" name="nombre_empresa" value="<?= htmlspecialchars($registro['nombre_empresa']) ?>" required>

            <label>CIF / NIF:</label>
            <input type="text" name="cif_nif" value="<?= htmlspecialchars($registro['cif_nif']) ?>" maxlength="9" required>
        </fieldset>

        <fieldset>
            <legend>Responsable de la Empresa</legend>

            <label>Nombre:</label>
            <input type="text" name="resp_nombre" value="<?= htmlspecialchars($registro['resp_nombre']) ?>" required>

            <label>Apellido:</label>
            <input type="text" name="resp_apellido" value="<?= htmlspecialchars($registro['resp_apellido']) ?>" required>

            <label>Correo electrónico:</label>
            <input type="email" name="resp_email" value="<?= htmlspecialchars($registro['resp_email']) ?>" required>
        </fieldset>

        <fieldset>
            <legend>Tutor de la Empresa</legend>

            <label>Nombre:</label>
            <input type="text" name="tutor_nombre" value="<?= htmlspecialchars($registro['tutor_nombre']) ?>" required>

            <label>Apellido:</label>
            <input type="text" name="tutor_apellido" value="<?= htmlspecialchars($registro['tutor_apellido']) ?>" required>

            <label>Correo electrónico:</label>
            <input type="email" name="tutor_email" value="<?= htmlspecialchars($registro['tutor_email']) ?>" required>
        </fieldset>

        <fieldset>
            <legend>Datos de la Práctica</legend>

            <label>Dirección:</label>
            <input type="text" name="direccion" value="<?= htmlspecialchars($registro['direccion']) ?>" required>

            <label>Ciclo:</label>
            <input type="text" name="ciclo" value="<?= htmlspecialchars($registro['ciclo']) ?>" required>

            <label>Inicio Curso:</label>
            <input type="date" name="inicio_curso" value="<?= htmlspecialchars($registro['inicio_curso']) ?>" required>

            <label>Fin Curso:</label>
            <input type="date" name="fin_curso" value="<?= htmlspecialchars($registro['fin_curso']) ?>" required>
        </fieldset>

        <button type="submit">Guardar Cambios</button>
        <a href="../controladores/historico_controlador.php">Cancelar</a>
    </form>
</body>
</html>
