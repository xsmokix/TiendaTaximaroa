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
    Perfil de Cliente Direcciones
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>

<body class="">
  <?php require_once "menu/menuizq.php" ?>
  <div class="main-content">
<?php require_once('menu/menutop.php');
require_once "db.php";
 

/*$clientes = $con->query("SELECT dc.id, dc.nombreCompleto, dc.telefono, dc.correo, dc.fecha_registro, d.id_datos_cliente, d.calle, d.numero_exterior, d.numero_interior, d.colonia, d.cp, d.ciudad, d.municipio, d.estado, d.tipo FROM datos_clientes dc LEFT JOIN direcciones d ON dc.id=d.id_datos_cliente WHERE dc.id ='".$_SESSION['idcliente']."' GROUP BY dc.id;");

$rowClientes = $clientes->fetch_object(); */
                                              



 ?>
    <!-- Header -->

    <div class="header ">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <br>
            
            <p class="text-white mt-0 mb-6">Estás son tus direcciones registradas</p>
            <br><br>
            <!-- <a href="#!" class="btn btn-info">Edit profile</a> -->
          </div>
          <div class="col-md-2">
            <br>
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#direccion">Agregar otra dirección</button>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid bg-gradient-primary mt--7">
      <div class="row">
       
        <div class="col-xl-12">
        


<div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">

              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Tus direcciones</h3>
                </div>
                
        <?php 
         $direcciones = $con->query("SELECT * FROM  direcciones WHERE id_datos_cliente = '".$_SESSION['idcliente']."';");
                                            
                                        
          ?>
          <table class="table align-items-center table-dark table-striped">
             <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Calle</th>
              <th>Número Ext</th>
              <th>Núm Int</th>
              <th>Colonia</th>
              <th>CP</th>
              <th>Ciudad</th>
              <th>Municipio</th>
              <th>Estadio</th>
              <th>Opciones</th>
            </tr>
          </thead>

            <?php  while($rowDireccion = $direcciones->fetch_object()){ ?>
              <tr>
                <td><small><?php echo $rowDireccion->id; ?> </small></td>
                <td><?php echo $rowDireccion->calle ?></td>
                <td><?php echo $rowDireccion->numero_exterior ?></td>
                <td><?php echo $rowDireccion->numero_interior ?></td>
                <td><?php echo $rowDireccion->colonia ?></td>
                <td><?php echo $rowDireccion->cp ?></td>
                <td><?php echo $rowDireccion->ciudad ?></td>
                <td><?php echo $rowDireccion->municipio ?></td>
                <td><?php echo $rowDireccion->estado ?></td>
                <td>
                  
                  
                  <?php if ($rowDireccion->tipo=="principal") { ?>
                    <span class="badge badge-success" style="background-color:white;">Dirección Principal</span>
                  <?php }else{ ?>
                     <button class="btn-xs btn-warning" onclick="direccionPrincipal('<?php echo $_SESSION["idcliente"] ?>','<?php echo $rowDireccion->id ?>', '<?php echo $rowDireccion->municipio ?>'); return false;">Convertir en Principal</button>
                  <?php } ?>
                  <button class="btn-xs btn-info" onclick="modalModificarDireccion('<?php echo $rowDireccion->id ?>'); return false;">Modificar</button>
                  <button class="btn-xs btn-danger" onclick="eliminarDireccion('<?php echo $rowDireccion->id ?>'); return false;">Eliminar</button>
                </td>
              </tr>

            <?php } ?>

          </table>

          </div>
      </div><!-- row -->
      <?php require_once "footer.php" ?>
    </div>
  </div>
</div>
</div>




    <!-- Modal -->
<div class="modal fade" id="direccion" tabindex="-1" role="dialog" aria-labelledby="direccion" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Nueva dirección de envío</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



  <div class="row">
       
        <div class="col-xl-12">
          <div class="card bg-secondary shadow">
            
            <div class="card-body">
              <form method="post" action="guardar.php" id="formNuevaDireccion">
                <input type="hidden" name="nuevadireccion" value="1">
                <input type="hidden" name="id_datos_cliente" value="<?php echo $_SESSION['idcliente'] ?>">

                <!-- Address -->
               
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Calle</label>
                        <input name="calle" class="form-control campos form-control-alternative"  type="text" required>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Núm. Ext</label>
                        <input name="numero_exterior" class="form-control campos form-control-alternative"  type="text" required>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Núm. Int</label>
                        <input name="numero_interior" class="form-control form-control-alternative"  type="text" value="0">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Colonia</label>
                        <input name="colonia" class="form-control campos form-control-alternative"  type="text" required>
                      </div>
                    </div>
                  
               
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Estado</label>
                        <select name="estado" id="jmr_contacto_estado" class="form-control campos">
                              <option value="">Selecciona estado...</option>
                              <option value="Aguascalientes">Aguascalientes</option>
                              <option value="Baja California">Baja California</option>
                              <option value="Baja California Sur">Baja California Sur</option>
                              <option value="Campeche">Campeche</option>
                              <option value="Chiapas">Chiapas</option>
                              <option value="Chihuahua">Chihuahua</option>
                              <option value="CDMX">Ciudad de México</option>
                              <option value="Coahuila">Coahuila</option>
                              <option value="Colima">Colima</option>
                              <option value="Durango">Durango</option>
                              <option value="Estado de México">Estado de México</option>
                              <option value="Guanajuato">Guanajuato</option>
                              <option value="Guerrero">Guerrero</option>
                              <option value="Hidalgo">Hidalgo</option>
                              <option value="Jalisco">Jalisco</option>
                              <option value="Michoacán">Michoacán</option>
                              <option value="Morelos">Morelos</option>
                              <option value="Nayarit">Nayarit</option>
                              <option value="Nuevo León">Nuevo León</option>
                              <option value="Oaxaca">Oaxaca</option>
                              <option value="Puebla">Puebla</option>
                              <option value="Querétaro">Querétaro</option>
                              <option value="Quintana Roo">Quintana Roo</option>
                              <option value="San Luis Potosí">San Luis Potosí</option>
                              <option value="Sinaloa">Sinaloa</option>
                              <option value="Sonora">Sonora</option>
                              <option value="Tabasco">Tabasco</option>
                              <option value="Tamaulipas">Tamaulipas</option>
                              <option value="Tlaxcala">Tlaxcala</option>
                              <option value="Veracruz">Veracruz</option>
                              <option value="Yucatán">Yucatán</option>
                              <option value="Zacatecas">Zacatecas</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label"  for="input-city">Municipio</label>
                         <select id="jmr_contacto_municipio" class="form-control campos" name="municipio">
                          <option value="">Selecciona tu municipio</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control campos form-control-alternative" required>
                      </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">CP</label>
                        <input type="number" name="cp" id="cpnuevadir" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" class="form-control campos form-control-alternative" required>
                        <span class="badge badge-danger mensajecp" style="display:none;">Ingresa un código postal</span>
                        <span class="badge badge-danger mensajecp5" style="display:none;">Ingresa CP de 5 dígitos</span>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
               
                <div class="text-center">
                  <button type="button" class="btn btn-sm btn-info" onclick="validarNuevaDireccion(); return false;">Guardar dirección</button>&nbsp;&nbsp;&nbsp;
                  
                </div>
             
              
              </form>
            </div>
          </div>
        </div>
      </div>
        

   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal nueva direccion -->


    <!-- Modal modificar direccion -->
