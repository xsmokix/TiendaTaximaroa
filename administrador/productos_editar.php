<?php
session_start();
require_once "seguridad.php"; 
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
  <link href="https://michoacan.gob.mx/productores/css/dropzone.css" rel="stylesheet" type="text/css">
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
    <div class="header bg-gradient-primary pb-8 pt-5">
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

<form id="formcategoria" class="form-horizontal" enctype="multipart/form-data" method="post" action="actualizar.php" >
<div class="row">
  <div class="col-12 text-center">
    <br>
    <br>
    <h2 class="text-center">Modificar Producto</h2>
    <br>
  </div>

  <div class="col-12 col-md-4">
    
      <div class="form-inputs">
         <?php while($rowproductos = $productos->fetch_object()){ ?>
        <input type="hidden" name="modificar_producto" value="1">
        <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
        <label class="label" for="clave_producto">Clave producto</label><br>
        <input type="text" id="clave_producto" name="clave_producto" class="form-control input-lg" value="<?php echo $rowproductos->clave_producto ?>"><br>
        <label class="label" for="">Categoría</label><br>
        <select name="categoria" id="" class="form-control" onchange="subCategoria(this.value); return false;">
          <?php  $categorias = $con->query("SELECT * FROM categorias"); while($rowcategorias = $categorias->fetch_object()){ ?>
          <option value="<?php echo $rowcategorias->id ?>" <?php if($rowproductos->categoria==$rowcategorias->id){echo "selected";} ?>><?php echo $rowcategorias->nombre ?></option>
          <?php } ?>
        </select>
        <br>
        <label class="label" for="">Precio compra</label><br>
        <input type="text" id="precio_compra" name="precio_compra" class="form-control input-lg" value="<?php echo $rowproductos->precio_compra ?>"><br>
        <label class="label" for="">Valor CFDI</label><br>
        <input type="text" id="valorcfdi" name="valorcfdi" class="form-control input-lg" value="<?php echo $rowproductos->valorcfdi ?>"><br>
        <label class="label" for="">Existencia</label><br>
        <input type="text" id="existencia" name="existencia" class="form-control input-lg" value="<?php echo $rowproductos->existencia ?>"><br>
        <label class="label" for="">Ancho</label><br>
        <input type="text" id="ancho" name="ancho" class="form-control input-lg" value="<?php echo $rowproductos->ancho ?>"><br>
         <label class="label" for="">Peso</label><br>
        <input type="text" id="peso" name="peso" class="form-control input-lg" value="<?php echo $rowproductos->peso ?>"><br>
        <label class="label" for="">Ubicación repisa</label><br>
      <input type="text" id="ubicacion_repisa" name="ubicacion_repisa" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_repisa ?>"><br>

      </div>
    </div>


    <div class="col-12 col-md-4">
      <div class="form-inputs">

        <label class="label" for="">Nombre producto</label><br>
        <input type="text" id="nombre" name="nombre" class="form-control input-lg" value="<?php echo $rowproductos->nombre ?>"><br>
        <label class="label" for="">Subcategoría</label><br>
      <select class="form-control" name="submenu" id="submenu">
         <?php  $submenu = $con->query("SELECT * FROM submenu WHERE idmenu = $rowproductos->categoria");
                     while($rowsubmenu = $submenu->fetch_object()){ ?>
                    <option value="<?php echo $rowsubmenu->id; ?>" <?php if($rowsubmenu->id==$rowproductos->submenu){ echo 'selected';}  ?>><?php echo $rowsubmenu->nombre; ?></option>
                  <?php } ?>
      </select> <br>
        <label class="label" for="">Precio venta</label><br>
        <input type="text" id="precio_venta" name="precio_venta" class="form-control input-lg" value="<?php echo $rowproductos->precio_venta ?>"><br>
        <label class="label" for="Disponibilidad de envío">Disponibilidad de envío</label>
                       <select name="tipo_envio" class="form-control">
                        <option value="taximaroa" <?php if($rowproductos->tipo_envio=="taximaroa"){echo "selected";} ?>>Solo envío local por Taximaroa</option>
                        <option value="paqueteria" <?php if($rowproductos->tipo_envio=="paqueteria"){echo "selected";} ?>>Envío por paquetería</option>
                        <option value="paqtax" <?php if($rowproductos->tipo_envio=="paqtax"){echo "selected";} ?>>Envío por paquetería y/o Taximaroa</option>
                      </select><br>
        <label class="label" for="">Mínimo</label><br>
        <input type="text" id="minimo" name="minimo" class="form-control input-lg" value="<?php echo $rowproductos->minimo ?>"><br>
        <label class="label" for="">Alto</label><br>
        <input type="text" id="alto" name="alto" class="form-control input-lg" value="<?php echo $rowproductos->alto ?>"><br>
         <label class="label" for="">Ubicación zona</label><br>
      <input type="text" id="ubicacion_zona" name="ubicacion_zona" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_zona ?>"><br>
      <label class="label" for="">Ubicación pasillo</label><br>
        <input type="text" id="ubicacion_pasillo" name="ubicacion_pasillo" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_pasillo ?>"><br>
        <br>
        <div class="alert alert-success" id="nombreImagen" role="alert" style="display: none;">
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
    
        <label class="label" for="">Código fabricante</label><br>
        <input type="text" id="codigo_fabricante" name="codigo_fabricante" class="form-control input-lg" value="<?php echo $rowproductos->codigo_fabricante ?>"><br>
        <label class="label" for="">Unidad</label><br>
        <select class="form-control" name="clave_unidad" id="clave_unidad">
         <?php  $unidad = $con->query("SELECT * FROM unidad");
          while($rowunidad = $unidad->fetch_object()){ ?>
          <option value="<?php echo $rowunidad->nombre; ?>" <?php if($rowproductos->clave_unidad==$rowproductos->nombre){ echo 'selected';}  ?>><?php echo $rowunidad->clave ." (".$rowunidad->nombre; ?>)</option>
          <?php } ?>
        </select> <br>
        <label class="label" for="">IVA</label><br>
        <input type="text" id="IVA" name="IVA" class="form-control input-lg" value="<?php echo $rowproductos->IVA ?>"><br>
        <label class="label" for="">Marca</label><br>
        <select name="marca" id="marca" class="form-control">
            <?php  $marcas = $con->query("SELECT * FROM marcas");
            while($rowmarcas = $marcas->fetch_object()){ ?>
            <option value="<?php echo $rowmarcas->marca; ?>" <?php if($rowproductos->marca==$rowmarcas->marca){ echo 'selected';}  ?>><?php echo $rowmarcas->marca; ?></option>
          <?php } ?>
        </select> <br>
        <label class="label" for="">Máximo</label><br>
        <input type="text" id="maximo" name="maximo" class="form-control input-lg" value="<?php echo $rowproductos->maximo ?>"><br>
        <label class="label" for="">Largo</label><br>
        <input type="text" id="largo" name="largo" class="form-control input-lg" value="<?php echo $rowproductos->largo ?>"><br>
        <label class="label" for="">Ubicación anaquel</label><br>
        <input type="text" id="ubicacion_anaquel" name="ubicacion_anaquel" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_anaquel ?>"><br>
        <label class="label" for="Descuento">Descuento</label>
        <input type="text" id="descuento" name="descuento" class="form-control input-lg" value="<?php echo $rowproductos->descuento ?>"> <br>



      <!-- escondidos -->
      <input type="hidden" id="impuesto" name="impuesto" class="form-control input-lg" value="<?php echo $rowproductos->impuesto ?>">
      <input type="hidden" id="clave_linea" name="clave_linea" class="form-control input-lg" value="<?php echo $rowproductos->clave_linea ?>">
      <input type="hidden" id="clave_marca" name="clave_marca" class="form-control input-lg" value="<?php echo $rowproductos->clave_marca ?>">
     <!-- escondidos -->
      
    
      <br>
    </div>
    <div class="col-12">
      <label class="label" for="">Descripción Corta</label><br>
      <textarea class="form-control" name="descripcion_corta" id="" cols="50" rows="5"><?php echo $rowproductos->descripcion_corta ?></textarea>
      <br>
    </div>
    <div class="col-12">
      <label class="label" for="">Descripción</label><br>
      <textarea class="form-control" name="descripcion" id="" cols="50" rows="5"><?php echo $rowproductos->descripcion ?></textarea>
      <br>
    </div>
    <br>
 
    <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Actualizar Producto</button>

