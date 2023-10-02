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
    Panel Administrativo Promociones
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
         $promociones = $con->query("SELECT * FROM promociones");
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
              <h3 class="mb-0">Promociones</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Promoción</th>
                    <th scope="col">Imagen</th>
                    <th>URL</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th class="text-right" scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowpromociones = $promociones->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $rowpromociones->id ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                     <?php echo $rowpromociones->promocion ?>
                    </td>
                    <td>
                      <img src="../<?php echo $rowpromociones->imagen ?>" style="max-width: 155px;" alt="">
                    </td>
                    <td>
                      <a href="<?php echo $rowpromociones->url ?>" target="_blank"><?php echo $rowpromociones->url ?></a>
                    </td>
                    <td class="text-center">
                      <?php if ($rowpromociones->estado==1) {
                        $estado = "success";
                      }else{
                        $estado="danger";
                      } ?>
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>" style="width: 1.5rem; height: 1.5rem;"></i></span>
                    </td>
                    <td class="text-right">
                      <?php if ($estado=="success") {
                         ?><button onclick="desactivarPromocion('<?php echo $rowpromociones->id; ?>'); return false;" class="btn-xs btn-info">Desactivar</button><?php
                       }else{
                        ?><button onclick="activarPromocion('<?php echo $rowpromociones->id; ?>'); return false;" class="btn-xs btn-success">Activar</button><?php
                       } ?>
                      <a class="btn-xs btn-warning" href="promociones_modificar.php?idpromocion=<?php echo $rowpromociones->id ?>">Modificar</a>
                      <button class="btn-xs btn-danger" onclick="eliminarPromocion(<?php echo $rowpromociones->id ?>); return false;">Eliminar</button>
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
            <h2 class="text-center">Agregar Nueva Promoción</h2>
            <br>
              
              <form id="formpromocion" class="form-horizontal" enctype="multipart/form-data" method="post"  action="guardar.php" >

                <div class="form-inputs">
                  <input type="hidden" name="nuevapromocion">
                  <input type="text" id="nombre" name="nombre" class="form-control input-lg" placeholder="Nombre promoción" required>
                  <input type="text" id="url" name="url" class="form-control input-lg" placeholder="URL promoción" required>
                 <input type="file" id="multiFiles" name="imagen1" onchange="makeFileList(); return false;" class="center-block"/>
                 <hr>
                                <div class="alert alert-warning" id="sinImagen" role="alert">
                                  <strong>Atención!</strong> No has seleccionado imágenes
                                </div>
                               <div class="alert alert-success contenedorNombreImagen" id="contenedorNombreImagen" role="alert" style="display:none;"><span id="nombreImagen"></span><i class="fas fa-trash" style="float:right; cursor: pointer;" onclick="eliminarImagen(); return false;"></i>
                                </div>
                  
                  

                     
                </div>

                <br>
                <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Crear promoción</button>
                
              </form>
                



          </div>





      </div>
      <!-- Footer -->
      <?php require_once "footer.php" ?>
     
    </div>







  </div><!-- main content -->


  <div class="modal fade" id="modificarPromocion" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Modificar promoción</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formModificarPromocion">
              <input type="hidden" name="id_promocion" id="id_promocion">
              <div class="contenedorModificarPromocion">
              <label for="npromo">Nombre de la promoción</label>
              <div id="nombrePromocion">
              </div>
              <hr>
              <div id="imagenPromocion"></div>
              <br>
              <input type="file" name="inputImagenPromocion" id="inputImagenPromocion" class="form-control">
              <hr>
              <label for="npromo">Url de la promoción</label>
              <div id="urlPromocion"></div>
              
            </div>
            </form>
            <br>
            <center>
              <button type="button" class="btn btn-sm btn-success" onclick="actualizarPromocion(); return false;">Actualizar</button>
            </center>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          
        </div>
      </div>
    </div>
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

       function modalModificarPromocion(nombrePromocion, urlPromocion, imgPromocion,id_promocion){

        $('#modificarPromocion').modal('toggle');

        $("#id_promocion").empty();
        $("#nombrePromocion").empty();
        $("#imagenPromocion").empty();
        $("#urlPromocion").empty();
        $("#id_promocion").val(id_promocion);
        $("#nombrePromocion").append('<input class="form-control" type="text" id="inputNombrePromocion" value="'+nombrePromocion+'">');
        $("#imagenPromocion").append('<center><img src=../'+imgPromocion+' style="max-width:250px;"></center>');
        $("#urlPromocion").append('<input class="form-control" type="text" id="inputUrlPromocion" value="'+urlPromocion+'">');



       }

      function actualizarPromocion(){

        var formData = new FormData();

        var id_promocion = $("#id_promocion").val();
        var nombrePromocion = $("#inputNombrePromocion").val();
        var urlPromocion = $("#inputUrlPromocion").val();

        var files = $('#inputImagenPromocion')[0].files[0];
        formData.append('file',files);
        formData.append('id_promocion', id_promocion);
        formData.append('nombrePromocion', nombrePromocion);
        formData.append('urlPromocion', urlPromocion);


        for (let [key, value] of formData) {
  console.log(`${key}: ${value}`)
}



      }
  </script>
</body>

</html>