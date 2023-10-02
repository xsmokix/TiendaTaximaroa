<?php
session_start();
?>
<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
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
</head>

<body class="">
  <?php require_once "menu/izquierdo.php" ?>
  
  <div class="main-content">
   <?php require_once('menu/menutop.php') ?>
    <!-- Header -->


       <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      
    </div>


    <?php
    require_once "db.php";
    //$pedidos = $con->query("SELECT p.id as idPedido, p.id_datos_cliente, p.total, p.estatus, pd.numero_pedido,pd.id_producto, dc.nombreCompleto, (select count(numero_pedido) from pedidos_detalles where pd.numero_pedido = numero_pedido) AS totProductos FROM pedidos p INNER JOIN pedidos_detalles pd ON p.id=pd.numero_pedido INNER JOIN datos_clientes dc ON p.id_datos_cliente=dc.id GROUP BY p.id ORDER BY p.id ASC");
    $pedidos = $con->query("SELECT p.*, dc.* from pedidos p INNER JOIN datos_clientes dc where p.id_datos_cliente=dc.id");
      ?>


    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="row">
              <div class="col-md-3">
              <div class="card-header border-0">
              <h3 class="mb-0">Ultimos pedidos</h3>

            </div>
            </div>
            <div class="col-md-9 text-right">
              <span class="badge badge-dot mr-4"><i class="bg-warning"></i> Pedido sin validar pagos</span>
              <span class="badge badge-dot mr-4"><i class="bg-info"></i> Pedido enviado por paquería</span>
              <span class="badge badge-dot mr-4"><i class="bg-success"></i> Pedido recibido por cliente</span>
              <span class="badge badge-dot mr-4"><i class="bg-danger"></i> Pedido cancelado</span>
            </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
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
                        elseif ($rowpedidos->estatus == "cancelado" || $rowpedidos->estatus == "cancelacionsolicitada") {$color = '<i class="bg-danger"></i>';}
                        elseif ($rowpedidos->estatus == "proceso") {$color = '<i class="bg-info"></i>';}  
                          else {$color = '<i class="bg-success"></i>';} 
                          ?>
                       <?php echo $color . $rowpedidos->estatus ?>
                        <?php if ($rowpedidos->estatus=="cancelacionsolicitada"){
                        echo "<br><b>Motivo:</b> ".$rowpedidos->motivo;
                        ?>
                        <br><badge class="badge badge-success">Aceptar cancelación</badge> 
                      <?php  } ?>
                      </span>
                    </td>
                    <td class="text-center">
                      $<?php echo $rowpedidos->costoEnvio ?><br>
                     <i><?php echo $rowpedidos->paqueteria ?></i>
                     <?php 
                     if ($rowpedidos->guia!="") {
                      
                        ?>
                        <br><a href="https://www.envioclick.com/track/mx/<?php echo $rowpedidos->guia ?>" target="_blank">Rastrear</a>
                        <?php
                      } ?>
                    </td>
                    <td class="text-center">
                      $<?php echo number_format((float)$rowpedidos->total, 2, '.', ',') ?>
                    </td>
                    
                    <td class="text-center">
                      <?php if ($rowpedidos->estatus=="proceso") {
                        ?><badge style="cursor: pointer;" class="badge badge-success" onclick="completarPedido('<?php echo $rowpedidos->numero_pedido ?>'); return false;" >Finalizar</badge><?php
                      }else{ ?>
                      <badge style="cursor: pointer;" class="badge badge-info" onclick="enviar('<?php echo $rowpedidos->numero_pedido ?>'); return false;" >Enviar</badge>
                    <?php } ?>
                      <!-- <badge style="cursor: pointer;" class="badge badge-warning">Editar</badge> -->
                      <badge style="cursor: pointer;" class="badge badge-danger" onclick="cancelarPedido('<?php echo $rowpedidos->numero_pedido ?>'); return false;">Cancelar</badge>
                      <input type="hidden" id="correocliente" value="<?php echo $rowpedidos->correo ?>">
                  <input type="hidden" id="paqueteria" value="<?php echo $rowpedidos->paqueteria ?>">
                    </td>
                  </tr>


<?php } ?>

                 
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table 
      <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Card tables</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Project</th>
                    <th scope="col">Budget</th>
                    <th scope="col">Status</th>
                    <th scope="col">Users</th>
                    <th scope="col">Completion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Argon Design System</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $2,500 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> pending
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Angular Now UI Kit PRO</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $1,800 USD
                    </td>
                    <td>
                      <span class="badge badge-dot">
                        <i class="bg-success"></i> completed
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/sketch.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Black Dashboard</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $3,150 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i> delayed
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">72%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">React Material Dashboard</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $4,400 USD
                    </td>
                    <td>
                      <span class="badge badge-dot">
                        <i class="bg-info"></i> on schedule
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">90%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">Vue Paper UI Kit PRO</span>
                        </div>
                      </div>
                    </th>
                    <td>
                      $2,200 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> completed
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->
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
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

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



  </script>
</body>

</html>