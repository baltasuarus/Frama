<?php

$direccion= $_REQUEST['direccion'];
$tipo= $_REQUEST['tipo'];
if ($direccion!=""){
if ($tipo=="plano"){
// Envio en formato texto plano
mail($direccion,"Ejemplo de envio de email","Ejemplo de envio de email de texto plano\n\nPHP.\nhttp://www.php.net/\n Manuales para desarrolladoresweb.\n","FROM: Pruebas <webmaster@hotmail.com>\n");
} else {
// Envio en formato HTML
mail($direccion,"Ejemplo de envio de email",
"<html><head><title>PHP. Manual de PHP</title></head><body>Ejemplo de envio de email de HTML<br><br>PHP.<br>http://www.php.net/<br> <u>Manuales</u> para <b>desarrolladores</b> web.</body></html>",
"Content-type: text/html\n","FROM: Pruebas <webmaster@hotmail.com>\n");
}
echo "Se ha enviado un email a la direccion: ",$direccion," en formato <b>",$tipo,"</b>.";
}
?>
