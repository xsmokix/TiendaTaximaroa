<?php 
 session_start();
    $currentPage = $_SERVER['REQUEST_URI'];     
    $_SESSION['currentPage'] = $currentPage; 

include "carrito.php";
//include "cabecera.php";


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//validamos que tenga una ciudad el cliente
if (isset($_SESSION['ciudad'])) {
    if ($_SESSION['ciudad']=="" || $_SESSION['ciudad']==NULL) { ?>
      <script>alert("No tienes una dirección válida en tu cuenta, por favor ingresa una o actualízala para poder continuar");
    window.location.href = "clientes/direcciones.php";
  </script>
  <?php
    }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
<link rel="stylesheet" href="assets/css/vendor.css"/>
<link rel="stylesheet" href="assets/css/style.css?ver=2.03"/>
<!-- <link rel="stylesheet" href="assets/css/carousel.css"> -->
<link href="assets/css/estilos.css?ver=2.00" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" href="assets/images/favicon/apple-touch-icon.png"/>
<link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-touch-icon-57x57.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-touch-icon-72x72.png"/>
<link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-touch-icon-76x76.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-touch-icon-114x114.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-touch-icon-120x120.png"/>
<link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-touch-icon-144x144.png"/>
<link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-touch-icon-152x152.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon-180x180.png"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Quicksand:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
<!-- MARCAS -->
<link href="assets/css/slick-theme.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">
<title>Ferretería Taximaroa - Opciones de Pago</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-217405467-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-217405467-1');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
</head>
<body>
  <div class="overlay"></div>
  <?php require_once "carrito.php"; ?>
  <div id="cookies">
    <p>
      Bienvenido a Taximaroa, al navegar en nuestro portal asumimos que estás de acuerdo y <b>aceptas los términos y condiciones</b><button class="btn-terminos" id="close-cookies">OK</button>&nbsp;<a style="color: white;" href="terminos-y-condiciones.php" class="btn-terminos">Ver más</a>
    </p>
  </div>
<?php

require_once "db.php";
include "lib/configpaypal.php";
require_once('config-stripe1.php');


$granTotal = $_GET['granTotal'];
$costoEnvio = number_format((float)$_GET['costoEnvio'], 2, '.', ',');
$paqueteria = $_GET['paqueteria'];
$_SESSION['granTotal'] = $granTotal;
$direccionentrega = $_GET['direccionentrega'];
$id_facturacion = $_GET['id_facturacion'];

     
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
//MercadoPago\SDK::setAccessToken('TEST-4319992401844659-111303-4ac629fafaf1f3d494fa8a4d458d99d6-483591003');
MercadoPago\SDK::setAccessToken('TEST-6404294012385151-042012-f5ca755ad79d9554ca31946e7c0fd6c4-818313737');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();


//creamos pedido en la BD y sus detalles, obtenemos numero de pedido
if (isset($_SESSION['numeroDePedido'])) {
  $numeroDePedido =  strtoupper($_SESSION['numeroDePedido']);
  //echo "haysesion". var_dump($numeroDePedido);
  $query1 = mysqli_query($con, "DELETE FROM `pedidos` WHERE `pedidos`.`numero_pedido` = '$numeroDePedido'");
  $query2 = mysqli_query($con, "DELETE FROM `pedidos_detalles` WHERE `pedidos_detalles`.`numero_pedido` = '$numeroDePedido'");  
  $sql = "INSERT INTO `pedidos` ( `id_usuario`,`id_datos_cliente`,`numero_pedido`, `PaypalDatos`, `fecha`, `correo`, `total`,`costoEnvio`,`paqueteria`,`direccion_entrega`,`id_facturacion`,`metodoPago`,`guia`, `estatus`, `motivo`) VALUES ('$_SESSION[id_usuario]','$_SESSION[idcliente]','$_SESSION[numeroDePedido]', 'PaypalDatos', NOW(), 'correo', '$granTotal','$costoEnvio','$paqueteria','$direccionentrega','$id_facturacion','', '', 'creado', '');";
  $res=mysqli_query($con, $sql) or die(mysqli_error($con));
  $idVenta = mysqli_insert_id($con);

  foreach ($_SESSION['carrito'] as $indice => $producto) {
    $query = mysqli_query($con, "INSERT INTO `pedidos_detalles` (`numero_pedido`, `id_producto`, `precio`, `cantidad`) VALUES ('$numeroDePedido', '$producto[id_producto]', '$producto[precio_venta]', '$producto[cantidad]')");
  }
}else{

  $numeroDePedido = substr(md5(time()), 0, 8);
   //echo "creandosession". var_dump($numeroDePedido);
  $_SESSION['numeroDePedido']=strtoupper($numeroDePedido);
  $sql = "INSERT INTO `pedidos` (  `id_usuario`,`id_datos_cliente`,`numero_pedido`, `PaypalDatos`, `fecha`, `correo`, `total`,`costoEnvio`,`paqueteria`,`direccion_entrega`,`id_facturacion`,`metodoPago`,`guia`, `estatus`, `motivo`) VALUES ('$_SESSION[id_usuario]','$_SESSION[idcliente]','$numeroDePedido', 'PaypalDatos', NOW(), 'correo', '$granTotal','$costoEnvio','$paqueteria','$direccionentrega','$id_facturacion','','', 'creado', '');";
  $res=mysqli_query($con, $sql) or die(mysqli_error($con));
  $idVenta = mysqli_insert_id($con);
  foreach ($_SESSION['carrito'] as $indice => $producto) {
    $query = mysqli_query($con, "INSERT INTO `pedidos_detalles` (`numero_pedido`, `id_producto`, `precio`, `cantidad`) VALUES ('$numeroDePedido', '$producto[id_producto]', '$producto[precio_venta]', '$producto[cantidad]')");
  }
}
?>


<style>
  .mercadopago-button{
  background-color: #a2a2e5;
  color: white;
  font-size: 1.5rem;
  font-weight: bold;
  /* padding: 13px 28px 13px 28px; */
  border-radius: 5px;
  cursor: not-allowed;
  pointer-events: none;
  border: none;
    
}

.mercadopago-button:hover{
  color: #F8CB19;
}

.stripe-button-el{
  width: 100% !important;
}

.stripe-button-el span{
  display: block;
    width: 100%;
    background: #000068 !important;
    color: white !important;
    font-size: 1.5rem !important;
    font-weight: bold;
    padding: 13px 20px 13px 20px !important;
    border-radius: 5px !important;
    cursor: pointer !important;
    background-image: #000068;
    height: auto;
    border: none;
    font-family: Montserrat, Arial, Helvetica, sans-serif;
    line-height:none;

}
</style>

     <!-- hero -->
    <section class="hero hero-small">
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <h2 class="mb-0 textoAzul">OPCIONES DE PAGO <?php //echo "idusuario: ".$_SESSION['id_usuario']. " idcliente: ".$_SESSION['idcliente'] ?></h2>
          </div>
        </div>
      </div>
    </section>
    <hr>

    <?php 
      $total = 0;
      $SID=session_id();
      foreach ($_SESSION['carrito'] as $indice => $producto) {
        $total = $total+($producto['precio_venta']*$producto['cantidad']);
      }
    ?>

    <section class="no-overflow pt-0">
      <div class="container">
        <div class="row gutter-4 justify-content-between">
          <aside class="col-lg-5">
            <div class="row">
              <!-- order preview -->
              <div class="col-12">
                <div class="card card-data bg-light" style=" border-bottom: 0 !important; ">
                  <div class="card-header py-2 px-3" style="background-color: #000068;">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h3 class="fs-8 mb-0"><strong class="textoBlanco">TU PEDIDO</strong></h3>
                      </div>
                      <div class="col text-right">
                        <a href="mostrarCarrito.php" class="eyebrow iconoCarrito"><i class="fas fa-2x fa-arrow-left textoBlanco"></i><i class="fas fa-3x fa-shopping-cart textoBlanco"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body " style="background-color: rgba(0, 0, 0, 0.03)">
                     <ul class="list-group list-group-line">
                      <div class="row">
                        <li class="col-lg-2  d-flex justify-content-between align-items-center textoAzul"><b>Cant.</b></li>
                        <li class="col-lg-7  d-flex justify-content-between align-items-center textoAzul"><b>Producto</b></li>
                        <li class="col-lg-3  d-flex justify-content-between align-items-center textoAzul"><b>Importe</b></li>
                      </div>
                    </ul>
                    
                    <?php 
                    $total = 0;
                    $x=0;
                    $imagenes = "";
                    foreach ($_SESSION['carrito'] as $indice=>$producto) {
                      $productos = $con->query("SELECT * FROM productos WHERE id='$producto[id_producto]'");
                      while($rowproductos = $productos->fetch_object()){ 
                        //construimos las imagens
                        $imagenes = $imagenes . '<div class="col-6"><img src="'.$rowproductos->foto1.'" alt="Image"><br><span style="font-size:10px;">'.$rowproductos->nombre.'</span></div>';
                      } 
                    $totalProductos = $_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
                    ?>

                    <ul class="list-group list-group-line">
                      <div class="row">
                        <li class="col-lg-2  d-flex justify-content-between textoAzul align-items-center"><?php echo $_SESSION['carrito'][$x]['cantidad'] ?></li>
                        <li class="col-lg-7  d-flex justify-content-between textoAzul align-items-center" style="font-size: 12px;"><?php echo $_SESSION['carrito'][$x]['nombre'] ?></li>
                        <li class="col-lg-3  d-flex justify-content-between textoAzul align-items-center">$<?php echo number_format((float)$totalProductos, 2, '.', ','); ?></li>
                        <li class="col-12"><hr></li>
                      </div>
                    </ul>
       

                  <?php  
                  $total = $total+$_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
                  $x=$x+1;
                  $subtotal = $total/1.16;
                  $IVA = $total-$subtotal;
                  } ?>

                    <ul>
                      <div class="row">
                        <li class="col-lg-12 d-flex justify-content-between textoAzul align-items-center"><small>ARTÍCULOS TOTALES DE LA COMPRA: <b><?php echo sizeof($_SESSION['carrito']) ?></b></small></li>
                      </div>
                    </ul>
                    <ul>
                      <div class="row">
                        <li class="col-lg-9 d-flex textoAzul justify-content-between"><h5><strong class="textoAzul">SUBTOTAL</strong></h5></li>
                        <li class="col-lg-3 d-flex textoAzul justify-content-between">$<?php echo number_format((float)$subtotal, 2, '.', ','); ?></li>
                        <li class="col-lg-9 d-flex textoAzul justify-content-between"><h5><strong class="textoAzul">IVA</strong></h5></li>
                        <li class="col-lg-3 d-flex textoAzul justify-content-between">$<?php echo number_format((float)$IVA, 2, '.', ','); ?></li>
                        <li class="col-lg-9 d-flex textoAzul justify-content-between">COSTO DEL ENVÍO</li>
                        <li class="col-lg-3 d-flex textoAzul">$<span id="costoEnvio text-left"><?php echo $costoEnvio; ?></span></li>
                      </div>
                    </ul>

                  </div>
                </div>
              </div>

              <!-- order summary -->
              <div class="col-12 mt-1" style=" position: relative; top: -30px;">
                <div class="card card-data bg-light">
                
                  <div class="card-footer py-2" style="border-top: 0; border-top-left-radius: 0px;">
                    <ul class="list-group list-group-minimal textoAzul">
                      <li class="list-group-item text-center fs-18 textoAzul">
                        <input style="display: none;" type="text" id="subtotal" value="<?php echo number_format((float)$total, 2, '.', ''); ?>">
                        <h4 class="textoAzul">TOTAL
                        <span id="totalFinal" style="color: #000068 !important;">$<?php echo number_format($granTotal, 2, '.', ','); ?></span></h4>
                      </li>
                    </ul>
                  </div> 
                </div>
              </div>
              <!-- order summary -->

         <!-- efecto -->

         <?php

              //guardamos todos los valores obtenidos para pasarlos a mercado pago
              // Crea un ítem en la preferencia
              if (!isset($_SESSION['nombre'])) {
                $nombre =  "sin nombre";
              }else{
                $nombre = $_SESSION['nombre'];
              }
              $item = new MercadoPago\Item();
              $item->title = 'Pedido #'.$_SESSION['numeroDePedido'].' de '.$nombre;
              $item->quantity =  1;
              $item->currency_id = "MXN";
              $item->unit_price = number_format((float)$granTotal, 2, '.', '');
              $preference->items = array($item);

              //echo var_dump($item);
              $url = "http://". $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'])."/";
              $preference->back_urls = array(
                    "success" => $url."finalizar-pedido-mp.php?estatusDelPago=aprobado",
                    "failure" => $url."finalizar-pedido-mp.php?estatusDelPago=rechazado",
                    "pending" => $url."finalizar-pedido-mp.php?estatusDelPago=pendiente"
                );
              $preference->save();
              ?>

        </aside>

         <div class="col-lg-3">
           <div class="row">
             <?php echo $imagenes; ?>
           </div>
         </div>

        <div id="contenedorPago" class="col-lg-4" style="border: 1px solid #f7f7f7; padding: 10px 0px;">
          <br><br><br><br>

          <?php 
          $granTotalStripe = number_format((float)$granTotal, 2, '.', '')*100;
          // Imprime el formulario de pago de Stripe
            echo '<form action="charge1.php?granTotalStripe='.$granTotalStripe.'" method="post">';
            echo '<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"';
            echo 'data-key="' . STRIPE_PUBLISHABLE_KEY . '"';
            echo 'data-amount="'.$granTotalStripe.'"';
            echo 'data-name="Ferretería Taximaroa"';
            echo 'data-description="Pago del pedido #'.$_SESSION['numeroDePedido'].'"';
            echo 'data-image="https://ferreteriataximaroa.com.mx/assets/images/favicon/apple-touch-icon-180x180.png"';
            echo 'data-locale="auto"';
            echo 'data-currency="mxn"';
            echo 'data-allow-remember-me="false"';
            echo 'data-label="Pagar con tarjeta">';
            echo '</script>';
            echo '</form>';
            ?>

          <!-- <button data-toggle="modal" data-target="#modalPagoPaypal" style="border:none;" type='button' class='btnPagarPedido'><i class="fab fa-paypal"></i> Pagar con Paypal</button> -->
          <br>
          <a href="process.php?total=<?php echo $granTotal ?>" style="border:none;" id="btnPagarPaypal" class="btnPagarPaypal"><i class="fab fa-paypal"></i> Pagar con Paypal</a>
          <br>
          <script src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>"></script>
          <br>
          <button type='button' class='btnPagarPedido' data-toggle="modal" data-target="#modalPagoEnEfectivo"  style='border:none'>
              Pago en Efectivo
          </button>

        </div> <!-- efecto -->

      </div>
  

        </div>
      </div>
    </section>

  <?php 
  //include "pie.php";
  include "modals.php";
  ?>

<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="assets/js/main.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>-->
<script type="text/javascript" src="assets/js/slick.min.js"></script>

  <script>
  $( document ).ready(function() {
     $(".mercadopago-button").html('Pagar con MercadoPago');
    $(".mercadopago-button").attr('style', 'background-color: #F7CD17 !important; cursor:pointer !important; pointer-events: visible !important; line-height: 1 !important!;');

    //evitar botón atrás
    window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
  });

  </script>

  </body>
</html>
