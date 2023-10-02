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
    Panel Administrativo Comentarios
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
          require_once "db.php";
   $comentarios = $con->query("SELECT c.*, p.nombre FROM comentarios c INNER JOIN productos p ON c.id_productos=p.id ORDER BY id DESC");
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
              <h3 class="mb-0">Comentarios</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Comentaro</th>
                    <th scope="col">Fecha</th>
                    <th class="text-right" scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $x=1;
                   while($rowcomentarios = $comentarios->fetch_object()){ ?>
                  <tr>
                  
                     <td class="text-center">
                     
                          <span class="mb-0 text-sm"><?php echo $x ?></span>
                      
                      <?php if ($rowcomentarios->aprobado==1) {
                        $estado = "success";
                      }else{
                        $estado="danger";
                      } ?>
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>"></i></span>
                    </td>
                    <td>
                     <?php echo $rowcomentarios->nombre ?>
                    </td>
                    <td>
                     <?php echo $rowcomentarios->usuario ?>
                    </td>
                    <td>
                     <?php echo $rowcomentarios->comentario ?>
                    </td>
                    <td>
                     <?php echo $rowcomentarios->fecha ?>
                    </td>
                   
                    <td class="text-right">
                      <?php 
                      if ($estado=="success") {
                         ?><button onclick="desactivarComentarios('<?php echo $rowcomentarios->id; ?>'); return false;" class="btn-xs btn-danger">Desactivar</button><?php
                       }else{
                        ?><button onclick="activarComentarios('<?php echo $rowcomentarios->id; ?>'); return false;" class="btn-xs btn-success">Aprobar</button><?php
                       } ?>

                      <button onclick="eliminarComentarios('<?php echo $rowcomentarios->id; ?>'); return false;" class="btn-xs btn-danger">Eliminar</button>
                    </td>
                  </tr>
                <?php
                $x=$x+1; } ?>
                  
                 
                </tbody>
              </table>
            </div>
          
          </div>
        </div>
      </div>
      <!-- Dark table -->
      <div class="row">
 
 
            
        





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






  </script>
</body>

</html>