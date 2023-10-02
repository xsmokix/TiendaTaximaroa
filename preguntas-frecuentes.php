<?php 
//include "carrito.php";
include "cabecera.php";
require_once "db.php";
    

     
     

 

   ?>



     <!-- hero -->
    <section class="hero hero-small">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h1 class="mb-0 textoAzul">PREGUNTAS FRECUENTES ?</h1>
            
          </div>
        </div>
      </div>
    </section>




  <!-- listing -->
    <section class="pt-0">
      <div class="container">

       

        <div class="row">
           <div class="col-12">
            <br><br><br>
          </div>


          <div class="col-lg-6 text-center">
            <a href="preguntas-frecuentes-envios.php"><h1 class="faqs1">Envíos <i class="fas fa-truck"></i></h1></a>
          </div>
          <div class="col-lg-6 text-center">
            <a href="preguntas-frecuentes-facturacion.php"><h1 class="faqs1">Facturación <i class="fas fa-sticky-note"></i></h1></a>
          </div>
          <div class="col-12">
            <br><br>
          </div>

          <div class="col-lg-6 text-center">
            <a href="preguntas-frecuentes-compra.php"><h1 class="faqs1">Compra <i class="fas fa-shopping-cart"></i></h1></a>
          </div>
          <div class="col-lg-6 text-center">
            <a href="preguntas-frecuentes-devoluciones.php"><h1 class="faqs1">Devoluciones <i class="fas fa-undo-alt"></i></h1></a>
          </div>
           <div class="col-12">
            <br><br><br>
          </div>
          <div class="col-lg-1"></div>
          <div class="col-lg-7">
            <h3 class="textoAzul eliminar">¿Cómo podemos ayudarte?</h3><br>
           
            <textarea class="form-control eliminar" name="pregunta" id="pregunta" cols="5" rows="5" placeholder="Sigues con dudas. Escribe tu pregunta aquí, en breve la atenderemos"></textarea>
            <div id="validatepregunta" class="validate">Para continuar, por favor escribe tu pregunta</div>
          </div>
          <div class="col-lg-4">
            <br><br><br><br><br><br>
            <button class="btnCompletarPedido eliminar" onclick="enviarPregunta(); return false;" style="border:none;">Enviar <i class="fas fa-2x fa-arrow-right" style="position: relative;right: -12px; top: 7px;"></i></button>
            

          </div>
          <div class="col-lg-3"></div>
          <div class="col-lg-6 text-center">
            
            <center>
              
              <div class="sent-message btn-block">Gracias por tu pregunta.</div>
            </center>
          </div>

      

        </div>
      </div>
    </section>


 





    








<?php 
include "pie.php";
include "modals.php"; ?>



   

    
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/main.js"></script>



    <script>



         function enviarPregunta(){

    
$(".validate").hide();
      console.log("entro");

      var pregunta = $("#pregunta").val();
      var usuario= "usuario";
      console.log("pregunta: "+pregunta);
     
      
      

      if(pregunta=="") {
        console.log("no hay pregunta");
        $("#validatepregunta").show();
        $("#pregunta").focus();


      }else{

        console.log("hay pregunta: "+pregunta);
          $.ajax(
                                  {
                                    url : 'enviarPregunta.php',
                                    type: "POST",
                                    data : {usuario: usuario, pregunta : pregunta}
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
 



    </script>



  


  </body>
</html>
