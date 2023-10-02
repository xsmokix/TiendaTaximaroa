<?php 
include "carrito.php";
include "cabecera.php";
require_once "db.php";

$productosCarrito="";
$total = 0;
$x=0;        

foreach ($_SESSION['carrito'] as $indice=>$producto) {
        $productos = $con->query("SELECT * FROM productos WHERE id='$producto[id_producto]'");
        $totalProductos = $_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
        $total = $total+$_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
        //generamos una variable con una tabla de productos, que enviaremos por correo
        $productosCarrito = $productosCarrito."<tr style='width:620px'><td>".$_SESSION['carrito'][$x]['cantidad']." - ". $_SESSION['carrito'][$x]['nombre']. "</td></tr>";
        $x=$x+1;
      } 

      echo number_format((float)$total, 2, '.', ''); 


$numeroPedido = $_SESSION['numeroDePedido'];
$query = mysqli_query($con, "UPDATE pedidos SET metodoPago = 'Stripe' WHERE numero_pedido = '$numeroPedido'");

?>

<div style="background-color:#f4f4f4;">
     <!-- hero -->
    <section class="hero hero-small">
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <h2 class="mb-0 textoAzul">PEDIDO EXITOSO</h2>
            
          </div>
        </div>
      </div>
    </section>
    <hr>
   <section class="no-overflow pt-0">
      <div class="container" style="background-color:white; border-radius:20px;">
        <div class="row gutter-4 justify-content-between">
          <div class="col-12">
            <div class="content-container">
              <br><br>
              <center>
                <i class="fas fa-6x fa-check-circle" style="color:#62ba43;"></i>
              </center>
              <h2 class="textoAzul text-center">
                Gracias por tu compra
              </h2>
              <br><br>
              <h3 class="text-center textoAzul">Tu pedido <b>#<?php echo $_SESSION['numeroDePedido'] ?></b> está en validación, una vez que confirmemos el pago, te estaremos informando para hacer el envío de tus productos </h3>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <p>
                    <div class="text-center">
                      <a href="clientes/historial_pedidos.php"  class="btnAgregarAlCarritoProductos">Ver mis pedidos</a>
                    </div>
                  </p>
                </div>
              </div>
              <br><br>
              <p>Cualquier duda puedes comunicarte con nosotros:</p>
              <br>
              <i class="textoAzul fas fa-envelope"></i>&nbsp;<a href="mailto:contacto@ferreteriataximaroa.com">contacto@ferreteriataximaroa.com</a><br>
              <i class="textoAzul fas fa-phone-alt"></i>&nbsp;<a href="tel:4433230827">443-323 0827</a> <br>
              <i class="textoAzul fas fa-phone-alt"></i>&nbsp;<a href="tel:4433234197">443-323 4197</a>
              <br><br><br>
            </div>
          </div> <!-- div col -lg - 6 -->
        </div>
      </div>
    </section>
    <br><br>
</div>

<?php 
//enviamos correo al cliente

          $to      = $_GET['correoe']; // Send correo to our user
          $subject = 'Gracias por tu compra'; // Give the correo a subject 
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
                      Gracias por tu compra, tu número de pedido es <b>#'. $numeroPedido.'</b> te avisaremos cuando tu envío esté en camino
                    </p>
                    <p><b>Resumen de tu compra:</b></p>
                    <p>ARTÍCULOS TOTALES DE LA COMPRA: <b>'. sizeof($_SESSION["carrito"]).'</p>
                    
                  </td>
                </tr>
                <hr>
                 '.$productosCarrito.'
                 <hr>
                  <tr>
                    <td>
                      <h3>Pagaste: $'. number_format((float)$_SESSION["granTotal"], 2, '.', '').'</h3>
                      <br><br>
                    </td>
                  </tr>
                <tr>
                  <td style="padding:0;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="http://ferreteriataximaroa.com.mx/assets/images/compra-segura1.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                          
                        </td>
                        <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          
                        </td>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="http://ferreteriataximaroa.com.mx/assets/images/pagos.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                          
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
                      &reg; Ferretería Taximaroa '.date("Y").'<br/>
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
                          <a href="https://www.instagram.com/ferreteria_taximaroa/" style="color:#ffffff;"><img style="  filter: opacity(.9) drop-shadow(0 0 0 white);" src="http://ferreteriataximaroa.com.mx/assets/images/correo/instagram.jpg" alt="instagram" width="28" style="height:auto;display:block;border:0;" /></a>
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
          $headers .= 'Cc: contacto@ferreteriataximaroa.com.mx' . "\r\n";  // esto sería copia normal
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
          mail($to, $subject, $message, $headers); // Send our correo

include "pie.php";
include "modals.php";

//vaciamos el carrito y las sessiones
//unset($_SESSION['carrito']);
//unset($_SESSION['numeroDePedido']);

$_SESSION['pedidoFinalizado']='1';

 ?>


<script>
  $(".numeroitemsCarrito").text("0");
</script>

  </body>
</html>
