<?php 
//session_start();
include "carrito.php";
include "cabecera.php";
 ?>
<!-- <!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/carousel.css">

    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="assets/images/favicon/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon-180x180.png" />


    <title>Ferretería Taximaroa - Tienda Virtual</title>
    
   

  </head>
  <body>



    <header class="header header-dark header-sticky">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-dark">
           
            <a href="index.php" class="navbar-brand order-1 order-lg-2" style="position: fixed; top:0px; left: 50%; transform: translateX(-50%);"><img src="assets/images/logo.png" alt="Logo"></a>
            
            <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3 order-lg-1" id="navbarMenu">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="index.php">
                    Inicio
                  </a>
                </li>
                <li class="nav-item dropdown megamenu">
                  <a class="nav-link" href="nosotros.php" >
                    Nosotros
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ver_categoria.php?categoria_seleccionada=todas">
                    Productos
                  </a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="">Marcas</a>
                </li>
              </ul>
            </div>

            <div class="collapse navbar-collapse order-4 order-lg-3" id="navbarMenu2">
              <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                  <a class="nav-link" href="">Catalogo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Contacto</a>
                </li>
                <li class="nav-item">
                  <a data-toggle="modal" data-target="#search" class="nav-link"><i class="icon-search"></i></a>
                </li>
                <li class="nav-item cart">
                  <a href="mostrarCarrito.php" class="nav-link"><span>Carrito</span><span><?php 
                  echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?></span></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>

    <?php //require_once "buscador.php" ?>
-->






    <!-- hero 
    <div class="container-fluid fondoAzulTrans">
      <div class="row">
        <div class="col-12" style="padding: 0 !important;">

          <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="image image-overlay image-zoom" style="background-image:url('assets/images/slider/herramientas.jpg')"></div>
          <div class="container">
            <div class="row align-items-center vh-100">
              <div class="col-lg-8 text-white" data-swiper-parallax-x="-100%">
               
             
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image image-overlay image-zoom" style="background-image:url('assets/images/slider/herramientas2.jpg')"></div>
          <div class="container">
            <div class="row align-items-end align-items-center vh-100">
              <div class="col-lg-8 text-white" data-swiper-parallax-x="-100%">
              
               
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-footer">
        <div class="container">
          <div class="row align-items-center mb-5">
            <div class="col-lg-6">
              <div class="swiper-pagination"></div>
            </div>
            <div class="col-lg-6 text-right">
              <div class="swiper-navigation">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
          
        </div>
      </div>
      
    </div>  hero slider-->

    <style>