</div>

</form>
<br>
<hr>
<br>
<div class="row">


  <div class="col-md-12 text-center">
                <div style="display: flex;align-items: center; justify-content: center;">

                              <?php 
                 function is_dir_empty($dir) {
      if (!is_readable($dir)) return null; 
        return (count(scandir($dir)) == 2);
      }

  $dir = "../assets/images/productos/".$id_producto."/";
    if (!is_dir_empty($dir)) {

        $all_files = glob("../assets/images/productos/".$id_producto."/*.*");
      for ($i=0; $i<count($all_files); $i++){
        $image_name = $all_files[$i];
        
        echo '<img src="'.$image_name.'" class="d-block" alt="'.$image_name.'" style="max-height: 150px; mix-blend-mode:multiply;   text-align: center; margin:0 auto; padding:20px 45px;">';
        echo '<a href="eliminar_foto.php?eliminar_foto='.$image_name.'&id_producto='.$id_producto.'" return false;" class="fa-2x ni ni-fat-remove text-orange"></a>';
      }
    }
      ?>
                

</div><!-- //flex -->
              </div>






<div class="col-md-4"></div>
<div class="col-md-12 text-center">



<?php 

$filename = '../assets/images/productos/fichatecnica/'.$id_producto.'.pdf';

if (file_exists($filename)) {

    $pdf = "<a class='btn-xs btn-success' style='padding: 2px 5px;' href='../assets/images/productos/fichatecnica/".$id_producto.".pdf' target='_blank'>Ver PDF</a>&nbsp;<a class='btn-xs btn-danger' style='padding: 2px 5px; color: white;' onclick='eliminarFichaTecnica($id_producto); return false'>Eliminar PDF</a>";
} else {
    $pdf = "";

}

 ?>

</div>
<div class="col-md-12">
   <div class="col-12">

                <div class="card_box box_shadow position-relative mb_30">
                    <div class="white_box_tittle">
                        <div class="main-title2">
                          <br><br>
                        <h2 class="card-subtitle mb-2">Sube aquí las imágenes del producto <small></small></h2>
                        </div>
                    </div>


                    <div class='content'>
                      <form action="guardar_imagenes.php?id=<?php echo $id_producto ?>" class="dropzone" id="dropzonewidget">
                      <div class="dz-message" data-dz-message><span style="color: #4A001F;">Arrastra aquí tus archivos o da clic aquí</span></div>

                          
                      </form>  
                    </div> 
                    
                </div>
          
        </div>
         <div class="col-12 text-center">
                <hr>


              <a href="productos_editar.php?id_producto=<?php echo $id_producto ?>"  class="btn btn-success" >Guardar imágenes</a>
        </div> 
</div>

<div class="col-md-12">
  <hr>
</div>

<div class="col-md-4"></div>
<div class="col-md-4">
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
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
              $("#submenu").empty();
              $("#submenu").append(data);


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