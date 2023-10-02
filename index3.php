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






    <!-- hero -->
    <div class="container-fluid fondoAzulTrans">
      <div class="row">
        >
        <div class="col-12" style="padding: 0 !important;">

          <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="image image-overlay image-zoom" style="background-image:url('assets/images/slider/herramientas.jpg')"></div>
          <div class="container">
            <div class="row align-items-center vh-100">
              <div class="col-lg-8 text-white" data-swiper-parallax-x="-100%">
                <h4 class="display-1 mt-1 mb-3 font-weight-light">TENEMOS LAS MEJORES MARCAS <b class="d-block">de herramientas, equipos, consumibles y accesorios</b></h4>
                <!-- <a href="listing-full.html" class="btn btn-sm btn-white btn-action">Shop Now <span class="icon-arrow-right"></span></a> -->
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="image image-overlay image-zoom" style="background-image:url('assets/images/slider/herramientas2.jpg')"></div>
          <div class="container">
            <div class="row align-items-end align-items-center vh-100">
              <div class="col-lg-8 text-white" data-swiper-parallax-x="-100%">
                <h4 class="display-1 mb-2 font-weight-light"> Contamos con  <b>un amplio portafolio de productos</b></h4>
                <!-- <a href="listing-full.html" class="btn btn-sm btn-white btn-action">Shop Now <span class="icon-arrow-right"></span></a> .-->
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
      
    </div>


    
    

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

<br><br>

<?php 
  require_once "db.php";
  $categorias = $con->query("SELECT * FROM categorias");
  $promociones = $con->query("SELECT * FROM promociones");
  $recomendados = $con->query("SELECT * FROM recomendados");
    ?>

<div class="container">
             <div class="row">
              <div class="col-5"></div>
               <div class="col-2 text-center">
                 <img class="center-block" src="assets/images/categorias.png" alt="categorias ferreteria">
               </div>
             </div>
           </div>
     <div class="contenedor H-Categorias">
           
            <div>

               <?php while($rowcategorias = $categorias->fetch_object()){ ?>
                <figure>
                    <a href="ver_categoria.php?categoria_seleccionada=<?php echo $rowcategorias->id ?>" >
                        <img src=" <?php echo $rowcategorias->imagen ?>" alt=" <?php echo $rowcategorias->nombre ?>" />
                        <span> <?php echo $rowcategorias->nombre ?></span>
                    </a>
                </figure>


               <?php } ?>
                <figure>
                   <a href="ver_categoria.php?categoria_seleccionada=todas" >
                        <img src="assets/images/categorias/Ver_Todo_categorias.png" alt="Ver todo" />
                        <span>Ver todo</span>
                    </a>
                </figure>
              </div>
        </div>




<section id="promociones">
  

  <div class="container-fluid bgAzul">
          
          <div class="container">

            <div class="row">
              <div class="col-4"></div>
               <div class="col-4 text-center">
                 <div class="row">
                   <div class="col-1"></div>
                   <div class="col-10">
                     <img class="center-block" src="assets/images/promociones.png" alt="promociones ferreteria">
                   </div>
                 </div>
               </div>
             </div>
            <div class="row">
               <?php while($rowpromociones = $promociones->fetch_object()){ ?>
              <div class="col-6" style="padding-bottom: 15px;">
                <img src="<?php echo $rowpromociones->imagen ?>" class="img-fluid" alt="ofertas">
              </div>
               
            <?php  } ?>
            </div>
            
          </div><!-- //container-->

  </div><!-- //container-fluid-->
</section>




<section class="parallaxLogos">
  <div class="container ">
    <div class="row">
      <div class="col-12">

        <h3 class="text-center textoBlanco">Somos <b>distribuidores autorizados</b> de las marcas</h3> <br><br>
                  


                  <div class="customer-logos">
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/milwaki.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/truper.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/bosch.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/makita.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/3m.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/blackand.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/mikels.png"></div>
                    <div class="slide"><img  class="logosMarcas" src="assets/images/marcas/hitachi.png"></div>
                  </div>




      </div>
    </div>
  </div>
</section>





<section id="recomendados">
  

  <div class="container-fluid">
          
          <div class="container">

            <div class="row">
              <div class="col-4"></div>
               <div class="col-4 text-center">
                 <div class="row">
                   <div class="col-1"></div>
                   <div class="col-10">
                     <img class="center-block" src="assets/images/recomendados.png" alt="promociones ferreteria">
                   </div>
                 </div>
               </div>
             </div>
            <div class="row">
               <?php while($rowrecomendados = $recomendados->fetch_object()){ ?>

              <div class="col-3">
                <img src="<?php echo $rowrecomendados->imagen ?>" class="img-fluid" alt="recomendados">
              </div>
            <?php } ?>
             
              
            </div><!--//row -->


            <div class="row">
              <div class="col-6">
                <img src="assets/images/compra-segura.jpeg" class="img-fluid w-100" alt="">
              </div>
               <div class="col-6">
                <img src="assets/images/masde9.png" class="img-fluid" alt="">
              </div>
            </div>


            <div class="row">
              <div class="col-12">
                <img src="assets/images/pagos.jpg" class="img-fluid" alt="">
              </div>
              
            </div>

          </div><!-- //container-->

  </div><!-- //container-fluid-->
</section>



