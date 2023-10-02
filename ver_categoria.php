<?php 
//include "carrito.php";
include "cabecera.php";


    // require_once "db.php";
     $categoria_seleccionada = $_GET['categoria_seleccionada'];
     $marca_seleccionada = $_GET['marca_seleccionada'];

     // si no se selecciona marca las mostramos todas
     if ($marca_seleccionada=="") {
       $marca_seleccionada=="todos";
     }


if (isset($_SESSION['ciudad'])) {
  
  if ($_SESSION['ciudad']=="Morelia") {
  
  if ($categoria_seleccionada=="todas") {
       $productos = $con->query("SELECT * FROM productos ORDER BY nombre ASC");
       //contamos cuantos productos hay
       $count=$productos->num_rows;
     }else{
      $productos = $con->query("SELECT * FROM productos WHERE categoria = '$categoria_seleccionada'");
      //contamos cuantos productos hay
      $count=$productos->num_rows;
     }

    }else{
    //hay ciudad que no es Morelia


        if ($categoria_seleccionada=="todas") {
       $productos = $con->query("SELECT * FROM productos WHERE tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax' ORDER BY nombre ASC");
       //contamos cuantos productos hay
       $count=$productos->num_rows;
     }else{
      $productos = $con->query("SELECT * FROM productos WHERE categoria = '$categoria_seleccionada' AND tipo_envio = 'paqueteria' OR tipo_envio = 'paqtax'");
      //contamos cuantos productos hay
      $count=$productos->num_rows;
     }


    }//else


}else{

   // no hay ciudad";
  

  if ($categoria_seleccionada=="todas") {
       $productos = $con->query("SELECT * FROM productos ORDER BY nombre ASC");
       //contamos cuantos productos hay
       $count=$productos->num_rows;
     }else{
      $productos = $con->query("SELECT * FROM productos WHERE categoria = '$categoria_seleccionada'");
      //contamos cuantos productos hay
      $count=$productos->num_rows;
     }


  }


  $promociones = $con->query("SELECT * FROM promociones");
  $marcas = $con->query("SELECT * FROM marcas");


  //incluimos los breadcrumbs
  if (isset($_GET['nombreBreadcrumb'])) {
    $nombreBreadcrumb =mysqli_real_escape_string($con, $_GET['nombreBreadcrumb']);
  }else{
  $nombreBreadcrumb = "Productos";
  }
  require_once "breadcrumbs.php";

   ?>


<style>
  
input[type="range"] {
  -webkit-appearance: none;
  margin: 20px 0;
  width: 100%;
}
input[type="range"]:focus {
  outline: none;
}
input[type="range"]::-webkit-slider-runnable-track {
  width: 100%;
  height: 14px;
  cursor: pointer;
  animate: 0.2s;
  /*background: #000168;*/
  background-image: url(assets/images/cinta.jpg);
  border-radius: 0px;
}
input[type="range"]::-webkit-slider-thumb {
  height: 22px;
  width: 10px;
  /*border-radius: 50%;*/
  background: #F7CC18;
  box-shadow: 0 0 4px 0 rgba(0, 0, 0, 1);
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -8px;
  position: relative;
  z-index: 9 !important;
}
.range-wrap {
  width: 100%;
  position: relative;
}
.range-value {
  position: absolute;
  top: -50%;
}
.range-value span {
  width: 40px;
  height: 24px;
  line-height: 24px;
  text-align: center;
  background: #03a9f4;
  color: #fff;
  font-size: 12px;
  display: block;
  position: absolute;
  left: 50%;
  transform: translate(-50%, 0);
  border-radius: 6px;
}
.range-value span:before {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border-top: 10px solid #03a9f4;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  margin-top: -1px;
}

/* icono buscar */

.search-box {
  transition: width 0.6s, border-radius 0.6s, background 0.6s, box-shadow 0.6s;
  width: 40px;
  height: 40px;
  border-radius: 20px;
  border: none;
  cursor: pointer;
  background: #ebebeb;
}
.search-box + label .search-icon {
  color: black;
}
.search-box:hover {
  color: white;
  background: #c8c8c8;
  box-shadow: 0 0 0 5px #3d4752;
}
.search-box:hover + label .search-icon {
  color: white;
}
.search-box:focus {
  transition: width 0.6s cubic-bezier(0, 1.22, 0.66, 1.39), border-radius 0.6s, background 0.6s;
  border: none;
  outline: none;
  box-shadow: none;
  padding-left: 15px;
  cursor: text;
  width: 300px;
  border-radius: auto;
  background: #ebebeb;
  color: black;
}
.search-box:focus + label .search-icon {
  color: black;
}
.search-box:not(:focus) {
  text-indent: -5000px;
}


