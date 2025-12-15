<?php
// mostrar errores para debugging (temporal)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ruta al autoload de dompdf (ajusta si hace falta)
require_once __DIR__ . "/../../libs/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

try {
    $dompdf = new Dompdf();

    $html = "<!doctype html><html><body><h1>Hola PDF test</h1><p>Prueba dompdf</p></body></html>";

    // guardar también el html de debug
    file_put_contents(__DIR__ . "/debug_pdf_test.html", $html);

    $dompdf->loadHtml($html);

    // limpiar buffers por si hubiera salida previa
    if (ob_get_length()) { @ob_end_clean(); }

    $dompdf->setPaper("A4", "portrait");
    $dompdf->render();

    // limpiar de nuevo
    if (ob_get_length()) { @ob_end_clean(); }

    $dompdf->stream("test.pdf", ["Attachment" => false]);
} catch (Exception $e) {
    echo "EXCEPCIÓN: " . $e->getMessage();
    echo "<pre>";
    echo $e;
    echo "</pre>";
}