#slide1:checked ~ #slides .inner {
  margin-left: 0;
}
#slide2:checked ~ #slides .inner {
  margin-left: -100%;
}
#slide3:checked ~ #slides .inner {
  margin-left: -200%;
}
#slide4:checked ~ #slides .inner {
  margin-left: -300%;
}
#slide5:checked ~ #slides .inner {
  margin-left: -400%;
}
#container {
  width: 100%;
  overflow: hidden;
}
article img {
  width: 100%;
}
#slides .inner {
  width: 500%;
  line-height: 0;
}
#slides article {
  width: 20%;
  float: left;
}
#commands {
  margin: -25% 0 0 0;
  width: 100%;
  height: 50px;
}
#commands label {
  display: none;
  width: 80px;
  height: 80px;
  opacity: 0.5;
}
#commands label:hover {
  opacity: 0.8;
}
#active {
  position: relative;
  z-index: 5;
  margin: 16% 0 0;
  text-align: center;
}
#active label {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  display: inline-block;
  width: 10px;
  height: 10px;
  background: #bbb;
}
#active label:hover {
  background: #333;
  border-color: #777 !important;
}
#slide1:checked ~ #commands label:nth-child(2),
#slide2:checked ~ #commands label:nth-child(3),
#slide3:checked ~ #commands label:nth-child(4),
#slide4:checked ~ #commands label:nth-child(5),
#slide5:checked ~ #commands label:nth-child(1) {
  background: url("https://0.s3.envato.com/files/84450220/img/next.png")
    no-repeat;
  float: right;
  margin: 0 12px 0 0;
  display: block;
}
#slide1:checked ~ #commands label:nth-child(5),
#slide2:checked ~ #commands label:nth-child(1),
#slide3:checked ~ #commands label:nth-child(2),
#slide4:checked ~ #commands label:nth-child(3),
#slide5:checked ~ #commands label:nth-child(4) {
  background: url("https://0.s3.envato.com/files/84450220/img/previous.png")
    no-repeat;
  float: left;
  margin: 0 0 0 -6px;
  display: block;
}
#slide1:checked ~ #active label:nth-child(1),
#slide2:checked ~ #active label:nth-child(2),
#slide3:checked ~ #active label:nth-child(3),
#slide4:checked ~ #active label:nth-child(4),
#slide5:checked ~ #active label:nth-child(5) {
  background: #000;
  opacity: 0.6;
  border-color: #fff !important;
  border: 2px solid #fff;
}
.caption {
  line-height: 20px;
  margin: 0 0 -150%;
  position: absolute;
  padding: 320px 12px;
  opacity: 0;
  color: #fff;
  text-transform: none;
  font-family: "Open Sans", Arial, Helvetica, sans-serif;
  text-align: left;
  font-size: 18px;
}
.caption bar {
  display: inline-block;
  padding: 10px;
  background: #000;
  border-radius: 3px 3px 3px 3px;
  -moz-border-radius: 3px 3px 3px 3px;
  -webkit-border-radius: 3px 3px 3px 3px;
  opacity: 0.7;
  filter: progid:DXImageTransform.Microsoft.Alpha(opacity=70);
}
#slides {
  position: relative;
  padding: 2px;
  border: 1px solid #ddd;
  margin: 45px 0 0;
  background: #fff;
  background: -webkit-linear-gradient(#fff, #fff 20%, #eee 80%, #ddd);
  background: -moz-linear-gradient(#fff, #fff 20%, #eee 80%, #ddd);
  background: -ms-linear-gradient(#fff, #fff 20%, #eee 80%, #ddd);
  background: -o-linear-gradient(#fff, #fff 20%, #eee 80%, #ddd);
  background: linear-gradient(#fff, #fff 20%, #eee 80%, #ddd);
  -webkit-border-radius: 2px 2px 2px 2px;
  -moz-border-radius: 2px 2px 2px 2px;
  border-radius: 2px 2px 2px 2px;
  -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
}
#slides .inner {
  -webkit-transform: translateZ(0);
  -webkit-transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
  -moz-transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
  -ms-transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
  -o-transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
  transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
  -webkit-transition-timing-function: cubic-bezier(0.77, 0, 0.175, 1);
  -moz-transition-timing-function: cubic-bezier(0.77, 0, 0.175, 1);
  -ms-transition-timing-function: cubic-bezier(0.77, 0, 0.175, 1);
  -o-transition-timing-function: cubic-bezier(0.77, 0, 0.175, 1);
  transition-timing-function: cubic-bezier(0.77, 0, 0.175, 1);
}
#slider {
  -webkit-transform: translateZ(0);
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}
#commands label {
  -webkit-transform: translateZ(0);
  -webkit-transition: opacity 0.2s ease-out;
  -moz-transition: opacity 0.2s ease-out;
  -o-transition: opacity 0.2s ease-out;
  transition: opacity 0.2s ease-out;
}
#slide1:checked ~ #slides article:nth-child(1) .caption,
#slide2:checked ~ #slides article:nth-child(2) .caption,
#slide3:checked ~ #slides article:nth-child(3) .caption,
#slide4:checked ~ #slides article:nth-child(4) .caption,
#slide5:checked ~ #slides article:nth-child(5) .caption {
  opacity: 1;
  -webkit-transition: all 1s ease-out 0.6s;
  -moz-transition: all 1s ease-out 0.6s;
  -o-transition: all 1s ease-out 0.6s;
  transition: all 1s ease-out 0.6s;
}
#commands,
#commands label,
#slides,
#active,
#active label {
  -webkit-transform: translateZ(0);
  -webkit-transition: all 0.5s ease-out;
  -moz-transition: all 0.5s ease-out;
  -o-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}
