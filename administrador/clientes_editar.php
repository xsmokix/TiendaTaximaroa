<?php
if ($_GET['id_cliente']) {
  $id_cliente = $_GET['id_cliente'];
session_start();
require_once "seguridad.php"; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Panel Administrativo
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
  <link rel="stylesheet" href="assets/css/general.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">

  <style>
      table {
          table-layout: fixed;
        width: 100%;
        /*word-break: break-all;*/
        }

        .morecontent span {
            display: none;
        }
        .morelink {
            display: block;
        }


    </style>


</head>

<body class="">
  <?php require_once "menu/izquierdo.php" ?>
  
  <div class="main-content">
   <?php 
   require_once('menu/menutop.php');
   $cliente = $con->query("SELECT * from datos_clientes  where id='$id_cliente'");
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
              <h3 class="mb-0">Editar dirección del cliente</h3>

            </div>
            </div>
            <div class="col-md-9 text-right">
              
            </div>
            <div class="col-md-12 col-xs-12">
              <hr>
            </div>
            </div>

             <?php 
              $rowcliente = $cliente->fetch_object();
              ?>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
<form action="actualizar.php" method="POST">
              <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">

              
                <input type="hidden" name="actualizar_cliente" value="1">
                <input type="hidden" name="id" value="<?php echo $id_cliente ?>">
              <div class="form-group col-md-12">
                <label for="firstName">Nombre Completo</label>
                <div id="search3">
                <input type="text" name="nombre_completo" class="nombre_completo_sinreg direccionentrega form-control" id="nombrereg" value="<?php echo $rowcliente->nombreCompleto; ?>">
              <div data-lastpass-icon-root="true" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div></div>
              </div>
             
              
              <div class="form-group col-md-4">
                <label for="address">Teléfono</label>
                <input type="text" name="telefono" class="direccionentrega form-control" id="callereg" value="<?php echo $rowcliente->telefono; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="correo">Correo</label>
                <input type="text" name="correo" class="direccionentrega form-control" id="coloniareg" value="<?php echo $rowcliente->correo; ?>">
              </div>
              <div class="form-group col-md-2">
                <label for="city">Anuncios</label>
                  <select name="anuncios" id="" class="form-control">
                    <option value="0" <?php if ($rowcliente->anuncios=='0') { echo "selected"; } ?>>No</option>
                    <option value="1" <?php if ($rowcliente->anuncios=='1') { echo "selected"; } ?>>Si</option>
                  </select>
              </div>
             
              
             
              <div class="col-md-12 text-center" id="guardarSinRegistro">
                <button type="submit" class="btn btn-success center-block" style="color: white;">Actualizar</button>
              </div>
         
            </div>

        </form>         

                

              </div><!-- /col-md-6 -->

          

                

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