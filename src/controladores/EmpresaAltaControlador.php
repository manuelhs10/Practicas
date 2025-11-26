<?php
require_once "../../config/db.php";
require_once "../modelos/alta_modelo.php";
require_once "../../libs/PHPMAILER/src/PHPMailer.php"; //clase principal
require_once "../../libs/PHPMAILER/src/SMTP.php"; //maneja smtp 
require_once "../../libs/PHPMAILER/src/Exception.php"; //maneja errores

use PHPMailer\PHPMailer\PHPMailer; //usa las clses 
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alta = new AltaModelo($conexion);

    $datos = [
        'emp_nombre' => $_POST['emp_nombre'],
        'ciclo' => $_POST['ciclo'],
        'emp_email' => $_POST['emp_email'],
        'curso_escolar' => $_POST['curso_escolar'] 
    ];

    $alta->guardar($datos);

    
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP(); //se conecta al servidor smtp
        $mail->Host = "sandbox.smtp.mailtrap.io"; // servidor mailtrap 
        $mail->SMTPAuth = true; //autenticacion
        $mail->Username = "3f20820cbba5cd"; //credenciales 
        $mail->Password = "427cb326941782";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525; //port

        $mail->setFrom("CORREO@gmail.com", "Altair Prácticas"); //datos de envio de correo
        $mail->addAddress($datos['emp_email'], $datos['emp_nombre']);

        $mail->isHTML(true);
        $mail->Subject = "Formulario de Prácticas - ALTAIR CSIF";
        $mail->Body = "
            Hola <b>{$datos['emp_nombre']}</b>,<br><br>
            Por favor, complete el formulario completo de prácticas:<br>
            <a href='http://localhost/Practicas/src/vistas/form_empresa.php'>FORMULARIO DE EMPRESA</a><br><br>
            Gracias.
        ";

        $mail->send();
        echo "Alta guardada y email enviado correctamente.<br>";
        echo "<a href='../../index.php'>Volver al inicio</a>";

    } catch (Exception $e) {
        echo "Error al enviar correo: {$mail->ErrorInfo}";
    }

    exit;
}
