<?php
session_start();
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
          require_once "db.php";
   $productos = $con->query("SELECT * FROM productos");
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
              <h3 class="mb-0">Productos</h3>
            </div>
            <div class="table-responsive" style="max-width: 100%;">
              <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Img</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marc</th>
                    <th scope="col">Cat</th>
                    <th scope="col" style="max-width: 135px !important;">Desc</th>
                    <th scope="col">AALP</th>
                    <th scope="col">CF</th>
                    <th scope="col">Precios</th>
                    <th scope="col">Inv</th>
                    <th scope="col">Exi</th>
                    <th scope="col">Claves</th>
                    <th scope="col">MaxMin</th>
                    <!-- <th class="text-right" scope="col">Opciones</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php while($rowproductos = $productos->fetch_object()){ ?>
                  <tr>
                    <td scope="row">
                      <div class="media align-items-center">
                        
                        <div class="media-body">
                          
                          <?php if ($rowproductos->activo==1) {
                        $estado = "success";
                      }else{
                        $estado="danger";
                      } ?>
                      <span class="badge badge-lg badge-dot"><i class="bg-<?php echo $estado ?>"></i></span>
                      <!--<span class="mb-0 text-sm"><?php echo $rowproductos->id ?></span><br> -->
                      <h5 class="mb-0 text-sm"><?php echo $rowproductos->clave_producto ?></h5><br>
                       <?php 
                      if ($estado=="success") {
                         ?><i onclick="desactivarProducto('<?php echo $rowproductos->id; ?>'); return false;" class="fas fa-1x fa-eye-slash"></i>&nbsp;
                         <?php
                       }else{
                        ?><i onclick="activarProducto('<?php echo $rowproductos->id; ?>'); return false;" class="fas fa-1x fa-eye"></i>&nbsp;
                        <?php
                       } ?>
                      <!--<i onclick="modificarProducto('<?php echo $rowproductos->id ?>'); return false;" class="fas fa-1x fa-edit"></i>&nbsp;-->
                      <a href="productos_editar.php?id_producto=<?php echo $rowproductos->id ?>"><i class="fas fa-1x fa-edit"></i></a>&nbsp;
                      <i onclick="eliminarProducto('<?php echo $rowproductos->id; ?>'); return false;"  class="fas textoRojo fa-1x fa-trash"></i>
                        </div>
                      </div>
                    </td>
                    <td>
                     <img src="../<?php echo $rowproductos->foto1 ?>" style="max-width: 105px">
                    </td>
                    <td>
                     <?php echo $rowproductos->nombre ?>
                    </td>
                    <td>
                     <?php echo $rowproductos->marca ?>
                    </td>
                    <td>
                      <?php echo $rowproductos->categoria ?>
                    </td>
                    <td style="max-width: 135px !important;  white-space: normal;">
                      <?php echo substr($rowproductos->descripcion,0,30)."...";  ?>
                    </td>
                    <td>
                      <?php echo "<b>Alto</b>: ".$rowproductos->alto." cms<br> <b>Ancho: </b>".$rowproductos->ancho." cms<br><b>Largo</b>: ".$rowproductos->largo." cms<br><b>Peso</b>: ".$rowproductos->peso." kgs" ?>
                    </td>
                    <td>
                      <?php echo $rowproductos->codigo_fabricante ?>
                    </td>
                    <td>
                      Compra: <?php echo $rowproductos->precio_compra ?> <br>
                       Venta: <?php echo $rowproductos->precio_venta ?>
                    </td>
                    <td>
                      <?php echo $rowproductos->impuesto ?>
                    </td>
                    <td>
                      <?php echo $rowproductos->existencia ?>
                    </td>
                    <td>
                      CU: <?php echo $rowproductos->clave_unidad ?> <br>
                      CL: <?php echo $rowproductos->clave_linea ?> <br>
                      CM: <?php echo $rowproductos->clave_marca ?>
                    </td>
                    <td>
                      <b>Max: </b><?php echo $rowproductos->maximo ?> <br>
                      <b>Min: </b><?php echo $rowproductos->minimo ?>
                    </td>
                    
                    <!--<td>
                       <?php 
                      if ($estado=="success") {
                         ?><button onclick="desactivarProducto('<?php echo $rowproductos->id; ?>'); return false;" class="btn-xs btn-info">Desactivar</button><?php
                       }else{
                        ?><button onclick="activarProducto('<?php echo $rowproductos->id; ?>'); return false;" class="btn-xs btn-info">Activar</button><?php
                       } ?>
                      <button onclick="modificarProducto('<?php echo $rowproductos->id ?>'); return false;" class="btn-xs btn-warning">Modificar</button><br>
                      <button onclick="eliminarProducto('<?php echo $rowproductos->id; ?>'); return false;"  class="btn-xs btn-danger">Eliminar</button>
                    </td> -->
                  </tr>
                <?php } ?>
                  
                 
                </tbody>
              </table>
            </div>
          
          </div>
        </div>
      </div>
      <!-- Dark table -->
  <div class="contenedorProductos" id="contenedorProductos">
        <div class="row">
 
 
            <div class="col-12 text-center">
              <br><br>
            <h2 class="text-center">Agregar Nuevo Producto</h2>
            <br>
            </div>
        

            <div class="col-12 col-md-4">
               <form id="formcategoria" class="form-horizontal" enctype="multipart/form-data" method="post"  action="guardar.php" >
                 <div class="form-inputs">
               <input type="hidden" name="nuevoproducto">
                  <input type="text" id="nombre" name="nombre" class="form-control input-lg" placeholder="Nombre producto"> <br>
                   <select name="marca" id="marca" class="form-control">
                    <?php  $marcas = $con->query("SELECT * FROM marcas");
                     while($rowmarcas = $marcas->fetch_object()){ ?> ?>
                    <option value="<?php echo $rowmarcas->marca ?>"><?php echo $rowmarcas->marca ?></option>
                  <?php } ?>
                  </select> <br>
                   <input type="number" step="0.01" id="precio_compra" name="precio_compra" class="form-control input-lg" placeholder="Precio compra"> <br>
                    <input type="number" id="existencia" name="existencia" class="form-control input-lg" placeholder="Existencia"> <br>
                    <input type="number" id="maximo" name="maximo" class="form-control input-lg" placeholder="Máximo"> <br>
                     <input type="text" id="ubicacion_pasillo" name="ubicacion_pasillo" class="form-control input-lg" placeholder="Ubicacion pasillo"> <br>
                      <input type="text" id="valorcfdi" name="valorcfdi" class="form-control input-lg" placeholder="Valor CFDI"> <br>
                       <input type="number" step=".01" id="peso" name="peso" class="form-control input-lg" placeholder="Peso del producto (Kgs)"> 
                       

            </div>
          </div>

            <div class="col-12 col-md-4">
            
              
             

                 <div class="form-inputs">
                 
                  <select name="categoria" class="form-control" onchange="subCategoria(this.value); return false;">
                    <option value="0">Categoría...</option>
                    <?php  $categorias = $con->query("SELECT * FROM categorias");
                     while($rowcategorias = $categorias->fetch_object()){ ?> 
                    <option value="<?php echo $rowcategorias->id ?>"><?php echo $rowcategorias->nombre ?></option>
                  <?php } ?>
                  </select> <br>
                 
                  
                   <input type="number" step="0.01" id="precio_venta" name="precio_venta" class="form-control input-lg" placeholder="Precio venta"> <br>
                  
                   
                   <input type="text" id="clave_unidad" name="clave_unidad" class="form-control input-lg" placeholder="Clave unidad"> <br>
                   
                    <input type="text" id="clave_marca" name="clave_marca" class="form-control input-lg" placeholder="Clave marca"> <br>

                    
                    <input type="number" id="minimo" name="minimo" class="form-control input-lg" placeholder="Mínimo"> <br>

                    
                   
                    <input type="text" id="ubicacion_anaquel" name="ubicacion_anaquel" class="form-control input-lg" placeholder="Ubicacion anaquel"> <br>
                   <input type="number" step=".01" id="ancho" name="ancho" class="form-control input-lg" placeholder="Ancho del producto (cms)"> <br>
                    <input type="number" step=".01" id="largo" name="largo" class="form-control input-lg" placeholder="Largo del producto (cms)"> <br>
                   
                     
               
                   
                  
                


                

                  
                  </div>
                     
                </div>

                <div class="col-12 col-md-4">
                    <div class="selectSubCat">
                      <select class="form-control" name="subcategoria" id="subcategoria">
                        
                          <option value="0">Selecciona categoría</option>
                        
                      </select>
                    </div> <br>
                    <input type="text" id="clave_producto" name="clave_producto" class="form-control input-lg" placeholder="Clave producto"> <br>
                    <input type="text" id="codigo_fabricante" name="codigo_fabricante" class="form-control input-lg" placeholder="Código fabricante"> <br>
                     <input style="max-width:45%; float: left; padding-right: 5px;" type="number" id="impuesto" name="impuesto" class="form-control input-lg" placeholder="Impuesto"> 
                     <input style="max-width:45%; float: left;" type="number" id="iva" name="iva" class="form-control input-lg" placeholder="IVA"> <br><br><br>
                     <input type="text" id="clave_linea" name="clave_linea" class="form-control input-lg" placeholder="Clave linea"> <br>
