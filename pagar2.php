<?php 
include "carrito.php";
include "cabecera.php";
require_once "db.php";
include "lib/configpaypal.php";

     
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-4319992401844659-111303-4ac629fafaf1f3d494fa8a4d458d99d6-483591003');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

 

   ?>


  <style>
    .tabs-bar{
  width: 100%;
  list-style: none;
  display: block;
  /*border-bottom: 1px solid #ddd;*/
  padding-left: 5px;

}

.tabs-bar .tab{
  display: inline-block;
  cursor: pointer;
  margin-right: 5px;
  margin-bottom: -1px;
  padding: 10px;
  background-color: #27278F;
  color: white;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.tab-active{
  border: 1px solid #ddd;
  border-bottom: 1px solid #fff;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  background-color: white !important;
  color: #27278F !important;
}

.content{
  display: none;
}

.content-active{
  display: block;

}

.content-tab1,.content-tab3{
  -webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
-moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15)
}
ul.tabs-bar{
  margin-bottom: 0 !important;
}

.custom-choice{
  -webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
-moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
border-radius: 8px;
margin-bottom: 20px;
margin-left: 5px;
margin-right: 5px;
}

.custom-choice .choice-indicator{
  border: none !important;
}
.custom-control-label::before, .custom-choice .custom-control-label::before{
  border: transparent !important;
  background-color: #f9f9f9;
}

.custom-control-label::before{
  /*border: 1px solid #f9f9f9;*/

  border-radius: 4px;
  top: 5px !important;
  left: 5px !important;
}
.custom-choice .custom-control-label::after, .custom-choice .custom-control-label::before{
  top: 5px !important;
  left: 5px !important;
}

/* .mercadopago-button{
  background-color: #a2a2e5;
    color: white;
    font-size: 1.5rem;
    font-weight: bold;
    padding: 0px 42px 0px 42px;
    border-radius: 5px;
cursor: not-allowed;
  pointer-events: none;
    
}

.mercadopago-button:hover{
  color: #F8CB19;
}*/
.mercadopago-button{
  background-color: #a2a2e5;
  color: white;
  font-size: 1.5rem;
  font-weight: bold;
  /* padding: 13px 28px 13px 28px; */
  border-radius: 5px;
 /* cursor: not-allowed;
  pointer-events: none;*/
  border: none;
    
}

.mercadopago-button:hover{
  color: #F8CB19;
}



  </style>


     <!-- hero -->
    <section class="hero hero-small">
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <h2 class="mb-0 textoAzul">FINALIZAR PEDIDO</h2>
            
          </div>
        </div>
      </div>
    </section>

