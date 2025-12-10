<?php
require_once "../../config/db.php";
require_once "../modelos/alta_modelo.php";
require_once "../../libs/PHPMAILER/src/PHPMailer.php";
require_once "../../libs/PHPMAILER/src/SMTP.php";
require_once "../../libs/PHPMAILER/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $alta = new AltaModelo($conexion);

    $datos = [
        'emp_nombre' => $_POST['emp_nombre'],
        'ciclo' => $_POST['ciclo'],
        'emp_email' => $_POST['emp_email'],
        'curso_escolar' => $_POST['curso_escolar']
    ];

    // Guardar en la base de datos
    $alta->guardar($datos);

    // Enviar correo
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "practicasaltair123@gmail.com";
        $mail->Password = "bewxttblqjyqjkal";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';


        $mail->setFrom("practicasaltair123@gmail.com", "Altair Prácticas");
        $mail->addAddress($datos['emp_email'], $datos['emp_nombre']);

        $mail->isHTML(true);
        $mail->Subject = "Formulario de Prácticas - ALTAIR CSIF";

        $mail->Body = "
            Hola <b>{$datos['emp_nombre']}</b>,<br><br>
            Por favor, complete el formulario completo de prácticas:<br><br>
            <a href='http://localhost/Practicas/src/vistas/form_empresa.php'>Formulario de Empresa</a><br><br>
            Gracias.
        ";

        $mail->send();

        // Redirigir a la vista de éxito
        header("Location: ../vistas/alta_exito.php");
        exit;

    } catch (Exception $e) {
        echo "Error al enviar correo: " . $mail->ErrorInfo;
        exit;
    }
}
?>
