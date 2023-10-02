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
    Panel Administrativo Productos
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>

<body class="">
<?php require_once "menu/izquierdo.php" ?>
  <div class="main-content">
   <?php 
          require_once('menu/menutop.php');
         $productos = $con->query("SELECT * FROM productos");
 ?>
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
              <h3 class="mb-0">Productos</h3>
            </div>
            <div class="row">
              <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <div class="table-responsive">
              <table class="table align-items-center table-flush table-striped" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Detalles</th>
                    
                    
                    <!-- <th class="text-right" scope="col">Opciones</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowproductos = $productos->fetch_object()){ ?>
                  <tr>
                    <td>
                      
                        <?php if ($rowproductos->activo==1) {
                        $estado = "success";
                      }else{
                        $estado="danger";
                      } ?>

                        <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>" style="width: 1.5rem; height: 1.5rem;"></i></span><br>
                        <h5 class="mb-0 text-sm"><?php echo $rowproductos->id . " <br> <i>" . $rowproductos->clave_producto ?></i></h5>
   
                        
                      
                    </td>
                    <td>
                     <img src="../<?php echo $rowproductos->foto1 ?>" style="max-width: 105px; border-radius: 20px; mix-blend-mode:multiply">
                    </td>
                    <td>
                      <img src="../assets/images/marcas/<?php echo $rowproductos->marca ?>.jpg" style="max-height: 25px; mix-blend-mode:multiply;"><br>
                     <?php echo $rowproductos->nombre ?><br>
                     <?php 
                      $categorias = $con->query("SELECT * FROM categorias WHERE id='$rowproductos->categoria'");
                     while($rowcategorias = $categorias->fetch_object()){

                              echo $rowcategorias->nombre;
                          }
                       ?><br>
                     <small><b>Enviado por: <i><?php echo $rowproductos->tipo_envio ?></i></b></small>
                    </td>
                    <td>
                     <div class="media-body">
                          
                      
                       <?php 
                      if ($estado=="success") {
                         ?><i onclick="desactivarProducto('<?php echo $rowproductos->id; ?>'); return false;" class="fas fa-2x text-danger fa-eye-slash"></i>&nbsp;
                         <?php
                       }else{
                        ?><i onclick="activarProducto('<?php echo $rowproductos->id; ?>'); return false;" class="fas fa-2x text-success fa-eye"></i>&nbsp;
                        <?php
                       } ?>
                      <!--<i onclick="modificarProducto('<?php echo $rowproductos->id ?>'); return false;" class="fas fa-1x fa-edit"></i>&nbsp;-->
                      <a href="productos_editar.php?id_producto=<?php echo $rowproductos->id ?>"><i class="fas fa-2x fa-edit"></i></a>&nbsp;
                      <i onclick="eliminarProducto('<?php echo $rowproductos->id; ?>'); return false;"  class="fas text-danger fa-2x fa-trash"></i><br><br>
                      <a class="btn btn-sm btn-info" href="productos_detalles.php?id_producto=<?php echo $rowproductos->id ?>">Ver detalles del producto</a>
                    </div>
                    </td>
                    
                    
                  </tr>
                <?php } ?>
                  
                 
                </tbody>
              </table>
            </div>
                  
                </div><!-- //col-md-6 -->

              </div>

            </div>
          
          </div>
        </div>
      </div>
      <!-- Dark table -->

   <form id="formcategoria" class="form-horizontal" enctype="multipart/form-data" method="post"  action="guardar.php" >
  <div class="contenedorProductos">
        <div class="row">
 
 
            <div class="col-12 text-center">
              <br><br>
            <h2 class="text-center">Agregar Nuevo Producto</h2>
            <br>
            </div>
        

            <div class="col-12 col-md-4">
              
                 <div class="form-inputs">
                  <input type="hidden" name="nuevoproducto">
                  <label class="label" for="Clave producto">Clave producto</label>
                  <input type="text" id="clave_producto" name="clave_producto" class="form-control input-lg validar" placeholder="Clave producto"> <br>
                  <label class="label" for="Categoría">Categoría</label>
                   <select name="categoria" class="form-control validar" onchange="subCategoria(this.value); return false;">
                    <option value="">Categoría...</option>
                    <?php  $categorias = $con->query("SELECT * FROM categorias");
                     while($rowcategorias = $categorias->fetch_object()){ ?> 
                    <option value="<?php echo $rowcategorias->id ?>"><?php echo $rowcategorias->nombre ?></option>
                  <?php } ?>
                  </select><br>
                  <label class="label" for="Precio compra">Precio compra</label>
                  <input type="number" step="0.01" id="precio_compra" name="precio_compra" class="form-control input-lg validar" placeholder="Precio compra"> <br>
                  <label class="label" for="Código SAT">Valor CFDI</label>
                  <input type="text" id="valorcfdi" name="valorcfdi" class="form-control input-lg validar" placeholder="Valor CFDI"> <br>
                  <label class="label" for="Existencia">Existencia</label>
                  <input type="number" id="existencia" name="existencia" class="form-control input-lg validar" placeholder="Existencia"> <br>
                  <!-- se esconde -->
                  <input type="hidden" id="clave_linea" name="clave_linea" class="form-control input-lg" value="0"> 
                  <label class="label" for="Ancho del producto (cms)">Ancho del producto (cms)</label>
                      <input type="number" step=".01" id="ancho" name="ancho" class="form-control input-lg validar" placeholder="Ancho del producto (cms)"> <br>
                  <label class="label" for="Peso del producto (kgs)">Peso del producto (kgs)</label>
                    <input type="number" step=".01" id="peso" name="peso" class="form-control input-lg validar" placeholder="Peso del producto (Kgs)"> <br>
                    <label class="label" for="Ubicación repisa">Ubicación repisa</label>
                      <input type="text" id="ubicacion_repisa" name="ubicacion_repisa" class="form-control input-lg" placeholder="Ubicacion repisa"> <br>
                  
            </div>
          </div>

          <div class="col-12 col-md-4">
                  <div class="form-inputs">
                      <label class="label" for="Descripción">Descripción</label>
                      <input type="text" id="nombre" name="nombre" class="form-control input-lg validar" placeholder="Descripción"> <br>
                      <label class="label" for="Subcategoría">Subcategoría</label>
                      <div class="selectSubCat">
                        <select class="form-control validar" name="subcategoria" id="subcategoria">
                          <option value="">Selecciona primero categoría...</option>
                        </select>
                      </div> <br>
                      <label class="label" for="Precio venta">Precio venta</label>
                      <input type="number" step="0.01" id="precio_venta" name="precio_venta" class="form-control input-lg validar" placeholder="Precio venta"> <br>
                      <label class="label" for="Disponibilidad de envío">Disponibilidad de envío</label>
                       <select name="tipo_envio" class="form-control">
                        <option value="taximaroa">Solo envío local por Taximaroa</option>
                        <option value="paqueteria">Envío por paquetería</option>
                        <option value="paqtax">Envío por paquetería y/o Taximaroa</option>
                      </select><br>
                      <!-- se esconde -->
                      <input type="hidden" id="clave_marca" name="clave_marca" class="form-control input-lg" value="0">
                      <label class="label" for="Mínimo">Mínimo</label>
                      <input type="number" id="minimo" name="minimo" class="form-control input-lg" placeholder="Mínimo"> <br>
                      <label class="label" for="Alto del producto">Alto del producto (cms)</label>
                      <input type="number" step=".01" id="alto" name="alto" class="form-control input-lg validar" placeholder="Alto del producto (cms)"> <br>
                      <label class="label" for="Ubicación zona">Ubicación zona</label>
                      <input type="text" id="ubicacion_zona" name="ubicacion_zona" class="form-control input-lg" placeholder="Ubicacion zona"> <br>
                      <label class="label" for="Ubicación pasillo">Ubicación pasillo</label>
                      <input type="text" id="ubicacion_pasillo" name="ubicacion_pasillo" class="form-control input-lg" placeholder="Ubicacion pasillo"> <br>
                  </div>
          </div>

          <div class="col-12 col-md-4">
                <div class="form-inputs">
                  <label class="label" for="Código fabricante">Código fabricante</label>
                  <input type="text" id="codigo_fabricante" name="codigo_fabricante" class="form-control input-lg validar" placeholder="Código fabricante"><br>
                  <label class="label" for="Unidad">Unidad</label>
                  <select class="form-control validar" name="clave_unidad" id="clave_unidad">
                    <option value="">Selecciona....</option>
                    <?php  $unidad = $con->query("SELECT * FROM unidad");
                     while($rowunidad = $unidad->fetch_object()){ ?>
                    <option value="<?php echo $rowunidad->nombre; ?>"><?php echo $rowunidad->clave ." (".$rowunidad->nombre; ?>)</option>
                  <?php } ?>
                  </select><br>
                  <label class="label" for="Tasa IVA">Tasa IVA</label>
                  <input style="display: none;" type="number" id="impuesto" name="impuesto" class="form-control input-lg" placeholder="Impuesto"> 
                  <input type="number" id="iva" name="iva" class="form-control input-lg validar" placeholder="Tasa IVA"> <br>
                  <label class="label" for="Marca">Marca</label>
                  <select name="marca" id="marca" class="form-control">
                    <?php  $marcas = $con->query("SELECT * FROM marcas");
                     while($rowmarcas = $marcas->fetch_object()){ ?> ?>
                    <option value="<?php echo $rowmarcas->marca ?>"><?php echo $rowmarcas->marca ?></option>
                    <?php } ?>
                    <option value="Sin marca">Sin marca</option>
                    <option value="Varias marcas">Varias marcas</option>
                  </select> <br>
                  <label class="label" for="Máximo">Máximo</label>
                  <input type="number" id="maximo" name="maximo" class="form-control input-lg" placeholder="Máximo"> <br>
                  <label class="label" for="Lago del producto">Lago del producto (cms)</label>
                  <input type="number" step=".01" id="largo" name="largo" class="form-control input-lg" placeholder="Largo del producto (cms)"> <br>
                  <label class="label" for="Ubicación anaquel">Ubicación anaquel</label>
                  <input type="text" id="ubicacion_anaquel" name="ubicacion_anaquel" class="form-control input-lg" placeholder="Ubicacion anaquel"> <br>
                  <label class="label" for="Descuento">Descuento</label>
                  <input type="text" id="descuento" name="descuento" class="form-control input-lg" placeholder="Descuento"> <br>
                </div>
            </div>

                <div class="clearfix"></div>
                <div class="col-12">
                  <label class="label" for="Descripción corta">Descripción corta</label>
                  <textarea class="form-control validar" name="descripcion_corta" id="" cols="2" rows="2" placeholder="Descripción corta"></textarea>
                </div>
                <div class="col-12">
                  <label class="label" for="Descripción detallada">Descripción detallada</label>
                  <textarea class="form-control validar" name="descripcion" id="" cols="2" rows="2" placeholder="Descripción detallada"></textarea>
                  <br><br>
                </div>
                <div class="col-12">
                 




                 
                </div>

                <br>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <button onclick="validar(); return false;" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Agregar Producto</button><br><br>
                </div>
          </div>
  </div><!-- contenedor prductos -->
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

  <!--<script src="../../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script> -->
  <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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




 function subCategoria(id_categoria){

        //console.log(id_categoria);
         $.ajax(
          {
            url : 'selecionar_subcategoria.php',
            type: "POST",
            data : {id_categoria: id_categoria},
            dataType: 'html',
          })
            .done(function(data) {
              $("#subcategoria").empty();
              $("#subcategoria").append(data);
              //console.log(data);

            })
            .fail(function(data) {
              alert("Error");

            })
      }


      function modificarProducto(id_producto){

        $([document.documentElement, document.body]).animate({
        scrollTop: $("#contenedorProductos").offset().top
        }, 1000);

         $.ajax(
          {
            url : 'productos_modificar.php',
            type: "POST",
            data : {modificar_producto: "1",id_producto:id_producto},
            dataType: 'html',
          })
            .done(function(data) {
              $(".contenedorProductos").empty();
              $(".contenedorProductos").append(data);
              //console.log(data);

            })
            .fail(function(data) {
              alert("Error");

            })

      }

