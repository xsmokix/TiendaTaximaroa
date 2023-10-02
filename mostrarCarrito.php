<?php 

  session_start();
    $currentPage = $_SERVER['REQUEST_URI']; 
    //echo $_SESSION['currentPage'] = $currentPage;  

    if (isset($_SESSION['ciudad'])) {
      $ciudad_cliente = $_SESSION['ciudad'];
    if($_SESSION['ciudad']=="Morelia"){
      $tipo_envio = "taximaroa";
      $tipo_envio2 = "paqtax";
    }else{
      $tipo_envio = "paqueteria";
      $tipo_envio2 = "paqtax";
    }

  }else{
    $ciudad_cliente = "SinCiudad";
  } 
  


//include "carrito.php";
include "cabecera.php";


require_once "db.php";

/*
if (!empty($_GET['eliminar']=="1")) {
 
  ?>

        <script>
   swal({
                 title: 'Producto',
                  text: 'eliminado de tu carrito',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              });
</script>

  <?php
/* } */
?>


  <?php if (!empty($_SESSION['carrito'])) {
            
          ?>


 <!-- hero -->
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <h2 class="textoAzul"><strong>TU CARRITO</strong></h2><br><br>
          </div>
        </div>
      </div>
    </section>


    <section class="pt-0">
      <div class="container">

      


       
        <div class="row gutter-2 gutter-lg-4 justify-content-end">
        	

          <div class="col-lg-8 cart-item-list">
             <div class="card card-data bg-light">
                 <div class="card-header py-2 px-3">
                  <div class="row pr-6 text-center">
                    <div class="col-lg-6 col-12"><span class="eyebrow">Producto</span></div>
                    <div class="col-lg-2 col-4 text-center"><span class="eyebrow">Precio</span></div>
                    <div class="col-lg-2 col-4 text-center"><span class="eyebrow">Cantidad</span></div>
                    <div class="col-lg-2 col-4 text-center"><span class="eyebrow">Total</span></div>
                  </div>
                </div>



          	<?php

            //echo var_dump($_SESSION['carrito']);

          	

            $bloquear_pagar = FALSE;
          	$total = 0;
            $x = 0;
          	 foreach ($_SESSION['carrito'] as $indice=>$producto) {
          	 	$productos = $con->query("SELECT * FROM productos WHERE id='$producto[id_producto]'");
              

          	 	?>
          		
          	

            
                 

            <!-- cart item -->
            <div class="cart-item" style="border-bottom: none;">
              <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                  <div class="media media-product">
                  	<?php while($rowproductos = $productos->fetch_object()){
                      $tipo_envio_prod = $rowproductos->tipo_envio;
                    $idproducto = $rowproductos->id;  ?>
                    <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>"><img src="<?php echo $rowproductos->foto1 ?>" alt="Image"></a>
                <?php } ?>
                    <div class="media-body">
                      <h5><?php echo $producto['nombre'] ?></h5>
                      <small>Descripción corta del producto...</small>
                    </div>
                  </div>
                </div>
                <div class="col-4 col-lg-2 text-center">
                  <span class="cart-item-price">$<?php echo number_format($producto['precio_venta'],2) ?></span>
                  <input type="hidden" name="precio" value="<?php echo number_format($producto['precio_venta'],2) ?>">
                </div>
                <div class="col-4 col-lg-2 text-center">
                <!-- <select name="" id="" onchange="calcularTotalProducto(this.value, <?php //echo $producto['id_producto'] ?>, <?php //echo $producto['precio_venta'] ?>); return false;"> -->
                  <form action="mostrarCarrito.php" method="POST" id="form<?php echo $producto['id_producto'] ?>">
                  <select name="cantidad" id="cantidad" onchange="enviarForm(<?php echo $producto['id_producto'] ?>); return false;">
                    <option value="<?php echo $_SESSION['carrito'][$x]['cantidad'] ?>" selecte><?php echo $_SESSION['carrito'][$x]['cantidad'] ?></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
      
                 <input type="hidden" name="id_producto" id="id_producto" value="<?php echo  $producto['id_producto'] ?>">
                  <input type="hidden" name="nombre" id="nombre" value="<?php echo  $producto['nombre'] ?>">
                  <input type="hidden" name="precio_venta" id="precio_venta" value="<?php echo $producto['precio_venta'] ?>">
                  <input type="hidden" name="Agregar" value="1">
                  <input type="hidden" name="btnAccion" value="Agregar" >
                  <input type="hidden" name="desdeSelect" value="1" >
                  <input type="submit" style="display: none;">


                </form>
                <input type="hidden" name="cantidad"  value="1">
                </div>
                <div class="col-4 col-lg-2 text-center">
                  <span class="cart-item-price">$<?php echo number_format($producto['precio_venta']*$_SESSION['carrito'][$x]['cantidad'],2) ?></span>
                  <input type="hidden" class="totalProducto" name="totalProducto" id="totalProducto<?php echo $producto['id_producto'] ?>"  value="<?php echo number_format($producto['precio_venta']*$producto['cantidad'],2) ?>">
                </div>


                <?php 
                if (isset($_SESSION['ciudad'])) {
                   
                    if ($tipo_envio==$tipo_envio_prod) { 
                     $disponibilidad = '<span class="badge badge-success" style="padding-left: 18px;"> <i class="fas fa-check-circle"></i> Producto disponible para envío a tu ubicación</span>';
                     $btnClose = "";
                    
                     }elseif($tipo_envio==$tipo_envio_prod || $tipo_envio2 == $tipo_envio_prod || $tipo_envio_prod == 'paqueteria'){ 
                     $disponibilidad = '<span class="badge badge-success" style="padding-left: 18px;"> <i class="fas fa-check-circle"></i> Producto disponible para envío a tu ubicación</span>';
                     $btnClose = '';
                       
                   }else{
                   $disponibilidad = '<span class="badge badge-danger" style="padding-left: 18px;"> <i class="fas fa-times-circle"></i> Este producto no está disponible para el envío a tu ubicación</span>';
                   $btnClose = 'ring ring-1';

                   
                    $bloquear_pagar = TRUE;
                     } } ?> 


                <form action="" method="post">
                	<input type="hidden" name="id_producto_carrito" value="<?php echo $producto['id_producto'] ?>">
                	<button name="btnAccion" value="Eliminar" type="submit" class="cart-item-close <?php echo $btnClose; ?>" style="margin-right: 12px;"><i class="icon-x"></i></button>
                </form>

<style>
  .ring {
  width: 40px;
  height: 40px;
  opacity: 0.8;
  border-radius: 50%;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}
 .ring-1 {
  background: #E35D46;
  -webkit-animation: r0 2s 0s ease-out infinite;
  -moz-animation: r0 2s 0s ease-out infinite;
  animation: r0 2s 0s ease-out infinite;
}
@-webkit-keyframes r0 {
  0% {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 0px 0px rgba(227, 93, 70, 0);
  }
  10% {
    box-shadow: 0 0 8px 6px #E35D46, 0 0 2px 10px #E35D46;
  }
  100% {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 20px 8px rgba(227, 93, 70, 0);
  }
}
@-moz-keyframes r0 {
  0% {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 0px 0px rgba(227, 93, 70, 0);
  }
  10% {
    box-shadow: 0 0 8px 6px #E35D46, 0 0 2px 10px #E35D46;
  }
  100% {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 20px 8px rgba(227, 93, 70, 0);
  }
}
@keyframes r0 {
  0% {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 0px 0px rgba(227, 93, 70, 0);
  }
  10% {
    box-shadow: 0 0 8px 6px #E35D46, 0 0 2px 10px #E35D46;
  }
  100% {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 20px 8px rgba(227, 93, 70, 0);
  }
}
@-webkit-keyframes r20 {
  from {
    box-shadow: 0 0 8px 6px #ff1a1a, 0 0 12px 14px #ff1a1a;
  }
  to {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 4px 41px rgba(227, 93, 70, 0);
  }
}
@-moz-keyframes r20 {
  from {
    box-shadow: 0 0 8px 6px #ff1a1a, 0 0 12px 14px #ff1a1a;
  }
  to {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 4px 41px rgba(227, 93, 70, 0);
  }
}
@keyframes r20 {
  from {
    box-shadow: 0 0 8px 6px #ff1a1a, 0 0 12px 14px #ff1a1a;
  }
  to {
    box-shadow: 0 0 8px 6px rgba(227, 93, 70, 0), 0 0 4px 41px rgba(227, 93, 70, 0);
  }
}
</style>

                  


                

                  <div class="col-xs-12" style="padding-left: 30px;">

                  <?php 
                if (isset($_SESSION['ciudad'])) {
                   
                    if ($tipo_envio==$tipo_envio_prod) { ?>
                      <span class="badge badge-success" style="padding-left: 18px;"> <i class="fas fa-check-circle"></i> Producto disponible para envío a tu ubicación</span>
                    <?php
                    
                     }elseif($tipo_envio==$tipo_envio_prod || $tipo_envio2 == $tipo_envio_prod || $tipo_envio_prod == 'paqueteria'){ ?>
                     <span class="badge badge-success" style="padding-left: 18px;"> <i class="fas fa-check-circle"></i> Producto disponible para envío a tu ubicación</span>
                       
                   <?php   }else{ ?>
                    <span class="badge badge-danger" style="padding-left: 18px;"> <i class="fas fa-times-circle"></i> Este producto no está disponible para el envío a tu ubicación</span>

                   <?php
                    $bloquear_pagar = TRUE;
                     } } ?> 

                   
                </div>
                
              </div>
            </div>

        <?php 
        $total = $total+$producto['precio_venta']*$producto['cantidad'];
        $x=$x+1;
    }
     ?>

          
          </div>
          </div>





          <div class="col-lg-4 cart-item-list">
            <div class="card card-data bg-light">
              <div class="card-header py-2 px-3">
                <div class="row align-items-center">
                  <div class="col text-center">
                    <h3 class="fs-18 mb-0">RESUMEN DE PEDIDO</h3>
                  </div>
                </div>
              </div>
              <?php 
              $subtotal = $total/1.16;
              $IVA = $total-$subtotal; ?>
              <div class="card-body">
                <ul class="list-group list-group-minimal">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Subtotal
                    <span class="subtotal">$<?php echo number_format($subtotal,2); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    IVA
                    <span class="iva">$<?php echo number_format($IVA,2); ?></span>
                  </li>
                  <!--<li class="list-group-item d-flex justify-content-between align-items-center">
                    IVA
                    <span>Incluido</span>
                  </li> -->
                 <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="" class="text-primary action underline">Add coupon code</a>
                  </li> -->
                </ul>
              </div>
              <div class="card-footer py-2">
                <ul class="list-group list-group-minimal">
                  <li class="list-group-item d-flex justify-content-between align-items-center text-dark fs-18">
                    Total
                    <span class="total">$<?php echo number_format($total,2); ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <form action="pagar.php?tipo_envio=<?php echo $ciudad_cliente; ?>" method="post" class="text-center">
              <br>
               <button class="btnCompletarPedido" type="submit" href="" style="border:none;" <?php if ($bloquear_pagar==TRUE) { echo "disabled";  } ?>>Finalizar pedido <i class="fas fa-2x fa-arrow-right" style="position: relative;right: -12px; top: 7px;"></i></button><br>
               <?php if ($bloquear_pagar==TRUE) { echo "<span class='badge badge-danger '><i>Por favor elimina <br> los productos que no se pueden <br> envíar a tu ubicación <br> para continuar con el pago</i></span>";  } ?>
            <!-- <button type="submit" class="btn btn-lg btn-primary btn-block mt-1">Hacer pedido</button> -->
            </form>
          </div>

    

        </div>
      </div>
    </section>





      <?php }else{ ?>


        <!-- hero -->
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h2>Aún no tienes productos en tu carrito</h2>
          </div>
        </div>
      </div>
    </section>


    <section class="pt-0">
      <div class="container">

        <div class="row">
          
        <!--  <div class="col-12 text-center">
          <img src="assets/images/carrito-vacio.jpg" style="max-width: 450px;" alt="">
           <div style="position: absolute; right: 0; bottom: 50px;">
             <a href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas">
             <button class="btnCompletarPedido" type="submit" href="" style="border:none;">Ir a comprar <i class="fas fa-2x fa-arrow-right" style="position: relative;right: -12px; top: 7px;"></i></button> </a>
           </div>
        </div> -->

        <!-- <div class="col-lg-4"></div>
        <div class="col-lg-5"></div>
        <div class="col-lg-3 text-rigth"> -->


          <div class="col-md-4 col-12"></div>
          <div class="col-md-4 col-12 text-center">
          <img src="assets/images/carrito-vacio.jpg" class="img-fluid"  alt="">
           
        </div>
        <div class="col-md-4 col-12 text-center text-md-right">
          <a class="btnCarritoVacio" href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas">
             <button class="btnCompletarPedido" type="submit" href="" style="border:none;">Ir a comprar <i class="fas fa-2x fa-arrow-right" style="position: relative;right: -12px; top: 7px;"></i></button> </a>
        </div>

            
           
          </div>


        </div>



         </div>
      </div>
    </section>

      

    <?php } ?>






  <?php 
  include "pie.php";
  include "modals.php"; ?>

