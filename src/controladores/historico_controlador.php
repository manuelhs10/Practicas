<?php
require_once "../../config/db.php";
require_once "../modelos/EmpresaModelo.php";

$modelo = new EmpresaModelo($conexion);

// eliminar
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $modelo->eliminar($id);
    header("Location: historico_controlador.php");
    exit;
}

// editar
if (isset($_GET['accion']) && $_GET['accion'] === 'editar' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $registro = $modelo->obtenerPorId($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //  cambios
        $datos = [
            'id' => $id,
            'razon_social' => $_POST['razon_social'],
            'nombre_empresa' => $_POST['nombre_empresa'],
            'cif_nif' => $_POST['cif_nif'],
            'resp_nombre' => $_POST['resp_nombre'],
            'resp_apellido' => $_POST['resp_apellido'],
            'resp_email' => $_POST['resp_email'],
            'tutor_nombre' => $_POST['tutor_nombre'],
            'tutor_apellido' => $_POST['tutor_apellido'],
            'tutor_email' => $_POST['tutor_email'],
            'direccion' => $_POST['direccion'],
            'ciclo' => $_POST['ciclo'],
            'inicio_curso' => $_POST['inicio_curso'],
            'fin_curso' => $_POST['fin_curso']
        ];

        $modelo->actualizar($datos);
        header("Location: historico_controlador.php");
        exit;
    }

    // Mostrar formulario edición
    include "../vistas/historico_editar.php";
    exit;
}

// historico
$registros = $modelo->obtenerEmpresasHistorico();
include "../vistas/historico_practicas.php";