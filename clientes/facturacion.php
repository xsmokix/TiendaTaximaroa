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
    Perfil de Cliente - Facturación
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
  <link rel="stylesheet" href="assets/css/general.css">
  <style>
    td {
  white-space: normal !important; 
}
  </style>
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

 <div class="header ">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <br>
            
            <p class="text-white mt-0 mb-6">Estás son tus datos de facturación registrados</p>
            <br><br>
            <!-- <a href="#!" class="btn btn-info">Edit profile</a> -->
          </div>
          <div class="col-md-2">
            <br>
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#facturacion">Agregar otro RFC</button>
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
                  <h3 class="mb-0">Tus datos de facturación</h3>
                </div>
                
        <?php 
         $facturacion = $con->query("SELECT * FROM facturacion WHERE id_datos_clientes = '".$_SESSION['idcliente']."';");
                                            
                                        
          ?>
          <table class="table align-items-center table-dark table-responsive">
            <tr class="d-flex">
              <th class="col-md-1">RFC</th>
              <th class="col-md-1">Régimen <br>Razón Social</th>
              <th class="col-md-4">Dirección</th>
              <th class="col-md-3">Correo</th>
              
              <th class="col-md-1">Uso CFDI</th>
              <th class="col-md-2">Opciones</th>
            </tr>

            <?php  while($rowfacturacion = $facturacion->fetch_object()){ ?>
              <tr class="d-flex">
                <td class="col-md-1"><?php echo $rowfacturacion->rfc ?></td>
                <td class="col-md-1"><?php echo $rowfacturacion->regimen."<br>".$rowfacturacion->razon_social ?></td>
                <td class="col-md-4"><?php echo $rowfacturacion->calle.", ".$rowfacturacion->numero.", ".$rowfacturacion->colonia.", ".$rowfacturacion->cp.", ".$rowfacturacion->ciudad.", ".$rowfacturacion->estado.", ".$rowfacturacion->municipio.", ".$rowfacturacion->pais; ?></td>
                 <td class="col-md-3"><?php echo $rowfacturacion->correo ?></td>
                
                <td class="col-md-1"><?php echo $rowfacturacion->cfdi ?></td>
               
                <td class="col-md-2">
                  
                  
                  <?php if ($rowfacturacion->tipo=="principal") { ?>
                    <span class="badge badge-success" style="background-color:white;margin-bottom:3px;">Facturación Principal</span><br>
                  <?php }else{ ?>
                     <button class="btn-xs btn-warning" style="margin-bottom:3px;" onclick="facturacionPrincipal('<?php echo $_SESSION["idcliente"] ?>','<?php echo $rowfacturacion->id ?>'); return false;">Convertir en Principal</button> <br>
                  <?php } ?>
                  <button class="btn-xs btn-info" style="margin-bottom:3px;" onclick="modalModificarFacturacion('<?php echo $rowfacturacion->id ?>'); return false;">Modificar</button> <br>
                  <button class="btn-xs btn-danger" onclick="eliminarFacturacion('<?php echo $rowfacturacion->id ?>'); return false;">Eliminar</button>
                </td>
              </tr>

            <?php } ?>

          </table>

          </div>
      </div><!-- row -->
      
    </div>
        
        </div>
      </div>
      <?php require_once "footer.php" ?>
    </div>
  </div>





 <!-- Modal -->
