 <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <input type="text" id="txt_search1" name="txt_search1" class="form-control" placeholder="Buscar un producto aquí" aria-label="Buscar un producto aquí" aria-describedby="button-addon2">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>


          </div>
          <ul id="searchResult"></ul>
        </div>
      </div>
    </div>


    <!-- Modal Cotización -->
<div class="modal fade" id="cotizacion" tabindex="-1" role="dialog" aria-labelledby="cotizacion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-12 text-center">
         <h4 class="textoAzul">Solicitud de Cotización</h4> <br>
         <form class="formularioContacto eliminar" id="formularioContacto">
            <div class="full cf">
              <input type="text" id="nombreCot" name="nombre" placeholder="Nombre completo">
              <div id="validatenombreCot" class="validateCot" style="display: none;">Captura tu nombre completo</div>
              <input type="email" id="correoCot" name="correo" placeholder="Correo electrónico">
              <div id="validatecorreoCot" class="validateCot" style="display: none;">Captura tu correo</div>

            </div>
            <div class="full cf text-center">
              <input  type="text" id="txt_search_cotizacion" name="txt_search_cotizacion" class="form-control1" placeholder="Busca el producto que quieres cotizar" aria-label="Busca el producto que quieres cotizar">
              <!-- <textarea cols="30" rows="10" name="mensaje" type="text" id="mensaje" placeholder="¿Qué productos necesitas cotizar?"></textarea> -->
           
            </div> 
            <br>
            <ul id="searchResultCotizacion"></ul>
            
            <br>
            <label>¿El producto qué buscabas no se encuentra?</label>
            <input name="cotizarProducto" type="text" id="cotizarProducto" placeholder="Ingrésalo aquí"></input>
            <button onclick="agregarEsteProducto(); return false;" style="background-color: #F7CC19; padding: 5px; font-size: 10px;color: white; border-radius: 5px; border: none;">Agregar a cotización</button>
            <br><br>
             <ul id="searchResultCotizacion1" style="display: none;">
              <ul><b>Productos a cotizar</b></ul>
            </ul>

            
            <input onclick="cotizacion(); return false;" type="submit" value="Solicitar cotización" id="input-submit" style="max-width: 200px; max-height: 40px;">
          </form>
           <div class="sent-messageCot btn-block">Mensaje enviado, en breve responderemos a tu cotización.</div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cotización -->


