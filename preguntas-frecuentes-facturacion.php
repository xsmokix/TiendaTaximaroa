<?php 
//include "carrito.php";
include "cabecera.php";
require_once "db.php";
    


   ?>

<style>
  
.accordion .accordion-item {
  border-bottom: 1px solid #e5e5e5;
}
.accordion .accordion-item button[aria-expanded=true] {
  border-bottom: 1px solid #03b5d2;
}
.accordion button {

  position: relative;
  display: block;
  text-align: left;
  width: 100%;
  padding: 1em 10px;
  color: #00006A;
  font-size: 1.15rem;
  font-weight: 400;
  border: none;
  background: #e5e5e5;
  outline: none;
  margin-bottom: 10px;

}
.accordion button:hover, .accordion button:focus {
  cursor: pointer;
  color: #03b5d2;
}
.accordion button:hover::after, .accordion button:focus::after {
  cursor: pointer;
  color: #03b5d2;
  border: 1px solid #03b5d2;
}
.accordion button .accordion-title {
  padding: 1em 1.5em 1em 0;
}
.accordion button .icon {
  display: inline-block;
  position: absolute;
  top: 18px;
  right: 10px;
  width: 22px;
  height: 22px;
  border: 1px solid;
  border-radius: 22px;
}
.accordion button .icon::before {
  display: block;
  position: absolute;
  content: "";
  top: 9px;
  left: 5px;
  width: 10px;
  height: 2px;
  background: currentColor;
}
.accordion button .icon::after {
  display: block;
  position: absolute;
  content: "";
  top: 5px;
  left: 9px;
  width: 2px;
  height: 10px;
  background: currentColor;
}
.accordion button[aria-expanded=true] {
  color: #03b5d2;
}
.accordion button[aria-expanded=true] .icon::after {
  width: 0;
}
.accordion button[aria-expanded=true] + .accordion-content {
  opacity: 1;
  max-height: 15em;
  transition: all 200ms linear;
  will-change: opacity, max-height;
}
.accordion .accordion-content {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transition: opacity 200ms linear, max-height 200ms linear;
  will-change: opacity, max-height;
}
.accordion .accordion-content p {
  font-size: 1rem;
  font-weight: 300;
  margin: 2em 0;
  color: #00006A;
}




/* Base for label styling */
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: 0;
  opacity: 0.01;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 2.3em;
  font-size: 1.05em;
  line-height: 1.7;
  cursor: pointer;
  top: 25px;
}

/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 1.4em;
  height: 1.4em;
  border: 1px solid #aaa;
  background: #fff;
  border-radius: 0.2em;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 0 rgba(203, 34, 237, 0.2);
  -webkit-transition: all 0.275s;
  transition: all 0.275s;
}

/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: "✕";
  position: absolute;
  top: 0.525em;
  left: 0.1em;
  font-size: 1.375em;
  color: #00006A;
  line-height: 0;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}

/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after {
  opacity: 0;
  -webkit-transform: scale(0) rotate(45deg);
  transform: scale(0) rotate(45deg);
}

[type="checkbox"]:checked + label:after {
  opacity: 1;
  -webkit-transform: scale(1) rotate(0);
  transform: scale(1) rotate(0);
}



/* Accessibility */
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1),
    0 0 0 6px rgba(203, 34, 237, 0.2);
}

</style>


     <!-- hero -->
    <section class="hero hero-small">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            
            
          </div>
        </div>
      </div>
    </section>




  <!-- listing -->
    <section class="pt-0">
      <div class="container">

       

        <div class="row">
           <div class="col-lg-4">
          


         
         
            <a href="preguntas-frecuentes-envios.php"><h1 class="faqs text-center"><i class="fas fa-truck"></i><br>Envios</h1></a> <br>
            <a href="preguntas-frecuentes-compra.php"><h1 class="faqs text-center"><i class="fas fa-shopping-cart"></i><br>Compra</h1></a>     <br>     
            <a href="preguntas-frecuentes-devoluciones.php"><h1 class="faqs text-center"><i class="fas fa-undo-alt"></i><br>Devoluciones</h1></a>
          
         </div>

         <div class="col-lg-8">
           <center><h1 class="mb-0 textoAzul">FACTURACIÓN</h1></center>
           <br><br>


           <div class="container">

  <div class="accordion">
    <?php 
          $preguntas = $con->query("SELECT * FROM preguntas_frecuentes WHERE categoria='facturacion' AND estado='1'");  
          while($rowpreguntas = $preguntas->fetch_object()){ ?>

            <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title"><?php echo $rowpreguntas->pregunta; ?> </span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p><?php echo $rowpreguntas->respuesta; ?>
          <br><hr>
         <b class="textoAzul">¿Te fue útil está información?</b> <br> Me pareció útil  <input onclick="meParecioUtil();" class="inputUtil"  type="checkbox" id="test<?php echo $rowpreguntas->id; ?>" /><label style="display: inline-block;" for="test1"></label>    &nbsp;&nbsp; No, necesito más información  <input type="checkbox" id="test2" onclick="mostrarForm(); return false;" /><label style="display: inline-block;" for="test2"></label> 
       </p>
        
      </div>
    </div>

  <?php   }    ?>
    
  </div>
</div>



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

      //accordeon de preguntas frecuentes
      const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));



function mostrarForm(){
$('#faqs').modal('toggle');
}

    </script>






  


  </body>
</html>
