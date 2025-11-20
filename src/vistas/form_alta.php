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
    <form action="../controladores/alta_controlador.php" method="POST">


        
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
            </select>
            
            <label>Correo electrónico:</label>
            <input type="email" name="emp_email" required>
    </fieldset>

        <button type="submit">Guardar</button>
    </form>

</body>
</html>