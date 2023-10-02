<?php
session_start();
require_once "seguridad.php"; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Panel Administrativo - Pedidos
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

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  

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
    $pedidos = $con->query("SELECT p.*, dc.* from pedidos p INNER JOIN datos_clientes dc where p.id_datos_cliente=dc.id ORDER BY p.id DESC");
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
              <h3 class="mb-0">Últimos pedidos</h3>

            </div>
            </div>
            <div class="col-md-9 text-right">
              <span class="badge badge-dot mr-4"><i class="bg-warning" style="width: 1.5rem; height: 1.5rem;"></i> Pedido sin validar pagos</span>
              <span class="badge badge-dot mr-4"><i class="bg-info" style="width: 1.5rem; height: 1.5rem;"></i> Pedido enviado por paquería</span>
              <span class="badge badge-dot mr-4"><i class="bg-success" style="width: 1.5rem; height: 1.5rem;"></i> Pedido recibido por cliente</span>
              <span class="badge badge-dot mr-4"><i class="bg-danger" style="width: 1.5rem; height: 1.5rem;"></i> Pedido cancelado</span>
            </div>
            </div>
            
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
              <div class="table-responsive text-center">
              <table id="tabla-pedidos" class="table align-items-center table-flush table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"># Pedido</th>
                    
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-center">Total</th>
            
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>

                   <?php while($rowpedidos = $pedidos->fetch_object()){
                    $num_pedido = $rowpedidos->numero_pedido; ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm">#<?php echo strtoupper($rowpedidos->numero_pedido); ?><br>
                            <small>
                            <?php 
                      //       setlocale(LC_ALL,"es_ES");
                      setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
                      //echo $new_date_format = date('Y-m-d H:i:s', strtotime($rowpedidos->fecha));
                      echo iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($rowpedidos->fecha)));
                       ?></small></span><br>
                       <?php 
                        if ($rowpedidos->leido==0) {
                         ?><button onclick="pedidoVisto('<?php echo $rowpedidos->numero_pedido; ?>'); return false;" class="btn-xs btn-success">Marcar como visto</button> <?php
                       } ?>
                        </div>
                      </div>
                    </th>
                    
                    <td class="text-center">
                      <span class="badge badge-dot mr-4" style="white-space: normal;">
                        <?php 
                        if ($rowpedidos->estatus == "creado") {
                          $color = '<i class="bg-warning" style="width: 1.5rem; height: 1.5rem;"></i><br>';} 
                        elseif ($rowpedidos->estatus == "cancelado" || $rowpedidos->estatus == "cancelacionsolicitada") {
                          $color = '<i class="bg-danger" style="width: 1.5rem; height: 1.5rem;"></i><br>';}
                        elseif ($rowpedidos->estatus == "proceso") {
                          $color = '<i class="bg-info" style="width: 1.5rem; height: 1.5rem;"></i><br>';}  
                        else {
                          $color = '<i class="bg-success" style="width: 1.5rem; height: 1.5rem;"></i><br>';} 
                         echo $color . $rowpedidos->estatus;
                        if ($rowpedidos->estatus=="cancelacionsolicitada" || $rowpedidos->estatus=="cancelacionaceptada"){
                        echo "<br><br><b>Motivo:</b> ".$rowpedidos->motivo;
                        if ($rowpedidos->estatus=="cancelacionsolicitada"){
                        ?>
                        <br><badge onclick="aceptarCancelacion('<?php echo $rowpedidos->numero_pedido; ?>'); return false;" class="badge badge-warning">Aceptar cancelación</badge> 
                      <?php  }} ?>
                      </span>
                    </td>
                   
                    <td class="">
                     <div class="row">
                       <div class="col-sm-6 text-right">
                        $<?php echo number_format((float)$rowpedidos->total, 2, '.', ',') ?> <br>
                      <badge style="cursor: pointer;" class="badge badge-info"><?php if($rowpedidos->metodoPago=="Stripe"){ echo '<a href="https://dashboard.stripe.com/test/payments?status[0]=successful" target="_blank">'.$rowpedidos->metodoPago.'</a>'; }else{
                        echo $rowpedidos->metodoPago;
                      } ?></badge>
                     </div>
                     <div class="col-sm-6 text-left">
                        <img src="../assets/images/paqueterias/<?php echo $rowpedidos->paqueteria ?>.png" style="max-height: 45px;">
                     </div>
                     </div>
                    </td>
                    
                    <td class="text-center">
                      

                      <a class="btn btn-sm btn-info" href="pedidos_detalles.php?numero_pedido=<?php echo $num_pedido; ?>">Ver detalles del pedido</a>
                    </td>
                  </tr>


<?php } ?>

                 
                </tbody>
              </table>
            </div>
                
              </div><!--//col-md-4 -->
            </div>
            
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
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
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

$(document).ready( function () {
    
    var table = new DataTable('#tabla-pedidos', {
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    },
     "aaSorting": [],
});


} );



  </script>
</body>

</html>