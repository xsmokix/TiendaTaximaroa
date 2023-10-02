<?php 
include "carrito.php";
include "cabecera.php";
require_once "db.php";




$collection_id = $_GET['collection_id'];
$collection_status = $_GET['collection_status'];
$merchant_order_id = $_GET['merchant_order_id'];
$preference_id = $_GET['preference_id'];
$estatusDelPago = $_GET['estatusDelPago'];




 $total = 0;
 $x=0;
             foreach ($_SESSION['carrito'] as $indice=>$producto) {
              $productos = $con->query("SELECT * FROM productos WHERE id='$producto[id_producto]'");
              $totalProductos = $_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
              $total = $total+$_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
                   $x=$x+1;
                    } 

                    echo number_format((float)$total, 2, '.', ''); 






      $query = mysqli_query($con, "INSERT INTO `pedidos` ( `clave_transaccion`, `PaypalDatos`, `fecha`, `correo`, `total`, `estatus`) VALUES ('$SID', 'PaypalDatos', NOW(), 'correo', '$total', 'pendiente');");

         $idVenta = mysqli_insert_id($con);

         foreach ($_SESSION['carrito'] as $indice => $producto) {

         $query = mysqli_query($con, "INSERT INTO `pedidos_detalles` (`id_pedido`, `id_producto`, `precio`, `cantidad`) VALUES ('$idVenta', '$producto[id_producto]', '$producto[precio_venta]', '$producto[cantidad]')");

      }


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
include "pie.php";
include "modals.php";


//vaciamos el carrito y las sessiones
unset($_SESSION['carrito']);
unset($_SESSION['numeroDePedido']);

 ?>

  







  


  </body>
</html>
