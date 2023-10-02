<?php
session_start();
require_once "seguridad.php";
require_once "db.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Historial de pedidos
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
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
 border-spacing: 0px;
            table-layout: fixed;
            margin-left: auto;
            margin-right: auto;
}




 td {
            border: 1px solid black;
            word-wrap: break-word;
            overflow-wrap: anywhere;
             width: 100px;

        }

        table>tr>th{
    word-wrap: break-word;
    word-break: break-all;
    white-space: normal;
}



  </style>
</head>

<body class="">
   <?php require_once "menu/menuizq.php" ?>
  <div class="main-content">
   <?php require_once('menu/menutop.php') ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

         
         


            </div>




          </div>
        </div>
      </div>

    <div class="container-fluid mt--7">
     
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tú historial de pedidos</h3>
                </div>
                
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
               <table class="table align-items-center table-dark table-striped">
        <thead class="thead-dark">
                  <tr>
                    <th scope="col">No. Pedido</th>
                    <th scope="col">Tot. Articulos</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Dir. Entrega</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $pedidos = $con->query("SELECT p.*, pd.* FROM pedidos p INNER JOIN pedidos_detalles pd ON p.numero_pedido=pd.numero_pedido WHERE p.id_datos_cliente  ='$_SESSION[idcliente]' GROUP BY p.numero_pedido order by p.id DESC");
                  $x=1;


                   while($rowpedidos = $pedidos->fetch_object()){  ?>
                  <tr>
                    <td scope="row">
                      <?php echo $rowpedidos->numero_pedido; ?>
                    </td>
                    <td>
                    <?php
                          $num_pedido = $rowpedidos->numero_pedido;
                          $pedidos_detalles = $con->query("SELECT p.id AS id_producto, p.nombre, pd.* FROM productos p LEFT JOIN pedidos_detalles pd ON p.id=pd.id_producto WHERE numero_pedido='$num_pedido'");
                           while($rowpedidos_detalles = $pedidos_detalles->fetch_object()){ 
                            echo "<a href='http://ferreteriataximaroa.com.mx/ver_producto.php?id_producto=".$rowpedidos_detalles->id_producto."' target='_blank'>".$rowpedidos_detalles->cantidad ." ".$rowpedidos_detalles->nombre."</a>";
                            echo "<br>";
                           }
                           ?>
                    </td>
                    <td>
                      <?php 
                      setlocale(LC_ALL,"es_ES");
                      //setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
                      //echo $new_date_format = date('Y-m-d H:i:s', strtotime($rowpedidos->fecha));
                      echo iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($rowpedidos->fecha)));
                       ?>
                    
                    </td>
                    <td>
                        <?php 
                    $direcciones = $con->query("SELECT * FROM direcciones WHERE id='$rowpedidos->direccion_entrega'");
                           $rowdireccion = $direcciones->fetch_object();
                            echo $rowdireccion->calle." ".$rowdireccion->numero_exterior."<br>".$rowdireccion->colonia." ".$rowdireccion->cp."<br>".$rowdireccion->ciudad." ".$rowdireccion->municipio." ".$rowdireccion->estado;  ?>
                    </td>
                    <td>
                      <?php if ($rowpedidos->estatus=="creado"){
                          $estatus = "warning";
                      }else if($rowpedidos->estatus=="proceso"){
                          $estatus = "info";
                      }else if($rowpedidos->estatus=="cancelado"){
                          $estatus = "danger";
                      }else if($rowpedidos->estatus=="finalizado"){
                          $estatus = "success";
                          } ?>
                      
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estatus ?>" style="width: 1rem; height: 1rem;"></i></span>
                      <?php echo $rowpedidos->estatus ?>
                    </td>
                    <td>
                      <!-- <button class="btn-xs btn-info">Ver más</button> -->
                      <?php if ($rowpedidos->estatus=="creado") { ?>
                        <button style="margin: 8px 0px;" class="btn-xs btn-danger" onclick="mostrarModalCancelacion('<?php echo $rowpedidos->numero_pedido ?>'); return false;">Solicitar Cancelación</button>
                        <?php }elseif ($rowpedidos->estatus=="cancelacionsolicitada") { ?>
                        <button style="margin: 8px 0px;" class="btn-xs btn-warning" >En proceso de cancelación</button>
                      <?php } 
                      $ruta = "facturas/".$num_pedido.".zip";
                      if (file_exists($ruta)) { ?>
                       <br><a href="<?php echo $ruta; ?>" target="_blank" style="margin: 8px 0px; padding: 3px;" class="btn-xs btn-success">Descargar Factura</a><br>
                      <?php  }  ?>
                               
                      <?php if(!empty($rowpedidos->guia)){ ?>
                      <br><a href="https://www.envioclick.com/track/mx" target="_blank" class="btn-xs btn-info" style="margin: 8px 0px; padding: 3px 3px;">Rastreo paquetería</a>
                    <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
     <?php require_once "footer.php" ?>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="modalCancelacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cancelación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Estás por cancelar tu pedido <b>#</b><b class="noPedidoModal"></b>, por favor llena el siguiente campo para ver si tu pedido cumple con las políticas de cancelación <small>(El tiempo de respuesta será de 48 horas)</small></h3>
        <form action="">
          <textarea class="form-control" name="motivo" id="motivo" cols="30" rows="10" placeholder="Describe el motivo por el que quieres cancelar tu pedido"></textarea>
          <hr>
           <button type="button" onclick="solicitarCancelacion(); return false;" class="btn btn-success">Solicitar Cancelación</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>



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


      function mostrarModalCancelacion(no_pedido){

        console.log(no_pedido);

        $(".noPedidoModal").text(no_pedido);
        $('#modalCancelacion').modal('show');
      }


      function solicitarCancelacion(){

        var no_pedido = $(".noPedidoModal").text();
        var motivo = $("#motivo").val();

        console.log(no_pedido+" "+motivo);

        $.ajax(
          {
            url : 'actualizar.php',
            type: "POST",
            data : {solicitud_cancelacion: "1", no_pedido: no_pedido, motivo: motivo },
            dataType: 'html',
          })
            .done(function(data) {
              
              console.log(data);

              $('#modalCancelacion').modal('hide');

                 swal({
                 title: 'Tu pedido',
                  text: 'está en revisión para ser cancelado, pronto nos comunicaremos contigo',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "historial_pedidos.php";
                  }
                }
              )


            })
            .fail(function(data) {
              alert("Error");

            })



      }




  </script>
</body>

</html>