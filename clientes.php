<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Panel Administrativo Clientes
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
  
</head>

<body class="">
<?php require_once "menu/izquierdo.php" ?>
  <div class="main-content">
   <?php 
          require_once('menu/menutop.php');
          require_once "db.php";
   $clientes = $con->query("SELECT * FROM datos_clientes");
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
              <h3 class="mb-0">Clientes Registrados</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowclientes = $clientes->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $rowclientes->id ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                     <?php echo $rowclientes->nombreCompleto ?>
                    </td>
                    <td>
                      <?php echo $rowclientes->telefono ?>
                    </td>
                    <td>
                      <?php echo $rowclientes->correo ?>
                    </td>
                    <td >
                      <?php
                      $direcciones = $con->query("SELECT * FROM direcciones WHERE id_datos_cliente = $rowclientes->id");
                      while($rowdirecciones = $direcciones->fetch_object()){

                       if (!empty($rowdirecciones->calle)){ ?>
                        <b>Calle: </b> <?php echo $rowdirecciones->calle ?>, <b># Ext.</b> <?php echo $rowdirecciones->numero_exterior ?>, <b># Int: </b><?php echo $rowdirecciones->numero_interior ?>, <b>Col: </b><?php echo $rowdirecciones->colonia ?>, <b>CP: </b> <?php echo $rowdirecciones->cp ?>, <b>Ciudad: </b><?php echo $rowdirecciones->ciudad ?>, <b>Municipio: </b> <?php echo $rowdirecciones->municipio ?>, <b>Estado: </b> <?php echo $rowdirecciones->estado ?> <br>
                      <?php } else{ ?>
                        Sin direcciones registradas
                      <?php } }?>
                    </td>
                    <td class="text-right">
                      <?php
                      $btn = '<button class="btn-xs btn-info" onclick="desactivarCliente('.$rowclientes->id.'); return false;">Desactivar</button>';
                      if($rowclientes->activo==0){
                        $btn = '<button class="btn-xs btn-success" onclick="activarCliente('.$rowclientes->id.'); return false;">Activar</button>';
                      }
                      echo $btn;
                       ?>
                      
                      <button class="btn-xs btn-warning">Modificar</button>
                      <button class="btn-xs btn-danger" onclick="eliminarCliente(<?php echo $rowclientes->id ?>); return false;">Eliminar</button>
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
            <h2 class="text-center">Agregar Nuevo Cliente</h2>
            <br>
              
              <form id="formNuevoUsuario">

                <div class="form-inputs">
                  <input type="text" id="nombre" class="form-control input-lg" placeholder="Nombre Completo">
                  <input type="text" id="usuario" class="form-control input-lg" placeholder="Usuario">
                  <input type="password" id="password" class="form-control input-lg" placeholder="Password">
                  

                     
                </div>
                
              </form>
                <br>
                <button class="btn btn-success btn-block btn-lg mb15" type="button" id="guardaUsuario" onclick="guardarCliente(); return false;">Crear Cliente</button>



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
  
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });




function eliminarCliente(id_cliente){
  Swal
    .fire({
       title: '¿Estás seguro',
      text: "de eliminar este cliente?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#2dce89",
      confirmButtonText: "Si, eliminar",
      cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            

            $.ajax({
            data : {id_cliente:id_cliente,eliminar_cliente:'1'},
            type: "POST",
            url: "eliminar.php",
            success: function(data){
               console.log(data);

                       
            Swal.fire({
                 title: 'Cliente',
                  text: 'eliminado correctamente',
                  icon: 'success',
                  confirmButtonColor: "#2dce89",
                  showConfirmButton: true,
                 })
                     setTimeout(function() { window.location.href = "clientes.php";}, 2000);
            

                 
            }
        }); 


        }
    });
}




function desactivarCliente(id_cliente){
  Swal
    .fire({
       title: '¿Estás seguro',
      text: "de desactivar este cliente?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#2dce89",
      confirmButtonText: "Si, desactivar",
      cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            

            $.ajax({
            data : {id_cliente:id_cliente,desactivar_cliente:'1'},
            type: "POST",
            url: "actualizar.php",
            success: function(data){
               console.log(data);

                       
            Swal.fire({
                 title: 'Cliente',
                  text: 'desactivado correctamente',
                  icon: 'success',
                  confirmButtonColor: "#2dce89",
                  showConfirmButton: true,
                 })
                     setTimeout(function() { window.location.href = "clientes.php";}, 2000);
            

                 
            }
        }); 


        }
    });
}


function activarCliente(id_cliente){
  Swal
    .fire({
       title: '¿Estás seguro',
      text: "de activar este cliente?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#2dce89",
      confirmButtonText: "Si, activar",
      cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            

            $.ajax({
            data : {id_cliente:id_cliente,activar_cliente:'1'},
            type: "POST",
            url: "actualizar.php",
            success: function(data){
               console.log(data);

                       
            Swal.fire({
                 title: 'Cliente',
                  text: 'activado correctamente',
                  icon: 'success',
                  confirmButtonColor: "#2dce89",
                  showConfirmButton: true,
                 })
                     setTimeout(function() { window.location.href = "clientes.php";}, 2000);
            

                 
            }
        }); 


        }
    });
}




  </script>
</body>

</html>