#slider {
  max-width: 100%;
  overflow: hidden;
}
@media only screen and (max-width: 850px) and (min-width: 450px) {
  #slider #commands {
    margin: -25% 0 0 5%;
    width: 90%;
    height: 50px;
  }
  #slider #commands label {
    -moz-transform: scale(0.9);
    -webkit-transform: scale(0.9);
    -o-transform: scale(0.9);
    -ms-transform: scale(0.9);
    transform: scale(0.9);
  }
  #slider #slides .caption {
    padding: 280px 12px;
  }
  #slider #slides {
    padding: 2px 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
  }
  #slider #active {
    margin: 15% 0 0;
  }
}
@media only screen and (max-width: 450px) {
  #slider #commands {
    margin: -28% 0 0 1%;
    width: 100%;
    height: 70px;
  }
  #slider #active {
    margin: 12% 0 0;
  }
  #slider #slides {
    padding: 2px 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
  }
  #slider #slides .caption {
    opacity: 0 !important;
  }
  #slider #commands label {
    -moz-transform: scale(0.7);
    -webkit-transform: scale(0.7);
    -o-transform: scale(0.7);
    -ms-transform: scale(0.7);
    transform: scale(0.7);
  }
}
/*
@media only screen and (min-width: 850px) {
  body {
    padding: 0 80px;
  }
}*/

    </style>



    <?php 
  require_once "db.php";
  $productos = $con->query("SELECT * FROM productos WHERE activo ='1' ORDER BY id DESC LIMIT 11");
  $promociones = $con->query("SELECT * FROM promociones");
  $recomendados = $con->query("SELECT * FROM recomendados LIMIT 2");
  $slider = $con->query("SELECT imagen FROM slider WHERE estado ='1' ORDER BY id DESC");
  $y=0;
    ?>
 


<div class="container-fluid" style="margin-top: 100px;">


  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
  
    <article id="slider">

<input checked type='radio' name='slider' id='slide1' style="display: none;" />
<input type='radio' name='slider' id='slide2' style="display: none;" />
<input type='radio' name='slider' id='slide3' style="display: none;" />
<input type='radio' name='slider' id='slide4' style="display: none;" />
<input type='radio' name='slider' id='slide5' style="display: none;" />
<div id="slides">
  <div id="container">
    <div class="inner">
      <?php while($rowslider = $slider->fetch_object()){
      $y=$y+1; ?>
      <article>
      <img src="<?php echo $rowslider->imagen ?>"/>
      </article>
      
      <?php } ?>
    </div>
  </div>
</div>
<div id="commands">
  <?php 
  for ($i=1; $i <= $y; $i++) { ?>
     <label for='slide<?php echo $i ?>'></label>
   <?php } ?>

  


</div>
<div id="active">
<!--  <label for='slide1'></label>
  <label for='slide2'></label>
  <label for='slide3'></label>
  <label for='slide4'></label> -->

</div>
</article>
</div> 
</div>
</div>



    <div class="clearfix"></div>
    <br><br>



<!--

    <section id="categorias">

        <div class="top-content">
          <div class="container-fluid">
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner row w-100 mx-auto" role="listbox">
                  <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
              <img src="assets/images/backgrounds/1.jpg" class="img-fluid mx-auto d-block" alt="img1">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
              <img src="assets/images/backgrounds/2.jpg" class="img-fluid mx-auto d-block" alt="img2">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
              <img src="assets/images/backgrounds/3.jpg" class="img-fluid mx-auto d-block" alt="img3">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
              <img src="assets/images/backgrounds/4.jpg" class="img-fluid mx-auto d-block" alt="img4">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
              <img src="assets/images/backgrounds/5.jpg" class="img-fluid mx-auto d-block" alt="img5">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
              <img src="assets/images/backgrounds/6.jpg" class="img-fluid mx-auto d-block" alt="img6">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
              <img src="assets/images/backgrounds/7.jpg" class="img-fluid mx-auto d-block" alt="img7">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
              <img src="assets/images/backgrounds/8.jpg" class="img-fluid mx-auto d-block" alt="img8">
            </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
            </div>
          </div>
        </div>
    </section>

-->





<div class="container">
             


             <div class="row">
              <div class="col-md-4 col-12"></div>
               <div class="col-md-4 col-12 text-center">
                 <div class="row">
                   <div class="col-md-1 col-12"></div>
                   <div class="col-md-10 col-12">
                     <img class="center-block" src="assets/images/productos-nuevos.png" alt="productos nuevos ferreteria">
                   </div>
                 </div>
               </div>
             </div>




           </div>
     <div class="contenedor H-Categorias">
           
            <div>

               <?php while($rowproductos = $productos->fetch_object()){ ?>
                <figure>
                    <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>" >
                        <img src="<?php echo $rowproductos->foto1 ?>" alt=" <?php echo $rowproductos->nombre ?>" />
                        <span> <?php echo $rowproductos->nombre ?></span>
                    </a>
                </figure>


               <?php } ?>
                <figure>
                   <a href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas" >
                        <img src="assets/images/productos/Ver_Todo_productos.png" alt="Ver todo" />
                        <span>Ver todo</span>
                    </a>
                </figure>
              </div>
        </div>




