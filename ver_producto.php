<?php 
//include "carrito.php";
include "cabecera.php";
if (isset($_SESSION['nombre'])) {
  $username = $_SESSION['nombre'];
}else{
  $username = "Invitado";
}
if (isset($_SESSION['ciudad'])) {
 if($_SESSION['ciudad']=="Morelia"){
      $tipo_envio = "taximaroa";
    }else{
      $tipo_envio = "paqueteria";
    }
}

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


     require_once "db.php";

     $id_producto = $_GET['id_producto'];
      $productos = $con->query("SELECT p.*, c.id AS id_categoria, c.nombre as nombre_categoria FROM productos p, categorias c WHERE p.categoria=c.id AND p.id = '$id_producto'");
 
  $promociones = $con->query("SELECT * FROM promociones");

 if (isset($_SESSION['idcliente'])) {

  $clientes = $con->query("SELECT dc.id, dc.nombreCompleto, dc.correo FROM datos_clientes dc WHERE dc.id ='".$_SESSION['idcliente']."';");
                                            $rowClientes = $clientes->fetch_object();
   
 }

  
 ?>


     <?php while($rowproductos = $productos->fetch_object()){ ?>

<br><br><br>
    <?php 
      //incluimos los breadcrumbs
  $nombreBreadcrumb = $rowproductos->nombre;
?>

    <section class="hero hero-small">
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <!-- <h1 class="mb-0">Tienda virtual</h1> -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="http://localhost/ferreteriataximaroa.com/ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas">Productos</a></li>
                <li class="breadcrumb-item"><?php echo $nombreBreadcrumb; ?></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

<?php /* if ($mensaje!="") { ?>

      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-success productoAgregadoAlCarrito">
              Producto agregado al carrito <a href="mostrarCarrito.php" class="badge badge-warnig">Ver carrito</a><?php //echo $mensaje ?>
            </div>
          </div>
        </div>
      </div>

<?php } */ ?>



    <!-- product -->
    <section class="hero bg-light pt-5">
      <div class="container">
        <div class="row gutter-2 gutter-md-4 justify-content-between">




<div class="col-lg-7">

   

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<style>
  .carousel {
  position: relative;
}
.carousel-item img {
  /* object-fit: cover; */
  margin: 0 auto;
  max-height: 460px;
  width: auto;
}

#carousel-thumbs {
  background: #fff;
  padding: 0 50px;

}
#carousel-thumbs img:hover {
  opacity: 100%;
}

#carousel-thumbs img {
  opacity: 80%;
  border: 3px solid transparent;
  cursor: pointer;
}
.thumb{
  display: flex;
  align-items: center;
  justify-content: center;
}
#carousel-thumbs .selected img {
  opacity: 100%;
}

.carousel-control-prev,
.carousel-control-next {
  width: 50px;
}

.carousel-fullscreen-icon {
  position: absolute;
  top: 1rem;
  left: 1rem;
  width: 1.75rem;
  height: 1.75rem;
  z-index: 4;
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}

.carousel-fullscreen-icon:hover {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)' viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}

.pause .carousel-pause-icon {
  position: absolute;
  top: 3.75rem;
  left: 1rem;
  width: 1.75rem;
  height: 1.75rem;
  z-index: 4;
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}
.pause .carousel-pause-icon:hover {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}

.play .carousel-pause-icon {
  position: absolute;
  top: 3.75rem;
  left: 1rem;
  width: 1.75rem;
  height: 1.75rem;
  z-index: 4;
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}

.play .carousel-pause-icon:hover {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}

#carousel-thumbs .carousel-control-prev-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(0,0,0,.60)' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}

#carousel-thumbs .carousel-control-next-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%60000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
  filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1));
}

.modal-content {
  border-radius: 0;
  background-color: transparent;
  border: none;
}
#lightbox-container-image img {
  width: auto;
  max-height: 460px;
}

.carousel-control-next-icon, .carousel-control-prev-icon{
      filter: drop-shadow(1px 1px 5px rgba(0, 0, 0, 1)) !important;
}




/* acordeon productos */
.card h5{
  background-color: #000068;
  border-radius: 10px;

}

.card button{
   color: white !important;
}




</style>