<!-- modal pregrunta de productos MOSTRAR SOLO EN X PÁGINA -->
<?php if (basename($_SERVER['PHP_SELF'])=="ver_producto.php") { ?>
<div class="modal fade" id="preguntar" tabindex="-1" role="dialog" aria-labelledby="preguntar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title textoAzul" id="exampleModalLabel">Pregunta acerca del producto <?php echo $nombre_del_producto ?> (<?php echo $id_del_producto ?>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 

 <form name="contactform" id="contactformPregunta" >
      <div class="name">
        <label style="font-size: 12px; font-weight: bold;" for="name">Tu nombre</label>
        <input type="text" id="pregunta_nombre" name="name" <?php if (isset($_SESSION['nombre']))  { ?> value="<?php echo $rowClientes->nombreCompleto; ?>" <?php }else{ ?> value="Ingresa tu nombre" <?php } ?> />
      </div>
      <div class="email">
        <label style="font-size: 12px; font-weight: bold;" for="email">Correo electrónico</label>
        <input type="text" id="pregunta_correo" name="email" <?php if (isset($_SESSION['nombre']))  { ?> value="<?php echo $rowClientes->correo; ?>" <?php }else{ ?> value="Ingresa tu correo" <?php } ?> /> 
      </div>
      <div class="message">
        <label style="font-size: 12px; font-weight: bold;" for="message">Pregunta o comentario</label>
        <textarea name="message" id="pregunta_pregunta" name="message"></textarea>
      </div>
      <br>
      <div style="text-align:center !important;">
        <div class="g-recaptcha center-block" data-sitekey="6LeWJEwaAAAAAHOEe8Je2WTqaGJkAy7m_Ku3Eqsf"></div>
        <input type="checkbox" id="human" name="human" />
        <!-- <label for="human">Soy humano.</label> -->
      </div>
      <br>
      <div class="submit text-center">
        <p class="user-message" id="contactblurb"> Preguntas, sugerencias y comentarios en general también son importantes para nosotros</p>
<input onclick="preguntar(); return false;" type="submit" value="Enviar" id="input-submit" style="max-width: 200px; max-height: 40px;">      </div>

</form>

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
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<!-- modal pregrunta de productos MOSTRAR SOLO EN X PÁGINA -->


    <!-- Modal -->
<div class="modal fade" id="graciasContacto" tabindex="-1" role="dialog" aria-labelledby="graciasContacto" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">

          <h3 class="textoAzul">Gracias por contactarnos <br>estamos atendiendo tu solicitud</h3>
          <i class="far fa-4x fa-thumbs-up"></i> <br><br>
          <button type="button" class="btn btn-sm btn-warning" style="border-radius: 10px;" data-dismiss="modal">Ok</button>


  </div>
    </div>
  </div>
</div>

    <!-- Modal -->
<div class="modal fade" id="tipoDeEnvio" tabindex="-1" role="dialog" aria-labelledby="tipoDeEnvio" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">

        <p class="text-justify">
          Nuestro compromiso es ofrecerte los mejores productos a excelentes precio, así como el envío hasta el lugar que lo necesites, sin embargo, algunos productos por tema de dimensiones, peso o disponibilidad, sólo pueden ser enviados a la ciudad de Morelia y sus alrededores.
        </p>
        <p class="text-justify">
          Así mismo, tenemos otros productos que pueden ser enviados a cualquier parte de la república mexicana a través de paquetería. Lamentamos si tu producto no es elegible para su envío a tu ubicación, si necesitas atención personalizada o más información, no dudes en contactarnos.
        </p>
        <p class="text-center">
             <a href="tel:4433230827"><i class="textoAzul fas fa-phone-alt"></i> 443-323 0827</a>
        </p>

          <button type="button" class="btn btn-sm btn-warning" style="border-radius: 10px;" data-dismiss="modal">Cerrar</button>


  </div>
    </div>
  </div>
</div>




    <!-- Modal -->
<div class="modal fade" id="iniciarSesion" tabindex="-1" role="dialog" aria-labelledby="iniciarSesion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title textoAzul" id="exampleModalLabel">Acceso al panel de cliente <br><small>Por favor ingresa tu usuario y contraseña</small></h3>
        <button style="position: absolute;right: 0; top: 40px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body text-center">


          <form class="form-signin" role="form" >
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    
                    <input class="form-control" name="usuario" id="usuario" placeholder="Usuario" type="text" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    
                    <input class="form-control" name="password" id="password" placeholder="Password" type="password" required>
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="button" onclick="ingresar(); return false;" class="btn btn-primary my-4">Ingresar</button>
                </div>
              </form>

              <div class="row mt-3">
            <div class="col-6">
              <a href="clientes/recuperar.php" class="textoLinks"><small>¿Olvidaste tu contraseña?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="clientes/registrarse.php" class="textoLinks"><small>Crear cuenta</small></a>
            </div>
          </div>


  </div>
    </div>
  </div>
</div>



 <!-- Modal -->
<div class="modal fade" id="iniciarSesionCarrito" tabindex="-1" role="dialog" aria-labelledby="iniciarSesionCarrito" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title textoAzul" id="exampleModalLabel">Acceso al panel de cliente <br><small>Por favor ingresa tu usuario y contraseña</small></h3>
        <button style="position: absolute;right: 0; top: 40px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body text-center">


          <form class="form-signin" role="form" >
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    
                    <input class="form-control" name="usuario" id="usuarioCarrito" placeholder="Usuario" type="text" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    
                    <input class="form-control" name="password" id="passwordCarrito" placeholder="Password" type="password" required>
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="button" onclick="ingresarCarrito(); return false;" class="btn btn-primary my-4">Ingresar</button>
                </div>
              </form>

              <div class="row mt-3">
            <div class="col-6">
              <a href="clientes/recuperar.php" class="textoLinks"><small>¿Olvidaste tu contraseña?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="clientes/registrarse.php" class="textoLinks"><small>Crear cuenta</small></a>
            </div>
          </div>


  </div>
    </div>
  </div>
</div>


<!-- Modal FAQS -->
<div class="modal fade" id="faqs" tabindex="-1" role="dialog" aria-labelledby="faqs" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        

        <div class="row">
          <div class="col-12 text-center">
         <h4 class="textoAzul">¿Cómo podemos ayudarte?</h4> <br>
         <form class="formularioContacto eliminar" id="formularioContacto">
            
            <div class="full cf text-center">
              
              <textarea class="form-control" cols="30" rows="10" name="mensaje" type="text" id="pregunta" placeholder="Escríbe tu pregunta"></textarea>
              <div id="validatepregunta" class="validate">Para continuar, por favor escribe tu pregunta</div>
             
            </div> 
           
            
            

            
            <input onclick="enviarPregunta(); return false;" type="submit" value="Enviar" id="input-submit" style="max-width: 200px; max-height: 40px;">
          </form>
           
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal FAQS gracias -->
<div class="modal fade" id="faqsGracias" tabindex="-1" role="dialog" aria-labelledby="faqsGracias" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        

        <div class="row">
          <div class="col-12 text-center">
         <img  src="assets/images/gracias.jpg" data-dismiss="modal" class="img-responsive" alt="">
          </div>
        </div>


      </div>
   
    </div>
  </div>
</div>


<!-- Modal FAQS -->
<div class="modal fade" id="modalMercadoPago" tabindex="-1" role="dialog" aria-labelledby="faqs" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        

        <div class="row">
          <div class="col-12 text-center">
         <h4 class="textoAzul">Pagar con mercado pago</h4> <br>
         
                <!-- Step #2 -->
                <h5>El total a pagar es de: $<div id="totalConMercadoPago"></div> pesos</h5>
                <small>Por favor ingresa tus datos de tarjeta</small>
            <form id="form-checkout" method="post" action="mercado_pago.php" >
               <input class="form-control" type="text" name="cardNumber" id="form-checkout__cardNumber" />
               <input class="form-control" type="text" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" />
               <input class="form-control" type="text" name="cardExpirationYear" id="form-checkout__cardExpirationYear" />
               <input class="form-control" type="text" name="cardholderName" id="form-checkout__cardholderName"/>
               <input class="form-control" type="email" name="cardholderEmail" id="form-checkout__cardholderEmail"/>
               <input class="form-control" type="text" name="securityCode" id="form-checkout__securityCode" />
               <select style="background-position-x: 95%;" class="form-control" name="issuer" id="form-checkout__issuer"></select>
               <select style="background-position-x: 95%;" class="form-control" name="identificationType" id="form-checkout__identificationType"></select>
               <input class="form-control" type="text" name="identificationNumber" id="form-checkout__identificationNumber"/>
               <select style="background-position-x: 95%;" class="form-control" name="installments" id="form-checkout__installments"></select>
               <hr>
               <button class="mercadopago-button1" type="submit" id="form-checkout__submit">Pagar</button>
               <!-- <progress value="0" class="progress-bar">Cargando...</progress> -->
            </form>
           
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Pago en efectivo -->
<div class="modal fade" id="modalPagoEnEfectivo" tabindex="-1" role="dialog" aria-labelledby="pagoEnEfectivo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        

        <div class="row">
          <div class="col-12 text-center">
         <h4 class="textoAzul">Realiza tu pago en efectivo</h4> <br>
         
              <img src="assets/images/pagoEnEfectivo1.jpg" class="img-fluid" alt="">
              <img src="assets/images/pagoEnEfectivo2.jpg" class="img-fluid" alt="">
              <img src="assets/images/pagoEnEfectivo3.jpg" class="img-fluid" alt="">
           
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Pago en Paypal -->
<div class="modal fade" id="modalPagoPaypal" tabindex="-1" role="dialog" aria-labelledby="pagoPaypal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        

        <div class="row">
          <div class="col-12 text-center">
         <h4 class="textoAzul">Realiza tu con PayPal</h4> <br>
         
              <img src="assets/images/pagoEnEfectivo1.jpg" class="img-fluid" alt="">
              <img src="assets/images/pagoPaypal2.jpg" class="img-fluid" alt="">
              <img src="assets/images/pagoPaypal3.jpg" class="img-fluid" alt="">
           
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal mapa google -->
<div class="modal fade" id="modalMaps" tabindex="-1" role="dialog" aria-labelledby="maps" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        

        <div class="row">
          <div class="col-12 text-center">
         <h4 class="textoAzul">Ubicación de envío</h4> <br>
         
               <p>La ubicación que mostramos en el <b>mapa</b> corresponde a toda el área que abarca el <b class="textoAzul">código postal</b> que seleccionaste, no es la ubicación exacta de entrega de tu pedido, por lo que sólo deberás corroborar que tu ubicación real este cerca, de está forma el costo del envío no cambiará</p>
               <b>Si la ubicación que muestra el mapa <b class="textoRojo">NO</b> está cerca de la dirección de entrega, revisa que el código postal que ingresaste sea correcto, evita que tu pedido no llegué a su destino o se generen cargos adicionales de entrega.</b>
           
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