<section id="promociones" style="padding: 0 !important;">
  

  <div class="container-fluid">
          
          <div class="container">

            <div class="row">
              <div class="col-md-4 col-12"></div>
               <div class="col-md-4 col-12 text-center">
                 <div class="row">
                   <div class="col-md-1 col-12"></div>
                   <div class="col-md-10 col-12">
                     <img class="center-block" src="assets/images/promociones-especiales.png" alt="promociones ferreteria">
                   </div>
                 </div>
               </div>
             </div>
         <!--   <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
                <div class="row">
               <?php // while($rowpromociones = $promociones->fetch_object()){ ?>
              <div class="col-6" style="padding-bottom: 15px;">
                <a href="<?php //echo $rowpromociones->url ?>"><img src="<?php //echo $rowpromociones->imagen ?>" class="img-fluid" alt="ofertas"></a>
              </div>
               
            <?php  //} ?>
            </div>
            </div>
            </div> -->
            
          </div><!-- //container-->

          <div class="contenedor H-Categorias2">
           
            <div>

               <?php while($rowpromociones = $promociones->fetch_object()){ ?>
                <figure>
                    <a href="ver_producto.php?id_producto=<?php echo $rowpromociones->id ?>" >
                        <img src="<?php echo $rowpromociones->imagen ?>" alt=" <?php echo $rowpromociones->promocion ?>" class="imagenPromociones" />
                        <br><br><br><br><br>
                        <span> <?php echo $rowpromociones->promocion ?></span>
                        <button class="btnComprar">Comprar <i class="fas fa-shopping-cart"></i></button>
                    </a>
                </figure>


               <?php } ?>
               
              </div>
        </div>

  </div><!-- //container-fluid-->
</section>




<section class="">
  <div class="container parallaxLogos">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-11">

        <h3 class="text-center textoBlanco">Somos <b>distribuidores autorizados</b> de las marcas</h3> <br><br>
                  


                  <div class="customer-logos">
                   <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/rotoplas.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/truper.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/kobrex.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/nacobre.png"></div>
                    <div class="slide"><img class="logosMarcas" src="assets/images/marcas/dica.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/urrea.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/surtek.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/amanco.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/werner.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/prisa.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/makita.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/bosch.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/dewalt.png"></div>
                    <div class="slide"><img class="logosMarcas" src="assets/images/marcas/skil.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/philips.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/pennsylvania.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/bticino.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/fanal.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/3m.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/deacero.png"></div>
                  </div>




      </div>
    </div>
  </div>
</section>





<section id="recomendados">
  

  <div class="container-fluid">
          
          <div class="container">

            <div class="row">
              <div class="col-md-4 col-12"></div>
               <div class="col-md-4 col-12 text-center">
                 <div class="row">
                   <div class="col-md-1 col-12"></div>
                   <div class="col-md-10 col-12">
                     <img class="center-block" src="assets/images/recomendados.png" alt="promociones ferreteria">
                   </div>
                 </div>
               </div>
             </div>
            <div class="row">
               <?php while($rowrecomendados = $recomendados->fetch_object()){ ?>

              <div class="col-md-6 col-12">
                <img src="<?php echo $rowrecomendados->imagen ?>" class="img-fluid prodRecomendados" style="min-width: 100%;" alt="recomendados">
                <a href="<?php echo $rowrecomendados->url ?>" class="btnRecomendados">Ver más</a>
              </div>
              <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
                <br>
              </div>
            <?php } ?>
             
              
            </div><!--//row -->

            <div class="row">
              <div class="col-md-4 col-12"></div>
               <div class="col-md-4 col-12 text-center">
                 <div class="row">
                   <div class="col-md-1 col-12"></div>
                   <div class="col-md-10 col-12">
                     <img class="center-block" src="assets/images/forma-pago.png" alt="promociones ferreteria">
                   </div>
                 </div>
               </div>
             </div>
            <div class="row">
              <div class="col-md-6 col-12">
                <img src="assets/images/compra-segura1.jpg" class="img-fluid w-100" alt="compra segura">
              </div>
               <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
                <br>
              </div>
               <div class="col-md-6 col-12">
                <img src="assets/images/pagos.jpg" class="img-fluid" alt="">
              </div>
            </div>


           

          </div><!-- //container-->

  </div><!-- //container-fluid-->
</section>



