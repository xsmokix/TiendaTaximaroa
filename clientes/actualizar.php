<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 

require_once "db.php";


//activar categoria
 if (isset($_POST['activar_categoria'])) {
 	//echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="UPDATE categorias SET estado = '1' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//activar categoria





//actualizar direccion
 if (isset($_POST['actualizar_direccion'])) {
//  echo "entro actualizar";

        $id_direccion=mysqli_real_escape_string($con, $_POST["id_direccion"]);
        $calle=mysqli_real_escape_string($con, $_POST["calle"]);
        $numero_exterior=mysqli_real_escape_string($con, $_POST["numero_exterior"]);
        $numero_interior=mysqli_real_escape_string($con, $_POST["numero_interior"]);
        $colonia=mysqli_real_escape_string($con, $_POST["colonia"]);
        $cp=mysqli_real_escape_string($con, $_POST["cp"]);
        $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
        $estado=mysqli_real_escape_string($con, $_POST["estado"]);

  $sql="UPDATE direcciones SET calle = '$calle', numero_exterior = '$numero_exterior', numero_interior = '$numero_interior', colonia = '$colonia', cp = '$cp', ciudad = '$ciudad', municipio = '$municipio', estado = '$estado' WHERE id='$id_direccion'";

  $_SESSION['ciudad']=$municipio;  

  $res=mysqli_query($con, $sql) or die(mysqli_error($con));

   mysqli_close($con);

  ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dirección actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Dirección',
                  text: 'actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "direcciones.php";
                  }
                }
              )
</script>
</body>
</html>

   <?php
  }
  //actualizar direccion


  //actualizar facturación
 if (isset($_POST['actualizar_facturacion'])) {
 echo "entro actualizar facturacion";
        $id_facturacion=mysqli_real_escape_string($con, $_POST["id_facturacion"]);
        $razon_social=mysqli_real_escape_string($con, $_POST["razon_social"]);
        $regimen=mysqli_real_escape_string($con, $_POST["regimen"]);
              $correo=mysqli_real_escape_string($con, $_POST["correo"]);
              $correo_alt=mysqli_real_escape_string($con, $_POST["correo_alt"]);
        
        $calle=mysqli_real_escape_string($con, $_POST["calle"]);
        $numero=mysqli_real_escape_string($con, $_POST["numero"]);
        $colonia=mysqli_real_escape_string($con, $_POST["colonia"]);
        $cp=mysqli_real_escape_string($con, $_POST["cp"]);
        $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
        $estado=mysqli_real_escape_string($con, $_POST["estado"]);
        $pais=mysqli_real_escape_string($con, $_POST["pais"]);
        $rfc=mysqli_real_escape_string($con, $_POST["rfc"]);
        $cfdi=mysqli_real_escape_string($con, $_POST["cfdi"]);

  $sql="UPDATE facturacion SET razon_social = '$razon_social', regimen = '$regimen', rfc = '$rfc', calle = '$calle', numero = '$numero', colonia = '$colonia', cp = '$cp', correo = '$correo', correo_alt = '$correo_alt', ciudad = '$ciudad', municipio = '$municipio', estado = '$estado', pais = '$pais', cfdi = '$cfdi' WHERE id='$id_facturacion'";

  $res=mysqli_query($con, $sql) or die(mysqli_error($con));

   mysqli_close($con);

  ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Facturación actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Dirección de facturación',
                  text: 'actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "facturacion.php";
                  }
                }
              )
</script>
</body>
</html>

   <?php
  }
  //actualizar facturación


//actualizar direccion principal
 if (isset($_POST['actualizar_principal'])) {
  echo "entro actualizar";

  $id_cliente=mysqli_real_escape_string($con, $_POST["id_cliente"]);
  $id_direccion=mysqli_real_escape_string($con, $_POST["id_direccion"]);
  $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);

  $sql="UPDATE direcciones SET tipo = 'alternativa' WHERE id_datos_cliente='$id_cliente'";
  $sql1="UPDATE direcciones SET tipo = 'principal' WHERE id_datos_cliente='$id_cliente' AND id = '$id_direccion'";
  $res=mysqli_query($con, $sql);
  $res1=mysqli_query($con, $sql1);
   mysqli_close($con);

   unset($_SESSION['ciudad']);
   $_SESSION['ciudad']=$ciudad;  


  }
  //actualizar direccion principal



  //actualizar facturacion principal
 if (isset($_POST['facturacion_principal'])) {
  echo "entro actualizar";

  $id_cliente=mysqli_real_escape_string($con, $_POST["id_cliente"]);
  $id_facturacion=mysqli_real_escape_string($con, $_POST["id_facturacion"]);

  $sql="UPDATE facturacion SET tipo = 'alternativa' WHERE id_datos_clientes='$id_cliente'";
  $sql1="UPDATE facturacion SET tipo = 'principal' WHERE id_datos_clientes='$id_cliente' AND id = '$id_facturacion'";
  $res=mysqli_query($con, $sql) or die(mysqli_error($con));
  $res1=mysqli_query($con, $sql1) or die(mysqli_error($con1));
   mysqli_close($con);
  }
  //actualizar facturacion principal



 






 if (isset($_POST['actualizarimagen'])) {
 	echo "entro actualizar imagen 1";

$id_cliente = $_POST['id_cliente'];

$nombreimagen1 = $id_cliente;

  //si ha imagen 2
if($_FILES['imagen']['name'] == "") {
     $imagen1 = ""; }else{
     $imagen1 = "assets/img/fotosclientes/".$nombreimagen1.".jpg";
    }
   
   

         if( isset($_FILES['imagen']) ) {
         	 $targetdir = 'assets/img/fotosclientes/';
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen1.".jpg";
  if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetfile)) {
    echo "se subio2";
     header("Location: perfil.php");
  } else { 
    // file upload failed
    echo "no se subió la imagen";
     // header("Location: perfil.php");
        }
}

 header("Location: perfil.php");
 ?>
 <script type="text/javascript">
    window.location.href = "perfil.php";
