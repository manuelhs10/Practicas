<?php
require_once "../../config/db.php";
require_once "../../libs/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

// Crear instancia de Dompdf
$dompdf = new Dompdf();

// Obtener datos del modelo
require_once "../modelos/EmpresaModelo.php";
$modelo = new EmpresaModelo($conexion);
$empresas = $modelo->obtenerEmpresasHistorico(); // TODAS

$css = file_get_contents("../../assets/css/pdf_style.css");

$html = "

<style>$css</style>

<h1>Histórico de Empresas de Prácticas</h1>
<table>
<tr>
    <th>ID</th>
    <th>Razón Social</th>
    <th>Cif/Nif</th>
    <th>Responsable</th>
    <th>Correo Responsable</th>
    <th>Tutor</th>
    <th>Correo Tutor</th>
    <th>Dirección</th>
    <th>Ciclo</th>
    <th>Inicio Curso</th>
    <th>Fin Curso</th>
</tr>";

foreach ($empresas as $e) {
    $html .= "
    <tr>
        <td>{$e['id']}</td>
        <td>{$e['razon_social']}</td>
        <td>{$e['cif_nif']}</td>
        <td>{$e['resp_nombre']}</td>
        <td class='email'>{$e['resp_email']}</td>
        <td>{$e['tutor_nombre']}</td>
        <td class='email'>{$e['tutor_email']}</td>
        <td>{$e['direccion']}</td>
        <td>{$e['ciclo']}</td>
        <td>{$e['inicio_curso']}</td>
        <td>{$e['fin_curso']}</td>
    </tr>";
}

$html .= "</table>";

// Cargar HTML a Dompdf
$dompdf->loadHtml($html);
// Establecer el tamaño y la orientación del papel (A4, vertical/portrait)
$dompdf->setPaper("A4", "landscape");
// Renderizar el PDF
$dompdf->render();

// Descargar PDF
$dompdf->stream("historico_practicas.pdf", ["Attachment" => true]);