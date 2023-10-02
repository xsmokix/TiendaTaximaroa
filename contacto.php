<?php 
include "carrito.php";
include "cabecera.php";
include "lib/configpaypal.php";
require_once "db.php";
?>

<style>
  
.contacto{
  color: #F7CC19 !important;
  text-align: center;
  position: absolute;
  right: 2rem;
  bottom: 1rem;
  text-shadow: 2px 2px 9px rgba(150, 150, 150, 1);
}

.contacto small{
  color: white;
  font-size: 20px;
  line-height: 2px !important;
}




.bgContacto{
  background: url('assets/images/contacto.jpg') no-repeat center center fixed rgba(255, 0, 150, 0.3);;  
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  width: 100%; 
  height: 230px;

}

#overlay{
height:100%;
width:100%;
background-color:rgba(255,255,255,0.3);
}


.textoContacto{
  font-size: 14px;
}

.formContacto input, .formContacto textarea{
  background-color: #dddddd;
  padding: .3em;
}

.formContacto label{
  font-size: 13px;
}

.formContacto a{
  font-size: 13px;
  text-align: center !important;
  margin-bottom: 10px;
}
#input-submit1{
  background-color: #009BDE;
  color: white;
  padding: 5px 40px 5px 40px;
  border: 0;
  border-radius: 5px;
}
#input-submit1:hover{
  color: #F7CC19;
  background-color: #27278F;
}


.modal {
text-align: center;
padding: 0!important;
}

.modal:before {
content: '';
display: inline-block;
height: 100%;
vertical-align: middle;
margin-right: -4px;
}

.modal-dialog {
display: inline-block;
text-align: left;
vertical-align: middle;
}

</style>


    <!-- lookbook -->
    <section>
      <div class="container-fluid bgContacto" style="padding: 0 !important;">
            
            <div id="overlay">
              <div class="container" style="padding-top: 110px;">
              <div class="row">
                <br><br><br><br>
                <div class="col-lg-2 d-none d-sm-none d-md-block d-lg-block text-center">
                  <i class="fas fa-4x fa-hands-helping" style="color:white;"></i>
                </div>
                <div class="col-lg-8 col-12 text-center">
                  <h2 class="textoAzul teAyudamos" style="font-weight: bold;">Trabajamos contigo, lo hacemos mejor</h2>
                </div>
                <div class="col-lg-2 d-none d-sm-none d-md-block d-lg-block text-center">
                  <i class="fas fa-4x fa-hands-helping" style="color:white;"></i>
                </div>
              </div>
            </div>
            </div>

      
    </section>

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
    <br><h3 class="text-center textoAzul" style="font-weight: bold;">¿Cómo podemos ayudarte?</h3><br>
             <p class="text-justify textoAzul">Si deseas consultar mayor información sobre nuestros productos y servicios o tienes alguna duda, no lo pienses solicita información y uno de nuestros colaboradores te atenderá con gusto.</p>

             <div class="row">
               <div class="col-md-6">
                 

                 <form class="formContacto eliminar" id="formularioContacto">
            <div class="full cf">
              <label for="nombre">Nombre completo</label>
              <input type="text" id="nombre" name="nombre">
              <div id="validatenombre" class="validate">Captura tu nombre</div>
              <label for="correo">Correo electrónico</label>
              <input type="email" id="correo" name="correo">
              <div id="validatecorreo" class="validate">Captura tu correo</div>
            </div>
            <div class="full cf text-left">
              <label for="mensaje">Mensaje</label>
              <textarea cols="30" rows="10" name="mensaje" type="text" id="mensaje"></textarea>
              <div id="validatemensaje" class="validate">Escribe un mensaje</div>
            </div>  
            <center>
              <a href="">Política de privacidad</a>
            
            <br>
            <button onclick="enviarContacto(); return false;"  id="input-submit1" >Enviar mensaje</button>
            </center>
          </form>


          


               </div>
             </div>
           
          </div>
          <div class="col-md-2"></div>
          <div class="d-block d-sm-block d-md-none d-lg-none">
            <hr>
          </div>
        
          <div class="col-md-4 text-center">
             <br><h4 class="text-center textoAzul">¡Ven y conócenos!</h4><br>

    
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.138236893992!2d-101.16430038460167!3d19.706737936962792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842d0e02ac7f6875%3A0xbe4fd8198696cb8a!2sC.%20Fray%20Sebasti%C3%A1n%20de%20Aparicio%2023%2C%20Buena%20Vista%202da%20Etapa%2C%2058228%20Morelia%2C%20Mich.!5e0!3m2!1ses!2smx!4v1618547955231!5m2!1ses!2smx" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             <br>
             <p class="text-left textoContacto">
               Fray Sebastián de Aparicio #23 <br>
               Col. Buena Vista <br>
               Morelia, Michoacán <br>
               CP 58228 <br><br>
               <a href="mailto:contacto@ferreteriataximaroa.com">contacto@ferreteriataximaroa.com</a>
             </p>
             <p>
               <a href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/taximaroa/ver_producto.php?id_producto=11" target="_blank"><img src="assets/images/iconos/fb.jpg" style="max-width: 30px;" alt="icono facebook"></a> &nbsp;&nbsp;&nbsp;
               <a href="https://api.whatsapp.com/send?text=http://localhost/taximaroa/ver_producto.php?id_producto=11" target="_blank"><img src="assets/images/iconos/whatsapp.jpg" style="max-width: 30px;" alt="icono facebook"></a>
             </p>
             <br><br><br>
           
            
          </div>
        </div>
      
      
      </div>

   








<?php 
include "pie.php";
include "modals.php"; ?>

<!--
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script> -->


    <script>
      function enviarContacto(){

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

                                  $('#graciasContacto').modal('show');

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
  

  
    </script>


</body>
</html>