.search-icon1 {
  position: absolute;
  left: 22px;
  top: 23px;
  color: black;
  cursor: pointer;
}
/* icono buscar */


/* icono filtros */
.filtros {
  transition: width 0.6s, border-radius 0.6s, background 0.6s, box-shadow 0.6s;
  width: 40px;
  height: 40px;
  border-radius: 20px;
  border: none;
  cursor: pointer;
  background: #ebebeb;
}
.filter-icon {
  position: relative;
  left: 11px;
  top: 8px;
  color: black;
  cursor: pointer;
}

.filtros:hover {
  color: white;
  background: #c8c8c8;
  box-shadow: 0 0 0 5px #3d4752;
}
.filtros:hover + label .filter-icon {
  color: white;
}




.box1{
  width: 480px;
  height: 50px;
}

.container-2{
  width: 300px;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;
}

.container-2 input#search{
  width: 15px;
  height: 50px;
  background: #ebebeb;
  border: none;
  font-size: 10pt;
  float: left;
  color: #262626;
  padding-left: 35px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 50px;
  color: black;
 
  -webkit-transition: width .55s ease;
  -moz-transition: width .55s ease;
  -ms-transition: width .55s ease;
  -o-transition: width .55s ease;
  transition: width .55s ease;
}

.container-2 input#search::-webkit-input-placeholder {
   color: #65737e;
}
 
.container-2 input#search:-moz-placeholder { /* Firefox 18- */
   color: #65737e;  
}
 
.container-2 input#search::-moz-placeholder {  /* Firefox 19+ */
   color: #65737e;  
}
 
.container-2 input#search:-ms-input-placeholder {  
   color: #65737e;  
}

.container-2 .icon{
  position: absolute;
  top: 50%;
  margin-left: 17px;
  margin-top: 14px;
  z-index: 1;
  color: black;
}

.container-2 input#search:focus, .container-2 input#search:active{
  outline:none;
  width: 300px;
}

input#search:not(:focus) {
  text-indent: -5000px;
}
 
.container-2:hover input#search{
width: 300px;
text-indent: 0px;
}
 
.container-2:hover .icon{
  color: #93a2ad;
}