<?php 
  
  function is_dir_empty($dir) {
      if (!is_readable($dir)) return null; 
        return (count(scandir($dir)) == 2);
      }

  $dir = "assets/images/productos/1/";
    if (!is_dir_empty($dir)) {
     ?>




      <div id="wrap" class="container my-5">
  <div class="row">
    <div class="col-12">

      <!-- Carousel -->
      <div id="carousel" class="carousel slide gallery" data-ride="carousel">
        <div class="carousel-inner">


        <?php 
        $carousel_navigation ="";
        $all_files = glob("assets/images/productos/1/*.*");
      for ($i=0; $i<count($all_files); $i++){
        $image_name = $all_files[$i];
        if ($i==0) {
          $active = "active";
        }else{
          $active = "";
        }
        echo '
        <div class="carousel-item '.$active.'"  data-slide-number="'.$i.'" data-toggle="lightbox" data-gallery="gallery" data-remote="'.$image_name.'">
            <img src="'.$image_name.'" class="d-block" alt="'.$image_name.'">
          </div>';
      }
      ?>
        
          
        
      </div><!-- carousel-inner -->


        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon flechas-carousel" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon flechas-carousel" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
        <a class="carousel-fullscreen" href="#carousel" role="button">
          <span class="carousel-fullscreen-icon" aria-hidden="true"></span>
          <span class="sr-only">Agrandar</span>
        </a>
        <a class="carousel-pause pause" href="#carousel" role="button">
          <span class="carousel-pause-icon" aria-hidden="true"></span>
          <span class="sr-only">Pausa</span>
        </a>
      </div>

          <!-- Carousel Navigatiom -->
      <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">





         <div class="carousel-inner">


           <?php 
        $carousel_navigation ="";
        $j = 0;
        $all_files = glob("assets/images/productos/1/*.*");
      for ($i=0; $i<count($all_files); $i++){
        $image_name = $all_files[$i];
        if ($i==0) {
          $active = "active";
        }else{
          $active = "";
        }
        if ($j==0 || $j==4 || $j==8) {
         echo ' <div class="carousel-item '.$active.'" data-slide-number="'.$j.'">
                <div class="row mx-0">';
        }
        
        echo '
        <div id="carousel-selector-'.$i.'" class="thumb col-3 px-1 py-2 selected" data-target="#carousel" data-slide-to="'.$i.'">
            <img src="'.$image_name.'" class="img-fluid" alt="'.$image_name.'">
          </div>';
          

        if ($j==3 || $j==7 || $j==11) {
         echo ' </div></div>';
        }
        $j=$j+1;
      }

       if ($j!=4 || $j!=8 || $j!=12) {
         echo ' </div></div>';
        }
      ?>
        


        </div><!-- carousel inner -->

        <!-- eddsd -->







        <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
        <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>


      </div>

    </div>
  </div>
</div>   

<?php

    }//is_dir_empty
    
?>



 









</div><!-- col-lg-7- -->



