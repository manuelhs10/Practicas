<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../config/db.php";
    require_once "../modelos/EmpresaModelo.php";

    $modelo = new EmpresaModelo($conexion);


    $datos = [
    'razon_social' => $_POST['razon_social'],
    'nombre_empresa' => $_POST['nombre_empresa'],
    'cif_nif' => $_POST['cif_nif'],

    'resp_nombre' => $_POST['resp_nombre'],
    'resp_apellido' => $_POST['resp_apellido'],
    'resp_dni' => $_POST['resp_dni'],
    'resp_email' => $_POST['resp_email'],

    'tutor_nombre' => $_POST['tutor_nombre'],
    'tutor_apellido' => $_POST['tutor_apellido'],
    'tutor_dni' => $_POST['tutor_dni'],
    'tutor_email' => $_POST['tutor_email'],

    'direccion' => $_POST['direccion'],

    'lunes' => $_POST['lunes'],
    'martes' => $_POST['martes'],
    'miercoles' => $_POST['miercoles'],
    'jueves' => $_POST['jueves'],
    'viernes' => $_POST['viernes'],

    'compensacion' => $_POST['compensacion'],

    'cantidad_mensual' => $_POST['cantidad_mensual'] ?? null,

    'ciclo' => $_POST['ciclo'],
    'inicio_curso' => $_POST['inicio_curso'],  // <-- aquí
    'fin_curso'    => $_POST['fin_curso']      // <-- y aquí
];


    $modelo->guardar($datos);

    echo "Datos guardados correctamente";
    echo "<a href='../vistas/form_empresa.php'>Volver al formulario</a>";

    exit;
}

