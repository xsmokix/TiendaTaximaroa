<?php


    //$con = mysqli_connect('localhost', 'root', '', 'expocelebra');
$con = mysqli_connect('localhost', 'zirahvgz_expo', 'Aiokuni01!', 'zirahvgz_expocelebra');
            $tildes = $con->query("SET NAMES 'utf8'"); 

            /* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	



/* Check all form inputs using check_input function */
$nombre = mysqli_real_escape_string($con,$_POST['nombre']);
$quebuscas = mysqli_real_escape_string($con,$_POST['quebuscas']);
$tipo = mysqli_real_escape_string($con,$_POST['tipo']);
$fecha = mysqli_real_escape_string($con,$_POST['fecha']);
$personas = mysqli_real_escape_string($con,$_POST['personas']);
$enteraste = mysqli_real_escape_string($con,$_POST['enteraste']);
$correo = mysqli_real_escape_string($con,$_POST['correo']);
$procedencia = mysqli_real_escape_string($con,$_POST['procedencia']);
$comentarios = mysqli_real_escape_string($con,$_POST['comentarios']);


/*
 $con = mysql_connect('localhost','zirahvgz_expo','Aiokuni01!');

			@mysql_query("SET NAMES 'utf8'");
            mysql_select_db('zirahvgz_expocelebra', $con);*/

 $insertar = mysqli_query($con, "INSERT INTO `registrados` ( `nombre`, `quebuscas`, `tipoEvento`, `fecha`, `personas`, `seEntero`, `correo`, `procedencia`, `comentarios`) VALUES ('$nombre', '$quebuscas', '$tipo', '$fecha', '$personas', '$enteraste', '$correo', '$procedencia', '$comentarios');"); 

                   if (!$insertar) { 
           die("Fallo en la insercion en la Base de Datos: " . mysqli_error()); 
           } 
		   
     
//Cerrar conexión a la Base de Datos 
           mysqli_close($con); 




// Varios destinatarios
$para  = $_POST['correo'];// . ', '; // atención a la coma
//$para = 'ortizortizosvaldo@gmail.com';

// título
$título = 'Registro ExpoCelebracion';

// mensaje
$mensaje = "
<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='utf-8'>
<style>
	body{

		background: url(http://expocelebracion.com/images/registro/overlay.png) !important;
		color:#77777B;
		font-family:Arial, Helvetica, sans-serif;		
	}
</style>
</head>
  <body>
<center>
  <a href='http://www.aiokuni.com.mx/'><img class='imgCentro' src='http://expocelebracion.com/images/registro/expo2017.jpg' alt='aiokuni'></a>
</header>
<hr>
	<h3 style='color:#1A53A0;'>FELICIDADES<br>".$nombre."</h3>
	<p>Tu registro se ha completado <br> <br> 
		<p>Te esperamos el 10 y 11 de Febrero de 2018 en el Sal&oacute;n Michoac&aacute;n del Centro de Convenciones de Morelia</p>
		<p>El horario de la expo es de 11:00 a 20:00 hrs, los dos d&iacute;as</p>
		<p>Habr&aacute; 2 pasarelas por d&iacute;a a las 13:30 y 17:30 hrs.</p>
		

		

		<p>Para más información
		escribe al correo <b>expocelebracion@aiokuni.com.mx</b> &oacute; al tel&eacute;fono <b>44-31-69-52-16</p>
		<br>
		<p><b style='color:#BB2281;'>Nos vemos el 10 y 11 de Febrero de 2018, Morelia, Michoac&aacute;n</b> </p
		<br>
        <a href='http://www.aiokuni.com.mx/'><img src='http://expocelebracion.com/images/registro/aiokuni-logo.png' alt='expocelebracion'></a>
 <p style='color:#1A53A0;'>ExpoCelebracion - Todos los Derechos Reservados - 2018</p>  
</center>
</body>
</html>";

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From: Registro Expocelebracion <expocelebracion@aiokuni.com.mx>' . "\r\n";
$cabeceras .= 'Bcc: ortizortizosvaldo@gmail.com' . "\r\n";

// Enviarlo
//echo $para, $título, $mensaje, $cabeceras;
mail($para, $título, $mensaje, $cabeceras);


?>