</style>



  <!-- listing -->
    <section class="pt-0">
      <div class="container">

        <div class="row">
          <div class="col">
            <div class="row gutter-md-2 align-items-center">
              <div class="col-md-1">
                <div id="search-box" type="text" class="filtros" onclick="mostrarFiltros(); return false;">
                  <i class="fas fa-filter filter-icon"></i>
                </div>
                
              </div>
              <div class="col-md-4 text-left">
            
                     <div class="box1">
                      <div class="container-2">
                          <span class="icon"><i class="fa fa-search"></i></span>
                          <input type="search" id="search" placeholder="Buscar producto o código" />
                          <ul id="searchResult_cat1" style="position:absolute; top:52px; left: 0; background-color: white; width: 480px; z-index: 999 !important;"></ul>
                      </div>
                    </div>
              </div>
              
              <div class="col-md-7"></div>


            </div><!-- row  -->



            <div class="row contenedorFiltros" style="display: none;">
            
              <div class="col-md-2 text-md-center">
               
             
                    <a class="btn btn-primary btn-block" style="padding:8px 5px;" href="" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Filtrar marca <i class="fas fa-filter"></i><br>
                     <small id="marcaSel" style="font-size:8px;">Todas las marcas</small>
                     <input style="display:none;"  type="hidden" id="ordenMarcaSeleccionado">
                    </a>
                    <div class="dropdown-menu" style="" aria-labelledby="dropdownMenuLink-2">
                      <a class="dropdown-item" style="background-color: #8EDEF4; padding: 5px 61px; margin-right: -15px !important; margin-top: -15px !important;">Marca</a>
                      <?php while($rowmarcas = $marcas->fetch_object()){ ?>
                      <a class="dropdown-item dropdown-item-categoria" style="" onclick="ordenarMarca2('<?php echo $rowmarcas->marca ?>'); return false;"><?php echo $rowmarcas->marca ?></a>
                      <?php } ?>
                    </div>
   
          
              </div>

                <div class="col-md-2 text-md-center">
                
                    <a class="btn btn-primary btn-block" style="padding:8px 5px;" href="" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Ordenar por <i class="fas fa-filter"></i><br>
                     <small id="ordenSel" style="font-size:8px;">alfabetico</small>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2" style="padding-top: 0px !important; max-width: 258px; overflow: hidden; z-index: 99 !important;">
                      <a style="padding: 5px 15px; /* margin-right: -15px !important; /* margin-top: -15px !important;*/" class="dropdown-item dropdown-item-categoria" onclick="ordenar2('menor'); return false;">Menor a mayor precio</a>
                      <a style="padding: 5px 15px; /* margin-right: -15px !important; /* margin-top: -15px !important;*/" class="dropdown-item dropdown-item-categoria" onclick="ordenar2('mayor'); return false;">Mayor a menor precio</a>
                      <a style="padding: 5px 37px; /* margin-right: -15px !important; /* margin-top: -15px !important;*/" class="dropdown-item dropdown-item-categoria" onclick="ordenar2('alfabetico'); return false;">Orden alfabetico</a>
                      
                    </div>
                    <input type="hidden" id="filtromarca" value="todas">
                  
                </div>
                <div class="col-md-2 text-md-center">
                  <a class="btn btn-warning btn-block" style="padding:8px 5px;"  href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas">
                     Borrar <i class="fas fa-close"></i><br>
                     <small style="font-size:8px;">filtros</small>
                    </a>
                </div>
          
              <div class="col-md-1 col-12">
                <img src="assets/images/flexometro.png" class="flexometro" alt="flexometro">
                <small class="textoAzul textoFlexometro" style="">Usa esté flexómetro para filtrar</small>
              </div>

              <div class="col-md-4 col-12">
             
                  <div class="range-wrap">
                      <div class="range-value" id="rangeV"></div>
                      <div id="rangeV1" style=""></div>
                      <input style="display:none;" type="hidden" id="valorflexometro" value="0">
                      <input  id="range" type="range" min="0" max="5000" value="0" step="1">
                    </div>



              </div>
              <div class="col-7">
                    <input style="display:none;"  type="hidden" id="filtroenvio" value="todas">
                <!-- <center style="position: relative; margin-top: -18px;"><a style="color:white; background-color: red; padding: 1px 3px; border-radius: 2px; font-size: 11px; cursor: pointer;" href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas">Borrar filtros</a></center> -->
              </div>
              <div class="col-6"></div>



            </div>
          </div>
          <div class="col-12">
            <hr>
          </div>
        </div>


       <!--  <div class="row"> -->

          <!-- content -->
          <div class="col" id="contenedorTienda">
            <div class="row gutter-2 gutter-lg-3">

               <?php while($rowproductos = $productos->fetch_object()){ ?>

                <div class="col-6 col-lg-3 productoIndividual <?php echo $rowproductos->marca ?> <?php echo $rowproductos->tipo_envio ?>">
                <div class="product">
                  <figure class="product-image text-center">
                    <a href="ver_producto.php?id_producto=<?php echo $rowproductos->id ?>">
                      <?php if ($rowproductos->foto1=="") {
                       ?><img loading="lazy" style="width: auto; max-height:200px;" src="assets/images/productos/trans.png" alt="Image"><?php
                      }else{ ?>
                     <img loading="lazy" style="width: auto; max-height:200px;" src="<?php echo $rowproductos->foto1 ?>" alt="Image">
                    <?php } ?>
                      <?php if ($rowproductos->foto2=="") {
                       ?><img loading="lazy" style="width: auto; max-height:200px;" src="assets/images/productos/trans.png" alt="Image"><?php
                      }else{ ?>
                      <img loading="lazy" style="width: auto; max-height:200px;" src="<?php echo $rowproductos->foto2 ?>" alt="Image">
                    <?php } ?>
                    </a>
                  </figure>
                 
                    <h3 class="product-title text-center"><b><a href=""><?php echo $rowproductos->nombre ?> </a></b></h3>
                    <small class="text-center"><?php echo $rowproductos->descripcion_corta ?></small>
                    <hr>
                    

                      <div class="row">
                        
                          <?php if ($rowproductos->descuento==0){ ?>
                          <div class="col-lg-12 text-center">
                            <b class="textoAzul">$<?php echo $rowproductos->precio_venta ?></b>
                          </div>
                         <?php }else{ ?>
                        <div class="col-lg-6 text-center">
                            <b class="textoAzul">$<?php echo $rowproductos->precio_venta-$rowproductos->descuento ?></b>
                          </div>
                        <div class="col-lg-6">
                          <div class="product-price-discount">
                            <span class="line-through">$<?php echo $rowproductos->precio_venta; ?></span>
                          </div>
                        </div>
                      <?php } ?>
          
                      
                      </div>
                
                 
                </div>

                <div class="row">
                      <div class="col-12 text-center">
                        <hr>
                          <form action="" method="POST">
                            <input type="hidden" name="id_producto" id="id_producto<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $id_del_producto = $rowproductos->id ?>">
                            <input type="hidden" name="nombre" id="nombre<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $nombre_del_producto = $rowproductos->nombre ?>">
                            <input type="hidden" name="precio_venta" id="precio_venta<?php echo $id_del_producto = $rowproductos->id ?>" value="<?php echo $rowproductos->precio_venta ?>">
                            <input type="hidden" name="cantidad" id="cantidad<?php echo $id_del_producto = $rowproductos->id ?>" value="1">
                            <button name="btnAccion" value="Agregar" type="submit" href="#" class="btnAgregarAlCarrito">Agregar al Carrito</button>
                          
                          </form>
                        </div>
                </div>
              </div>
            <?php } ?>


            </div>
          </div>
          <!-- //content -->

        <!-- </div>  -->
      </div><br><br><br>
    </section>


    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center" style="gap: 20px;">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Ant</a>
    </li>
    <li class="page-item"><a class="page-link pageNum" href="#">1</a></li>
    <li class="page-item"><a class="page-link pageNum" href="#">2</a></li>
    <li class="page-item"><a class="page-link pageNum" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Sig</a>
    </li>
  </ul>