<?php if ($rowproductos->existencia!="0") {
  $existencia = '<h6><b>Stock disponible</b></h6>';
  $btnAgregarAlCarrito = "btnAgregarAlCarritoProductos";
  $btnComprarProductos = "btnComprarProductos";
  $type = "submit";
  $cantidad = "block";
  $preguntar = "none";
}else{
  $existencia = '<h6><b>Sin Stock</b></h6>';
  $btnAgregarAlCarrito = "btnAgregarAlCarritoProductosDisabled";
  $btnComprarProductos = "btnComprarProductosDisabled";
  $type = "button";
  $cantidad = "none";
  $preguntar = "block";
}
                  ?>
          <div class="col-lg-5 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12 text-center">
                <h1 class="item-price"><?php echo $rowproductos->nombre ?></h1>
                <p>Subtítulo del producto...</p>
                 <h3 class="item-title">$<?php echo $rowproductos->precio_venta ?> <small style="font-size: 12px;">con IVA</small></h3>
              </div>
              
  
            </div>
            <div class="row">
               <div class="col-md-12 text-center" style=" display:<?php echo $cantidad ?>">
                <hr>
                <span>Cantidad:</span>
                <select name="" id="" onchange="actualizarCantidad(this); return false;">
                  <?php 
                  if ($rowproductos->existencia>=10) {
                    $numero = "10";
                  }else{
                    $numero = $rowproductos->existencia;
                  }
                  for ($i=1; $i <= $numero; $i++) { 
                     echo '<option value="'.$i.'">'.$i.'</option>';
                   } ?>

                </select>


              </div>
              <div class="col-md-6">
                <form id="formAgregarAlCarrito">
                  <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $id_del_producto = $rowproductos->id ?>">
                  <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre_del_producto = $rowproductos->nombre ?>">
                  <input type="hidden" name="precio_venta" id="precio_venta" value="<?php echo $rowproductos->precio_venta ?>">
                  <input type="hidden" name="cantidad" id="cantidad" value="1">
                  <input type="hidden" name="agregarAlCarrito" value="1">

                  <button type="button" onclick="agregaAlCarrito(); return false;"class="<?php echo $btnAgregarAlCarrito ?> btn-block">Agregar al Carrito</button>

                </form>
                
              </div>

              <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
                <br>
              </div>
          
              <div class="col-md-6">
                <form action="" method="POST">
                  <input type="hidden" name="id_producto" id="id_producto1" value="<?php echo $rowproductos->id ?>">
                  <input type="hidden" name="nombre" id="nombre1" value="<?php echo $rowproductos->nombre ?>">
                  <input type="hidden" name="precio_venta" id="precio_venta1" value="<?php echo $rowproductos->precio_venta ?>">
                  <input type="hidden" name="cantidad" id="cantidad1" value="1">

                  <button name="btnAccionPagar" value="Agregar" type="<?php echo $type ?>" href="#" class="<?php echo $btnComprarProductos ?> btn-block">Comprar ahora</button>

                </form>
                
              </div>

              <div class="col-md-12 text-center" style="">
                <?php echo $existencia; ?>
                 
                
              </div>

               <div class="col-md-12 text-center" style="">

               <?php 
               if (isset($_SESSION['ciudad'])) {
                    if ($_SESSION['ciudad']!='Morelia') {
                      if ($rowproductos->tipo_envio!='taximaroa') {
                         ?>
                         
                         <span class="badge badge-success" style="padding-left: 18px;"> <i class="fas fa-check-circle"></i> Producto disponible para el envío a tu ubicación</span> 
                        <?php }else{ ?>
                         <span class="badge badge-danger" style="padding-left: 18px;"> <i class="fas fa-times-circle"></i> Producto no disponible para el envío a tu ubicación</span> 
                        <?php 

                        } ?>
                      
                   <?php }else{ ?>
                         <br><span class="badge badge-success" style="padding-left: 18px;"> <i class="fas fa-check-circle"></i> Producto disponible para el envío a tu ubicación</span>  
                        <?php 

                   }
                  

                 }else{
               ?>
                  <h6 class="textoAzul"><i class="fas fa-exclamation-circle"></i> <?php if ($rowproductos->tipo_envio=="taximaroa") {
                    echo "Este producto está disponible para envío sólo en Morelia y alrededores <button class='btn btn-xs btn-warning' style='padding:2px; font-size:8px; border-radius:5px;' data-toggle='modal' data-target='#tipoDeEnvio'>Más información</button>";
                  }elseif($rowproductos->tipo_envio=="paqueteria"){ echo "Este producto está disponible para envío sólo por paquetería nacional <button class='btn btn-xs btn-warning' style='padding:2px; font-size:8px; border-radius:5px;' data-toggle='modal' data-target='#tipoDeEnvio'>Más información</button>"; 
                  }elseif($rowproductos->tipo_envio=="paqtax"){ echo "Este producto está disponible para envío por paquetería nacional o en Morelia y alrededores <button class='btn btn-xs btn-warning' style='padding:2px; font-size:8px; border-radius:5px;' data-toggle='modal' data-target='#tipoDeEnvio'>Más información</button>"; } ?>
                  
                   </h6>
                 <?php } ?>
               </div>
             

              <div class="col-md-12">