</script>
<?php

}



  //actualizar datos cliente
 if (isset($_POST['actualizardatos'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id_cliente"]);
  $correo=mysqli_real_escape_string($con, $_POST["correo"]);
  $nombrecompleto=mysqli_real_escape_string($con, $_POST["nombrecompleto"]);
  $telefono=mysqli_real_escape_string($con, $_POST["telefono"]);

/*
  $calle=mysqli_real_escape_string($con, $_POST["calle"]);
  $numeroexterior=mysqli_real_escape_string($con, $_POST["numeroexterior"]);
  $numerointerior=mysqli_real_escape_string($con, $_POST["numerointerior"]);
  $colonia=mysqli_real_escape_string($con, $_POST["colonia"]);
  $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);
  $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
  $estado=mysqli_real_escape_string($con, $_POST["estado"]);
  $cp=mysqli_real_escape_string($con, $_POST["cp"]);
  */


   $sql="UPDATE datos_clientes SET correo = '$correo', nombreCompleto = '$nombrecompleto', telefono = '$telefono' WHERE id='$id' ";
  $res=mysqli_query($con, $sql) or die(mysqli_error($con));

/*
  $sql1="UPDATE direcciones SET calle = '$calle', numero_exterior = '$numeroexterior', numero_interior = '$numerointerior', colonia = '$colonia', ciudad = '$ciudad', municipio = '$municipio', estado = '$estado', cp = '$cp' WHERE id_datos_cliente='$id' ";
  $res=mysqli_query($con, $sql1) or die(mysqli_error($con));
*/


   mysqli_close($con);


   ?>
   <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Datos actualizados</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Datos',
                  text: 'actualizados correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "perfil.php";
                  }
                }
              )
</script>
</body>
</html>
<?php
  }
  //actualizar datos cliente




  //actualizar pedido, solicitud de cancelacion
 if (isset($_POST['solicitud_cancelacion'])) {
  echo "entro actualizar";

  $no_pedido=mysqli_real_escape_string($con, $_POST["no_pedido"]);
  $motivo=mysqli_real_escape_string($con, $_POST["motivo"]);
  


   $sql="UPDATE pedidos SET estatus = 'cancelacionsolicitada', motivo = '$motivo', leido = '0' WHERE numero_pedido='$no_pedido' ";
  $res=mysqli_query($con, $sql) or die(mysqli_error($con));



   mysqli_close($con);


//enviamos correo de notificación


          $to      = 'contacto@ferreteriataximaroa.com.mx'; // Send correo to our user
          $subject = 'Solicitud de cancelación'; // Give the correo a subject 
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
                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Ferretería Taximaroa - Venta en línea</h1>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                      El cliente está solicitando la cancelación del número de pedido <b>#'. $$no_pedido.'</b> por favor revisa todos los detalles desde el administrador.
                    </p>
                    <p>
                    <a href="http://ferreteriataximaroa.com.mx/administrador/panel.php.php"  class="btnAgregarAlCarritoProductos">Ingresar al administrador</a>
                    </p>
                   
                    
                  </td>
                </tr>
                <hr>
               
                
                 
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
Consulta nuestros <a href="http://ferreteriataximaroa.com.mx/terminos-y-condiciones.php" target="_blank">términos y condiciones</a> y nuestro <a href="http://ferreteriataximaroa.com.mx/aviso-de-privacidad.php" target="_blank">aviso de privacidad</a>. Cualquier duda con tu pedido, contacta a nuestro equipo de atención al cliente.</p>
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
                      &reg; Ferretería Taximaroa 2021<br/>
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
                          <a href="http://www.twitter.com/" style="color:#ffffff;"><img style="-webkit-filter: opacity(.9) drop-shadow(0 0 0 white);" src="http://ferreteriataximaroa.com/assets/images/correo/linkedin.jpg" alt="Linkedin" width="28" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="width: 200px" align="center">
                          <a href="http://www.facebook.com/" style="color:#ffffff;"><img style="  filter: opacity(.9) drop-shadow(0 0 0 white);" src="http://ferreteriataximaroa.com/assets/images/correo/facebook.jpg" alt="Facebook" width="28" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="width: 200px" align="center">
                          <a href="http://www.facebook.com/" style="color:#ffffff;"><img style="  filter: opacity(.9) drop-shadow(0 0 0 white);" src="http://ferreteriataximaroa.com/assets/images/correo/instagram.jpg" alt="Facebook" width="28" style="height:auto;display:block;border:0;" /></a>
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
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
          mail($to, $subject, $message, $headers); // Send our correo


          //echo "usuario registrado correctamente <br><br>"; 
        
          

       
   


  }
  //actualizar datos cliente