</nav>
<br><br><br>


    

<?php 
include "pie.php";
include "modals.php"; ?>



  
    <script>
      //ordenar los productos por select (precio menor mayor)

    function ordenar(orden){


      var filtromarca = $("#filtromarca").val();
      var valorflexometro = $("#valorflexometro").val();
      //var filtroenvio = $("#filtroenvio").val();
     

         $.ajax(
          {
            url : 'ordenar_productos.php',
            type: "POST",
            data : {ordenar: orden, filtromarca: filtromarca,  valorflexometro: valorflexometro },
            dataType: 'html',
          })
            .done(function(data) {
              $("#contenedorTienda").empty();
              $("#contenedorTienda").append(data);
              if (orden=="menor") {
                var textoorden = "PRECIO MENOR";
              }else if(orden=="mayor"){
                var textoorden = "PRECIO MAYOR";
              }else{
                var textoorden = "ALFABETICO";
              }
              $("#ordenSel").text(textoorden);

         // console.log(data);
              /*if (filtroenvio!="todas"){
                $('.productoIndividual').hide();
                $("."+filtroenvio).show();

              }*/


            })
            .fail(function(data) {
              alert("Error");

            })

      }



        function ordenar2(orden){

          console.log("entrando orden2");

      var filtromarca = $("#filtromarca").val();
      var valorflexometro = $("#valorflexometro").val();
      //var filtroenvio = $("#filtroenvio").val();
     

         $.ajax(
          {
            url : 'ordenar_productos2.php',
            type: "POST",
            data : {ordenar: orden, filtromarca: filtromarca,  valorflexometro: valorflexometro },
            dataType: 'html',
          })
            .done(function(data) {
              console.log(data);
              $("#contenedorTienda").empty();
              $("#contenedorTienda").append(data);
              if (orden=="menor") {
                var textoorden = "PRECIO MENOR";
              }else if(orden=="mayor"){
                var textoorden = "PRECIO MAYOR";
              }else{
                var textoorden = "ALFABETICO";
              }
              $("#ordenSel").text(textoorden);

         // console.log(data);
              /*if (filtroenvio!="todas"){
                $('.productoIndividual').hide();
                $("."+filtroenvio).show();

              }*/


            })
            .fail(function(data) {
              alert("Error");

            })

      }

        //ordenar los productos por select (precio menor mayor)


        function mostrarTodosLosProductos(orden, filtromarca, categoria){
          console.log(orden+filtromarca);
         var valorflexometro = $("#valorflexometro").val();
         $.ajax(
          {
            url : 'ordenar_productos.php',
            type: "POST",
            data : {ordenar: orden, filtromarca: filtromarca, categoria: categoria, valorflexometro: valorflexometro },
            dataType: 'html',
          })
            .done(function(data) {
              $("#contenedorTienda").empty();
              $("#contenedorTienda").append(data);
         // console.log(data);


            })
            .fail(function(data) {
              alert("Error");

            })

      }

      function filtrarPorSubmenu(categoria,submenu){

console.log("filtando");

         $.ajax(
          {
            url : 'ordenar_productos.php',
            type: "POST",
            data : {categoria: categoria,submenu: submenu},
            dataType: 'html',
          })
            .done(function(data) {
              $("#contenedorTienda").empty();
              $("#contenedorTienda").append(data);
          console.log(data);


            })
            .fail(function(data) {
              alert("Error");

            }) 

      }

        //filtrar por submenu




       function ordenarMarca(marca){

        mostrarTodosLosProductos('alfabetico','todas', '<?php echo $categoria_seleccionada; ?>');

        console.log(marca);

         setTimeout(function(){ 

        
          $('#marcaSel').text(marca);
          $('#ordenSel').text('alfabetico');
          $('#ordenMarcaSeleccionado').val("");
          $('#ordenMarcaSeleccionado').val(marca);

          $('.productoIndividual').hide();
          $("."+marca).show();
          $("#filtromarca").val(marca);

        

 }, 200);

          

       }



        function ordenarMarca2(marca){

        console.log("ordenarmarca2"+marca);

           $.ajax(
          {
            url : 'ordenar_productos2.php',
            type: "POST",
            data : {filtromarca: marca },
            dataType: 'html',
          })
            .done(function(data) {
              console.log(data);
              $("#contenedorTienda").empty();
              $("#contenedorTienda").append(data);
         // console.log(data);


            })
            .fail(function(data) {
              alert("Error");

            })

         setTimeout(function(){ 
        
          $('#marcaSel').text(marca);
          $('#ordenSel').text('alfabetico');
          $('#ordenMarcaSeleccionado').val("");
          $('#ordenMarcaSeleccionado').val(marca);
          $("#filtromarca").val(marca);
/*
          $('.productoIndividual').hide();
          $("."+marca).show();
          $("#filtromarca").val(marca); */

      
          }, 500);
          

       }



  


       function ordenaPorMarca2(){

       // console.log("entro a ordenar por marca desde marcas");

          var marca = "<?php echo $marca_seleccionada ?>"
          $('.productoIndividual').hide();
          $("."+marca).show();

       }

       $(document).ready(function() {
        var marca = "<?php echo $marca_seleccionada ?>";
        if (marca!="todas") {
            //ordenaPorMarca2();
              ordenarMarca2(marca);
          }
         });
    </script>


    <script>
          $(function () {
            var $propertiesForm = $('.mall-category-filter');
            var $body = $('body');

            $body.on('click', '.js-mall-filter', function () {
                var $input = $(this).find('input');
                $(this).toggleClass('mall-filter__option--selected')
                $input.prop('checked', ! $input.prop('checked'));
                $propertiesForm.trigger('submit');
            });
            $body.on('click', '.js-mall-clear-filter', function () {
                var $parent = $(this).closest('.mall-property');

                $parent.find(':input:not([type="checkbox"])').val('');
                $parent.find('input[type="checkbox"]').prop('checked', false);
                $parent.find('.mall-filter__option--selected').removeClass('mall-filter__option--selected')

                var slider = $parent.find('.mall-slider-handles')[0]
                if (slider) {
                    slider.noUiSlider.updateOptions({
                        start: [slider.dataset.min, slider.dataset.max]
                    });
                }
                $propertiesForm.trigger('submit');
            });

            $propertiesForm.on('submit', function (e) {
                e.preventDefault();

                $.publish('mall.category.filter.start')
                $(this).request('categoryFilter::onSetFilter', {
                    loading: $.oc.stripeLoadIndicator,
                    complete: function (response) {
                        $.oc.stripeLoadIndicator.hide()
                        if (response.responseJSON.hasOwnProperty('queryString')) {
                            history.replaceState(null, '', '?' +              response.responseJSON.queryString)
                        }
                        $('[data-filter]').hide()
                        if (response.responseJSON.hasOwnProperty('filter')) {
                            for (var filter of Object.keys(response.responseJSON.filter)) {
                                $('[data-filter="' + filter + '"]').show();
                            }
                        }
                        $.publish('mall.category.filter.complete')
                    },
                    error: function () {
                        $.oc.stripeLoadIndicator.hide()
                        $.oc.flashMsg({text: 'Fehler beim Ausführen der Suche.', class: 'error'})
                        $.publish('mall.category.filter.error')
                    }
                });
            });

            $('.mall-slider-handles').each(function () {
                var el = this;
                noUiSlider.create(el, {
                    start: [el.dataset.start, el.dataset.end],
                    connect: true,
                    tooltips: true,
                    range: {
                        min: [parseFloat(el.dataset.min)],
                        max: [parseFloat(el.dataset.max)]
                    },
                    pips: {
                        mode: 'range',
                        density: 20
                    }
                }).on('change', function (values) {
                    $('[data-min="' + el.dataset.target + '"]').val(values[0])
                    $('[data-max="' + el.dataset.target + '"]').val(values[1])
                    $propertiesForm.trigger('submit');
                });
            })
        })
    </script>

    <script>

      
  const range = document.getElementById("range"),
  rangeV = document.getElementById("rangeV"),
  rangeV1 = document.getElementById("rangeV1"),
  setValue = () => {
    const newValue = Number(
        ((range.value - range.min) * 100) / (range.max - range.min)
      ),
      newPosition = 10 - newValue * 0.2;
    rangeV.innerHTML = `<span>$${range.value}</span>`;
   

    

    if (window.innerWidth <= 800) {
       rangeV1.style.left = `calc(${newValue}% + (${newPosition+70}px))`;
        rangeV.style.left = `calc(${newValue}% + (${newPosition+70}px))`;
      }else{
       rangeV1.style.left = `calc(${newValue}% + (${newPosition}px))`;
        rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
      }

    //if (range.value>200 || rage.value< 200) {
     // if (range.value>1) {
      if (range.value>0) {
    rangoPrecio(range.value);
    $("#valorflexometro").val(range.value);

    }
  };