<hr>

            <div class="rate" style="padding-top: 5px;">

              <span> 
                <?php if ($rowproductos->persCalificaron!=0) {
                            echo "<b>Calificación del producto: </b>";
                           echo $calificacion = sprintf('%.1f', $rowproductos->calificacion/$rowproductos->persCalificaron);
                           if ($calificacion>4.1) {
                            echo '  <span style="display:inline-block;"><i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i></span>';
                           }elseif ($calificacion>3.1 AND $calificacion<=4.0) {
                            echo '<span style="display:inline-block;"><i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="far fa-star"></i></span>';
                           }elseif ($calificacion>2.1 AND $calificacion<=3.0) {
                            echo '<span style="display:inline-block;"><i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i></span>';
                           }elseif ($calificacion>1.1 AND $calificacion<=2.0) {
                            echo '<span style="display:inline-block;"><i class="fas fa-star"></i>&nbsp;<i class="fas fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i></span>';
                           }else{
                             echo '<span style="display:inline-block;"><i class="fas fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i>&nbsp;<i class="far fa-star"></i></span>';
                           }
                      } ?>
                    &nbsp;
                  </span>
              </div>

              <?php
            $comentarios_totales = "";
             //$comentarios = $con->query("SELECT c.*, ci.* FROM comentarios c LEFT JOIN comentarios_imagenes ci ON c.id=ci.id_comentario WHERE c.id_productos=".$rowproductos->id." AND c.aprobado='1' GROUP BY c.id");  
            $comentarios = $con->query("SELECT * FROM comentarios WHERE id_productos = $rowproductos->id AND aprobado ='1'"); 
              if (mysqli_num_rows($comentarios)!=0) {
                 while($rowcomentarios = $comentarios->fetch_object()){
                   $comentarios_totales.= "<b>".$rowcomentarios->usuario.":</b><br>".$rowcomentarios->comentario."<br>";
                   $img_comentarios = $con->query("SELECT * FROM comentarios_imagenes WHERE id_comentario = $rowcomentarios->id");
                   
                    if (mysqli_num_rows($img_comentarios)!=0) {
                        while($rowimagenes = $img_comentarios->fetch_object()){
                           $comentarios_totales.="&nbsp;<img src='assets/images/productos/".$rowproductos->id."/comentarios/".$rowimagenes->nombre_imagen."' style='max-height:45px;'>&nbsp;";
                         }
                         $comentarios_totales.= "<hr>";
                    }else{
                          $comentarios_totales.= "<hr>";
                         }
                 }
                echo '<br><span class="textoAzul">Reseñas escritas: '. mysqli_num_rows($comentarios) .'</span>'; 
              } ?>


                
              </div>
             <div class="col-md-12 text-center">
                <hr>
                
          
             </div> 

              



                 <div class="col-12 mt-1 text-center">

                  <b>Compartir:&nbsp;&nbsp;&nbsp;&nbsp;</b> 
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>" target="_blank"><img src="assets/images/iconos/fb.jpg" style="max-width: 30px;" alt="icono facebook"></a>&nbsp;&nbsp;&nbsp;
                  <!--<a href="https://twitter.com/intent/tweet?original_referer=<?php echo $url; ?>&text=<?php echo $rowproductos->nombre ?>&url=<?php echo $url; ?>" target="_blank"><i class="fab fa-twitter-square redesS fa-2x"></i></a>&nbsp;&nbsp;&nbsp; -->
                  <a href="https://api.whatsapp.com/send?text=<?php echo $url; ?>" target="_blank"><img src="assets/images/iconos/whatsapp.jpg" style="max-width: 30px;" alt="icono facebook"></a>
              
              </div>
          

              <div class="col-12">

                <br>

                <div id="accordion">
                  <div class="card">
                    <div class="" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn textoAzul" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Descripción
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <?php echo $rowproductos->descripcion ?>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn textoAzul collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Descripción completa
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn textoAzul collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Ficha técnica
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div>




           
                <p></p>
              </div>
            </div>



            <div class="row">
              <div class="col-12">
                <hr>
              </div>
            </div>
            <div class="row">
              



              



            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- info -->
   <section class="" style="padding-top:0!important;">
      <div class="container">
        <div class="row gutter-2 gutter-lg-4">

