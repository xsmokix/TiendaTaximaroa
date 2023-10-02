<?php
session_start();
require_once "seguridad.php"; 
if(isset($_GET['idcategoria'])){
$categoria = $_GET['idcategoria'];
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
    Panel Administrativo Categorías
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
   $categorias = $con->query("SELECT * FROM categorias WHERE id = '$categoria'");
   $rowcategorias = $rowcategorias = $categorias->fetch_object();
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
            <h2 class="text-center">Modificar datos de la Categoría</h2>
            <br>
              
              <form id="formcategoria" class="form-horizontal" enctype="multipart/form-data" method="post"  action="actualizar.php" >

                <div class="form-inputs">
                  <input type="hidden" name="actualizarcategoria" value="1">
                  <input type="hidden" name="idcategoria" value="<?php echo $categoria; ?>">
                  <label for="">Nombre</label>
                  <input type="text" id="nombre" name="nombre" class="form-control input-lg" value="<?php echo $rowcategorias->nombre; ?>"><br>
                  <label for="">Icono</label>
                  <i class="fa <?php echo $rowcategorias->icono; ?>"></i><input type="text" name="icono" class="form-control input-lg" value="<?php echo $rowcategorias->icono; ?>">
                      <a href="https://fontawesome.com/icons?d=gallery&p=2" target="_blank">Revisa aquí el nombre del icono</a> <br><br>
                      <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Actualizar categoría</button>

                </div>
              </form>
                 <!--      <hr>
                 

                  <label for="">Imagen</label><br>

                   <div class="contenedorImagen">
                          <?php if ($rowcategorias->imagen!="") { ?>
                            <img src="../<?php echo $rowcategorias->imagen ?>" style="max-width: 100px;" alt="">
                          
                          </div>
                        <?php } ?>

                        <hr>
        
                  <form action="actualizar.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="idcategoria" value="<?php echo $_GET['idcategoria'] ?>">
                      <input type="hidden" id="nombre" name="nombre" value="<?php echo $rowcategorias->nombre; ?> ">
                      <input type="hidden" name="actulizarimagencategoria" value="1">
                      <input type="file" name="imagen"> <br><br>
                      
                      <button type="submit" class="btn btn-success btn-xs mb15" >Actualizar/incluir imagen</button>
                   </form> -->
                  

                     
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


      //eliminar pdf
      function eliminarFotoCategoria(idcategoria){


         $.ajax(
          {
            url : 'eliminar.php',
            type: "POST",
            data : {eliminar_foto_categoria: "1",idcategoria:idcategoria},
            dataType: 'html',
          })
            .done(function(data) {
              $(".contenedorFoto").empty();


          console.log(data);

           swal({
                 title: 'Ficha técnica',
                  text: 'eliminada ',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              })

            })
            .fail(function(data) {
              alert("Error");

            })

            




      }



  </script>
</body>

</html>

<?php } ?>