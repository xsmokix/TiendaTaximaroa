<?php
if ($_GET['id_producto']) {
  $id_producto = $_GET['id_producto'];
session_start();
require_once "seguridad.php"; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Panel Administrativo - Detalles del producto
  </title>
  <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/general.css?ver=1.01">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">




</head>

<body class="">
  <?php require_once "menu/izquierdo.php" ?>
  
  <div class="main-content">
   <?php 
   require_once('menu/menutop.php');
   $producto = $con->query("SELECT p.*, c.nombre AS nombre_cat, sm.nombre AS nombre_subcat from productos p INNER JOIN categorias c ON p.categoria=c.id
   INNER JOIN submenu sm ON sm.idmenu=c.id where p.id='$id_producto'");
     ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">      
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="row">
              <div class="col-md-3">
              <div class="card-header border-0">
              <h3 class="mb-0">Detalles del producto #<?php echo strtoupper($id_producto); ?></h3>

            </div>
            </div>
            <div class="col-md-9 text-right">
              <a href="productos_editar.php?id_producto=<?php echo $id_producto ?>" style="cursor: pointer; margin: 20px  50px 0px 0px;" class="badge badge-lg badge-warning" >Editar producto</a>
            </div>
            <div class="col-md-12 col-xs-12">
              <hr>
            </div>
            </div>

             <?php 
              $rowproducto = $producto->fetch_object();
              ?>

            <div class="row">
              <div class="col-md-12 text-center">
                <div style="display: flex;align-items: center; justify-content: center;">

                              <?php 
                 function is_dir_empty($dir) {
      if (!is_readable($dir)) return null; 
        return (count(scandir($dir)) == 2);
      }

  $dir = "../assets/images/productos/".$id_producto."/";
    if (!is_dir_empty($dir)) {

        $all_files = glob("../assets/images/productos/1/*.*");
      for ($i=0; $i<count($all_files); $i++){
        $image_name = $all_files[$i];
        
        echo '<img src="'.$image_name.'" class="d-block" alt="'.$image_name.'" style="max-height: 150px; mix-blend-mode:multiply;   text-align: center; margin:0 auto; padding:20px 45px;">';
      }
    }
      ?>
                

</div><!-- //flex -->
              </div>
              <div class="col-md-6">

                <table class="table-fill">
                    <tbody class="table-hover">
                    <tr>
                    <td class="text-left"><b>Producto</b></td>
                    <td class="text-left"><?php echo $rowproducto->nombre ?> </td>
                    </tr>
                    <tr>
                    <td class="text-left"><b>Marca</b></td>
                     <td class="text-left"><img src="../assets/images/marcas/<?php echo $rowproducto->marca ?>.jpg" style="max-height: 50px; mix-blend-mode:multiply"><br>
                      <small><i><?php echo $rowproducto->codigo_fabricante ?></i></small><br>
                    <b><i><?php echo $rowproducto->clave_producto ?></i></b>
                  </td>
                    </tr>
                    <tr>
                    <td class="text-left"><b>Categorías:</b></td>
                     <td class="text-left"><?php echo $rowproducto->nombre_cat ?> <br>
                                           <small><i><?php echo $rowproducto->nombre_subcat ?></i></small></td>
                    </tr>
                    <tr>
                    <td class="text-left"><b>Unidad</b></td>
                     <td class="text-left">
                      <?php echo $rowproducto->clave_unidad ?><br>
                      <i>CL: </i><?php echo $rowproducto->clave_linea ?><br>
                      <i>CM: </i><?php echo $rowproducto->clave_marca ?><br>
                      </td>
                    </tr>
                     <tr>
                    <td class="text-left"><b>Precios</b></td>
                     <td class="text-left">
                      <b>Compra: </b><?php echo $rowproducto->precio_compra ?><br>
                      <b>Venta: </b><?php echo $rowproducto->precio_venta ?>
                      </td>
                    </tr>
                    
                    
                    </tbody>
                    </table>


                

              </div><!-- /col-md-6 -->

             <div class="col-md-6">

                <table class="table-fill">
                    <tbody class="table-hover">
                    <tr>
                    <td class="text-left"><b>Max-Min</b></td>
                    <td class="text-left"><?php echo $rowproducto->maximo." - ".$rowproducto->minimo ?> </td>
                    </tr>
                    <tr>
                    <td class="text-left"><b>Ubicación</b></td>
                     <td class="text-left">
                            <i>Zona: </i><?php echo $rowproducto->ubicacion_zona ?><br>
                            <i>Pasillo: </i><?php echo $rowproducto->ubicacion_pasillo ?><br>
                            <i>Anaquel: </i><?php echo $rowproducto->ubicacion_anaquel ?><br>
                            <i>Repisa: </i><?php echo $rowproducto->ubicacion_repisa ?>
                     </td>
                    </tr>
                    <tr>
                    <td class="text-left"><b>CFDI:</b></td>
                     <td class="text-left"><?php echo $rowproducto->valorcfdi ?> <br>
                      </td>
                    </tr>
                    <tr>
                    <td class="text-left"><b>Dimensiones</b></td>
                     <td class="text-left">
                            <i>Ancho: </i><?php echo $rowproducto->ancho ?><br>
                            <i>Alto: </i><?php echo $rowproducto->alto ?><br>
                            <i>Largo: </i><?php echo $rowproducto->largo ?><br>
                            <i>Peso: </i><?php echo $rowproducto->peso ?>
                      </td>
                    </tr>
                     <tr>
                    <td class="text-left"><b>Envío</b></td>
                     <td class="text-left">
                      <?php echo $rowproducto->tipo_envio ?>
                      </td>
                    </tr>
                    
                    
                    </tbody>
                    </table>



              </div><!-- /col-md-6 -->

                <div class="col-md-12" style="padding:70px;">

                  <p>
                    <b>Descripción corta: </b><?php echo $rowproducto->descripcion_corta ?>
                  </p>
                  <p>
                    <b>Descripción Larga: </b><?php echo $rowproducto->descripcion ?>
                  </p>
                  <p>
                    <hr>
                  </p>
                  <p class="text-right">
                    <a href="productos_editar.php?id_producto=<?php echo $id_producto ?>" style="cursor: pointer; margin: 20px  50px 0px 0px;" class="badge badge-lg badge-warning" >Editar producto</a>
                  </p>
                </div>
              
            </div><!-- /row -->



            
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <?php require_once "footer.php" ?>
     
    </div>


    <!-- Modal Enviar-->
<div class="modal fade" id="modalEnviar" tabindex="-1" role="dialog" aria-labelledby="modalEnviar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">

          <h3 class="textoAzul">Listos para enviar el pedido <br>por favor ingresa el número de guía <br>
            para el pedido #<b id="numero_pedido"></b></h3>
          <input type="text" class="form-control" id="numero_guia" name="numero_guia" value="">
          <hr>
          <button class="btn btn-success" onclick="enviarPedido(); return false;">Actualizar pedido y enviar</button>
        


  </div>
    </div>
  </div>
</div>



    <!-- Modal Enviar-->
<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="modalCancelar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">

          <h3 class="textoAzul">El pedido #<b id="numero_pedido_cancelar"></b> ha sido cancelado</h3>
          

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        


  </div>
    </div>
  </div>
</div>


    <!-- Modal Ver facturación-->
<div class="modal fade" id="modalFacturacion" tabindex="-1" role="dialog" aria-labelledby="modalFacturacion" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">Datos de facturación del cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
       <div class="contenedorFacturacion">
         
       </div>

    </div>
  </div>
</div>



  </div><!-- main content -->
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });



      function validarPago(numero_pedido, valor){
        


        $.ajax(
{
  url : 'actualizar.php',
  type: "POST",
  data : { actualizar_pago:"1",numero_pedido: numero_pedido, valor: valor}
})
  .done(function(data) {
console.log(data);
      swal({
                 title: 'Pago validado',
                  text: 'correctamente ',
                  type: 'success'
                  })

            .then(function(){ 
             location.reload();
             })


  })
  .fail(function(data) {
    alert("Error");

  })

      }

      function enviarPedido(){
        var numero_pedido = $("#numero_pedido").text();
        var numero_guia = $("#numero_guia").val();
        var correo = $("#correocliente").val();
         var paqueteria = $("#paqueteria").val();

        console.log("numero_pedido: "+numero_pedido+" guia: "+numero_guia+"correo: "+correo);


        $.ajax(
{
  url : 'actualizar.php',
  type: "POST",
  data : { actualizar_pedido:"1",numero_pedido: numero_pedido,numero_guia: numero_guia,correo: correo,paqueteria: paqueteria}
})
  .done(function(data) {
console.log(data);
      location.reload();


  })
  .fail(function(data) {
    alert("Error");

  })

      }

      function enviar(numero_pedido){
        $("#numero_pedido").text(numero_pedido);
        $("#modalEnviar").modal("show");
      }


       function cancelarPedido(numero_pedido){

        $("#numero_pedido_cancelar").text(numero_pedido);
        $("#modalCancelar").modal("show");


        

        setTimeout(function(){ 

     location.reload();

 }, 1500);
       


        $.ajax(
{
  url : 'actualizar.php',
  type: "POST",
  data : { cancelar_pedido:"1",numero_pedido: numero_pedido}
})
  .done(function(data) {
console.log(data);
      //location.reload();


  })
  .fail(function(data) {
    alert("Error");

  })

      }

       function verFacturacion(id_facturacion){
        

           $.ajax(
            {
              url : 'ver_datos_facturacion.php',
              type: "POST",
              data : { id_facturacion: id_facturacion}
            })
              .done(function(data) {
            console.log(data);
                  $("#modalFacturacion").modal("toggle");
                  $(".contenedorFacturacion").empty();
                  $(".contenedorFacturacion").append(data);


              })
              .fail(function(data) {
                alert("Error");

              })

      }


       function completarPedido(numero_pedido){

      



   $.ajax(
          {
            url : 'actualizar.php',
  type: "POST",
  data : { finalizar_pedido:"1",numero_pedido: numero_pedido}
          })
            .done(function(data) {
        



           swal({
                 title: 'Pedido',
                  text: 'finalizado ',
                  type: 'success'
                  })

            .then(function(){ 
             location.reload();
             })

           })

  
          
            .fail(function(data) {
              alert("Error");

            })




      }



                               function pedidoVisto(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {pedido_visto: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Pedido',
                                        text: 'marcado como visto',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "pedidos.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                

                              } //pedido visto



function aceptarCancelacion(numero_pedido){
  console.log("entrando1");
                 $.ajax(
                  {
                    url : 'actualizar.php',
                    type: "POST",
                    data : { aceptar_cancelacion:"1",numero_pedido: numero_pedido}
                  })
                  .done(function(data) {
                    console.log(data);
                   swal({
                         title: 'Cancelación',
                          text: 'aceptada ',
                          type: 'success'
                          })
                    .then(function(){ 
                     location.reload();
                     })
                   })
                    .fail(function(data) {
                      alert("Error");
                    })
      }


$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 80;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Ver más->";
    var lesstext = "<-Ver menos";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});



  </script>
</body>

</html>
<?php } ?>