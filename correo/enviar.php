<?php

//Clases que requiere PHPMailer
require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["full-name"]) || !isset($_POST["email"]) || !isset($_POST["message"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}

//Asignación de variables al POST
$nombre = $_POST["full-name"];

$email = $_POST["email"];

$mensaje = $_POST["message"];

$contacto = "Contact";

//Correo al que llegaran los mensages enviados desde contact us
$destinatario = "baltsb@gmail.com";

//**********Configuración de servidor de correo******



// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "smtp.gmail.com";  // Dominio alternativo brindado en el email de alta
$smtpUsuario = "baltsb@gmail.com";  // Mi cuenta de correo
$smtpClave = "contactinfo";  // Mi contraseña


//Inicio del PHPMailer

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; //Puerto del servidor de correo
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;


$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $contacto;
$mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Form from the Website"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html>

<body>

<h1>
You received a new message from the contact form</h1>

<p>Information sent by the web user:</p>

<p>Full Name: {$nombre}</p>

<p>email: {$email}</p>

<p>Message: {$mensaje}</p>

</body>

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send();
if($estadoEnvio){
    echo " <script type=\"text/javascript\">alert('It has been sent correctly'); window.location='../index.html';</script>";
} else {
    echo "<script type=\"text/javascript\">alert('unexpected error has occurred'); window.location='../index.html';</script>";
}


?>
