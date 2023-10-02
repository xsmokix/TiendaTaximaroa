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
    Panel Administrativo Ajustes Inventario
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
  <style>
  ul#searchResult{
    padding: 0 !important;
    position: absolute;
    z-index: 999;
    background-color: white;
  }
    #searchResult li{
      list-style: none;
      font-size: 10px;
      border-bottom: 1px solid #e5e5e5;
      padding: 3px;
      cursor: pointer;
    }
    #searchResult li:hover{
      background-color: #ededed;
    }
  </style>
</head>

<body class="">
<?php 

require_once "menu/izquierdo.php" ?>
  <div class="main-content">
   <?php 
          date_default_timezone_set('America/Mexico_City');
          require_once('menu/menutop.php');
          $inventario = $con->query("SELECT ai.*, p.clave_producto, p.nombre FROM ajustes_inventario ai INNER JOIN productos p ON ai.clave_producto=p.clave_producto ORDER BY id DESC");
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
              <h3 class="mb-0">Ajustes de Inventario</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush table-striped" >
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Fecha</th>
                    <th>Clave</th>
                    <th scope="col">Producto</th>
                    <th scope="col">CF</th>
                    <th>Ext <br>Ant</th>
                    <th>Ajus</th>
                    <th>Dif</th>
                    <th>Pre <br>Com</th>
                    <th>M</th>
                    <th>Prec <br>Vent</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowinventario = $inventario->fetch_object()){ ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $rowinventario->id ?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                     <?php echo $rowinventario->concepto ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->fecha ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->clave_producto ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->nombre ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->codigo_fabricante ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->existencia_anterior ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->ajustado_a ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->diferencia ?>
                    </td>
                    <td>
                      $<?php echo $rowinventario->precio_compra ?>
                    </td>
                    <td>
                      <?php echo $rowinventario->monto ?>
                    </td>
                    <td>
                      $<?php echo $rowinventario->precio_venta ?>
                    </td>
                    <td class="text-right">
                      <button class="btn-xs btn-info" style="margin-bottom: 2px;">Desactivar</button><br>
                      <button class="btn-xs btn-warning" style="margin-bottom: 2px;">Modificar</button><br>
                      <button class="btn-xs btn-danger" onclick="eliminarPromocion(<?php echo $rowinventario->id ?>); return false;">Eliminar</button>
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
            <h2 class="text-center">Nuevo ajuste de inventario</h2>
            <br>
          </div>
          <div class="col-4"></div>
        </div>
              
             
                <div class="form-inputs">
                  


                <div class="row">
                  
                    <div class="col-md-3">
                    <label for="concepto">Concepto</label>
                      <select name="concepto" id="concepto" class="form-control">
                        <option value="Entrada">Entrada</option>
                        <option value="Error inventario">Error inventario</option>
                        <option value="Revision de inventario">Revision de inventario</option>
                        <option value="Caducidad">Caducidad</option>
                        <option value="Desperdicio">Desperdicio</option>
                        <option value="Merma">Merma</option>
                        <option value="Salida">Salida</option>
                        <option value="Robo">Robo</option>
                      </select>
                  </div>
                  <div class="col-md-3">
                    <label for="Fecha">Fecha</label>
                    <input type="text" name="fecha" id="fecha" class="form-control" value=" <?php echo date("Y-m-d h:i:s A") ?> " readonly>
                  </div>
                  <div class="col-md-3">
                    <label for="Clave">Clave</label>
                    <input type="text" name="clave" id="clave" class="form-control">
                    <ul id="searchResult"></ul>
                  </div>
                  <div class="col-md-3">
                    <label for="Producto">Producto</label>
                    <input type="text" name="producto" id="producto" class="form-control" readonly>
                  </div>
                  <div class="col-12"><br></div>
                  <div class="col-md-3">
                    <label for="Código">Código fabricante</label>
                    <input type="text" name="codigo_fabricante" id="codigo_fabricante" class="form-control" readonly>
                  </div>
                  <div class="col-md-3">
                    <label for="Existencia anterior">Existencia anterior</label>
                    <input type="text" name="existencia_anterior" id="existencia_anterior" class="form-control" readonly>
                  </div>
                  <div class="col-md-3">
                    <label for="Ajustado">Ajustado a</label>
                    <input type="text" name="ajustado_a" id="ajustado_a" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label for="Diferencia">Diferencia</label>
                    <input type="text" name="diferencia" id="diferencia" class="form-control" readonly>
                  </div>
                  <div class="col-12"><br></div>
                  <div class="col-md-3">
                    <label for="Precio">Precio compra</label>
                    <input type="text" name="precio_compra" id="precio_compra" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label for="Monto">Monto</label>
                    <input type="text" name="monto" id="monto" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label for="Precio venta">Precio venta</label>
                    <input type="text" name="precio_venta" id="precio_venta" class="form-control">
                  </div>



                </div><!-- roww -->
                  
                                
                             
                  
                  

                     
                </div>

                <br>
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <button class="btn btn-success btn-block btn-lg mb15" onclick="ajustarInventario(); return false;">Ajustar inventario</button><br><br>
                  </div>
                </div>
                
              </form>
                



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


       $("#ajustado_a").keyup(function(){
        if ($("#ajustado_a").val()==0 || $("#ajustado_a").val()==NaN ) {
          $("#diferencia").val("0");
        }else{
        $("#diferencia").val("");
        $("#precio_compra").val("");
        $("#monto").val("");
        var ajustado = parseFloat($(this).val());
        var existencia_anterior = parseFloat($("#existencia_anterior").val());
        //si el valor es negativo
        if (ajustado < 0) {
          console.log("menor de cero");
            var diferencia =  ((ajustado*-1) + existencia_anterior) * -1;
                    }else{

                      console.log("mayor de cero");

                     
                           var diferencia = ajustado - existencia_anterior;

           
          }
        $("#diferencia").val(diferencia);

      }//else



       });



       $("#precio_compra").keyup(function(){
        if ($("#precio_compra").val()==0 || $("#precio_compra").val()==NaN ) {
          $("#monto").val("0");
        }else{
        $("#monto").val("");
        var precio_compra = parseFloat($(this).val());
        var diferencia = parseFloat($("#diferencia").val());

        var monto = diferencia * precio_compra;
        $("#monto").val(monto);

      }//else



       });


      $("#clave").keyup(function(){
        
                var search = $(this).val();
                
                $("#producto, #codigo_fabricante").val("");
                

                if(search != ""){

                  //$("#txt_search").css({"font-size":".5em", "font-weight":"900"});

                    $.ajax({
                        url: 'buscar_producto.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){
                          console.log(response);

                            var len = response.length;
                            $("#searchResult").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var nombre = response[i]['nombre'];
                                var codigo = response[i]['codigo'];
                                var foto = response[i]['foto'];
                                var clave_producto = response[i]['clave_producto'];
                                var existencia = response[i]['existencia'];

                                $("#searchResult").append("<li class='listaBuscador' value='"+id+"'>&nbsp;&nbsp;<img src=../"+foto+" style='max-height: 50px'>"+nombre+"&nbsp;&nbsp;("+codigo+")&nbsp;&nbsp;</li>");

                            }

                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                $("#clave, #producto, #codigo_fabricante").val("");
                                $("#clave").val(clave_producto);
                                $("#producto").val(nombre);
                                $("#codigo_fabricante").val(codigo);
                                $("#existencia_anterior").val(existencia);


                                 $("#searchResult").empty();
                            });


                        }
                    });
                }else{
                  //$("#txt_search").css({"font-size":"14px", "font-weight":"300"});
                  $("#searchResult").empty();
                }

            });

      
      function ajustarInventario(){

        console.log("entro");


        var concepto= $("#concepto").val();
        var fecha=$("#fecha").val();
        var clave_producto=$("#clave").val();
        var nombre_producto=$("#producto").val();
        var codigo_fabricante=$("#codigo_fabricante").val();
        var existencia_anterior=$("#existencia_anterior").val();
        var ajustado_a=$("#ajustado_a").val();
        var diferencia=$("#diferencia").val();
        var precio_compra=$("#precio_compra").val();
        var monto=$("#monto").val();
        var precio_venta=$("#precio_venta").val();

        console.log(concepto);



        $.ajax(
{
  url : 'guardar.php',
  type: "POST",
  data : {nuevoinventario: "1", concepto: concepto,fecha: fecha, clave: clave_producto, producto:nombre_producto, codigo_fabricante: codigo_fabricante, existencia_anterior: existencia_anterior, ajustado_a: ajustado_a, diferencia: diferencia, precio_compra: precio_compra, monto: monto, precio_venta: precio_venta }
})
  .done(function(data) {
console.log(data);

swal({
      title: 'Inventario',
      text: 'Agregado Correctamente',
      type: 'success'
    }).then(function() {
        window.location.href = "inventario.php";
    })

 

  })
  .fail(function(data) {
    alert("Error");

  })
  /*always(function(data) {
    alert( "complete" );
  });*/




      }

  </script>
</body>

</html>