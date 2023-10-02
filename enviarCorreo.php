<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

require_once "db.php";
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$nombre = mysqli_real_escape_string($con,$_POST['nombre']);
$correo = mysqli_real_escape_string($con,$_POST['correo']);
$mensaje1 = mysqli_real_escape_string($con,$_POST['mensaje']);
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");

$insertar = mysqli_query($con, "INSERT INTO `contacto` ( `nombre`, `correo`, `mensaje`,`fecha`) VALUES ('$nombre', '$correo', '$mensaje1','$fecha');"); 
if (!$insertar) { 
 die("Fallo en la insercion en la Base de Datos: " . mysqli_error()); 
} 
   
//Cerrar conexión a la Base de Datos 
mysqli_close($con); 
echo "1";

        $to      = 'contacto@ferreteriataximaroa.com.mx'; // Send correo to our user
        $subject = 'Nuevo mensaje de contacto'; // Give the correo a subject 
        $message = '

          <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center">
              <img src="https://ferreteriataximaroa.com.mx/assets/images/correo/header.jpg" alt="" width="100%" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Ferretería Taximaroa</h1>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                      Alguien te ha contactado a través del formulario de la página web
                    </p>
                    <p><b>Nombre: '.$nombre.' con correo: '.$correo.' escribe lo siguiente:</p>
                    <p>'.$mensaje1.'</p>
                    <p>No olvides responder está petición -></p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://ferreteriataximaroa.com.mx/assets/images/compra-segura1.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                          
                        </td>
                        <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          
                        </td>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://ferreteriataximaroa.com.mx/assets/images/pagos.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                          
                        </td>
                      </tr>
                      
                    </table>
                  </td>

                </tr>
                <tr>
                        <td>
                          <p></p>
                        </td>
                      </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#000068;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0" align="center">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                      &reg; Ferretería Taximaroa 2023<br/>
                    </p>
                  </td>
                  <tr>
                <tr>
                  <td style="padding:0;width:620px">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <br><br>
                      </tr>
                      <tr>
                        <td style="width: 200px" align="center">
                          <a href="https://www.linkedin.com/company/ferreter%C3%ADa-taximaroa-morelia" style="color:#ffffff;"><img style="-webkit-filter: opacity(.9) drop-shadow(0 0 0 white);" src="https://ferreteriataximaroa.com.mx/assets/images/correo/linkedin.jpg" alt="Linkedin" width="28" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="width: 200px" align="center">
                          <a href="https://www.facebook.com/ferretaximaroa" style="color:#ffffff;"><img style="  filter: opacity(.9) drop-shadow(0 0 0 white);" src="https://ferreteriataximaroa.com.mx/assets/images/correo/facebook.jpg" alt="Facebook" width="28" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="width: 200px" align="center">
                          <a href="https://www.instagram.com/ferreteria_taximaroa/" style="color:#ffffff;"><img style="  filter: opacity(.9) drop-shadow(0 0 0 white);" src="https://ferreteriataximaroa.com.mx/assets/images/correo/instagram.jpg" alt="Instagram" width="28" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>           
          '; // Our message above including the link
          $headers = 'From: Ferretería Taximaroa <contacto@ferreteriataximaroa.com.mx>' . "\r\n";                    
          //$headers = 'From:contacto@ferreteriataximaroa.com.mx' . "\r\n"; // Set from headers
          $headers .= 'Cc: ortizortizosvaldo@gmail.com' . "\r\n";  // esto sería copia normal
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
          mail($to, $subject, $message, $headers); // Send our correo

}else {
	die();
   echo "it's not an AJAX request so do something else";
}

?>