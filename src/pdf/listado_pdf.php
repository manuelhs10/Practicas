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

// Cargar CSS externo
$css = file_get_contents("../../assets/css/pdf_style.css");

// Generar HTML
$html = "
<style>$css</style>

<h1>Listado de Prácticas (Curso Actual)</h1>

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
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Total</th>
        <th>Compensación</th>
        <th>Cantidad mensual</th>
        <th>Ciclo</th>
        <th>Inicio Curso</th>
        <th>Fin Curso</th>
</tr>";

foreach ($empresas as $e) {
    $html .= "
    <tr>
        <td>{$e['id']}</td>
        <td>{$e['razon_social']}</td>
        <td>{$e['nombre_empresa']}</td>
        <td>{$e['cif_nif']}</td>
        <td>{$e['resp_nombre']}</td>
        <td class='email'>{$e['resp_email']}</td>
        <td>{$e['tutor_nombre']}</td>
        <td class='email'>{$e['tutor_email']}</td>
        <td>{$e['direccion']}</td>
         <td>{$e['lunes']}</td>
          <td>{$e['martes']}</td>
           <td>{$e['miercoles']}</td>
            <td>{$e['jueves']}</td>
             <td>{$e['viernes']}</td>
              <td>{$e['total']}</td>
             <td>{$e['compensacion']}</td>
              <td>{$e['cantidad_mensual']}</td>
        <td>{$e['ciclo']}</td>
        <td>{$e['inicio_curso']}</td>
        <td>{$e['fin_curso']}</td>
    </tr>";
}

$html .= "</table>";

// Cargar en DOMPDF
$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "landscape");
$dompdf->render();

// Descargar PDF
$dompdf->stream("listado_actual.pdf", ["Attachment" => true]);