/*
$(document).ready( function () {
    $('#myTable').DataTable({
       "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
               "sScrollX": "100%",
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
        columnDefs: [
        { "width": "10px", "targets": [0,1] },       
        { "width": "4px", "targets": [4] }
      ]
    });
} ); */

$(document).ready( function () {
    $('#myTable').DataTable({
       "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
          
    });
} );





      //evitar que se mande el form con enter
      $(document).ready(function() {
      $(window).keydown(function(event){
          if(event.keyCode == 13) {
            event.preventDefault();
            return false;
          }
        });
      });

function validar()  
{    
    var isValid = true;    
    var classname = 'validar';    
    $('.' + classname + '').each(function (i, obj)  
    {    
        if (obj.value == '')  
        {    
            isValid = false;    
            return isValid;    
        }    
    });    
    
    if (!isValid)  
    {    
        $('.' + classname + '').each(function (i, obj)  
        {    
            if (obj.value == '')  
            {    
                obj.style.border = '1px solid red';    
            }  
            else  
            {    
                obj.style.border = '1px solid green';    
            }    
        });    
        alert('Por favor llena todos los campos que son obligatorios');    
    }    
    if (isValid)  
    {    
        return confirm('Are you sure you want to save information? Once information stored will not be updated.')    
    }    
    return isValid;    
} 



  </script>
</body>

</html>