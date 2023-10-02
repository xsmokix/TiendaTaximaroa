<?php
session_start();
$id_producto = "1";


require_once "seguridad.php"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Panel Administrativo Productos
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

   <link href="https://michoacan.gob.mx/productores/css/dropzone.css" rel="stylesheet" type="text/css">

</head>

<body class="">
<?php require_once "menu/izquierdo.php" ?>
  <div class="main-content">
   <?php 
          require_once('menu/menutop.php');
         $productos = $con->query("SELECT * FROM productos");
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



      <div class="row">
        <div class="col-12">

                <div class="card_box box_shadow position-relative mb_30">
                    <div class="white_box_tittle">
                        <div class="main-title2">
                          <br><br>
                        <h2 class="card-subtitle mb-2">Sube aquí las imágenes del producto <small>(Si no hay imágenes puedes salir de está página)</small></h2>
                        </div>
                    </div>


                    <div class='content'>
                      <form action="guardar_imagenes.php?id=1" class="dropzone" id="dropzonewidget">
                      <div class="dz-message" data-dz-message><span style="color: #4A001F;">Arrastra aquí tus archivos o da clic aquí</span></div>

                          
                      </form>  
                    </div> 
                    
                </div>
          
        </div>

        <div class="col-12 text-center">
                <hr>


              <a href="productos.php"  class="btn btn-success" >Guardar imágenes</a>
        </div>  
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

  <!--<script src="../../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script> -->
  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });




  </script>
</body>

</html>