<section>
  <div class="container">
    <div class="row">


  <div class="col-md-1 col-12"></div>
  <div class="col-md-2 col-12 text-center gtm_class fifth-block" data-element="Compra en línea y recoge tu or">
    <div class="lp-benefits-square">
      <a href="">
      <div class="img-wrap">
        <img src="assets/images/recoge.jpg" class="iconos" alt="bopis">
      </div>
      <h5 class="text-center">
        Recoge en tienda sin costo
      </h5>
      <p class="text-anchor">
        Compra en línea y recoge tu orden en sucursal Morelia, Mich.
      </p>
      </a>
    </div>
  </div>
  <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
               <hr>
              </div>
  <div class="col-md-2 col-12 text-center gtm_class fifth-block" data-element="Igualamos el precio más bajo d">
    <div class="lp-benefits-square">
      <a href="">
      <div class="img-wrap">
        <img src="assets/images/preciosbajos.jpg" class="iconos" alt="promociones">
      </div>
      <h5 class="text-center">
        Garantía de precios bajos
      </h5>
      <p class="text-anchor">
        Igualamos el precio más bajo de un producto
      </p>
      </a>
    </div>
  </div>
  <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
               <hr>
              </div>
  <div class="col-md-2 col-12 text-center gtm_class fifth-block" data-element="Más variedad en estilos y tecn">
    <div class="lp-benefits-square">
      <a href="">
      <div class="img-wrap">
        <img src="assets/images/catalogo.jpg" class="iconos" alt="catalogo">
      </div>
      <h5 class="text-center">
        Mayor oferta de productos
      </h5>
      <p class="text-anchor">
        Más variedad en estilos y tecnología
      </p>
      </a>
    </div>
  </div>
  <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
               <hr>
              </div>
  <div class="col-md-2 col-12 text-center gtm_class fifth-block" data-element="En compras en línea arriba de ">
    <div class="lp-benefits-square">
      <a href="">
      <div class="img-wrap">
        <img src="assets/images/envios.jpg" class="iconos" alt="envio">
      </div>
      <h5 class="text-center">
        Envíos a toda la república
      </h5>
      <p class="text-anchor">
        Compra en línea, rápido y fácil<sup>†</sup>
      </p>
      </a>
    </div>
  </div>
  <div class="col-md-2 col-12 text-center gtm_class fifth-block" data-element="Tus compras en línea y datos p">
    <div class="lp-benefits-square">
      <a href="">
      <div class="img-wrap">
        <img src="assets/images/seguro.jpg" class="iconos" alt="sitio-seguro">
      </div>
      <h5 class="text-center">
        Sitio seguro
      </h5>
      <p class="text-anchor">
        Tus compras en línea y datos personales protegidos
      </p>
      </a>
    </div>
  </div>

      








    </div>
  </div>
</section>




<section class="">
  <div class="container parallaxLogos">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-11">

        <h3 class="text-center textoBlanco">Nuestros <b>clientes</b></h3> <br><br>
                  


                  <div class="customer-logos">
                    <div class="slide"><img  class="logosMarcas" src="assets/images/clientes/medacasa.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/clientes/construcciones.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/clientes/medacasa.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/clientes/construcciones.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/clientes/medacasa.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/clientes/construcciones.png"></div>
                    
         
                  </div>




      </div>
    </div>
  </div>
</section>




<section class="bgGris">
  <div class="container">

    <div class="row">
      <div class="col-md-4 col-12"></div>
      <div class="col-md-4 col-12 text-center">
         <h4 class="textoAzul">ESCRÍBENOS</h4> <br>
         <form class="formularioContacto eliminar" id="formularioContacto">
            <div class="full cf">
              <input type="text" id="nombre" name="nombre" placeholder="Nombre">
              <div id="validatenombre" class="validate">Captura tu nombre</div>
              <input type="email" id="correo" name="correo" placeholder="Correo electrónico">
              <div id="validatecorreo" class="validate">Captura tu correo</div>
              <!-- <input type="text" id="input-subject" placeholder="Subject"> -->
            </div>
            <div class="full cf text-center">
              <textarea cols="30" rows="10" name="mensaje" type="text" id="mensaje" placeholder="Mensaje"></textarea>
              <div id="validatemensaje" class="validate">Escribe un mensaje</div>
            </div>  
            <br>
            <input onclick="enviar(); return false;" type="submit" value="Enviar" id="input-submit" style="max-width: 150px; max-height: 40px;">
          </form>
           <div class="sent-message btn-block">Mensaje enviado, en breve nos pondremos en contacto contigo.</div>
          </div>

      </div>



  </div>
</section>

