<?php 
//$_POST['modificar_producto']=3;
if(isset($_POST['precio'])){

  require_once "db.php";


  $precio =  $_POST['precio'];
    $marcaSel =  $_POST['marcaSel'];


  if (empty($marcaSel)) {
    $productos = $con->query("SELECT * FROM productos WHERE precio_venta >= ".$_POST['precio']." ORDER BY precio_venta ASC");
  }else{
    $productos = $con->query("SELECT * FROM productos WHERE precio_venta >= ".$_POST['precio']." AND marca='".$marcaSel."' ORDER BY precio_venta ASC");
  }


   


  $totalProductosFiltrados = mysqli_num_rows($productos); 




  
    ?>



<!-- content -->
          <div class="col" class="contenedorTienda">
            <input type="hidden" id="totalProductosFiltrados" value="<?php echo $totalProductosFiltrados ?>">
            <div class="row gutter-2 gutter-lg-3">

               <?php while($rowproductos = $productos->fetch_object()){ ?>

                <div class="col-6 col-lg-3 productoIndividual <?php echo $rowproductos->marca ?>">
                <div class="product">
                  <figure class="product-image">
                    <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>">
                      <?php if ($rowproductos->foto1=="") {
                       ?><img style="min-width: 100%;" src="assets/images/productos/trans.png" alt="Image"><?php
                      }else{ ?>
                     <img style="min-width: 100%;" src="<?php echo $rowproductos->foto1 ?>" alt="Image">
                    <?php } ?>
                      <?php if ($rowproductos->foto2=="") {
                       ?><img style="min-width: 100%;" src="assets/images/productos/trans.png" alt="Image"><?php
                      }else{ ?>
                      <img style="min-width: 100%;" src="<?php echo $rowproductos->foto2 ?>" alt="Image">
                    <?php } ?>
                    </a>
                  </figure>
                  <div class="product-meta">
                    <h3 class="product-title"><a href=""><?php echo $rowproductos->nombre ?> </a></h3>
                    <div class="product-price">
                      <span>$<?php echo $rowproductos->precio_venta ?></span>
                      <span class="product-action">
                        <a href="">Agregar al carrito</a>
                      </span>
                    </div>
                  
                  </div>
                </div>
              </div>
            <?php } ?>






            </div>
          
          </div>





<?php }else if(isset($_POST['submenu'])){


$submenu = $_POST['submenu'];

require_once "db.php";
   $productos = $con->query("SELECT * FROM productos WHERE subcategoria = $submenu");
    ?>



<!-- content -->
          <div class="col" class="contenedorTienda">
            <div class="row gutter-2 gutter-lg-3">

               <?php while($rowproductos = $productos->fetch_object()){ ?>

                <div class="col-6 col-lg-4 productoIndividual <?php echo $rowproductos->marca ?>">
                <div class="product">
                  <figure class="product-image">
                    <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>">
                      <?php if ($rowproductos->foto1=="") {
                       ?><img style="min-width: 100%;" src="assets/images/productos/trans.png" alt="Image"><?php
                      }else{ ?>
                     <img style="min-width: 100%;" src="<?php echo $rowproductos->foto1 ?>" alt="Image">
                    <?php } ?>
                      <?php if ($rowproductos->foto2=="") {
                       ?><img style="min-width: 100%;" src="assets/images/productos/trans.png" alt="Image"><?php
                      }else{ ?>
                      <img style="min-width: 100%;" src="<?php echo $rowproductos->foto2 ?>" alt="Image">
                    <?php } ?>
                    </a>
                  </figure>
                  <div class="product-meta">
                    <h3 class="product-title"><a href=""><?php echo $rowproductos->nombre ?> </a></h3>
                    <div class="product-price">
                      <span>$<?php echo $rowproductos->precio_venta ?></span>
                      <span class="product-action">
                        <a href="">Agregar al carrito</a>
                      </span>
                    </div>
                  
                  </div>
                </div>
              </div>
            <?php } ?>






            </div>
           
          </div>





<?php }else{
  die();
  exit();

}?>