<input type="text" id="ubicacion_zona" name="ubicacion_zona" class="form-control input-lg" placeholder="Ubicacion zona"> <br>
 <input type="text" id="ubicacion_repisa" name="ubicacion_repisa" class="form-control input-lg" placeholder="Ubicacion repisa"> <br> 
  <input type="number" step=".01" id="alto" name="alto" class="form-control input-lg" placeholder="Alto del producto (cms)"> <br>
  
 




                </div>
                <div class="clearfix"></div>


                <div class="col-12">
                  <textarea class="form-control" name="descripcion" id="" cols="20" rows="2" placeholder="descripcion"></textarea> <br><br>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="">Imagen 1</label> <br>
                       <input type="file" id="multiFiles" name="imagen1" onchange="makeFileList(); return false;" class="center-block"/>

                      
                    </div>
                    <div class="col-md-4">

                                <label for="">Imagen 2</label> <br>
                           <input type="file" id="multiFiles2" name="imagen2" class="center-block"/>
                          
                           <hr>
                                          <div class="alert alert-warning" id="sinImagen" role="alert">
                                            <strong>Atención!</strong> No has seleccionado imágenes
                                          </div>
                                          <div class="alert alert-success contenedorNombreImagen" id="contenedorNombreImagen" role="alert" style="display:none;"><span id="nombreImagen"></span><i class="fas fa-trash" style="float:right; cursor: pointer;" onclick="eliminarImagenProductos(); return false;"></i>
                                          </div>
                      
                    </div>
                    <div class="col-md-4">
                          <label for="">Imagen 3</label> <br>
                          <input type="file" id="multiFiles3" name="imagen3" class="center-block"/>
                    </div>
                  </div>
                </div>

                <br>
                <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Agregar Producto</button>
                
              </form>
                



          </div>

  </div><!-- contenedor prductos -->





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

console.log(id_categoria);





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


          console.log(data);

   

      
           

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


          console.log(data);

   

      
           

            })
            .fail(function(data) {
              alert("Error");

            })

            




      }

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
} );

      $(document).ready( function () {
            $('#example').DataTable({
                 "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
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



  </script>
</body>

</html>