<?php 
include "pie.php";
include "modals.php";
 ?>


    <script>
      /*
      Carousel
  */
  $('#carousel-example').on('slide.bs.carousel', function (e) {

      /*
          CC 2.0 License Iatek LLC 2018
          Attribution required
      */
      var $e = $(e.relatedTarget);
      var idx = $e.index();
      var itemsPerSlide = 5;
      var totalItems = $('.carousel-item').length;
      
      if (idx >= totalItems-(itemsPerSlide-1)) {
          var it = itemsPerSlide - (totalItems - idx);
          for (var i=0; i<it; i++) {
              // append slides to end
              if (e.direction=="left") {
                  $('.carousel-item').eq(i).appendTo('.carousel-inner');
              }
              else {
                  $('.carousel-item').eq(0).appendTo('.carousel-inner');
              }
          }
      }
  });
    </script>


    <link href="assets/css/slick-theme.css" rel="stylesheet"/>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.H-Categorias > div').slick({
                autoplay        :   true,
                autoplaySpeed   :   5000,
                infinite        :   true,
                speed           :   800,
                slidesToShow    :   5,
                centerMode      :   true,
                centerPadding   :   0,
                slidesToScroll  :   1,
                responsive: [{
                  breakpoint: 965,
                  settings: {slidesToShow: 3} },
                {
                  breakpoint: 485,
                  settings: {slidesToShow: 1}
                }]
            });
            $('.H-Categorias2 > div').slick({
                autoplay        :   true,
                autoplaySpeed   :   5000,
                infinite        :   true,
                speed           :   800,
                slidesToShow    :   3,
                centerMode      :   false,
                centerPadding   :   0,
                slidesToScroll  :   1,
                arrows: true,
                responsive: [{
                  breakpoint: 965,
                  settings: {slidesToShow: 2} },
                {
                  breakpoint: 485,
                  settings: {slidesToShow: 1}
                  

                }]
            });
        });



        $(document).ready(function(){
      $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
          pauseOnHover: false,
          responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 3
          }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 2
          }
        }]
      });
    });



    </script>



   

    <script>
      //index2.php menu
      $(document).ready(function () {
  $('.yeti-open-sections-list-button').on('mouseenter', function () {
    $('.yeti-left-two').animate({ scrollTop: 0 }, 1);
    
    $('.yeti-open-sections-list-button, .yeti-open-add-section-button').removeClass('yeti-active');
    $('.yeti-left-two').removeClass('yeti-open');
    $(this).addClass('yeti-active');
    $('.yeti-left-two.yeti-one').addClass('yeti-open');
  });
  
  $('.yeti-open-add-section-button').on('mouseenter', function () {
    $('.yeti-left-two').animate({ scrollTop: 0 }, 1);
    
    $('.yeti-open-sections-list-button, .yeti-open-add-section-button').removeClass('yeti-active');
    $('.yeti-left-two').removeClass('yeti-open');
    $(this).addClass('yeti-active');
    $('.yeti-left-two.yeti-two').addClass('yeti-open');
  });
  
  
  $('.yeti-left-two').on('mouseleave', function () {
    $('.yeti-open-sections-list-button, .yeti-open-add-section-button').removeClass('yeti-active');
    $('.yeti-left-two').removeClass('yeti-open');
  });
  
  $('.yeti-unlock-button').click(function () {
    $('.yeti-unlock-button i').toggleClass('ion-ios-locked-outline, ion-ios-unlocked-outline');
  });
  
});









       function enviar(){

      $(".validate").hide();

      console.log("entro");

      var nombre = $("#nombre").val();
      var correo = $("#correo").val();
      var mensaje = $("#mensaje").val();
      

      if (nombre=="") {
        console.log("no hay nombre");
        $("#validatenombre").show();
        $("#nombre").focus();

      }else if(correo==""){

        console.log("no hay correo");
        $("#validatecorreo").show();
        $("#correo").focus();

      }else if(mensaje==""){

        console.log("no hay mensaje");
        $("#validatemensaje").show();
        $("#mensaje").focus();

        }else{


          $.ajax(
                                  {
                                    url : 'enviarCorreo.php',
                                    type: "POST",
                                    data : {nombre: nombre, correo : correo, mensaje : mensaje}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                 if (data=="1") {
                                      $(".eliminar").remove();
                                      $(".sent-message").show();
                                 }
                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    
                               


      }

    }

    $.removeCookie('aceptoCookies', { path: '/' });


    </script>




  </body>
</html>