<hr>


 <?php 

    //if($_POST) {
      $total = 0;
      $SID=session_id();


      foreach ($_SESSION['carrito'] as $indice => $producto) {


          $total = $total+($producto['precio_venta']*$producto['cantidad']);

      }

     // echo "<h3>".$total."</h3>";



        $query = mysqli_query($con, "INSERT INTO `pedidos` ( `clave_transaccion`, `PaypalDatos`, `fecha`, `correo`, `total`, `estatus`) VALUES ('$SID', 'PaypalDatos', NOW(), 'correo', '$total', 'pendiente');");

         $idVenta = mysqli_insert_id($con);

         foreach ($_SESSION['carrito'] as $indice => $producto) {

         $query = mysqli_query($con, "INSERT INTO `pedidos_detalles` (`id_pedido`, `id_producto`, `precio`, `cantidad`) VALUES ('$idVenta', '$producto[id_producto]', '$producto[precio_venta]', '$producto[cantidad]')");

      }


   //  } ?>




   


   <section class="no-overflow pt-0">
      <div class="container">
        <div class="row gutter-4 justify-content-between">

   <div class="col-lg-6 col-12 text-center">





     <ul class="tabs-bar">
    <li id="tab1" class="tab tab-active">Dirección</li>
    <li onclick="validarDireccion(); return false;"  id="tab2" class="tab">Envío</li>
    <li onclick="validarFacturacion(); return false;" id="tab3" class="tab">Facturación</li>
    
  </ul>


    <div class="content-container">

    <div class="content content-tab1 content-active">





                <?php 

          if (isset($_SESSION['nombre']) && isset($_SESSION['idcliente'])) {
      ?>
    <div class="col-lg-12 col-12 text-center">
      <h4>Bienvenid@ <small> <?php echo $_SESSION['nombre']; ?></small></h4>
      <p>Estás listo para terminar tu compra</p>
      <hr>
    </div>

    <?php $direccion = $con->query("SELECT dc.*, d.* FROM datos_clientes dc LEFT JOIN direcciones d ON dc.id=d.id_datos_cliente WHERE dc.id  ='$_SESSION[idcliente]'");
     ?>
    
        <!-- dirección compra -->


            <!-- delivery -->
            <form action="" id="formDireccion" name="formDireccion" style="max-width: 100%;">
            <div class="row text-left mb-2">
              <div class="col-md-12">
                <div class="numberCircle" style="display: inline-block;">1</div>
                <h4 class="mb-0" style="display: inline-block;">DIRECCIÓN DE ENTREGA</h4>
              </div>
              
            </div>
            <?php while($rowdireccion = $direccion->fetch_object()){  ?>
            <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">
              
              <div class="form-group col-md-12">
                <label for="firstName">Nombre Completo</label>
                <div id="search3">
                <input  type="text" class="direccionentrega" id="nombrereg" value="<?php echo $rowdireccion->nombreCompleto ?>">
              </div>
              </div>
           
              <div class="form-group col-md-4">
                <label for="country">Estado</label>
                <input type="text" class="direccionentrega" id="estadoreg" value="<?php echo $rowdireccion->estado ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="city">Municipio</label>
                <input type="text" class="direccionentrega" id="municipioreg" value="<?php echo $rowdireccion->municipio ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="postcode">CP</label>
                <input type="text" class="direccionentrega" id="cpreg" value="<?php echo $rowdireccion->cp ?>">
              </div>
              <div class="form-group col-md-8">
                <label for="address">Calle</label>
                <input type="text" class="direccionentrega" id="callereg" value="<?php echo $rowdireccion->calle ?>">
              </div>
              <div class="form-group col-md-2">
                <label for="city">No Ext</label>
                <input type="text" class="direccionentrega" id="num_extreg" value="<?php echo $rowdireccion->numero_exterior ?>">
              </div>
              <div class="form-group col-md-2">
                <label for="city">No Int</label>
                <input type="text" class="direccionentrega" id="num_itreg" value="<?php echo $rowdireccion->numero_interior ?>">
              </div>

              <div class="col-6">
                <button type="button" class="btnAzulRedondo" id="configreset">Cambiar dirección</button>
              </div>
              <!-- <div class="col-6">
                <button type="button" class="btnAzulRedondo" onclick="calcularEnvio(); return false;" id="configreset">Continuar con el envío</button>
              </div> -->
              
            </div>
        </form>




        <?php } 
    }else{ ?>

          
            <br><br><br>

            <h5>¡REGÍSTRATE Y AHORRA TIEMPO!</h5>
        <p>Compra más fácil y rápido, podrás consultar tus pedidos</p>

          <a id="btnRegistrarse" href="clientes/registrarse.php" class="btn btn-warning btn-sm">Registrarte</a>

          <br><br><br>

          <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target="#iniciarSesion">Iniciar sesión</a>

         <!-- <h5>INICIAR SESIÓN</h5>

  <form action="iniciar_sesion.php" method="post">

    <div class="row">
      <div class="col-lg-6">
        <div id="search2">
  <input style="margin-bottom:0 !important;" type="text" name="usuario" placeholder="Ingresa tu usuario"/>
</div>
      </div>
      <div class="col-lg-6">
        <div id="search2">
  <input style="margin-bottom:0 !important;" type="password" name="password" placeholder="Tu contraseña"/>
</div>
      </div>
    </div>
    
    <button class="btn btn-success btn-sm">Iniciar sesión </button>
  </form> -->
      

        


<?php } ?>


