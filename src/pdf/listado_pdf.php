<?php
require_once "../../config/db.php";
require_once "../../libs/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

// Crear instancia
$dompdf = new Dompdf();

// Obtener datos del modelo
require_once "../modelos/EmpresaModelo.php";
$modelo = new EmpresaModelo($conexion);
$empresas = $modelo->obtenerEmpresas(); // SOLO ACTUALES

// Generar HTML
$html = "
<h1>Listado de Prácticas (Curso Actual)</h1>
<table border='1' cellpadding='5' cellspacing='0' width='100%'>
<tr>
    <th>ID</th>
    <th>Empresa</th>
    <th>Ciclo</th>
    <th>Inicio</th>
    <th>Fin</th>
</tr>";

foreach ($empresas as $e) {
    $html .= "
    <tr>
        <td>{$e['id']}</td>
        <td>{$e['nombre_empresa']}</td>
        <td>{$e['ciclo']}</td>
        <td>{$e['inicio_curso']}</td>
        <td>{$e['fin_curso']}</td>
    </tr>";
}

$html .= "</table>";

$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "portrait");
$dompdf->render();

// Descargar PDF
$dompdf->stream("listado_actual.pdf", ["Attachment" => true]);
