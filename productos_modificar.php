<?php 
//$_POST['modificar_producto']=3;
if(!isset($_POST['modificar_producto'])){
  die();
  exit();

}else{
 echo $id_producto = $_POST['id_producto'];
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
    <form id="formcategoria" class="form-horizontal" enctype="multipart/form-data" method="post" action="guardar.php">
      <div class="form-inputs">
         <?php while($rowproductos = $productos->fetch_object()){ ?>
        <input type="hidden" name="modificar_producto">
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
        <label for="">Imagen 1</label><br>
        <img src="<?php echo $rowproductos->foto1 ?>" style="max-width: 100px;" alt=""> <i class="fa-2x ni ni-fat-remove text-orange"></i> <br>
        <?php if ($rowproductos->foto1=="") {
          $display = "style='display:block;'"; }else{ $display = "style='display:none;'"; } ?>
        <input type="file" id="multiFiles" name="imagen1" onchange="makeFileList(); return false;" class="center-block" <?php echo $display; ?>/ >
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="form-inputs">
        <label for="">Categoría</label><br>
        <select name="categoria" id="" class="form-control">
          <?php  $categorias = $con->query("SELECT * FROM categorias"); while($rowcategorias = $categorias->fetch_object()){ ?> ?>
          <option value="<?php echo $rowcategorias->id ?>"><?php echo $rowcategorias->
          nombre ?></option>
          <option value=""></option>
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
        <br>
        <br>
        <br>
        <label for="">Imagen 2</label><br>
        <img src="<?php echo $rowproductos->foto2 ?>" style="max-width: 100px;" alt=""><i onclick="eliminarFoto('2','<?php echo $rowproductos->id ?>'); return false'; return false;" class="fa-2x ni ni-fat-remove text-orange"></i><br>
         <?php if ($rowproductos->foto2=="") {
          $display = "style='display:block;'"; }else{ $display = "style='display:none;'"; } ?>
        <input type="file" id="multiFiles2" name="imagen2" class="center-block" <?php echo $display; ?>/ >
        <hr>
        <div class="alert alert-warning" id="sinImagen" role="alert">
          <strong>Atención!</strong> No has seleccionado imágenes
        </div>
        <div class="alert alert-success" id="nombreImagen" role="alert" style="display: none;">
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <label for="">Drescipción</label><br>
      <textarea class="form-control" name="descripcion" id="" cols="20" rows="2"><?php echo $rowproductos->descripcion ?></textarea><br>
      <label for="">Código fabrincante</label><br>
      <input type="text" id="codigo_fabricante" name="codigo_fabricante" class="form-control input-lg" value="<?php echo $rowproductos->codigo_fabricante ?>"><br>
      <label for="">Impuesto</label><br>
      <input type="text" id="impuesto" name="impuesto" class="form-control input-lg" value="<?php echo $rowproductos->impuesto ?>"><br>
      <label for="">Clave linea</label><br>
      <input type="text" id="clave_linea" name="clave_linea" class="form-control input-lg" value="<?php echo $rowproductos->clave_linea ?>"><br>
      <label for="">Ubicación zona</label><br>
      <input type="text" id="ubicacion_zona" name="ubicacion_zona" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_zona ?>"><br>
      <label for="">Ubicación repisa</label><br>
      <input type="text" id="ubicacion_repisa" name="ubicacion_repisa" class="form-control input-lg" value="<?php echo $rowproductos->ubicacion_repisa ?>"><br>
    
      <br>
      <br>
      <label for="">Imagen 3</label><br>
     <img src="<?php echo $rowproductos->foto3 ?>" style="max-width: 100px;" alt=""><i class="fa-2x ni ni-fat-remove text-orange"></i><br>
      <?php if ($rowproductos->foto3=="") {
          $display = "style='display:block;'"; }else{ $display = "style='display:none;'"; } ?>
      <input type="file" id="multiFiles3" name="imagen3" class="center-block" <?php echo $display; ?>/ >
    </div>
    <br>
    <?php } ?>
    <button type="submit" class="btn btn-success btn-block btn-lg mb15" type="button" id="guardarCategoria">Actualizar Producto</button>
  </form>
</div>

<?php } ?>