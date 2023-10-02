<?php
session_start();
//$_POST['modificar_producto']=3;
if(!isset($_GET['id_producto'])){
  die();
  exit();

}else{
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
   //$productos = $con->query("SELECT * FROM productos");
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





<?php
 echo $id_producto = $_GET['id_producto'];
require_once "db.php";
   $productos = $con->query("SELECT * FROM productos WHERE id = $id_producto");
    ?>

<div class="row">
  <div class="col-12 text-center">
    <br>
    <br>
    <h2 class="text-center">Modificar Producto</h2>
    <br>
  </div>
  <div class="col-12 col-md-4">
    <form id="formcategoria" class="form-horizontal" enctype="multipart/form-data" method="post" action="actualizar.php">
      <div class="form-inputs">
         <?php while($rowproductos = $productos->fetch_object()){ ?>
        <input type="hidden" name="modificar_producto" value="1">
        <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
        <label for="">Nombre producto</label><br>
        <input type="text" id="nombre" name="nombre" class="form-control input-lg" value=" <?php echo $rowproductos->nombre ?>"><br>
        <label for="">Marca</label><br>
        <!-- <input type="text" id="marca" name="marca" class="form-control input-lg" value=" <?php echo $rowproductos->marca ?>"><br> -->
        <select name="marca" id="marca" class="form-control">
                    <?php  $marcas = $con->query("SELECT * FROM marcas");
                     while($rowmarcas = $marcas->fetch_object()){ ?>
                    <option value="<?php echo $rowmarcas->marca; ?>" <?php if($rowproductos->marca==$rowmarcas->marca){ echo 'selected';}  ?>><?php echo $rowmarcas->marca; ?></option>
                  <?php } ?>
                  </select> <br>
        <label for="">Precio compra</label><br>
        <input type="text" id="precio_compra" name="precio_compra" class="form-control input-lg" value=" <?php echo $rowproductos->precio_compra ?>"><br>
        <label for="">Existencia</label><br>
        <input type="text" id="existencia" name="existencia" class="form-control input-lg" value=" <?php echo $rowproductos->existencia ?>"><br>
        <label for="">Máximo</label><br>
        <input type="text" id="maximo" name="maximo" class="form-control input-lg" value=" <?php echo $rowproductos->maximo ?>"><br>
        <label for="">Ubicación pasillo</label><br>
        <input type="text" id="ubicacion_pasillo" name="ubicacion_pasillo" class="form-control input-lg" value=" <?php echo $rowproductos->ubicacion_pasillo ?>"><br>
        <label for="">Valor CFDI</label><br>
        <input type="text" id="valorcfdi" name="valorcfdi" class="form-control input-lg" value=" <?php echo $rowproductos->valorcfdi ?>"><br>
        <label for="">Ancho</label><br>
        <input type="text" id="ancho" name="ancho" class="form-control input-lg" value=" <?php echo $rowproductos->ancho ?>"><br>
        <label for="">Peso</label><br>
        <input type="text" id="peso" name="peso" class="form-control input-lg" value=" <?php echo $rowproductos->peso ?>"><br>
  
        <!--<img src="<?php echo $rowproductos->foto1 ?>" style="max-width: 100px;" alt=""> <i class="fa-2x ni ni-fat-remove text-orange"></i> <br>
        <?php /*if ($rowproductos->foto1=="") {
          $display = "style='display:block;'"; }else{ $display = "style='display:none;'"; } ?>
        <input type="file" id="multiFiles" name="imagen1" onchange="makeFileList(); return false;" class="center-block" <?php echo $display; */ ?>/ > -->
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-inputs">
        <label for="">Categoría</label><br>
        <select name="categoria" id="" class="form-control" onchange="subCategoria(this.value); return false;">
          <?php  $categorias = $con->query("SELECT * FROM categorias"); while($rowcategorias = $categorias->fetch_object()){ ?>
          <option value="<?php echo $rowcategorias->id ?>"><?php echo $rowcategorias->nombre ?></option>
          <?php } ?>
        </select>
        <br>
        <label for="">Precio venta</label><br>
        <input type="text" id="precio_venta" name="precio_venta" class="form-control input-lg" value=" <?php echo $rowproductos->precio_venta ?>"><br>
        <label for="">Clave unidad</label><br>
        <input type="text" id="clave_unidad" name="clave_unidad" class="form-control input-lg" value=" <?php echo $rowproductos->clave_unidad ?>"><br>
        <label for="">Clave marca</label><br>
        <input type="text" id="clave_marca" name="clave_marca" class="form-control input-lg" value=" <?php echo $rowproductos->clave_marca ?>"><br>
        <label for="">Mínimo</label><br>
        <input type="text" id="minimo" name="minimo" class="form-control input-lg" value=" <?php echo $rowproductos->minimo ?>"><br>
        <label for="">Ubicación anaquel</label><br>
        <input type="text" id="ubicacion_anaquel" name="ubicacion_anaquel" class="form-control input-lg" value=" <?php echo $rowproductos->ubicacion_anaquel ?>"><br>
        <label for="">Clave_producto</label><br>
        <input type="text" id="clave_producto" name="clave_producto" class="form-control input-lg" value=" <?php echo $rowproductos->clave_producto ?>"><br>
        <label for="">Alto</label><br>
        <input type="text" id="alto" name="alto" class="form-control input-lg" value=" <?php echo $rowproductos->alto ?>"><br>
        <label for="">Largo</label><br>
        <input type="text" id="largo" name="largo" class="form-control input-lg" value=" <?php echo $rowproductos->largo ?>"><br>
        <br>
        <br>
       
        
        <div class="alert alert-success" id="nombreImagen" role="alert" style="display: none;">
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <label for="">Submenu</label><br>
      <select class="form-control" name="subcategoria" id="subcategoria">
         <?php  $submenu = $con->query("SELECT * FROM submenu WHERE idmenu = $rowproductos->categoria");
                     while($rowsubmenu = $submenu->fetch_object()){ ?>
                    <option value="<?php echo $rowsubmenu->id; ?>" <?php if($rowsubmenu->id==$rowproductos->submenu){ echo 'selected';}  ?>><?php echo $rowsubmenu->nombre; ?></option>
                  <?php } ?>
                 
      </select> <br>
      
      <label for="">Código fabricante</label><br>
      <input type="text" id="codigo_fabricante" name="codigo_fabricante" class="form-control input-lg" value="<?php echo $rowproductos->codigo_fabricante ?>"><br>
      <label for="">IVA</label><br>
      <input type="text" id="IVA" name="IVA" class="form-control input-lg" value="<?php echo $rowproductos->IVA ?>"><br>
      <label for="">Impuesto</label><br>
      <input type="text" id="impuesto" name="impuesto" class="form-control input-lg" value="<?php echo $rowproductos->impuesto ?>"><br>
      <label for="">Clave linea</label><br>
      <input type="text" id="clave_linea" name="clave_linea" class="form-control input-lg" value="<?php echo $rowproductos->clave_linea ?>"><br>
      <label for="">Ubicación zona</label><br>
      <input type="text" id="ubicacion_zona" name="ubicacion_zona" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_zona ?>"><br>
      <label for="">Ubicación repisa</label><br>
      <input type="text" id="ubicacion_repisa" name="ubicacion_repisa" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_repisa ?>"><br>
      <label for="">Deescripción</label><br>
      <textarea class="form-control" name="descripcion" id="" cols="20" rows="2"><?php echo $rowproductos->descripcion ?></textarea><br>
      
    
      <br>
      <br>
      <!-- <label for="">Imagen 3</label><br>
     <img src="<?php /* echo $rowproductos->foto3 ?>" style="max-width: 100px;" alt=""><i class="fa-2x ni ni-fat-remove text-orange"></i><br>
      <?php if ($rowproductos->foto3=="") {
          $display = "style='display:block;'"; }else{ $display = "style='display:none;'"; } ?>
      <input type="file" id="multiFiles3" name="imagen3" class="center-block" <?php echo $display; */ ?>/ > -->
    </div>
    <br>
 
    <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Actualizar Producto</button>
  </form>
</div>
<br>
<hr>
<br>
<div class="row">
<div class="col-md-4">
   <label for="">Imagen 1</label><br>
        
         <?php if ($rowproductos->foto1=="") {
          $display = "style='display:block;'"; ?>
          <form action="actualizar.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
          <input type="hidden" name="actualizarimagen1" value="1">
          <input type="hidden" name="codigo_fabricante" value="<?php echo $rowproductos->codigo_fabricante ?>">
        <input type="file" name="imagen1" class="center-block" <?php echo $display; ?>/ > <br>
        <button type="submit" class="btn btn-success btn-xs mb15" >Actualizar Foto</button>
       </form>
       <?php
           }else{ $display = "style='display:none;'";
           ?>
           <img src="../<?php echo $rowproductos->foto1 ?>" style="max-width: 100px;" alt=""><i onclick="eliminarFoto('1','<?php echo $rowproductos->id ?>'); return false;" class="fa-2x ni ni-fat-remove text-orange"></i><br>
           <?php } ?>
        
        <hr>
</div>

<div class="col-md-4">
   <label for="">Imagen 2</label><br>
        
         <?php if ($rowproductos->foto2=="") {
          $display = "style='display:block;'"; ?>
          <form enctype="multipart/form-data" method="post"  action="actualizar.php" >
          <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
          <input type="hidden" name="actualizarimagen2" value="1">
          <input type="hidden" name="codigo_fabricante" value="<?php echo $rowproductos->codigo_fabricante ?>">
        <input type="file" name="imagen2" class="center-block" <?php echo $display; ?>/ > <br>
        <button type="submit" class="btn btn-success btn-xs mb15" >Actualizar Foto</button>
       </form>
       <?php
           }else{ $display = "style='display:none;'";
           ?>
           <img src="../<?php echo $rowproductos->foto2 ?>" style="max-width: 100px;" alt=""><i onclick="eliminarFoto('2','<?php echo $rowproductos->id ?>'); return false;" class="fa-2x ni ni-fat-remove text-orange"></i><br>
           <?php } ?>
        
        <hr>
</div>

<div class="col-md-4">
   <label for="">Imagen 3</label><br>
        
         <?php if ($rowproductos->foto3=="") {
          $display = "style='display:block;'"; ?>
          <form action="actualizar.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
          <input type="hidden" name="actualizarimagen3" value="1">
          <input type="hidden" name="codigo_fabricante" value="<?php echo $rowproductos->codigo_fabricante ?>">
        <input type="file" name="imagen3" class="center-block" <?php echo $display; ?>/ > <br>
        <button type="submit" class="btn btn-success btn-xs mb15" >Actualizar Foto</button>
       </form>
       <?php
           }else{ $display = "style='display:none;'";
           ?>
           <img src="../<?php echo $rowproductos->foto3 ?>" style="max-width: 100px;" alt=""><i onclick="eliminarFoto('3','<?php echo $rowproductos->id ?>'); return false;" class="fa-2x ni ni-fat-remove text-orange"></i><br>
           <?php } ?>
        
        <hr>
</div>
<div class="col-md-4"></div>
<div class="col-md-4 text-center">



<?php 

$filename = '../assets/images/productos/fichatecnica/'.$id_producto.'.pdf';

if (file_exists($filename)) {

    $pdf = "<a class='btn-xs btn-success' style='padding: 2px 5px;' href='../assets/images/productos/fichatecnica/".$id_producto.".pdf' target='_blank'>Ver PDF</a>&nbsp;<a class='btn-xs btn-danger' style='padding: 2px 5px; color: white;' onclick='eliminarFichaTecnica($id_producto); return false'>Eliminar PDF</a>";
} else {
    $pdf = "";

}

 ?>



  <h3>Ficha técnica <h3>

      <div class="contenedorFichaT">
        <?php echo $pdf ?>   
      
      </div>
  <hr>
  <form action="actualizar.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
          <input type="hidden" name="fichatecnica" value="1">
          <input type="file" name="fichatecnicapdf"> <br><br>
          
          <button type="submit" class="btn btn-success btn-xs mb15" >Actualizar/incluir PDF</button>
       </form>
</div>
</div>





   <?php } ?>


    

  </div><!-- contenedor prductos -->





      <!-- Footer -->
      <?php require_once "footer.php" ?>
     








  </div><!-- main content -->
  <!--   Core   -->
  <script src="js/init.js"></script>
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

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


//eliminar pdf
      function eliminarFichaTecnica(id_producto){


         $.ajax(
          {
            url : 'eliminar.php',
            type: "POST",
            data : {eliminar_fichat: "1",id_producto:id_producto},
            dataType: 'html',
          })
            .done(function(data) {
              $(".contenedorFichaT").empty();


          console.log(data);

           swal({
                 title: 'Ficha técnica',
                  text: 'eliminada ',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              })

            })
            .fail(function(data) {
              alert("Error");

            })

            




      }


      //evitar que se mande el form con enter
      $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
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


  </script>
</body>
</html>

<?php } ?>