<section>
  <div class="container-fluid">
    <div class="row">


  <div class="col-1"></div>
  <div class="col-2 text-center gtm_class fifth-block" data-element="Compra en línea y recoge tu or">
    <div class="lp-benefits-square">
      <a href="/ayuda">
      <div class="img-wrap">
        <img src="assets/images/recoge.jpg" class="iconos" alt="bopis">
      </div>
      <h5 class="text-center">
        Recoge en tienda sin costo
      </h5>
      <p class="text-anchor">
        Compra en línea y recoge tu orden en tienda
      </p>
      </a>
    </div>
  </div>
  <div class="col-2 text-center gtm_class fifth-block" data-element="Igualamos el precio más bajo d">
    <div class="lp-benefits-square">
      <a href="/promociones">
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
  <div class="col-2 text-center gtm_class fifth-block" data-element="Más variedad en estilos y tecn">
    <div class="lp-benefits-square">
      <a href="/catalogo-extendido">
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
  <div class="col-2 text-center gtm_class fifth-block" data-element="En compras en línea arriba de ">
    <div class="lp-benefits-square">
      <a href="/condiciones-envios-en-linea">
      <div class="img-wrap">
        <img src="assets/images/envios.jpg" class="iconos" alt="envio">
      </div>
      <h5 class="text-center">
        Envíos gratis en todo el sitio
      </h5>
      <p class="text-anchor">
        En compras en línea arriba de $499<sup>†</sup>
      </p>
      </a>
    </div>
  </div>
  <div class="col-2 text-center gtm_class fifth-block" data-element="Tus compras en línea y datos p">
    <div class="lp-benefits-square">
      <a href="/como-comprar">
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




<section class="bgGris">
  <div class="container">
    <div class="row">
      <div class="col-4 barragris">
        <h3 class="textoAmarillo">Ferretería Taximaroa</h3>
        <p>Conócenos y súmate a la larga lista de clientes satisfechos que nos recomiendan. Queremos cumplir tus expectativas con productos de construcción y productos de ferretería nacionales e importados, 100% garantizados.</p>
      </div>
      <div class="col-4 barragris">
        <h3 class="textoAmarillo">Contacto</h3>
        <p><i class="textoAzul fas fa-map-marker-alt"></i> Calle Fray Sebastián de Aparicio 23 Buena Vista 2da Etapa 58228 Morelia, Mich. México <br>
          <i class="textoAzul fas fa-clock"></i> Lunes a viernes de 9:00 a 18:45 hrs <br> Sábado de 8:00 a 14:00 hrs <br>
          <i class="textoAzul fas fa-envelope"></i> contacto@ferreteriataximaroa.com <br>
       <i class="textoAzul fas fa-phone-alt"></i> 443-323 0827 <br> <i class="textoAzul fas fa-phone-alt"></i> 443-323 4197</p>
      </div>
      <div class="col-4">
         <h3 class="textoAmarillo">Escríbenos</h3>
         <form class="cf">
  <div class="half left cf">
    <input type="text" id="input-name" placeholder="Nombre">
    <input type="email" id="input-email" placeholder="Correo">
    <!-- <input type="text" id="input-subject" placeholder="Subject"> -->
  </div>
  <div class="half right cf">
    <textarea name="message" type="text" id="input-message" placeholder="Mensaje"></textarea>
  </div>  
  <input type="submit" value="Enviar" id="input-submit">
</form>
      </div>
    </div>
  </div>
</section>

<?php 
include "pie.php";
include "modals.php";
 ?>

<!-- 
<footer>
  

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar10">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar10">
            <ul class="navbar-nav nav-fill w-100">
                <li class="nav-item paddingNav">
                    <a class="nav-link" href="#">INICIO</a>
                </li>
                <li class="nav-item paddingNav">
                    <a class="nav-link" href="nosotros.php">NOSOTROS</a>
                </li>
                <li class="nav-item paddingNav">
                    <a class="nav-link" href="ver_categoria.php?categoria_seleccionada=todas">PRODUCTOS</a>
                </li>
                 <li class="nav-item paddingNav">
                    <a class="" href="#"><img src="assets/images/logogris.png" class="img-fluid logogris" alt=""></a>
                </li>
                <li class="nav-item paddingNav">
                    <a class="nav-link" href="#">MARCAS</a>
                </li>
                <li class="nav-item paddingNav">
                    <a class="nav-link" href="#">CATALOGO</a>
                </li>
                <li class="nav-item paddingNav">
                    <a class="nav-link" href="#">CONTACTO</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<hr class="style13">

<div class="container">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <span class="textoBlanco">Aviso de Privacidad</span>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<span class="textoBlanco">Aviso Legal</span>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<span class="textoBlanco">Terminos y condiciones</span> <br>
      <span class="textoAmarillo">Ferretería Taximaroa. Todos los derechos reservados 2020</span>
    </div>
  </div>
</div>


</footer>
-->


    <!-- search -->
    <!--<div class="modal fade search" id="search" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <input type="text" id="txt_search" name="txt_search" class="form-control" placeholder="Buscar un producto aquí" aria-label="Buscar un producto aquí" aria-describedby="button-addon2">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>


          </div>
          <ul id="searchResult"></ul>
        </div>
      </div>
    </div> -->






<!-- 
    <div>
        <input type="text" id="txt_search" name="txt_search">
    </div>
    <ul id="searchResult"></ul>

 -->

    
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>


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
            $('.H-SliderCentros').slick({
                autoplay        :   true,
                autoplaySpeed   :   5000,
                infinite        :   true,
                speed           :   800,
                slidesToShow    :   5,
                // slidesToShow    :   4,
                slidesToScroll  :   1,
                responsive: [{
                  breakpoint: 965,
                  settings: {slidesToShow: 3} },
                {
                  breakpoint: 740,
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



    <script src="assets/js/main.js"></script>



  </body>
</html>