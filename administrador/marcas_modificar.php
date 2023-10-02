<?php
session_start();
require_once "seguridad.php"; 
if(isset($_GET['idmarca'])){
$idmarca = $_GET['idmarca'];
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
    Panel Administrativo Marcas
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
   $marcas = $con->query("SELECT * FROM marcas WHERE id = '$idmarca'");
    $rowmarca = $marcas->fetch_object();
 ?>
    <!-- Header -->


       <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>


    <div class="container-fluid mt--7">
      <!-- Table -->
            <!-- Dark table -->
      <div class="row">
 
 
            
        

            <div class="col-4"></div>

            <div class="col-4">
            <br><br>
            <h2 class="text-center">Modificar datos de la Marca</h2>
            <br>
              
              <form id="formcategoria" class="form-horizontal" enctype="multipart/form-data" method="post"  action="actualizar.php" >

                <div class="form-inputs">
                  <input type="hidden" name="actualizarmarca" value="1">
                  <input type="hidden" name="idmarca" value="<?php echo $idmarca; ?>">
                  <label for="">Nombre</label>
                  <input type="text" id="marca" name="marca" class="form-control input-lg" value="<?php echo $rowmarca->marca; ?>">
                  <br><br>
                      <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Actualizar marca</button>

                </div>
              </form>
                      <hr>
                 

                  <label for="">Imagen</label><br>

                   <div class="contenedorImagen">
                          <?php if ($rowmarca->imagen!="") { ?>
                            <img src="../assets/images/marcas/<?php echo $rowmarca->imagen ?>" style="max-width: 250px;" alt="">
                          
                          </div>
                        <?php } ?>

                        <hr>
        
                  <form action="actualizar.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="idmarca" value="<?php echo $_GET['idmarca'] ?>">
                      <input type="hidden" id="nombre" name="nombre" value="<?php echo $rowmarca->marca; ?> ">
                      <input type="hidden" name="actualizarimagenmarca" value="1">
                      <input type="file" name="imagen" required> <br><br>
                      
                      <button type="submit" class="btn btn-success btn-xs mb15" >Actualizar/incluir imagen</button>
                   </form>
                  

                     
                </div>

                <br>
                
                
          
                



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




  </script>
</body>

</html>

<?php } ?>