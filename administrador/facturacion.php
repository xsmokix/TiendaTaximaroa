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
    Panel Administrativo Facturación
  </title>
  <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/general.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>

<body class="">
<?php require_once "menu/izquierdo.php" ?>
  <div class="main-content">
   <?php 
          require_once('menu/menutop.php');
    $pedidos = $con->query("SELECT p.*, dc.* from pedidos p INNER JOIN datos_clientes dc where p.id_datos_cliente=dc.id");
 ?>
    <!-- Header -->


       <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>


    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Facturación clientes</h3>
            </div>

            <table class="table align-items-center table-flush table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"># Pedido</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">#Productos</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Envío</th>
                    <th scope="col" class="text-center">Total</th>
            
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>

                   <?php while($rowpedidos = $pedidos->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $rowpedidos->numero_pedido ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                       <?php echo $rowpedidos->nombreCompleto ?>

                    </td>
                    <td>
                      <?php 
                       $num_pedido = $rowpedidos->numero_pedido;
                          $pedidos_detalles = $con->query("SELECT p.*, pd.* FROM productos p LEFT JOIN pedidos_detalles pd ON p.id=pd.id_producto WHERE numero_pedido='$num_pedido'");
                           while($rowpedidos_detalles = $pedidos_detalles->fetch_object()){ 
                            echo $rowpedidos_detalles->cantidad ." ".$rowpedidos_detalles->nombre;
                            echo "<br>";
                           }
                       ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <?php 
                        if ($rowpedidos->estatus == "creado") {$color = '<i class="bg-warning"></i>';} 
                        elseif ($rowpedidos->estatus == "cancelado") {$color = '<i class="bg-danger"></i>';}
                        elseif ($rowpedidos->estatus == "proceso") {$color = '<i class="bg-info"></i>';}  
                          else {$color = '<i class="bg-success"></i>';} 
                          ?>
                       <?php echo $color . $rowpedidos->estatus ?>
                      </span>
                    </td>
                    <td class="text-center">
                      $<?php echo $rowpedidos->costoEnvio ?><br>
                     <i><?php echo $rowpedidos->paqueteria ?></i>
                    </td>
                    <td class="text-center">
                      $<?php echo number_format((float)$rowpedidos->total, 2, '.', ',') ?>
                    </td>
                    
                    <td class="text-center">
                      <?php if ($rowpedidos->estatus=="proceso" || $rowpedidos->estatus=="finalizado") {
                        ?>
                        <badge style="cursor: pointer;" class="badge badge-success" onclick="noPedido('<?php echo $rowpedidos->numero_pedido ?>'); return false;"><i class="fas fa-upload"></i> Subir factura</badge>

                        <?php
                        if (file_exists('../clientes/facturas/'.$rowpedidos->numero_pedido .'.zip')) {   
                        ?>
                        <a href="../clientes/facturas/<?php echo $rowpedidos->numero_pedido ?>.zip" class="badge badge-info"><i class="fas fa-download"></i> Descargar factura</a>
                        <?php
                        }
                      }else{
                        echo "<small>Sólo se adjuntan facturas a pedidos en proceso y finalizados</small>";
                      }
                      
                        ?>
                      <!-- <badge style="cursor: pointer;" class="badge badge-warning">Editar</badge> -->
                     
                      
                    </td>
                  </tr>


<?php } ?>

                 
                </tbody>
              </table>


            
          </div>
        </div>
      </div>
      <!-- Dark table -->
      <div class="row">
 
 
            
        

            <div class="col-4"></div>

            <div class="col-4">
            <br><br>
            <h2 class="text-center">Agregar Factura</h2>
            <br>
              
              <form id="formfacturas" class="form-horizontal" enctype="multipart/form-data" method="post"  action="subir_factura.php" >

                <div class="form-inputs">
                  <input type="hidden" name="nuevafactura">
                  <label for="">Subir factural al pedido número:</label>
                  <input type="text" id="nopedido" name="nopedido" class="form-control input-lg" placeholder="No Pedido" readonly> <br>
                  <label for="">Selecciona archivo .zip</label><br>
                 <input type="file" id="multiFiles" name="pdf" class="center-block" />
                 <hr>
                                
                  
                  

                     
                </div>

         
                <button type="submit" class="btn btn-success btn-block btn-lg mb15" id="guardarPdf">Subir factura</button>
                
              </form>
                



          </div>





      </div>
      <!-- Footer -->
      <?php require_once "footer.php" ?>
     
    </div>







  </div><!-- main content -->
  <!--   Core   -->
  <script src="js/init.js"></script>
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


      function noPedido(id){
        $("#nopedido").empty();
        $("#nopedido").val(id);
        //$("#nopedido").focus();
        $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });


      }
  </script>
</body>

</html>