<!--
<script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script> -->


    <script>
      function agregarUno(idproducto){
        console.log(idproducto);
        var cantidad = $('#'+idproducto).val();
        var nuevacantidad = cantidad + 1;
        $('#'+idproducto).val(nuevacantidad);

      }



      function calcularTotalProducto(cantidad,idproducto,precio){

        console.log(cantidad + " " + idproducto);

        var total = cantidad * precio;
        $("#totalProducto"+idproducto).val(total.toFixed(2));
        granTotal();

        <?php 
        /*
        $numeroProductos = count($_SESSION['carrito']);
          for ($i=0; $i <= $numeroProductos; $i++) { 
            if($_SESSION['carrito'][$i]['id_producto'] === '11'){
                  $_SESSION['carrito'][$i]['cantidad'] = $_SESSION['carrito'][$i]['cantidad']+1;
                  break; // Stop the loop after we've found the item
              }
          }
          */
          ?>


      }


      function granTotal(){

        var suma = 0;
        $('.totalProducto').each(function(){
               suma += parseFloat($(this).val());
        });
        suma = suma.toFixed(2);
        console.log("total final: "+suma);
        $(".subtotal").empty().append("$"+suma);
        $(".total").empty().append("$"+suma);

      }






function enviarForm(idform){


  console.log(idform);
 
 $("#form"+idform).submit();
}

/*

$(document).ready(function() {
  $('#cantidad').on('change', function() {
    var $form = $(this).closest('form');
    $form.find('input[type=submit]').click();
  });
});
*/

    </script>




















  </html>
</body>