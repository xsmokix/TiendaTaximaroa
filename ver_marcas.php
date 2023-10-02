<?php 
//include "carrito.php";
include "cabecera.php";
require_once "db.php";
    
?>

    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <!-- <h1 class="mb-0">Tienda virtual</h1> -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a> > <a href="marcas.php">Marcas</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

     <!-- listing -->
    <section class="pt-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
                <div id="search1">
                  <input type="text" id="txt_search1" placeholder="Filtrar marca"/>
                  <button id="button"><i class="fa fa-search"></i></button>
                </div>
                <ul id="searchResult1"></ul>
          </div>
          <br>
        </div><!-- row -->
      </div>
    </section>


  <!-- listing -->
    <section class="pt-0">
      <div class="container">
        <div class="row">
          <!-- content -->
          <div class="col" id="contenedorTienda">
            <div class="row gutter-2 gutter-lg-3">
               <?php 
                $marcas = $con->query("SELECT * FROM marcas WHERE estado = 1 ORDER BY orden ASC");
                while($rowmarcas = $marcas->fetch_object()){ ?>
                <div class="col-6 col-lg-3 text-center productoIndividual <?php echo $rowmarcas->marca ?>">
                <div class="product">
                  <figure class="product-image">
                    <a href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=<?php echo $rowmarcas->marca ?>">
                     <img style="width: auto; max-height: 150px;" src="assets/images/marcas/<?php echo $rowmarcas->imagen ?>" alt="Image"><br>
                    </a>
                  </figure>
                  <h4><?php echo $rowmarcas->marca ?></h4>
                     <small>Descripción corta de marca...</small>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
          <!-- //content -->
        </div>
      </div>
    </section>



<?php 
include "pie.php";
include "modals.php"; ?>





    <script>

       function ordenarMarca(marca){

        //console.log(marca);

          $('.productoIndividual').hide();
          $("."+marca).show();

       }


    </script>



  </body>
</html>
