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
          $usuarios = $con->query("SELECT * FROM usuarios_admin");
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
              <h3 class="mb-0">Usuarios Registrados</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Privilegio</th>
                    <th class="text-center" scope="col">Estado</th>
                    <th class="text-right" scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowusuarios = $usuarios->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $rowusuarios->id ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                     <?php echo $rowusuarios->nombre ?>
                    </td>
                    <td>
                      <?php echo $rowusuarios->usuario ?>
                    </td>
                    <td>
                      <?php echo $rowusuarios->privilegio ?>
                    </td>
                    <td class="text-center">
                      <?php if ($rowusuarios->estado==1) {
                        $estado = "success";
                        $text = "Desactivar";
                        $btn = "danger";
                      }else{
                        $estado="danger";
                        $text = "Activar";
                        $btn = "success";
                      } ?>
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>"></i></span>
                    </td>
                    <td class="text-right">
                      <button class="btn-xs btn-<?php echo $btn; ?>" onclick="desactivarUsuario('<?php echo $rowusuarios->id; ?>'); return false;"><?php echo $text; ?></button>
                      <a href="usuarios_modificar.php?id_usuario=<?php echo $rowusuarios->id; ?>" class="btn-xs btn-warning">Modificar</a>
                      <button class="btn-xs btn-danger" onclick="eliminarUsuario('<?php echo $rowusuarios->id; ?>'); return false;">Eliminar</button>
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
            <h2 class="text-center">Agregar Nuevo Usuario</h2>
            <br>
              
              <form id="formNuevoUsuario">

                <div class="form-inputs">
                  <input type="text" id="nombre" class="form-control input-lg" placeholder="Nombre Completo" required>
                  <input type="text" id="usuario" class="form-control input-lg" placeholder="Usuario" required>
                  <input type="password" id="password" class="form-control input-lg" placeholder="Password" required>
                  <select class="form-control" id="privilegio" required>
                      <option value="">Selecciona tipo de usuario...</option>
                        <option value="administrador">Administrador</option>
                        <option value="editor">Editor</option>
                        <option value="visor">Visor</option>
                      </select>

                     
                </div>
                
              </form>
                <br>
                <button class="btn btn-success btn-block btn-lg mb15" type="button" id="guardaUsuario" onclick="guardarUsuario(); return false;">Crear Usuario</button>



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