document.addEventListener("DOMContentLoaded", setValue);
range.addEventListener("input", setValue);





function rangoPrecio(precio){

  $("#range").css("width","20px;");
  var marcaSel = $("#ordenMarcaSeleccionado").val();
 

  console.log("precio"+precio);


         $.ajax(
          {
            url : 'ordenar_productos_rango_precios.php',
            type: "POST",
            data : {precio: precio, marcaSel: marcaSel},
            dataType: 'html',
          })
            .done(function(data) {
              $("#contenedorTienda").empty();
              $("#contenedorTienda").append(data);
          //console.log(data);


            })
            .fail(function(data) {
              alert("Error");

            })
            

      }

      $('#txt_search_cat').keyup(function(){
    this.value = this.value.toUpperCase();
});


      //al quitar el focus del buscador eliminar los resultados

      $(document).on("focusout","#search",function(){

         setTimeout(function(){ 
        $("#searchResult_cat1").empty();

         }, 200);
                   
        });

     // si presionamos esc limpiar resultados del buscador
 


$(document).keyup(function(e) {
     if (e.key === "Escape") { // escape key maps to keycode `27`
      console.log("press esc");
      $("#search").blur();
        

        setTimeout(function(){ 
$("#searchResult_cat1").empty();

 }, 200);

    }
});


document.addEventListener("touchstart", function(){}, true);



function mostrarFiltros(){

        $(".contenedorFiltros").toggle("slow");
}

    </script>



  


  </body>
</html>