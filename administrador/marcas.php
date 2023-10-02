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
    Panel Administrativo Marcas
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
</head>

<body class="">
  <?php require_once "menu/izquierdo.php" ?>
  <div class="main-content">
   <?php 
          require_once('menu/menutop.php');
          $marcas = $con->query("SELECT * FROM marcas");
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
              <h3 class="mb-0">Marcas</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Orden</th>
                    <th class="text-right" scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowmarcas = $marcas->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $rowmarcas->id ?></span>
                        </div>
                      </div>
                    </th>
                     <td class="text-center">
                      <?php if ($rowmarcas->estado==1) {
                        $estado = "success";
                      }else{
                        $estado="danger";
                      } ?>
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>"></i></span>
                    </td>
                    <td>
                     <?php echo $rowmarcas->marca ?>
                    </td>
                    <td>
                      <img src="../assets/images/marcas/<?php echo $rowmarcas->imagen ?>" style="max-width: 75px;" alt="">
                    </td>
                    <td>
                      <input id="<?php echo $rowmarcas->id; ?>"  type="text" class="form-control ordenmenu" style="max-width: 50px;" value="<?php echo $rowmarcas->orden ?>" onkeyup="cambiarOrdenMarca(this); return false;">
                    </td>
                    <td class="text-right">
                      <?php 
                      if ($estado=="success") {
                         ?><button onclick="desactivarMarca('<?php echo $rowmarcas->id; ?>'); return false;" class="btn-xs btn-info">Desactivar</button><?php
                       }else{
                        ?><button onclick="activarMarca('<?php echo $rowmarcas->id; ?>'); return false;" class="btn-xs btn-success">Activar</button><?php
                       } ?>
                      <a href="marcas_modificar.php?idmarca=<?php echo $rowmarcas->id; ?>" class="btn-xs btn-warning">Modificar</a>
                      <button onclick="eliminarMarca('<?php echo $rowmarcas->id; ?>'); return false;" class="btn-xs btn-danger">Eliminar</button>
                    </td>
                  </tr>
                <?php } ?>
                  
                 
                </tbody>
              </table>
            </div>
          
          </div>
        </div>
      </div>
      <!-- Dark table -->
      <div class="row">
 
 
            
        

            <div class="col-4"></div>

            <div class="col-4">
            <br><br>
            <h2 class="text-center">Agregar Nueva Marca</h2>
            <br>
              
              <form id="formmarca" class="form-horizontal" enctype="multipart/form-data" method="post"  action="guardar.php" >

                <div class="form-inputs">
                  <input type="hidden" name="nuevamarca">
                  <input type="text" id="marca" name="marca" class="form-control input-lg" placeholder="Nombre marca" required>
                 <input type="file" id="multiFiles" name="imagen1" onchange="makeFileList(); return false;" class="center-block"/ required>
                 <hr>
                                <div class="alert alert-warning" id="sinImagen" role="alert">
                                  <strong>Atención!</strong> No has seleccionado imágenes
                                </div>
                                <div class="alert alert-success contenedorNombreImagen" id="contenedorNombreImagen" role="alert" style="display:none;"><span id="nombreImagen"></span><i class="fas fa-trash" style="float:right; cursor: pointer;" onclick="eliminarImagen(); return false;"></i>
                                </div>
                  
 
                </div>

                <br>
                <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Agregar nueva marca</button>
                
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

        function cambiarOrdenMarca(arg){
          console.log("cambiando orden");
             var id = arg.getAttribute('id');
             var orden = arg.value;

             $.ajax({
                  url : 'actualizar.php',
                  type: "POST",
                  data : {ordenmarca: "1", idmarca: id,orden: orden }
                })
                  .done(function(data) {
                      console.log(data);
                  })
                  .fail(function(data) {
                    alert("Error");

                  })
            }
  </script>
</body>

</html>