<div class="modal fade" id="facturacion" tabindex="-1" role="dialog" aria-labelledby="facturacion" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Nueva dirección de facturación</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



    <div class="row">
       
        <div class="col-xl-12">
          <div class="card bg-secondary shadow">
            
            <div class="card-body">
              <form method="post" action="guardar.php" id="formNuevaFacturacion">
                <input type="hidden" name="nuevafacturacion" value="1">
                <input type="hidden" name="id_datos_cliente" value="<?php echo $_SESSION['idcliente'] ?>">

                <!-- Address -->
               
                <div class="pl-lg-4">
                  <div class="row">

                <!-- facturacion -->

                <div class="col-md-12">
                    <label for="firstName">Razón social</label>
                  <input  type="text" name="razon_social" class="form-control form-control-alternative" id="razonsocial" required>
                </div>
                <div class="col-md-12">
                    <label for="firstName">Régimen fiscal</label>
                  <input  type="text" name="regimen" class="form-control form-control-alternative" id="regimen" required>
                </div>
                <div class="col-md-12">
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "13" class="form-control form-control-alternative rfc" id="rfc" required>
              </div>
               <div class="col-md-6">
                <label for="corroe">Correo electrónico</label>
                <input  type="text" name="correo" class="form-control form-control-alternative" id="correo" required>
                <span class="badge badge-danger" id="validatecorreo" style="display: none;">Ingresa un correo válido</span>
              </div>
               <div class="col-md-6">
                <label for="correoalt">Correo electrónico alternativo</label>
                <input  type="text" name="correo_alt" class="form-control form-control-alternative" id="correo_alt">
              </div>
           
              <div class="col-md-8">
                <label for="city">Calle</label>
                <input type="text" name="calle" class="form-control form-control-alternative" id="calle" required>
              </div>
              <div class="col-md-4">
                <label for="numero">Número</label>
                <input type="number" name="numero" class="form-control form-control-alternative" id="numero" value="0" required>
              </div>
              <div class="col-md-8">
                <label for="address">Colonia</label>
                <input type="text" name="colonia" class="form-control form-control-alternative" id="colonia" required>
              </div>
              <div class="col-md-4">
                <label for="cp">Código postal</label>
                <input type="number" name="cp" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" class="form-control form-control-alternative" id="cp" required>
              </div>
              
              
              
              <div class="col-md-6">
                <label for="Estado">Estado</label>
                <select name="estado" id="jmr_contacto_estado" class="form-control" required>
                              <option>Selecciona estado...</option>
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
              <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label"  for="input-city">Municipio</label>
                         <select id="jmr_contacto_municipio" class="form-control" name="municipio" required>
                          <option>Selecciona tu municipio</option>
                        </select>
                      </div>
                    </div>
              <div class="col-md-6">
                <label for="Ciudad">Ciudad</label>
                <input type="text" name="ciudad" class="form-control" id="ciudad">
              </div>
              <div class="col-md-6">
                <label for="pais">País</label>
                <input type="text" name="pais" class="form-control" id="pais">
              </div>
              <div class="col-md-12">
                <label for="uso CFDI">uso CFDI</label>
                <select name="cfdi" class="form-control" id="cfdi" required>
                  <option value="" selected>Selecciona...</option>
                  <option value="G01">G01 Adquisición de mercancias</option>
                  <option value="G02">G02 Devoluciones, descuentos o bonificaciones</option>
                  <option value="G03">G03 Gastos en general</option>
                  <option value="I01">I01 Construcciones</option>
                  <option value="I02">I02 Mobilario y equipo de oficina por inversiones</option>
                  <option value="I03">I03 Equipo de transporte</option>
                  <option value="I04">I04 Equipo de computo y accesorios</option>
                  <option value="I05">I05 Dados, troqueles, moldes, matrices y herramental</option>
                  <option value="I06">I06 Comunicaciones telefónicas</option>
                  <option value="I07">I07 Comunicaciones satelitales</option>
                  <option value="I08">I08 Otra maquinaria y equipo</option>
                  <option value="D01">D01 Honorarios médicos, dentales y gastos hospitalarios.</option>
                  <option value="D02">D02 Gastos médicos por incapacidad o discapacidad</option>
                  <option value="D03">D03 Gastos funerales.</option>
                  <option value="D04">D04 Donativos.</option>
                  <option value="D05">D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
                  <option value="D06">D06 Aportaciones voluntarias al SAR.</option>
                  <option value="D07">D07 Primas por seguros de gastos médicos.</option>
                  <option value="D08">D08 Gastos de transportación escolar obligatoria.</option>
                  <option value="D09">D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                  <option value="D10">D10 Pagos por servicios educativos (colegiaturas)</option>
                  <option value="P01">P01 Por definir</option>
                </select>
              </div>

               
                <div class="col-md-12">
                  <hr class="my-4" />
                </div>
               
                <div class="col-md-12 text-center">
                  <button type="button" class="btn btn-sm btn-info" onclick="validarNuevaFacturacion(); return false;">Guardar dirección de facturación</button>&nbsp;&nbsp;&nbsp;
                  
                </div>
             
              </div>
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
<div class="modal fade" id="modalModificarFacturacion" tabindex="-1" role="dialog" aria-labelledby="modalModificarFacturacion" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Modificar facturación</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body" id="contenedorModificarFacturacion">

         


  </div>
    </div>
  </div>