</div>

<!-- <h3 onclick="calcularEnvio(); return false;" class="accordeon-title">Continuar con el envío</h3> -->




  




  
 

    <div class="content content-tab2">
      <div class="contenedorCalcularEnvio"></div>
    </div>
    <div class="content content-tab3 text-center">

       <br>

            <h5>¿Requieres factura?</h5>
            <select onchange="mostrarFacturacion(this); return false;" name="" class="form-control" id="" style="max-width: 150px; background-position-x: 120px; margin: 0 auto;">
              <option value="No" selected>Selecciona...</option>
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>

            <br>



              <!-- delivery -->
            <form action="" id="formFacturacion" name="formFacturacion" style="max-width: 100%; display: none;" >
            <div class="row text-left mb-2">
              <div class="col-md-12">
                <div class="numberCircle" style="display: inline-block;">3</div>
                <h4 class="mb-0" style="display: inline-block;">DATOS DE FACTURACIÓN</h4>
              </div>
              
            </div>
           
            <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">
              
              <div class="form-group col-md-6">
                <label for="firstName">Razón social</label>
                <input  type="text" class="inputfacturacion razonsocial" id="razonsocial" value="">
         </div>
              <div class="form-group col-md-6">
                <label for="rfc">RFC</label>
                <input type="text" class="inputfacturacion rfc" id="rfc" value="">
              </div>
        
           
              <div class="form-group col-md-4">
                <label for="country">Domicilio Fiscal</label>
                <input type="text" class="inputfacturacion domiciliofiscal" id="domiciliofiscal" value="">
              </div>
              <div class="form-group col-md-4">
                <label for="city">Calle</label>
                <input type="text" class="inputfacturacion calle" id="calle" value="">
              </div>
              <div class="form-group col-md-4">
                <label for="postcode">Número</label>
                <input type="text" class="inputfacturacion numero" id="numero" value="">
              </div>
              <div class="form-group col-md-8">
                <label for="address">Colonia</label>
                <input type="text" class="inputfacturacion colonia" id="colonia" value="">
              </div>
              <div class="form-group col-md-4">
                <label for="cp">Código postal</label>
                <input type="text" class="inputfacturacion cp" id="cp" value="">
              </div>
              
              <div class="form-group col-md-6">
                <label for="correo">Correo</label>
                <input type="text" class="inputfacturacion correo" id="correo" value="">
              </div>
              <div class="form-group col-md-6">
                <label for="correo">Correo alternativo</label>
                <input type="text" class="inputfacturacion correo2" id="correo2" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="Ciudad">Ciudad</label>
                <input type="text" class="inputfacturacion ciudad" id="ciudad" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="Municipio">Municipio</label>
                <input type="text" class="inputfacturacion municipio" id="municipio" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="Estado">Estado</label>
                <input type="text" class="inputfacturacion estado" id="estado" value="">
              </div>
              <div class="form-group col-md-3">
                <label for="pais">País</label>
                <input type="text" class="inputfacturacion pais" id="pais" value="">
              </div>
              <div class="form-group col-md-12">
                <label for="uso CFDI">uso CFDI</label>
                
                <select name="usocfdi" class="form-control" id="usocfdi" style="background: none;">
                  <option value="" selected>Selecciona...</option>
                  <option value="G01">G01 Adquisición de mercancias</option>
                  <option value="G02">G02 Devoluciones, descuentos o bonificaciones</option>
                  <option value="G03">G03 Gastos en general</option>
                  <option value="I01">I01 Construcciones</option>
                  <option value="I02">I02 Mobilario y equipo de oficina por inversiones</option>
                  <option value="I03">I03 Equipo de transporte</option>
                  <option value="I04">I04 Equipo de computo y accesorios</option>
                  <option value="I05">I05 Dados, troqueles, moldes, matrices y herramental</option>
                  <option value="I06">I06 Comunicaciones telefónicas</option>
                  <option value="I07">I07 Comunicaciones satelitales</option>
                  <option value="I08">I08 Otra maquinaria y equipo</option>
                  <option value="D01">D01 Honorarios médicos, dentales y gastos hospitalarios.</option>
                  <option value="D02">D02 Gastos médicos por incapacidad o discapacidad</option>
                  <option value="D03">D03 Gastos funerales.</option>
                  <option value="D04">D04 Donativos.</option>
                  <option value="D05">D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
                  <option value="D06">D06 Aportaciones voluntarias al SAR.</option>
                  <option value="D07">D07 Primas por seguros de gastos médicos.</option>
                  <option value="D08">D08 Gastos de transportación escolar obligatoria.</option>
                  <option value="D09">D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                  <option value="D10">D10 Pagos por servicios educativos (colegiaturas)</option>
                  <option value="P01">P01 Por definir</option>
                </select>
              </div>
              <!--<div class="col-3"></div>
              <div class="col-6">
                <button type="button" class="btnAzulRedondo" id="configresetfacturacion">Cambiar dirección facturación</button>
              </div> ->
              <!-- <div class="col-6">
                <button type="button" class="btnAzulRedondo" onclick="calcularEnvio(); return false;" id="configreset">Continuar con el envío</button>
              </div> -->
              
            </div>
        </form>

        <div class="row">
          <div class="col-lg-6"></div>
          <div class="col-lg-6">
            <div id="terminarCompra" style="display: none;">
          <button id="btnterminarCompra" type="button" class="btnAzulRedondo" style="color: white;">Ir a pagar <i class="fas fa-arrow-right"></i></button>
        </div>
          </div>
        </div>
      
    </div>
   
  </div>
 

 </div> <!-- div col -lg - 6 -->


  <div class="col-lg-2">
    <p style="font-size: 12px;">Completa todas las opciones para poder finalizar tu pedido</p>
    <p id="statusDireccion"><i class="fas fa-window-close colorRojo"></i> Dirección</p>
    <p id="statusEnvio"><i class="fas fa-window-close colorRojo"></i> Envío</p>
    <p id="statusFacturacion"><i class="fas fa-window-close colorRojo"></i> Facturación</p>
  </div>





          <aside class="col-lg-4">
            <div class="row">

              <!-- order preview -->
              <div class="col-12">
                <div class="card card-data bg-light" style=" border-bottom: 0 !important; ">
                  <div class="card-header py-2 px-3" style="background-color: #adadad;">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h3 class="fs-8 mb-0"><strong>TU PEDIDO</strong></h3>
                      </div>
                      <div class="col text-right">
                        <a href="mostrarCarrito.php" class="underline eyebrow"><i class="fas fa-2x fa-undo"></i><i class="fas fa-3x fa-shopping-cart textoAzul"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body " style="background-color: rgba(0, 0, 0, 0.03)">
                     <ul class="list-group list-group-line">
                      <div class="row">
                        <li class="col-lg-2  d-flex justify-content-between text-dark align-items-center"><b>Cant.</b></li>
                        <li class="col-lg-7  d-flex justify-content-between text-dark align-items-center"><b>Producto</b></li>
                        <li class="col-lg-3  d-flex justify-content-between text-dark align-items-center"><b>Importe</b></li>
                      </div>
                    </ul>
                    
                      <?php 


 $total = 0;
 $x=0;
             foreach ($_SESSION['carrito'] as $indice=>$producto) {
              $productos = $con->query("SELECT * FROM productos WHERE id='$producto[id_producto]'");
              $totalProductos = $_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
              ?>

                    
                     <ul class="list-group list-group-line">
                      
                      <div class="row">
                        <li class="col-lg-2  d-flex justify-content-between text-dark align-items-center"><?php echo $_SESSION['carrito'][$x]['cantidad'] ?></li>
                      
                        <li class="col-lg-7  d-flex justify-content-between text-dark align-items-center" style="font-size: 12px;"><?php echo $_SESSION['carrito'][$x]['nombre'] ?></li>

                        <li class="col-lg-3  d-flex justify-content-between text-dark align-items-center">$<?php echo number_format((float)$totalProductos, 2, '.', ''); ?></li>
                      </div>

                      </ul>
             

                      <!--<li class="list-group-item d-flex justify-content-between text-dark align-items-center">
                        <?php /* echo $producto['nombre'] ?>
                        <span>$<?php echo number_format($producto['precio_venta']*$producto['cantidad'],2) */ ?></span>
                      </li> -->

                    
                     


                  <?php  $total = $total+$_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
                   $x=$x+1;
                    } ?>

                    <ul>
                      <div class="row">
                        <li class="col-lg-12  d-flex justify-content-between text-dark align-items-center"><small>ARTÍCULOS TOTALES DE LA COMPRA: <b><?php echo sizeof($_SESSION['carrito']) ?></b></small></li>
                      </div>
                    </ul>
                    <ul>
                      <div class="row">
                        <li class="col-lg-9  d-flex justify-content-between"><h5><strong>SUBTOTAL</strong></h5></li>
                        <li class="col-lg-3  d-flex justify-content-between">$<?php echo number_format((float)$total, 2, '.', ''); ?></li>
                        <li class="col-lg-9  d-flex justify-content-between"><h5><strong>IVA</strong></h5></li>
                        <li class="col-lg-3  d-flex justify-content-between">$12.56</li>
                        <li class="col-lg-9  d-flex justify-content-between">COSTO DEL ENVÍO</li>
                        <li class="col-lg-3  d-flex justify-content-between text-dark align-items-center"><span id="costoEnvio"></span></li>
                      </div>
                    </ul>



                    
                  </div>
                </div>
              </div>




            

         

              <!-- order summary -->
              <div class="col-12 mt-1" style=" position: relative; top: -30px;">
                <div class="card card-data bg-light">
                
                  <div class="card-footer py-2" style="border-top: 0; border-top-left-radius: 0px;">
                    <ul class="list-group list-group-minimal">
                      <li class="list-group-item d-flex justify-content-between fs-18 textoAzul">
                        <input style="display: none;" type="text" id="subtotal" value="<?php echo number_format((float)$total, 2, '.', ''); ?>">
                        <strong>TOTAL</strong>
                        <span id="totalFinal"></span>
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
              $item = new MercadoPago\Item();
              $item->title = 'Pedido 1003 de '.$_SESSION['nombre'];
              $item->quantity =  sizeof($_SESSION['carrito']);
              $item->unit_price = number_format((float)$total, 2, '.', '');
              $preference->items = array($item);
              $preference->save();
              ?>



         <style>
         .animado{
          transition: all 600ms ease-in-out;
        }
        .square-pulse{
    box-shadow: 0 0 3px #27278F;
    -webkit-animation: pulse 4s infinite; /* Safari 4+ */
    -moz-animation:    pulse 4s infinite; /* Fx 5+ */
    -o-animation:      pulse 4s infinite; /* Opera 12+ */
    animation:         pulse 4s infinite; /* IE 10+ */
}

