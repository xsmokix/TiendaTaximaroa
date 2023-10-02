<?php
        require_once "db.php";
        require_once "lib/password.php";

        if (isset($_POST['usuario'])) {

        $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);
        $correo=mysqli_real_escape_string($con, $_POST["correo"]);
        $telefono=mysqli_real_escape_string($con, $_POST["telefono"]);
        $anuncios=mysqli_real_escape_string($con, $_POST["anuncios"]);
        $hashValidacionCorreo = md5( rand(0,1000) );
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        date_default_timezone_set('America/Mexico_City');
        $hoy = date("Y-m-d");

        $sql="INSERT INTO datos_clientes (nombreCompleto, telefono, correo, anuncios, fecha_registro, hash, activo ) VALUES ( '$nombre', '$telefono', '$correo', '$anuncios', '$hoy', '$hashValidacionCorreo', '0');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion datos_clientes";
          die();
          }else{
            $idCliente=mysqli_insert_id($con);
            $sql="INSERT INTO usuarios (id_datos_clientes, usuario, password ) VALUES ( '$idCliente', '$usuario', '$hash');";
            $res=mysqli_query($con, $sql);
                if (!$res)
                  {
                    echo "Error en la insercion de usuarios";
                    die();
                  }else{
                        $sql="INSERT INTO `direcciones` (`id_datos_cliente`, `calle`, `numero_exterior`, `numero_interior`, `colonia`, `cp`, `ciudad`, `municipio`, `estado`, `tipo`) VALUES ('$idCliente', '0', '0', '0', '0', '0', '0', '0', '0','principal');";
                        $res=mysqli_query($con, $sql);
                        if (!$res)
                              {
                              echo "Error en la insercion direcciones";
                              die();
                              }
                   }

          
          $to      = $correo; // Send correo to our user
          $subject = 'Bienvenido a Ferretería Taximaroa'; // Give the correo a subject 
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
                              <img src="http://ferreteriataximaroa.com.mx/assets/images/correo/header.jpg" alt="" width="100%" style="height:auto;display:block;" />
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:36px 30px 42px 30px;">
                              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                  <td style="padding:0 0 36px 0;color:#153643;">
                                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Bienvenido a Ferretería Taximaroa</h1>
                                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                                      Gracias por registrarte, tu cuenta fue creada correctamente, ahora tienes acceso a todos los beneficios de comprar a través de nuestra tienda virtual.
                                    </p>
                                    <p>Para finalizar la creación de tu cuenta, te pedimos que verifiques tu correo en el siguiente enlace:</p>
                                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://ferreteriataximaroa.com.mx/clientes/verificar.php?correo='.$correo.'&hash='.$hashValidacionCorreo.'" style="color:#ee4c50;text-decoration:underline;">Validar mi correo</a></p>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="padding:0;">
                                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                      <tr>
                                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="http://ferreteriataximaroa.com/assets/images/compra-segura1.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                                          
                                        </td>
                                        <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                          
                                        </td>
                                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="http://ferreteriataximaroa.com/assets/images/pagos.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                                          
                                        </td>
                                      </tr>
                                      
                                    </table>
                                  </td>

                                </tr>
                                <tr>
                                        <td>
                                          <p>
                Consulta nuestros <a href="http://ferreteriataximaroa.com.mx/terminos-y-condiciones.php" target="_blank">términos y condiciones</a> y nuestro <a href="http://ferreteriataximaroa.com.mx/aviso-de-privacidad.php" target="_blank">aviso de privacidad</a>. Si no te inscribiste a nuestro servicio, contacta a nuestro equipo de atención al cliente.</p>
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
                                      &reg; Ferretería Taximaroa '. date("Y").'<br/>
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
                                          <a href="https://www.linkedin.com/company/ferreter%C3%ADa-taximaroa-morelia" style="color:#ffffff;"><img style="-webkit-filter: opacity(.9) drop-shadow(0 0 0 white);" src="http://ferreteriataximaroa.com.mx/assets/images/correo/linkedin.jpg" alt="Linkedin" width="28" style="height:auto;display:block;border:0;" /></a>
                                        </td>
                                        <td style="width: 200px" align="center">
                                          <a href="https://www.facebook.com/ferretaximaroa" style="color:#ffffff;"><img style="  filter: opacity(.9) drop-shadow(0 0 0 white);" src="http://ferreteriataximaroa.com.mx/assets/images/correo/facebook.jpg" alt="Facebook" width="28" style="height:auto;display:block;border:0;" /></a>
                                        </td>
                                        <td style="width: 200px" align="center">
                                          <a href="https://www.instagram.com/ferreteria_taximaroa/" style="color:#ffffff;"><img style="  filter: opacity(.9) drop-shadow(0 0 0 white);" src="http://ferreteriataximaroa.com.mx/assets/images/correo/instagram.jpg" alt="Facebook" width="28" style="height:auto;display:block;border:0;" /></a>
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
                </html>'; // Our message 


          $headers = 'From: Ferretería Taximaroa <contacto@ferreteriataximaroa.com.mx>' . "\r\n";                    
          //$headers = 'From:contacto@ferreteriataximaroa.com.mx' . "\r\n"; // Set from headers
          //$headers .= 'Bcc: ortizortizosvaldo@gmail.com' . "\r\n";  // esto sería copia oculta
          $headers .= 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
          mail($to, $subject, $message, $headers); // Send our correo


          echo "usuario registrado correctamente"; 
        
          

       
        mysqli_close($con);
      }     




}


?>