</div>


<!-- Modal modificar direccion -->






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





function facturacionPrincipal(id_cliente,id_facturacion){

console.log("entro");



  $.ajax({
                        url: 'actualizar.php',
                        type: 'post',
                        data: {facturacion_principal:'1', id_cliente:id_cliente , id_facturacion:id_facturacion},
                        dataType: 'html',
                        success:function(response){

                          console.log(response);


              swal({
                 title: 'Dirección de facturación',
                  text: 'actualizada a principal',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "facturacion.php";
                  }
                }
              )
                        


                         

                        }
                    });

}


function eliminarFacturacion(id_facturacion){
  swal({
          title: "¿Estás seguro",
          text: "de eliminar está dirección de facturación?",
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
                        data: {eliminar_facturacion:'1', id_facturacion:id_facturacion},
                        dataType: 'html',
                        success:function(response){

                          console.log(response);

                        }
                    });
            swal({
                 title: 'Dirección',
                  text: 'de facturación eliminada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "facturacion.php";
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


 function modalModificarFacturacion(id_facturacion){

  $("#modalModificarFacturacion").modal("toggle");

        
        $.ajax({
              url : 'modificar_facturacion.php',
              type: "POST",
              data : { id_facturacion:id_facturacion, modificar_facturacion:"1"}
            })
              .done(function(data) {
                   //console.log(data);
                   $("#contenedorModificarFacturacion").empty();
                   $("#contenedorModificarFacturacion").append(data);
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



function validarNuevaFacturacion(){

    var email = $("#correo").val();
    var rfc = $("#rfc").val();

    if (rfc=="") {
      console.log("vacio rfc");
      $("#rfc").css( "border","1px solid red" );
      $("#rfc").focus();
    }else if(isValidEmailAddress(email)){
              $("#formNuevaFacturacion").submit();
              return false;
            }else{
              $("#rfc").css( "border","none" );
              $("#correo").css( "border","1px solid red" );
              $("#validatecorreo").show();
              $("#correo").focus();
            }
}

function validarNuevaFacturacionMod(){

  console.log("entando aca");

    var email = $("#correoMod").val();
    var rfc = $("#rfcMod").val();
    var municipio = $("#jmr_contacto_municipio1").val();
    console.log(municipio);

    if (rfc=="") {
      console.log("vacio rfc");
      $("#rfcMod").css( "border","1px solid red" );
      $("#rfcMod").focus();
    }if (municipio=="Selecciona tu municipio") {
      $("#jmr_contacto_municipio1").css( "border","1px solid red" );
      $("#jmr_contacto_municipio1").focus();
    }else if(isValidEmailAddress(email)){
              $("#formModificarFacturacion").submit();
              return false;
            }else{
              $("#rfcMod").css( "border","none" );
              $("#correoMod").css( "border","1px solid red" );
              $("#validatecorreoMod").show();
              $("#correoMod").focus();
            }
}



  //validar correo form

  $(document).ready(function() {

    $("#correo").keyup(function(){

      console.log("entrando");

        var email = $("#correo").val();

        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $("#validatecorreo").hide();
            } else {
                $("#validatecorreo").show();
            }
        } else {
            $("#validatecorreo").hide();         
        }

    });

});


  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}





  </script>
</body>

</html>