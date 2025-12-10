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

        // ============ MENSAJE BONITO ===============
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Alta realizada</title>
            <link rel="stylesheet" href="../../assets/css/form_style.css">

            <style>
                body {
                    text-align: center;
                    font-family: Arial, sans-serif;
                }

                .mensaje-exito {
                    max-width: 600px;
                    margin: 60px auto;
                    padding: 25px;
                    background: #e9f7ef;
                    border-left: 6px solid #28a745;
                    border-radius: 8px;
                    font-size: 18px;
                    color: #155724;
                    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
                }

                .mensaje-exito strong {
                    font-size: 20px;
                }

                .mensaje-exito a {
                    margin-top: 20px;
                    display: inline-block;
                    padding: 10px 20px;
                    text-decoration: none;
                    color: white;
                    background: #007bff;
                    border-radius: 6px;
                    font-weight: bold;
                }

                .mensaje-exito a:hover {
                    background: #0056b3;
                }
            </style>
        </head>
        <body>

        <div class="mensaje-exito">
            ✔ <strong>Alta guardada y correo enviado correctamente.</strong>
            <br><br>
            <a href="../../index.php">Volver al inicio</a>
        </div>

        </body>
        </html>
        <?php
        // ===========================================

        exit;

    } catch (Exception $e) {

        echo "Error al enviar correo: " . $mail->ErrorInfo;
        exit;
    }
}