<form action="guardar_comentario.php" class="form-horizontal" enctype="multipart/form-data" method="post">

  <div class="row">
          <div class="col-md-12">



            <h4 class="textoImportante"><i class="fas fa-comments"></i> Es importante para nosotros conocer tu opinión sobre este producto y seguir ofreciéndote lo mejor.</h4>
          </div>
          <br><br>
          <div class="col-md-12">
            <?php echo $comentarios_totales; ?>
          </div>
          <div class="col-md-2">
            <div class="contenedorCalificar">
              <p>Calificar</p>
             <span><i onclick="calificar('1'); return false;" class="far fa-star estrella1"></i>&nbsp;<i onclick="calificar('2'); return false;" class="far fa-star estrella2"></i>&nbsp;<i onclick="calificar('3'); return false;" class="far fa-star estrella3"></i>&nbsp;<i onclick="calificar('4'); return false;" class="far fa-star estrella4"></i>&nbsp;<i onclick="calificar('5'); return false;" class="far fa-star estrella5"></i></span>
            </div>
            <div class="contenedorGraciasCalif" style="display:none;">
               <button class="btnPreguntar" >Gracias por tu calificacion</button>
             </div>
            </div>
             <div class="col-md-6">
             <div class="contenedorComentario">
               <p><small>Hacer un comentario sobre el producto</small></p>
             <input type="hidden" id="idProductoComentario" name="id_producto" value="<?php echo $rowproductos->id ?>">
             <textarea class="form-control" name="comentario" id="comentario" cols="10" rows="2"></textarea>
            
              </div>

              <div class="contenedorGracias" style="display:none;">
               <button class="btnPreguntar" >Gracias por tu comentario</button>
             </div>
           </div>
           <div class="col-md-4">
             <p><small>Sube tus fotografías</small></p>
             <input type="file" name='files[]' multiple class="form-control">
              <div class="text-right">
                <button class="btnPreguntar" type="submit">Guardar</button>
             </div>
           </div>
          </div>

          </div>


        </form>
       
         
   

        </div>
      </div>
    </section> 


  <?php }

   $productos = $con->query("SELECT * FROM productos LIMIT 10"); ?>
   


    <!-- related products -->
    <section class="no-overflow">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-3">
            <ul class="nav nav-tabs lavalamp" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="index.php" role="tab" aria-controls="home" aria-selected="true">Productos relacionados</a>
              </li>
            </ul>
          </div>
          <div class="col">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="owl-carousel owl-carousel-arrows visible" data-items="[4,4,2,1]" data-margin="10" data-loop="true" data-dots="true" data-nav="true">

                  <?php while($rowproductos = $productos->fetch_object()){ ?>
                  <div class="product" >
                    <figure class="product-image">
                      <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>">
                        <?php if ($rowproductos->foto1=="") {
                       ?><img style="min-width: 100%;" src="assets/images/productos/trans.png"><?php
                      }else{ ?>
                      <img src="<?php echo $rowproductos->foto1 ?>">
                    <?php } ?>
                    <?php if ($rowproductos->foto1=="") {
                       ?><img style="min-width: 100%;" src="assets/images/productos/trans.png"><?php
                      }else{ ?>
                     <img src="<?php echo $rowproductos->foto2 ?>">
                    <?php } ?>
                      </a>
                    </figure>
                    <div class="product-meta" style="border-top: 5px solid #F7CC19;">
                      <h3 class="product-title"><a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>"><?php echo $rowproductos->nombre ?> </a></h3>
                      <div class="product-price">
                        <span>$<?php echo $rowproductos->precio_venta ?></span>
                        <span class="btnAgregarAlCarrito">
                          <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>">Ver producto</a>
                        </span>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                  
                 
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>







<?php 
include "pie.php";
include "modals.php"; ?>

    



<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>


<script>


function agregarComentario(){

console.log("entro");

var comentario = $("#comentario").val();
var usuario = "<?php echo $username ?>";
var id_producto = $("#idProductoComentario").val();

  $.ajax({
                        url: 'guardar.php',
                        type: 'post',
                        data: {comentario:'1', comentario:comentario , id_producto:id_producto, usuario:usuario},
                        dataType: 'html',
                        success:function(response){

                          if (response=="guardado") {
                            $(".contenedorGracias").show();
                            $(".contenedorComentario").hide();
                          }

                        }
                    });

}







$(document).ready(function(){

  $(".estrella5").hover(function(){
    $(".estrella5, .estrella4, .estrella3, .estrella2, .estrella1").removeClass("far");
    $(".estrella5, .estrella4, .estrella3, .estrella2, .estrella1").addClass("fas");
    $(".estrella5, .estrella4, .estrella3, .estrella2, .estrella1").css("color", "#F7CC19");
    }, function(){
      $(".estrella5, .estrella4, .estrella3, .estrella2, .estrella1").removeClass("fas");
      $(".estrella5, .estrella4, .estrella3, .estrella2, .estrella1").addClass("far");
      $(".estrella5, .estrella4, .estrella3, .estrella2, .estrella1").css("color", "#F7CC19");
    });


  $(".estrella4").hover(function(){
    $(".estrella4, .estrella3, .estrella2, .estrella1").removeClass("far");
    $(".estrella4, .estrella3, .estrella2, .estrella1").addClass("fas");
    $(".estrella4, .estrella3, .estrella2, .estrella1").css("color", "#F7CC19");
    }, function(){
      $(".estrella4, .estrella3, .estrella2, .estrella1").removeClass("fas");
      $(".estrella4, .estrella3, .estrella2, .estrella1").addClass("far");
      $(".estrella4, .estrella3, .estrella2, .estrella1").css("color", "#F7CC19");
    });

    $(".estrella3").hover(function(){
    $(".estrella3, .estrella2, .estrella1").removeClass("far");
    $(".estrella3, .estrella2, .estrella1").addClass("fas");
    $(".estrella3, .estrella2, .estrella1").css("color", "#F7CC19");
    }, function(){
      $(".estrella3, .estrella2, .estrella1").removeClass("fas");
      $(".estrella3, .estrella2, .estrella1").addClass("far");
      $(".estrella3, .estrella2, .estrella1").css("color", "#F7CC19");
    });

     $(".estrella2").hover(function(){
    $(".estrella2, .estrella1").removeClass("far");
    $(".estrella2, .estrella1").addClass("fas");
    $(".estrella2, .estrella1").css("color", "#F7CC19");
    }, function(){
      $(".estrella2, .estrella1").removeClass("fas");
      $(".estrella2, .estrella1").addClass("far");
      $(".estrella2, .estrella1").css("color", "#F7CC19");
    });

      $(".estrella1").hover(function(){
    $(".estrella1").removeClass("far");
    $(".estrella1").addClass("fas");
    $(".estrella1").css("color", "#F7CC19");
    }, function(){
      $(".estrella1").removeClass("fas");
      $(".estrella1").addClass("far");
      $(".estrella1").css("color", "#F7CC19");
    });











agregandoProductos();

});

function calificar(estrellas){

  console.log("entreo");



  var calificacion = estrellas;
var id_producto = $("#idProductoComentario").val();

console.log(calificacion);

  $.ajax({
                        url: 'guardar.php',
                        type: 'post',
                        data: { calificacion:calificacion , id_producto:id_producto},
                        dataType: 'html',
                        success:function(response){

                          
                            $(".contenedorGraciasCalif").show();
                            $(".contenedorCalificar").hide();
                        

                        }
                    });


}






function agregandoProductos(){
  console.log("entrando");
setTimeout(function() {
    $('.productoAgregadoAlCarrito').fadeOut('slow');
}, 3400);
}


function actualizarCantidad(cantidad){

  var cantidad = cantidad.value;
  $("#cantidad").val(cantidad);
  $("#cantidad1").val(cantidad);
  
}




/* nueva galeria */
$("[id^=carousel-thumbs]").carousel({
  interval: false
});

/** Pause/Play Button **/
$(".carousel-pause").click(function () {
  var id = $(this).attr("href");
  if ($(this).hasClass("pause")) {
    $(this).removeClass("pause").toggleClass("play");
    $(this).children(".sr-only").text("Play");
    $(id).carousel("pause");
  } else {
    $(this).removeClass("play").toggleClass("pause");
    $(this).children(".sr-only").text("Pause");
    $(id).carousel("cycle");
  }
  $(id).carousel;
});

/** Fullscreen Buttun **/
$(".carousel-fullscreen").click(function () {
  var id = $(this).attr("href");
  $(id).find(".active").ekkoLightbox({
    type: "image"
  });
});

if ($("[id^=carousel-thumbs] .carousel-item").length < 2) {
  $("#carousel-thumbs [class^=carousel-control-]").remove();
  $("#carousel-thumbs").css("padding", "0 5px");
}

$("#carousel").on("slide.bs.carousel", function (e) {
  var id = parseInt($(e.relatedTarget).attr("data-slide-number"));
  var thumbNum = parseInt(
    $("[id=carousel-selector-" + id + "]")
      .parent()
      .parent()
      .attr("data-slide-number")
  );
  $("[id^=carousel-selector-]").removeClass("selected");
  $("[id=carousel-selector-" + id + "]").addClass("selected");
  $("#carousel-thumbs").carousel(thumbNum);
});



function agregaAlCarrito(){

          var dataString = $('#formAgregarAlCarrito').serialize();
           //alert('Datos serializados: '+dataString);


          $.ajax({
            type: 'post',
            url: 'agregar_al_carrito.php',
            data: $('#formAgregarAlCarrito').serialize(),
            success: function (data) {
              console.log(data);
              swal({
                 title: 'Producto',
                  text: 'agregado al carrito',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              });


             
             
              
            }
          });

      

}




const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const comentario = urlParams.get('comentario')

if (comentario!=null) {
   swal({
                 title: 'Comentario',
                  text: 'guardado, gracias por tu tiempo',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 4000
              });
}





</script>





   </body>
</html>