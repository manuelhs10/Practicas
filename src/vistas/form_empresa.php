<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Empresa de Prácticas</title>
    <link rel="stylesheet" href="../../assets/css/form_style.css">

</head>
<body>
    <h1>Registro de Empresa de Prácticas</h1>

    <!--Formulario-->
    <form action="../controladores/EmpresaControlador.php" method="POST">


        <fieldset>
            <legend>Datos de la Empresa</legend>

            <label>Razón Social:</label>
            <input type="text" name="razon_social" required>

            <label>Nombre de la Empresa:</label>
            <input type="text" name="nombre_empresa" required>

            <label>CIF / NIF:</label>
            <input type="text" name="cif_nif" maxlength="9" required>
       
        </fieldset>
        <fieldset>
            <legend>Responsable de la Empresa</legend>

            <label>Nombre:</label>
            <input type="text" name="resp_nombre" required>

            <label>Apellido:</label>
            <input type="text" name="resp_apellido" required>

            <label>DNI:</label>
            <input type="text" name="resp_dni" maxlength="9" required>

            <label>Correo electrónico:</label>
            <input type="email" name="resp_email" required>
        </fieldset>

        <fieldset>
            <legend>Tutor de la Empresa</legend>

            <label>Nombre:</label>
            <input type="text" name="tutor_nombre" required>

            <label>Apellido:</label>
            <input type="text" name="tutor_apellido" required>

            <label>DNI:</label>
            <input type="text" name="tutor_dni" maxlength="9" required>

            <label>Correo electrónico:</label>
            <input type="email" name="tutor_email" required>
        </fieldset>

        <fieldset>
            <legend>Datos de la Práctica</legend>

            <label>Dirección:</label>
            <input type="text" name="direccion" required>

            <label>Horario (número de horas de L-V):</label>
            <input type="number" name="horario" min="0" step="0.01" required>


            <label>¿Recibe compensación económica?</label>
            <select name="compensacion" required>
                <option value="no">No</option>
                <option value="si">Sí</option>
            </select>
        </fieldset>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>