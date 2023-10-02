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
    Panel Administrativo Menú
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
   $menu = $con->query("SELECT m.id, m.icono, m.nombre, m.id_categoria, m.orden, m.activo , c.nombre as nombreCat FROM menu m INNER JOIN categorias c ON c.nombre=m.nombre");
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
              <h3 class="mb-0">Menu</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Icono</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Orden</th>
                    <th>Submenus</th>
                    <th class="text-right" scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $x=1;
                   while($rowmenu = $menu->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $x ?></span>
                        </div>
                      </div>
                    </th>
                     <td class="text-center">
                      <?php if ($rowmenu->activo==1) {
                        $estado = "success";
                      }else{
                        $estado="danger";
                      } ?>
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>"></i></span>
                    </td>
                    <td>
                     <?php echo $rowmenu->icono ?>&nbsp;<i class="fa <?php echo $rowmenu->icono ?>"></i>
                    </td>
                    <td>
                     <?php echo $rowmenu->nombre ?>
                    </td>
                    <td>
                      <input id="<?php echo $rowmenu->id; ?>"  type="text" class="form-control ordenmenu" style="max-width: 50px;" value="<?php echo $rowmenu->orden ?>" onkeyup="cambiarOrden(this); return false;">
                    </td>
                    <td><a href="submenu.php?idmenu=<?php echo $rowmenu->id_categoria; ?>" class="btn btn-default">Submenus</a></td>
                    <td class="text-right">
                      <?php 
                      if ($estado=="success") {
                         ?><button onclick="desactivarMenu('<?php echo $rowmenu->id; ?>'); return false;" class="btn-xs btn-info">Desactivar</button><?php
                       }else{
                        ?><button onclick="activarMenu('<?php echo $rowmenu->id; ?>'); return false;" class="btn-xs btn-info">Activar</button><?php
                       } ?>

                      <button onclick="eliminarMenu('<?php echo $rowmenu->id; ?>'); return false;" class="btn-xs btn-danger">Eliminar</button>
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
 
 
            
        

            <!-- <div class="col-4"></div>

            <div class="col-4">
            <br><br>
            <h2 class="text-center">Agregar Nuevo Menú</h2>
            <br>
              
              <form id="formmenu" class="form-horizontal" enctype="multipart/form-data" method="post"  action="guardar.php" >

                <div class="form-inputs">
                  <input type="hidden" name="nuevomenu">
                  <input type="text" id="nombre" name="nombre" class="form-control input-lg" placeholder="Nombre">
                 
                 <hr>
                               
                             
                  
                  

                     
                </div>

                <br>
                <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Crear menú</button>
                
              </form>
                



          </div> -->
<div class="col-md-4 text-center"></div>
          <div class="col-md-4 text-center">
            <br><br>
            <div class="text-center">
              <a class="btn btn-success btn-block" href="categorias.php">Agregar nuevo elemento</a><br><br><br>
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



    

        function cambiarOrden(arg){
             var id = arg.getAttribute('id');
             var orden = arg.value;

            
             

             $.ajax({
  url : 'actualizar.php',
  type: "POST",
  data : {ordenmenu: "1", idmenu: id,orden: orden }
})
  .done(function(data) {
      console.log(data);
  })
  .fail(function(data) {
    alert("Error");

  })



            }

        
        /*$(".ordenmenu").keyup(function(event){
          var valor = $(this).val();
          if (valor!="") {
            console.log(valor);

            $.ajax(
{
  url : 'actualizar.php',
  type: "POST",
  data : {ordenmenu: "1", nombre: nombre,usuario: usuario, password: password, privilegio: privilegio }
})
  .done(function(data) {
      console.log(data);
  })
  .fail(function(data) {
    alert("Error");

  })
          }
          
          
        }); 

        */




  </script>
</body>

</html>