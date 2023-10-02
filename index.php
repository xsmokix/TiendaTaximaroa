<?php 

/* include "carrito.php"; */
include "cabecera.php";
require_once "db.php";

  $productos = $con->query("SELECT * FROM productos WHERE activo ='1' ORDER BY id DESC LIMIT 10");
  $promociones = $con->query("SELECT * FROM promociones WHERE estado = 1");
  $recomendados = $con->query("SELECT * FROM recomendados WHERE estado = 1 ORDER BY orden ASC LIMIT 2");
  $slider = $con->query("SELECT imagen FROM slider WHERE estado ='1' ORDER BY id DESC");
  $y=0;
  ?>
 

<style>
  
.owl-dots {
  text-align: center;
  padding-top: 15px;
}
.owl-dots button.owl-dot {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  display: inline-block;
  background: #ccc;
  margin: 0 3px;
}
.owl-dots button.owl-dot.active {
  background-color: #000;
}
.owl-dots button.owl-dot:focus {
  outline: none;
}
</style>

<div class="container-fluid" style="margin-top: 80px; padding: 0; margin: 0;">
<div class="owl-carousel owl-theme" id="owl-sliderP">

    <?php while($rowslider = $slider->fetch_object()){ ?>
 
    <div class="item text-center">
      <a href="ver_producto.php?id_producto=<?php echo $rowslider->id ?>" target="_blank">
        <picture>
          <source media="(min-width:600px)" srcset="<?php echo $rowslider->imagen ?>.jpg" style="width: 100%;">
          <img loading="lazy" src="<?php echo $rowslider->imagen ?>-movil.jpg" class="img-fluid" alt="">
        </picture>
      </a>
    </div>

  <?php } ?>

</div>

</div><!-- container-fluid -->



    <div class="clearfix"></div>
    <br>



<div class="container">
             


             <div class="row">
              <div class="col-md-4 col-12"></div>
               <div class="col-md-4 col-12 text-center">
                 <div class="row">
                   <div class="col-md-1 col-1"></div>
                   <div class="col-md-10 col-10">
                     <img loading="lazy" class="center-block" src="assets/images/productos-nuevos.png" alt="productos nuevos ferreteria">
                   </div>
                 </div>
               </div>
             </div>




           </div>


<div class="gtco-testimonials">
<div class="owl-carousel owl-theme" id="owl-carousel">

    <?php while($rowproductos = $productos->fetch_object()){ ?>
 
    <div class="item text-center">
      <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>" target="_blank"><img loading="lazy" src="<?php echo $rowproductos->foto1 ?>" class="img-fluid" alt="">
      <span> <?php echo $rowproductos->nombre ?></span></a><br>
      <small><i>Descripción corta del producto...</i></small><br>
      <?php if ($rowproductos->descuento==0) { ?>
       <b>$<?php echo $rowproductos->precio_venta; ?></b>
       <?php }else{ ?>
                        <div class="row">
                          <div class="col-lg-6 text-right">
                            <b class="textoAzul">$<?php echo $rowproductos->precio_venta-$rowproductos->descuento ?></b>
                          </div>
                        <div class="col-lg-6 text-left">
                          <div class="product-price-discount">
                            <span class="line-through">$<?php echo $rowproductos->precio_venta; ?></span>
                          </div>
                        </div>
                        </div>
                      <?php } ?>
      
                    <form action="" method="POST">
                        <input type="hidden" name="id_producto" id="id_producto<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $id_del_producto = $rowproductos->id ?>">
                        <input type="hidden" name="nombre" id="nombre<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $nombre_del_producto = $rowproductos->nombre ?>">
                        <input type="hidden" name="precio_venta" id="precio_venta<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $rowproductos->precio_venta ?>">
                        <input type="hidden" name="cantidad" id="cantidad<?php echo $id_del_producto = $rowproductos->id ?>" value="1">
                        <button name="btnAccion" value="Agregar" type="submit" href="#" class="btnAgregarAlCarrito">Agregar al Carrito</button>
                        <br><br>
                    </form>
    </div>

  <?php } ?>

</div>
</div>




<section id="promociones">
  <div class="container-fluid">
          
          <div class="container">

            <div class="row">
              <div class="col-md-4 col-12"></div>
               <div class="col-md-4 col-12 text-center">
                 <div class="row">
                   <div class="col-md-1 col-1"></div>
                   <div class="col-md-10 col-10">
                     <img loading="lazy" class="center-block" src="assets/images/promociones-especiales.png" alt="promociones ferreteria">
                   </div>
                 </div>
               </div>
             </div>    
          </div><!-- //container-->

    

<style>

</style>


        <div id="owl-demo" class="owl-carousel owl-theme">
          
           <?php while($rowpromociones = $promociones->fetch_object()){ ?>
  <div class="item">
    <a href="<?php echo $rowpromociones->url ?>">
      <img loading="lazy" src="<?php echo $rowpromociones->imagen ?>" alt=" <?php echo $rowpromociones->promocion ?>" class="imagenPromociones" />
    </a>
       <span style="color:#020067;"> <?php echo $rowpromociones->promocion ?></span> <br>
       <small><i class="text-muted">Descripción corta...</i></small><br>
       <a class="btnComprar">Ver más</a>


  </div>
 <?php } ?>

 
