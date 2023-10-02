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
    Panel Administrativo Preguntas Frecuentes
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
          require_once "db.php";
   $preguntas = $con->query("SELECT * FROM preguntas_frecuentes");
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
              <h3 class="mb-0">Preguntas frecuentes</h3>
            </div>
            <div class="table-responsive">
              <table class="table-striped">
                <thead class="thead-light">
                  <tr class="d-flex">
                    <th class="col-md-1">#</th>
                    <th class="col-md-1">Categoría</th>
                    <th class="col-md-2">Pregunta</th>
                    <th class="col-md-4">Respuesta</th>
                    <th scope="col" class="text-center col-md-1">Estado</th>
                    <th class="text-right col-md-1" scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowpreguntas = $preguntas->fetch_object()){ ?>
                  <tr class="d-flex">
                   
                        
                        <td class="col-md-1">
                          <span class="mb-0 text-sm"><?php echo $rowpreguntas->id ?></span>
                        </td>
                        
                    
                    <td class="col-md-1">
                     <?php echo $rowpreguntas->categoria ?>
                    </td>
                    <td class="col-md-2" style="word-wrap: break-word;">
                      <?php echo $rowpreguntas->pregunta ?>
                    </td>
                    <td class="col-md-4" style="word-wrap: break-word;">
                      <?php echo $rowpreguntas->respuesta ?>
                    </td>
                    <td class="text-center col-md-1">
                      <?php if ($rowpreguntas->estado==1) {
                        $estado = "success";
                      }else{
                        $estado="danger";
                      } ?>
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>"></i></span>
                    </td>
                    <td class="text-right col-md-1">
                      <button class="btn-xs btn-info" onclick="descativarPromocion(<?php echo $rowpreguntas->id ?>); return false;">Desactivar</button>
                      <button class="btn-xs btn-warning" onclick="modalModificarPromocion('<?php echo $rowpreguntas->promocion ?>','<?php echo $rowpreguntas->url ?>','<?php echo $rowpreguntas->imagen ?>','<?php echo $rowpreguntas->id ?>'); return false;">Modificar</button>
                      <button class="btn-xs btn-danger" onclick="eliminarPromocion(<?php echo $rowpreguntas->id ?>); return false;">Eliminar</button>
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
 
 
            
        

            <div class="col-1"></div>

            <div class="col-10">
            <br><br>
            <h2 class="text-center">Agregar Nueva Pregunta</h2>
            <br>
              
              <form id="formpromocion" class="form-horizontal" enctype="multipart/form-data" method="post"  action="guardar.php" >

                <div class="form-inputs">
                  <input type="hidden" name="nuevapregunta">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Categoría</label>
                      <select name="categoria" class="form-control" id="">
                        <option value="envios">Envíos</option>
                        <option value="facturacion">Facturación</option>
                        <option value="compra">Compra</option>
                        <option value="devoluciones">Devoluciones</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label>Pregunta?</label>
                      <textarea id="pregunta" name="pregunta" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="col-md-4">
                      <label>Respuesta</label>
                      <textarea id="respuesta" name="respuesta" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                  
                  
                 <hr>
                              
                             
                  
                  

                     
                </div>

                <br>
                <div class="row">
                  <div class="col-md-4"></div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Guardar pregunta</button><br><br><br><br>
                </div>
                </div>
                
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

/*
        $.ajax({
              url : 'consulta.php',
              type: "POST",
              data : { id_promocion:id_promocion}
            })
              .done(function(data) {
                   console.log(data);
                  //location.reload();
              })
              .fail(function(data) {
                alert("Error");
              }) */

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


/*
        $.ajax({
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
              })*/

      }
  </script>
</body>

</html>