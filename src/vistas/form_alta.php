<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Empresa de Prácticas</title>
    <link rel="stylesheet" href="../../assets/css/form_style.css">

</head>
<body>
    <div class="titulo-con-logo">
    <h1>Registro de Prácticas</h1>
    <img src="../../assets/img/logo.png" alt="Logo">
</div>


    <form action="../controladores/EmpresaAltaControlador.php" method="POST">


        
        <fieldset>
            <legend>Responsable de la Empresa</legend>

            <label>Nombre:</label>
            <input type="text" name="emp_nombre" required>

            <label>Nombre del Ciclo</label>
            <select name="ciclo" id="ciclo">
                <option value="CMI1">CMI1</option>
                <option value="CMI2">CMI2</option>
                <option value="CSI1">CSI1</option>
                <option value="CSI2">CSI2</option>
                <option value="CMI1YCMI2">CMI1 y CMI2</option>
                <option value="CSI1YCSI2">CSI1 y CSI2</option>
            </select>
            
            <label>Correo electrónico:</label>
            <input type="email" name="emp_email" required>

            <label>Curso Escolar:</label>
            <select name="curso_escolar" required>
            <?php
                $inicioBase = 2025; // primer año fijo
                $cantidad = 15;     // cantidad de cursos a generar

                for ($i = 0; $i < $cantidad; $i++) {
                $inicio = $inicioBase + $i;
                $fin = $inicio + 1;
                echo "<option value='$inicio-$fin'>$inicio - $fin</option>";
                }
            ?>
</select>

    </fieldset>

        <button type="submit">Guardar</button>
    </form>

</body>
</html>