</div>






  </div><!-- //container-fluid-->
</section>










<section id="recomendados" style="padding: 0; margin: 0;">
  <div class="container-fluid">
          
          <div class="container">

            <div class="row">
              <div class="col-md-4 col-12"></div>
               <div class="col-md-4 col-12 text-center">
                 <div class="row">
                   <div class="col-md-1 col-1"></div>
                   <div class="col-md-10 col-10">
                     <img loading="lazy" class="center-block" src="assets/images/recomendados.png" alt="promociones ferreteria">
                   </div>
                 </div>
               </div>
             </div>
            <div class="row">
               <?php while($rowrecomendados = $recomendados->fetch_object()){ ?>

              <div class="col-md-6 col-12">
                <img loading="lazy" src="<?php echo $rowrecomendados->imagen ?>" class="img-fluid prodRecomendados" style="min-width: 100%;" alt="recomendados">
                <a href="<?php echo $rowrecomendados->url ?>" class="btnRecomendados">Ver productos</a>
              </div>
              <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
                <br>
              </div>
            <?php } ?>
             
              
            </div><!--//row -->
          </div><!-- //container-->

  </div><!-- //container-fluid-->
</section>


<section class="">
  <div class="container parallaxLogos">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center textoBlanco">Nuestros <b>clientes</b></h3> <br><br>
                  <div class="customer-logos">
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/clientes/medacasa.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/clientes/construcciones.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/clientes/medacasa.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/clientes/construcciones.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/clientes/medacasa.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/clientes/construcciones.png"></div>
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
              <input type="text" id="nombre" name="nombre" placeholder="Nombre completo">
              <div id="validatenombre" class="validate">Captura tu nombre completo</div>
              <input type="email" id="correo" name="correo" placeholder="Correo electrónico">
              <div id="validatecorreo" class="validate">Ingresa un correo válido</div>
              <!-- <input type="text" id="input-subject" placeholder="Subject"> -->
            </div>
            <div class="full cf text-center">
              <textarea cols="30" rows="10" name="mensaje" type="text" id="mensaje" placeholder="Mensaje"></textarea>
              <div id="validatemensaje" class="validate">Escribe un mensaje</div>
            </div>  
            <br>
            <input onclick="enviar(); return false;" type="submit" value="Enviar" id="input-submit" style="max-width: 150px; max-height: 40px;">
          </form>
           <div class="sent-message btn-block">
             <div class="mensajePregunta" style="display:none;">
                <div class="row">
                  <div class="col-md-2 text-right">
                    <i style="color:#4f944f;" class="fas fa-3x fa-check-circle"></i>
                  </div>
                  <div class="col-md-9 text-center">
                    <b class="textoAzul">Mensaje enviado, en breve nos pondremos en contacto contigo</b>
                  </div>
                </div>
                
              </div>
           </div>
          </div>

      </div>



  </div>
</section>

<section class="">
  <div class="container parallaxLogos">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center textoBlanco">Somos <b>distribuidores autorizados</b> de las marcas</h3> <br><br>
                  
                  <div class="customer-logos">
                   <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/rotoplas.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/truper.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/kobrex.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/nacobre.png"></div>
                    <div class="slide"><img loading="lazy"class="logosMarcas" src="assets/images/marcas/dica.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/urrea.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/surtek.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/amanco.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/werner.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/prisa.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/makita.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/bosch.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/dewalt.png"></div>
                    <div class="slide"><img loading="lazy"class="logosMarcas" src="assets/images/marcas/skil.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/philips.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/pennsylvania.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/bticino.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/fanal.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/3m.png"></div>
                    <div class="slide"><img loading="lazy" class="logosMarcas" src="assets/images/marcas/deacero.png"></div>
                  </div>
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
                speed           :   8800,
                slidesToShow    :   3,
                centerMode      :   false,
                centerPadding   :   0,
                slidesToScroll  :   1,
                arrows: true,
                responsive: [{
                  breakpoint: 965,
                  settings: {slidesToShow: 2} },
                {
                  breakpoint: 768,
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

   // $.removeCookie('aceptoCookies', { path: '/' });


    $('#owl-sliderP').owlCarousel({
    autoplay:true,
    loop:true,
    margin:10,
    nav:true,
    dots:true,
    slideSpeed: 3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        },
        1400:{
          items:1
        }
    }
})


    $('#owl-carousel').owlCarousel({
    autoplay:true,
    loop:true,
    margin:10,
    nav:true,
     dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        },
        1400:{
          items:4
        }
    }
})



 
  $("#owl-demo").owlCarousel({
    navigation : true,
    dots:false,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        },
        1400:{
          items:2
        }
    }
  });





  //validar correo form

  $(document).ready(function() {

    $("#correo").keyup(function(){

      console.log("entrando");

        var email = $("#correo").val();

        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $("#validatecorreo").hide();
            } else {
                $("#validatecorreo").show();
            }
        } else {
            $("#validatecorreo").hide();         
        }

    });

});


  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
  
 


//carousel 
$(document).ready(function(){
  $('.carousel').carousel({
  interval: 6000
  });
});


    </script>




  </body>
</html>