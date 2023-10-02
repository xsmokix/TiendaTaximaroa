<?php
session_start();
require_once "seguridad.php";
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
    Perfil de Cliente
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/general.css">
</head>

<body class="">
  <?php require_once "menu/menuizq.php" ?>
  <div class="main-content">
<?php require_once('menu/menutop.php');
require_once "db.php";
 $clientes = $con->query("SELECT dc.id, dc.nombreCompleto, dc.telefono, dc.correo, dc.fecha_registro, d.id_datos_cliente, d.calle, d.numero_exterior, d.numero_interior, d.colonia, d.cp, d.ciudad, d.municipio, d.estado FROM datos_clientes dc LEFT JOIN direcciones d ON dc.id=d.id_datos_cliente WHERE dc.id ='".$_SESSION['idcliente']."';");
                                            $rowClientes = $clientes->fetch_object();
                                              



 ?>
    <!-- Header -->

    <div class="header pb-6 pt-1 d-flex align-items-center">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-12 col-md-10">
            <h1 class="display-2 text-white">Hola <?php echo $rowClientes->nombreCompleto ?>
            <p class="text-white mt-0 mb-5">Este es tu perfil. Podrás ver tu información personal y modificarla</p></h1>
            <!-- <a href="#!" class="btn btn-info">Edit profile</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid bg-gradient-primary mt--7">
      <div class="row">
        <div class="col-xl-2 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    
                    <img class="rounded-circle" src="<?php echo $imagen_cliente ?>">
                 

                   
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                </div>
              </div>
              <div class="clearfix"></div><br><br>
              <div class="text-center">

                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalFoto">Cambiar foto</button>
                
               
                <hr>
                <h3>
                  <?php echo $rowClientes->nombreCompleto ?><span class="font-weight-light"><br> Miembro desde: <?php echo $rowClientes->fecha_registro ?></span>
                </h3>
                <!--<div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4" />
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                <a href="#">Show more</a>-->
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-10 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Mi cuenta</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Aquí puedes modificar tus datos y guárdalos</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="actualizar.php">
                <input type="hidden" name="actualizardatos" value="1">
                <input type="hidden" name="id_cliente" value="<?php echo $rowClientes->id_datos_cliente ?>">
                <h6 class="heading-small text-muted mb-4">Datos personales</h6>
                <div class="pl-lg-12">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Usuario</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $_SESSION['nombre'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Correo</label>
                        <input type="email" name="correo" class="form-control form-control-alternative" value="<?php echo $rowClientes->correo ?>" required>
                      </div>
                    </div>
                  
        
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nombre Completo</label>
                        <input type="text" name="nombrecompleto" class="form-control form-control-alternative" value="<?php echo $rowClientes->nombreCompleto ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Teléfono</label>
                        <input type="text" name="telefono"  maxlength="10" class="form-control form-control-alternative" value="<?php echo $rowClientes->telefono ?>" required>
                      </div>
                    </div>

                  </div>
                
                </div>
               
                <hr class="my-4" />
               
                <div class="text-center">
                  <button class="btn btn-sm btn-success ">Guardar</button>
                </div>
             
                <!-- Description -->
                
                <!--<div class="pl-lg-4">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div>-->
              </form>
            </div>
          

          <hr>
            <div class="card-header bg-white border-0">
            <div class="row">
                              <div class="col-12">
                             
                              <h2 class="text-center">Contáctanos</h2>
                               
                            </div>
                            <div class="col-3">
                             <p><i class="textoAzul fas fa-map-marker-alt"></i> Calle Fray Sebastián de Aparicio 23 Buena Vista 2da Etapa 58228 Morelia, Mich. México <br>
            
            
                            </div>
                            <div class="col-3">
                              <i class="textoAzul fas fa-clock"></i> Lunes a viernes de 9:00 a 18:45 y sábados de 8:00 a 14:00 hrs <br>
                            </div>
                            <div class="col-3">
                               <i class="textoAzul fas fa-envelope"></i> contacto@ferreteriataximaroa.com <br>
         
                            </div>
                            <div class="col-3">
                              
                                    <a href="tel:4433230827"><i class="textoAzul fas fa-phone"></i> 443-323 0827</a></p>
                                    <a href="tel:4433234197"><i class="textoAzul fas fa-phone"></i> 443-323 4197</a></p>
                                    <a href="tel:4433232296"><i class="textoAzul fas fa-phone"></i> 443-323 2296</a></p>
                            </div>
                            

                            </div><!-- roww-->



                            </div>
                           




                          </div><!-- card secondary shadow -->
        </div>


         
                   
                       
                          
                           
                          
                    





      </div>
      <?php require_once "footer.php" ?>
    </div>
  </div>




  <!-- The Modal -->
  <div class="modal" id="modalFoto">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cambiar fotografía de perfil</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form enctype="multipart/form-data" method="post"  action="actualizar.php" >
                  <input type="hidden" name="id_cliente" value="<?php echo $_SESSION['idcliente'] ?>">
                  <input type="hidden" name="actualizarimagen" value="1">
                  <input type="file" name="imagen" class="center-block"> <br><br>
                  <button type="submit" class="btn btn-sm btn-primary">Cambiar foto</button>
                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <hr>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
  




  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <!-- <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script> -->
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

      $('input[name="telefono"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});



  </script>

</body>

</html>