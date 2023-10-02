<?php
session_start();
require_once "seguridad.php"; 
$id_usuario=$_GET['id_usuario'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Panel Administrativo Usuarios
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
    <?php require_once('menu/menutop.php');
          require_once "db.php";
          $usuarios = $con->query("SELECT * FROM usuarios_admin WHERE id='$id_usuario'");
          $rowusuarios = $usuarios->fetch_object();
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
  
      <!-- Dark table -->
      <div class="row">
 
 
            
        

            <div class="col-4"></div>

            <div class="col-4">
            <br><br>
            <h2 class="text-center">Modificar Usuario</h2>
            <br>
              
              <form id="formNuevoUsuario">

                <div class="form-inputs">
                  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>">
                  <label for="Nombre">Nombre:</label>
                  <input type="text" id="nombre" class="form-control input-lg" value="<?php echo $rowusuarios->nombre; ?>">
                  <label for="usuario">Usuario:</label>
                  <input type="text" id="usuario" class="form-control input-lg" value="<?php echo $rowusuarios->usuario; ?>">
                  <label for="contraseña">Contraseña:</label>
                  <input type="password" id="password" class="form-control input-lg" value="<?php echo $rowusuarios->password; ?>">
                  <label for="Privilegios">Privilegios:</label>
                  <select class="form-control" id="privilegio">           
                        <option value="administrador" <?php if($rowusuarios->privilegio=="administrador"){ echo "selected"; } ?>>Administrador</option>
                        <option value="editor" <?php if($rowusuarios->privilegio=="editor"){ echo "selected"; } ?>>Editor</option>
                        <option value="visor" <?php if($rowusuarios->privilegio=="visor"){ echo "selected"; } ?>>Visor</option>
                        <
                      </select>

                     
                </div>
                
              </form>
                <br>
                <button class="btn btn-success btn-block btn-lg mb15" type="button" id="guardaUsuario" onclick="actualizarUsuario(); return false;">Actualizar datos Usuario</button>



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