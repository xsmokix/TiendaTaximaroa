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
    <style>
      table {
            table-layout: fixed;
          width: 100%;
          /*word-break: break-all;*/
          }
    </style>


    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Clientes Registrados</h3>
            </div>
            <div class="text-right">
              <span class="badge badge-lg badge-dot"><i class="bg-success" style="width: 1rem; height: 1rem;"></i></span> Dirección principal
            </div>
            <div class="table-responsive text-center">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <table class="table align-items-center table-flush table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Número de Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowclientes = $clientes->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm">000<?php echo $rowclientes->id ?></span><br>
                          <?php 
                        if ($rowclientes->visto==0) {
                         ?><button onclick="clienteVisto('<?php echo $rowclientes->id; ?>'); return false;" class="btn-xs btn-success">Marcar como visto</button> <?php
                       } ?>
                        </div>
                      </div>
                    </th>
                    <td>
                     <?php echo $rowclientes->nombreCompleto ?>
                    </td>
                    <td class="text-center">
                      <?php
                      $btn = '<button class="btn-xs btn-info" onclick="desactivarCliente('.$rowclientes->id.'); return false;">Desactivar</button>';
                      if($rowclientes->activo==0){
                        $btn = '<button class="btn-xs btn-success" onclick="activarCliente('.$rowclientes->id.'); return false;">Activar</button>';
                      }
                      echo $btn;
                       ?>
                      
                      <a href="clientes_editar.php?id_cliente=<?php echo $rowclientes->id ?>" class="btn-xs btn-warning">Modificar</a>
                      <button class="btn-xs btn-danger" onclick="eliminarCliente(<?php echo $rowclientes->id ?>); return false;">Eliminar</button> <br><br>  
                      <a class="btn btn-lg btn-info" href="clientes_detalles.php?id_cliente=<?php echo $rowclientes->id ?>">Ver detalles del cliente</a>

                    </td>
                  </tr>
                <?php } ?>
                  
                 
                </tbody>
              </table>
                </div>
              </div><!--//row-->
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
              
             

             <form class="form-signin" role="form">
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class=""></i></span>
                  </div>
                  <input class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo" type="text" required>
                </div>
                <span style="color: red; font-size: 12px; display: none;" class="errores nombreerror">Ingresa tu nombre completo</span>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class=""></i></span>
                  </div>
                  <input class="form-control" name="correo" id="correo" placeholder="Correo electrónico" type="email" required>
                </div>
                <span id="error" style="display:none;color:red;">Correo no válido</span>
                <span id="success" style="display:none;color:green;">Correo válido</span>
                <span style="color: red; font-size: 12px; display: none;" class="errores correoerror">Ingresa tu correo</span>
                <span style="color: red; font-size: 12px; display: none;" id="errorcorreo">Este correo ya está registrado, intenta con otro</span>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class=""></i></span>
                  </div>
                  <input class="form-control" name="telefono" id="telefono" placeholder="Teléfono" type="number" required>
                </div>
                <span style="color: red; font-size: 12px; display: none;" class="errores telefonoerror">Ingresa tu teléfono</span>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class=""></i></span>
                  </div>
                  <input class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" type="text" required>
                </div>
                <span style="color: red; font-size: 12px; display: none;" class="errores usuarioerror">Ingresa tu usuario</span>
                <span style="color: red; font-size: 12px; display: none;" id="errorusuario">Usuario no disponible, intenta con otro</span>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class=""></i></span>
                  </div>
                  <input class="form-control" name="password" id="password" placeholder="Contraseña" type="password" required>
                </div>
                <span style="color: red; font-size: 12px; display: none;" class="errores passworderror">Ingresa tu password</span>
              </div>
              <div class="">
                <div class="row">
                  <div class="col-lg-11">
                    
                  </div>
                  <div class="col-lg-1">
                    
                      <input id="anuncios" name="anuncios" type="checkbox" class="checkbox" style="display:none;" checked>
                      
                  </div>
                </div>
              </div>
          
              <div class="text-center">
                <button type="button" style="display: none;" id="btnRegistrarse" onclick="registrarse(); return false;" class="btn btn-primary my-4">Registrar cliente</button>
              </div>
            </form>



                <br><br><br><br>



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


 function clienteVisto(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {cliente_visto: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                 Swal.fire({
                                        title: 'Cliente',
                                        text: 'marcado como visto',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "clientes.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                

                              } //pedido visto




 $(document).ready(function(){
   $("#usuario").focusout(function(){
      var usuario = $(this).val();
      //console.log(usuario);
      if(usuario != ''){
         $.ajax({
            url: '../clientes/checar_usuario.php',
            type: 'post',
            data: {usuario: usuario},
            success: function(response){
              //console.log(response);
                if (response=="1") {
                    $("#errorusuario").show();
                    $("#btnRegistrarse").hide();
                }else{
                  $("#btnRegistrarse").show();
                  $("#errorusuario").hide();
                }
             }
         });
      }
    });
    $("#correo").focusout(function(){
      var correo = $(this).val();
      //console.log(correo);
      if(correo != ''){
         $.ajax({
            url: '../clientes/checar_correo.php',
            type: 'post',
            data: {correo: correo},
            success: function(response){
             // console.log(response);
                if (response=="1") {
                    $("#errorcorreo").show();
                    $("#error").hide();
                    $("#success").hide();
                    $("#btnRegistrarse").hide();
                }else{
                  $("#btnRegistrarse").show();
                  $("#errorcorreo").hide();
                }
             }
         });
      }
    });
 });
$('#correo').on('keyup', function() {
    var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
    if(!re) {
        $('#error').show();
        $('#success').hide();
    } else {
        $('#error').hide();
        $('#success').show();
    }
})
function registrarse(){
$(".errores").hide();
var nombre = $("#nombre").val();
var usuario = $("#usuario").val();
  var password = $("#password").val();
  var correo = $("#correo").val();
  var telefono = $("#telefono").val();
  if($("#anuncios").is(':checked')) {  
            var anuncios = "1";
        } else {  
             var anuncios = "0";
        }  
  if (nombre=="") {
    $(".nombreerror").show();
    $("#nombre").focus();
  }else if (usuario=="") {
    $(".usuarioerror").show();
    $("#usuario").focus();
  }else if (password=="") {
    $(".passworderror").show();
    $("#password").focus();
  }else if (correo=="") {
    $(".correoerror").show();
    $("#correo").focus();
  }else if (telefono=="") {
    $(".telefonoerror").show();
    $("#telefono").focus();
  }else {  
  /*var usuario = $("#usuario").val();
  var password = $("#password").val();
  var correo = $("#correo").val();
  var telefono = $("#telefono").val();
  */
  //console.log("datos enviados:" + nombre + correo + telefono + usuario + password + "anuncios: "+anuncios);
$.ajax(
{
  url : '../clientes/nuevoUsuario.php',
  type: "POST",
  data : {nuevo_usuario:"1", nombre: nombre,usuario: usuario, password: password, correo: correo, telefono: telefono, anuncios : anuncios}
})
  .done(function(data) {
    console.log(data);
Swal.fire({
      title: 'Usuario Registrado',
      text: 'por favor que el cliente revise bandeja de correo electrónico para activar la cuenta (también la carpeta de Spam), también se puede activar manualmente',
      type: 'success'
    }).then(function() {
        window.location.href = "clientes.php";
    })
  })
  .fail(function(data) {
    alert("Error");
  }) 
  }
  };//guardarUsuario



  </script>
</body>

</html>