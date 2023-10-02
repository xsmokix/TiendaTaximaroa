<?php


if(isset($_POST['nombre'])){
    require_once "db.php";

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$nombre = mysqli_real_escape_string($con,$_POST['nombre']);
$correo = mysqli_real_escape_string($con,$_POST['correo']);
$productos = mysqli_real_escape_string($con,$_POST['productos']);

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

echo "1";



    // email de destino
    //$para  = 'ortizortizosvaldo@gmail.com'; // atención a la coma
   $para  = 'contacto@ferreteriataximaroa.com.mx'; // atención a la coma
   
    // asunto del email
    $subject = "Solicitud de Cotización";
   
    // Cuerpo del mensaje
    $mensaje = "---------------------------------- \n";
    $mensaje.= "            Cotización               \n";
    $mensaje.= "---------------------------------- \n";
    $mensaje.= "Nombre:   ".$nombre."\n";
    $mensaje.= "Correo:  ".$correo."\n";
    $mensaje.= "---------------------------------- \n";
    $mensaje.= "Productos:  ".$productos."\n";
   
    // headers del email
    $headers = 'From: Contacto Taximaroa <contacto@ferreteriataximaroa.com.mx>' . "\r\n";
   // $headers .= 'Bcc: ortizortizosvaldo@gmail.com' . "\r\n";
   
    // Enviamos el mensaje

       mail($para,$subject,$mensaje,$headers);

}else {
	die();

   echo "error";
}


?>