<?php 
session_start();
//$_POST['modificar_producto']=3;


  require_once "db.php";

//$ordenar =  $_POST['ordenar'];
$filtromarca =  $_POST['filtromarca'];

if (isset($_SESSION['ciudad'])) {

    if ($_SESSION['ciudad']=="Morelia") {

      // menor mayor alfabetico

            //"hay ciudad Morelia";

              if (isset($_POST['ordenar'])) {

                if ($filtromarca=="todas") {

                    if ($_POST['ordenar']=="menor") {
                    $productos = $con->query("SELECT * FROM productos ORDER BY precio_venta ASC");
                  }elseif($_POST['ordenar']=="mayor") {
                    $productos = $con->query("SELECT * FROM productos ORDER BY precio_venta DESC");
                  }else{
                    $productos = $con->query("SELECT * FROM productos ORDER BY nombre ASC");
                  }


                }else{

                  if ($_POST['ordenar']=="menor") {
                    $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' ORDER BY precio_venta ASC");
                  }elseif($_POST['ordenar']=="mayor") {
                    $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' ORDER BY precio_venta DESC");
                  }else{
                    $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' ORDER BY nombre ASC");
                  }

                }

              }else{
                $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."'");
              }
  
    }else{

              // "hay otra ciudad";

              if (isset($_POST['ordenar'])) {
                  if ($filtromarca=="todas") {
                        if ($_POST['ordenar']=="menor") {
                          echo "menor";
                          $productos = $con->query("SELECT * FROM productos WHERE (tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax') ORDER BY precio_venta ASC");
                        }elseif($_POST['ordenar']=="mayor") {
                          echo "mayor";
                          $productos = $con->query("SELECT * FROM productos WHERE (tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax') ORDER BY precio_venta DESC");
                        }else{
                          echo "alfabetico";
                          $productos = $con->query("SELECT * FROM productos WHERE (tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax') ORDER BY nombre ASC");
                        }

                    }else{


                       if ($_POST['ordenar']=="menor") {
                          echo "menor";
                          $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' AND (tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax') ORDER BY precio_venta ASC");
                        }elseif($_POST['ordenar']=="mayor") {
                          echo "mayor";
                          $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' AND (tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax') ORDER BY precio_venta DESC");
                        }else{
                          echo "alfabetico";
                          $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' AND (tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax') ORDER BY nombre ASC");
                        }


                    }






                
              }else{
                // "todos otra ciudad";
                $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' AND (tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax')");
              }

              

    }//else




}else{

//NO HAY SESSIÓN CON CIUDAD

   if (isset($_POST['ordenar'])) {

                if ($filtromarca=="todas") {

                    if ($_POST['ordenar']=="menor") {
                    $productos = $con->query("SELECT * FROM productos ORDER BY precio_venta ASC");
                  }elseif($_POST['ordenar']=="mayor") {
                    $productos = $con->query("SELECT * FROM productos ORDER BY precio_venta DESC");
                  }else{
                    $productos = $con->query("SELECT * FROM productos ORDER BY nombre ASC");
                  }


                }else{

                  if ($_POST['ordenar']=="menor") {
                    $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' ORDER BY precio_venta ASC");
                  }elseif($_POST['ordenar']=="mayor") {
                    $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' ORDER BY precio_venta DESC");
                  }else{
                    $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."' ORDER BY nombre ASC");
                  }

                }

              }else{
                $productos = $con->query("SELECT * FROM productos WHERE marca = '".$filtromarca."'");
              }



}//else


$totalProductosFiltrados = mysqli_num_rows($productos); 
  
?>



<!-- content -->
          <div class="col" class="contenedorTienda">
            <input type="hidden" id="totalProductosFiltrados" value="<?php echo $totalProductosFiltrados ?>">
            <div class="row gutter-2 gutter-lg-3">

               <?php while($rowproductos = $productos->fetch_object()){ ?>

                <div class="col-6 col-lg-3 productoIndividual <?php echo $rowproductos->marca ?> <?php echo $rowproductos->tipo_envio ?>">
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

                      <div class="row">
                        <div class="col-md-3 col-12">
                           <span>$<?php echo $rowproductos->precio_venta ?></span>
                        </div>
                        <div class="col-md-9 col-12">
                      <form action="" method="POST">
                        <input type="hidden" name="id_producto" id="id_producto<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $id_del_producto = $rowproductos->id ?>">
                        <input type="hidden" name="nombre" id="nombre<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $nombre_del_producto = $rowproductos->nombre ?>">
                        <input type="hidden" name="precio_venta" id="precio_venta<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $rowproductos->precio_venta ?>">
                        <input type="hidden" name="cantidad" id="cantidad<?php echo $id_del_producto = $rowproductos->id ?>" value="1">
                        <button name="btnAccion" value="Agregar" type="submit" href="#" class="btnAgregarAlCarrito">Agregar al Carrito</button>
                        <br><br>
                      </form>
                        </div>
                      </div>
                  </div>
                  </div>


                </div>
              </div>
            <?php } ?>






            </div>
          
          </div>