<div class="modal fade" id="modalModificarDireccion" tabindex="-1" role="dialog" aria-labelledby="modalModificarDireccion" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Modificar dirección</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body" id="contenedorModificarDireccion">

         


  </div>
    </div>
  </div>
</div>


<!-- Modal modificar direccion -->








<script>
  
</script>




  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <!-- <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script> -->
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });





function direccionPrincipal(id_cliente,id_direccion,ciudad){

console.log("entro");



  $.ajax({
                        url: 'actualizar.php',
                        type: 'post',
                        data: {actualizar_principal:'1', id_cliente:id_cliente , id_direccion:id_direccion, ciudad:ciudad},
                        dataType: 'html',
                        success:function(response){

                          console.log(response);


              swal({
                 title: 'Dirección',
                  text: 'actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "direcciones.php";
                  }
                }
              )
                        


                         

                        }
                    });

}


function eliminarDireccion(id_direccion){
  swal({
          title: "¿Estás seguro",
          text: "de eliminar está dirección?",
          type: "warning",
          showCancelButton: true,
          cancelButtonText:'Cancelar',
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminar'
         
        }).then(function(isConfirm) {
          if (isConfirm) {

              $.ajax({
                        url: 'eliminar.php',
                        type: 'post',
                        data: {eliminar_direccion:'1', id_direccion:id_direccion},
                        dataType: 'html',
                        success:function(response){

                          console.log(response);

                        }
                    });
            swal({
                 title: 'Dirección',
                  text: 'eliminada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "direcciones.php";
                  }
                }
              )
          } else {
            swal("Cancelado", "No se borró ninguna dirección", "error");
          }
        });
}

function eliminarDireccion1(id_direccion){

console.log("entro");



  $.ajax({
                        url: 'eliminar.php',
                        type: 'post',
                        data: {eliminar_direccion:'1', id_direccion:id_direccion},
                        dataType: 'html',
                        success:function(response){

                          console.log(response);


              swal({
                 title: 'Dirección',
                  text: 'eliminada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "direcciones.php";
                  }
                }
              )
                        


                         

                        }
                    });

}


 function modalModificarDireccion(id_direccion){

  $("#modalModificarDireccion").modal("toggle");

        
        $.ajax({
              url : 'modificar_direccion.php',
              type: "POST",
              data : { id_direccion:id_direccion, modificar_direccion:"1"}
            })
              .done(function(data) {
                   //console.log(data);
                   $("#contenedorModificarDireccion").empty();
                   $("#contenedorModificarDireccion").append(data);
                  //location.reload();
              })
              .fail(function(data) {
                alert("Error");
              }) 

       }


// Obtener municipios
$("#jmr_contacto_estado").on("change", function() {
  console.log("entro");
//$("#jmr_contacto_estado").change(function(){
var estado = $("#jmr_contacto_estado option:selected").val();
$.ajax({
type: "POST",
url: "procesar-estados.php",
data: { municipios : estado } 
}).done(function(data){
$("#jmr_contacto_municipio").html(data);
});
});



function validarNuevaDireccion(){

$(".campos").css({ "border" : "none"});
var camposvacios = 0;
  $('.campos').each(function(){
    if ($(this).val() == "") {
      $(this).css({ "border" : "1px solid red"});
      camposvacios++;
    }
});

  console.log(camposvacios);

  if (camposvacios==0) {




  var cpnuevadir = $("#cpnuevadir").val();
  if (cpnuevadir.length>5 || cpnuevadir.length<5){ 
     $(".mensajecp5").show();
    $("#cpnuevadir").css({"border" : "1px solid red"});
  }else if (cpnuevadir==0 || cpnuevadir=="NULL" || cpnuevadir=="") {
    $(".mensajecp").show();
    $("#cpnuevadir").css({"border" : "1px solid red"});
  }else{
    $(".mensajecp").hide();
    $("#cpnuevadir").css({"border" : "1px solid white"});
    $("#formNuevaDireccion").submit();
  } 
}

}






  </script>
</body>

</html>