@-webkit-keyframes pulse {
  0%   { box-shadow: 0 0 3px #515151; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}
@-moz-keyframes pulse {
  0%   { box-shadow: 0 0 3px #27278F; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}
@-o-keyframes pulse {
  0%   { box-shadow: 0 0 3px #27278F; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}
@keyframes pulse {
  0%   { box-shadow: 0 0 3px #27278F; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}

         </style>

         <div id="contenedorPago" class="" style="border: 1px solid #f7f7f7; padding: 10px 0px;">

              <!-- place order -->
              <div class="col-12 mt-1 text-center">
                <form action="charge.php" method="post">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?php echo $stripe['publishable_key']; ?>"
                        data-description="Realiza el pago de tu pedido"
                        data-amount="<?php echo $total*100; ?>"
                        data-currency="MXN"
                        data-locale="es-419"></script>
                       
                        <button type="submit" id="btnPagarPedido" class="btnPagarPedidodisabled"  style="border:none">
                        Pagar pedido
                        </button>
                </form>
                <!-- <a href="https://www.mercadopago.com.mx/checkout/v1/redirect?pref_id=483591003-89033bbd-0257-4c43-a85d-c76637645ae1" class="btn btn-primary btn-lg btn-block">Pagar pedido</a> -->
              </div>
              <!-- place order -->
              <script>
       
        document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
           </script>

              <div class="col-12 mt-1 text-center">
                        <br>
                      <a href="" style="border:none;" id="btnPagarPaypal" class="btnPagarPaypal"><i class="fab fa-paypal"></i> Pagar con Paypal</a>
              </div>
              <div class="col-12 mt-1 text-center">
                        <br><!--
                        <script src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
                        data-preference-id="483591003-f2ae73e5-b8c9-4e45-bb2b-a648a1318ca5" data-source="button">
                        </script> 
                        <button id="pagarConMercadoPago" class="mercadopago-button">Pagar con MercadoPago</button> -->
                        <script src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
                        data-preference-id="<?php echo $preference->id; ?>">
                      </script>
              </div>

            </div> <!-- efecto -->

            </div>
          </aside>

        </div>
      </div>
    </section>









    








<?php 
include "pie.php";
include "modals.php"; ?>
<body>
   <!-- Add step #2 -->
   <script src="https://sdk.mercadopago.com/js/v2"></script>
   <script>
       const mp = new MercadoPago('TEST-97ac4981-5e11-4d72-a2ce-2533a1311058');
       // Add step #3
   </script>
</body>



   
<!--
    
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script> -->


<script>
    $('#configreset').click(function(){
    console.log("entro");
           //$('.direccionentrega').val("");
           $('.direccionentrega').attr('value', '');
           $("#statusDireccion").empty();
           $("#statusDireccion").append('<i class="fas fa-window-close colorRojo"></i> Dirección');  
     });
    $('#configresetfacturacion').click(function(){
    console.log("entro");
           //$('.direccionentrega').val("");
           $('.inputfacturacion').attr('value', '');
           $("#statusFacturacion").empty();
          $("#statusFacturacion").append('<i class="fas fa-window-close colorRojo"></i> Facturación'); 
     });



function calcularEnvio(){
  var calle = $("#callereg").val();
  var numero = $("#num_extreg").val();
  var cp = $("#cpreg").val();
  var contentValue = $("#contentValue").val();
  var weight ="2.00";
  var length = "20.00";
  var height = "20.00";
  var width = "20.00";
 

  console.log(calle + numero + cp + contentValue);


$.ajax(
{
  url : 'obtener_tarifa_envioclick.php',
  type: "POST",
  data : {envioclick:"1", calle: calle,numero: numero, cp: cp, contentValue: contentValue}
})
  .done(function(data) {
//console.log(data);
$(".contenedorCalcularEnvio").empty();
$(".contenedorCalcularEnvio").append(data);


  })
  .fail(function(data) {
    alert("Error");

  })


  };//guardarUsuario








$(".tab").click(function(){
    $(".tabs-bar").find(".tab-active").removeClass("tab-active");
    $(".content-container").children().hide();
    $(this).addClass("tab-active");
    $(".content-" + this.id).show();
})




function seleccionarPaqueteria(id,costoEnvio){
  $(".custom-control-input").attr("checked", false);
  $("#choice-shipping-"+id).attr("checked", true);

  $("#statusEnvio").empty();
  $("#statusEnvio").append('<i class="fas fa-check-square colorVerde"></i> Envío');

  //añadimos el costo al "ticket"  y calculamos el total final
  $("#costoEnvio").text("$"+costoEnvio);
  subtotal = $("#subtotal").val();
  totalFinal = parseFloat(subtotal) + parseFloat(costoEnvio);
  $("#totalFinal").text("$"+totalFinal);
  //revisamos que este completo el check list

  //agregamos el link alboton de paypal
  $("#btnPagarPaypal").attr("href", "process.php?id="+totalFinal);

  revisarChecklist();

}


function mostrarFacturacion(valor){
  $("#terminarCompra").show("slow");
  console.log("entrando facturacion"+valor.value);
  if (valor.value=="Si") {
    $("#formFacturacion").show('slow');
    $("#statusFacturacion").empty();
    $("#statusFacturacion").append('<i class="fas fa-window-close colorRojo"></i> Facturación');

    //revisamos que este completo el check list

revisarChecklist();


  }else{
    $("#formFacturacion").hide();
      $("#statusFacturacion").empty();
      $("#statusFacturacion").append('<i class="fas fa-check-square colorVerde"></i> Facturación');
      

  }
  //revisamos que este completo el check list

revisarChecklist();


}


function revisarChecklist(){
  //revisamos que este completo el check list
  var checlisk = $('.colorVerde').length
  console.log(checlisk);
  if (checlisk == 3) {
    console.log("desbloqueamos botones");
    $("#btnPagarPedido").removeClass("btnPagarPedidodisabled").addClass("btnPagarPedido");
    $("#btnPagarPaypal").removeClass("btnPagarPaypaldisabled").addClass("btnPagarPaypal");
    $(".mercadopago-button").attr('style', 'background-color: #000068 !important; cursor:pointer !important; pointer-events: visible !important;');
    $("#contenedorPago").addClass("animado square-pulse");

  }
}


  //si requieren factura, tiene que llenar todos los campos


  $(".inputfacturacion").keyup(function(){

  
    razonsocial = $("#razonsocial").val();
    domiciliofiscal = $("#domiciliofiscal").val();
    calle = $("#calle").val();
    numero = $("#numero").val();
    calle = $("#calle").val();
    rfc = $("#rfc").val();
    correo = $("#correo").val();
    ciudad = $("#ciudad").val();
    municipio = $("#municipio").val();
    estado = $("#estado").val();
    pais = $("#pais").val();
    usocfdi = $("#usocfdi").val();

    console.log("checing");
    
    if (razonsocial!="" && domiciliofiscal!="" && calle!="" && numero!="" && calle!="" && rfc!="" && correo!="" && ciudad!="" && municipio!="" && estado!="" && pais!="" && usocfdi!=""){
      $("#statusFacturacion").empty();
      $("#statusFacturacion").append('<i class="fas fa-check-square colorVerde"></i> Facturación');

}
});







$( document ).ready(function() {
    $(".mercadopago-button").html('Pagar con MercadoPago');

    nombrereg = $("#nombrereg").val();
    estadoreg = $("#estadoreg").val();
    municipioreg = $("#municipioreg").val();
    cpreg = $("#cpreg").val();
    callereg = $("#callereg").val();
    num_extreg = $("#num_extreg").val();


//si no existe el botón de registrarse, validamos que haya dirección
if (!$("#btnRegistrarse").length) {

    if (nombrereg!="" && estadoreg!="" && municipioreg!="" && cpreg!="" && callereg!="" && num_extreg!=""){
      $("#statusDireccion").empty();
      $("#statusDireccion").append('<i class="fas fa-check-square colorVerde"></i> Dirección');

    }
  }




});

function validarFacturacion(){

  //validamos que el usuario ya este loggeado, si no, no lo dehamos avanzar

  if ($("#btnRegistrarse").length) {
    swal({
      title: 'Por favor',
      text: 'Registrate o inicia sesión para continuar',
      type: 'warning'
    });

setTimeout(function(){ 

  $("#tab3").removeClass("tab-active");
  $(".content-tab3").hide("");

      $("#tab1").addClass("tab-active");
      $(".content-tab1").show("");

 }, 500);
      

  }
}



function validarDireccion(){

  //validamos que el usuario ya este loggeado, si no, no lo dehamos avanzar

  if ($("#btnRegistrarse").length) {
    swal({
      title: 'Por favor',
      text: 'Registrate o inicia sesión para continuar',
      type: 'warning'
    });

setTimeout(function(){ 

  $("#tab2").removeClass("tab-active");
  $(".content-tab2").hide("");

      $("#tab1").addClass("tab-active");
      $(".content-tab1").show("");

 }, 500);
      

  }else{


    nombrereg = $("#nombrereg").val();
    estadoreg = $("#estadoreg").val();
    municipioreg = $("#municipioreg").val();
    cpreg = $("#cpreg").val();
    callereg = $("#callereg").val();
    num_extreg = $("#num_extreg").val();
    console.log("nombre: "+ nombrereg + "Estado: "+estadoreg + "Calle: "+callereg);
    if (nombrereg!="" && estadoreg!="" && municipioreg!="" && cpreg!="" && callereg!="" && num_extreg!=""){
    
    console.log("hay direccion");
      $("#statusDireccion").empty();
      $("#statusDireccion").append('<i class="fas fa-check-square colorVerde"></i> Dirección');
      calcularEnvio();

    }else{
      console.log("no hay direccion");
      
      setTimeout(function(){ 

  $("#tab2").removeClass("tab-active");
  $(".content-tab2").hide("");

      $("#tab1").addClass("tab-active");
      $(".content-tab1").show("");

 }, 100);

      $("#statusDireccion").empty();
     $("#statusDireccion").append('<i class="fas fa-window-close colorRojo"></i> Dirección');  


    }
}
}

//mercado pago
// Step #3
const cardForm = mp.cardForm({
  amount: "100.5",
  autoMount: true,
  form: {
    id: "form-checkout",
    cardholderName: {
      id: "form-checkout__cardholderName",
      placeholder: "Titular de la tarjeta",
    },
    cardholderEmail: {
      id: "form-checkout__cardholderEmail",
      placeholder: "E-mail",
    },
    cardNumber: {
      id: "form-checkout__cardNumber",
      placeholder: "Número de la tarjeta",
    },
    cardExpirationMonth: {
      id: "form-checkout__cardExpirationMonth",
      placeholder: "Mes de vencimiento",
    },
    cardExpirationYear: {
      id: "form-checkout__cardExpirationYear",
      placeholder: "Año de vencimiento",
    },
    securityCode: {
      id: "form-checkout__securityCode",
      placeholder: "Código de seguridad",
    },
    installments: {
      id: "form-checkout__installments",
      placeholder: "Cuotas",
    },
    identificationType: {
      id: "form-checkout__identificationType",
      placeholder: "Tipo de documento",
    },
    identificationNumber: {
      id: "form-checkout__identificationNumber",
      placeholder: "Número de documento",
    },
    issuer: {
      id: "form-checkout__issuer",
      placeholder: "Banco emisor",
    },
  },
  callbacks: {
    onFormMounted: error => {
      if (error) return console.warn("Form Mounted handling error: ", error);
      console.log("Form mounted");
    },
    onSubmit: event => {
      event.preventDefault();

      const {
        paymentMethodId: payment_method_id,
        issuerId: issuer_id,
        cardholderEmail: email,
        amount,
        token,
        installments,
        identificationNumber,
        identificationType,
      } = cardForm.getCardFormData();

      fetch("process_payment.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          token,
          issuer_id,
          payment_method_id,
          transaction_amount: Number(amount),
          installments: Number(installments),
          description: "Descripción del producto",
          payer: {
            email,
            identification: {
              type: identificationType,
              number: identificationNumber,
            },
          },
        }),
      });
    },
    onFetching: (resource) => {
      console.log("Fetching resource: ", resource);

      // Animate progress bar
      const progressBar = document.querySelector(".progress-bar");
      progressBar.removeAttribute("value");

      return () => {
        progressBar.setAttribute("value", "0");
      };
    },
  },
});



$('#pagarConMercadoPago').click(function(){
  console.log("paganbdo con MP");
  $("#modalMercadoPago").modal("toggle");
});


</script>


  


  </body>
</html>
