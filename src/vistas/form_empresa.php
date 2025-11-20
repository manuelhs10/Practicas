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
        <fieldset>
            <legend>Datos de la Práctica</legend>

            <label>Dirección:</label>
            <input type="text" name="direccion" required>

            <label>Horario (horas por día):</label>

            <div class="fila-horario">

                <label>Lun:</label>
                <input type="number" name="lunes" min="0" step="0.5" class="input-hora">

                <label>Mar:</label>
                <input type="number" name="martes" min="0" step="0.5" class="input-hora">

                <label>Mié:</label>
                <input type="number" name="miercoles" min="0" step="0.5" class="input-hora">

                <label>Jue:</label>
                <input type="number" name="jueves" min="0" step="0.5" class="input-hora">

                <label>Vie:</label>
                <input type="number" name="viernes" min="0" step="0.5" class="input-hora">

                
            </div>

            <label>¿Recibe compensación económica?</label>
            <select name="compensacion" id="compensacion">
                <option value="no">No</option>
                <option value="si">Sí</option>
            </select>

            <div id="cantidadContainer" class="cantidad">
                <label>Cantidad mensual (€):</label>
                <input type="number" name="cantidad_mensual" min="0" step="0.01">
            </div>
        </fieldset>




        <button type="submit">Guardar</button>
    </form>

    <script src="../../assets/js/script.js"></script>

</body>
</html>