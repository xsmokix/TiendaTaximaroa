<?php 
include "carrito.php";
include "cabecera.php";
include "lib/configpaypal.php";
require_once "db.php";
?>

    <!-- hero -->
    <section class="hero">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
           
            <h1 class="mb-2">Pago exitoso</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item"><a href="https://vendor.webuildthemes.com/listing-1.html">Volver a comprar</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>



    <section class="pt-0">
      <article class="container">

        <!-- paragraph -->
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            <p>Tu compra se ha completado correctamente, confirmaremos y haremos el envío de tu pedido</p>
            <p>Para cualquier duda comunicate con nosotros</p>
          </div>
        </div>

       




      </article>
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
          <i class="textoAzul fas fa-clock"></i> Lunes a viernes de 9:00 a 16:30 y sábados de 9:00 a 14:00 hrs <br>
          <i class="textoAzul fas fa-envelope"></i> contacto@ferreteriataximaroa.com <br>
       <i class="textoAzul fas fa-phone-alt"></i> 443-323 0827</p>
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





    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>





  <?php include "pie.php"; ?>
