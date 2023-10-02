//carrito

function mensajeProductoAgregado(){
                swal({
                    title: 'Producto',
                      text: 'agregado al carrito',
                      type: 'success',
                      showConfirmButton: false,
                      timer: 2500
                  });
}

function mensajeProductoActualizado(producto){
                swal({
                    title: 'Cantidad',
                      text: producto+' actualizada',
                      type: 'success',
                      showConfirmButton: false,
                      timer: 2500
                  });
}

  //OVERLAY
  setTimeout(function() { 
    console.log("entrando");
              $(".overlay").fadeOut();
            }, 500);


      //BUSCADOR

      $(document).ready(function(){

            $("#txt_search").keyup(function(){
                var search = $(this).val();
                

                if(search != ""){

                  $("#txt_search").css({"font-size":"1em", "font-weight":"900"});
                    $.ajax({
                        url: 'buscar_producto.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;
                            $("#searchResult").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var nombre = response[i]['nombre'];
                                var codigo = response[i]['codigo'];
                                var foto = response[i]['foto'];

                                $("#searchResult").append("<li class='listaBuscador' value='"+id+"'>&nbsp;&nbsp;<img src='"+foto+"' style='max-height: 50px'>"+nombre+"&nbsp;&nbsp;("+codigo+")&nbsp;&nbsp;</li>");

                            }

                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                verProducto(this);
                            });


                        }
                    }); 
                    //buscador general
                    $.ajax({
                        url: 'buscador_general.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){
                            console.log(response);
                            var len = response.length;
                            //$("#searchResult").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var nombre = response[i]['nombre'];
                                var url = response[i]['url'];
                                

                                $("#searchResult").append("<li class='listaBuscador'><a href='"+url+"'>&nbsp;&nbsp;<img src='assets/images/logo.png' style='max-height: 35px'>&nbsp;"+nombre+"&nbsp;&nbsp;</a></li>");

                            }

                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                verProducto(this);
                            });


                        }
                    });
                }else{
                  $("#txt_search").css({"font-size":"14px", "font-weight":"300"});
                  $("#searchResult").empty();
                }

            });


            //buscador en categorias

            $("#txt_search_cat").keyup(function(){
              console.log("buscador---");
                var search = $(this).val();
                

                if(search != ""){

                    $.ajax({
                        url: 'buscar_producto.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;
                            $("#searchResult_cat").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var nombre = response[i]['nombre'];
                                var codigo = response[i]['codigo'];
                                var foto = response[i]['foto'];

                                $("#searchResult_cat").append("<li class='listaBuscador' style=' border: 1px solid #adadad;' value='"+id+"'>&nbsp;&nbsp;<img src='"+foto+"' style='max-height: 50px'>"+nombre+"&nbsp;&nbsp;("+codigo+")&nbsp;&nbsp;</li>");

                            }

                            // binding click event to li
                            $("#searchResult_cat li").bind("click",function(){
                                verProducto(this);
                            });


                        }
                    });
                }else{
                  $("#searchResult_cat").empty();
                }

            });

             //buscador en categorias


                   //buscador en categorias

            $("#search").keyup(function(){
              console.log("buscadorNuevo");
                var search = $(this).val();
                

                if(search != ""){

                    $.ajax({
                        url: 'buscar_producto.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;
                            $("#searchResult_cat1").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var nombre = response[i]['nombre'];
                                var codigo = response[i]['codigo'];
                                var foto = response[i]['foto'];

                                $("#searchResult_cat1").append("<li class='listaBuscador' style=' border: 1px solid #adadad;' value='"+id+"'>&nbsp;&nbsp;<img src='"+foto+"' style='max-height: 50px'>"+nombre+"&nbsp;&nbsp;("+codigo+")&nbsp;&nbsp;</li>");

                            }

                            // binding click event to li
                            $("#searchResult_cat1 li").bind("click",function(){
                                verProducto(this);
                            });


                        }
                    });
                }else{
                  $("#searchResult_cat1").empty();
                }

            });

             //buscador en categorias




            $("#txt_search1").keyup(function(){
              console.log("buscando");
                var search = $(this).val();
                

                if(search != ""){

                    $.ajax({
                        url: 'buscar_marca.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;
                            $("#searchResult1").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var marca = response[i]['marca'];
                               
                                $("#searchResult1").append("<li class='listaBuscadorMarcas'><a href='ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada="+marca+"'>"+marca+"</a></li>");

                            }

                            // binding click event to li
                            /*
                            $("#searchResult1 li").bind("click",function(){
                                verMarca(this);
                            });*/


                        }
                    });
                }else{
                  $("#searchResult1").empty();
                }

            });


            $("#txt_search_cotizacion").keyup(function(){
                var search = $(this).val();
                

                if(search != ""){

                    $.ajax({
                        url: 'buscar_producto.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){
                           
                            var len = response.length;
                            $("#searchResultCotizacion").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var nombre = response[i]['nombre'];
                                var codigo = response[i]['codigo'];
                                var foto = response[i]['foto'];

                                $("#searchResultCotizacion").append("<li onclick='agregarACotizacion(\""+nombre+"\");' class='listaBuscador' value='"+id+"'>&nbsp;&nbsp;<img src='"+foto+"' style='max-height: 50px'>"+nombre+"&nbsp;&nbsp;("+codigo+")&nbsp;&nbsp;</li>");

                            }

                            // binding click event to li
                            //$("#searchResultCotizacion li").bind("click",function(){
                              //console.log(this);
                                //$("#searchResultCotizacion").append(this);
                            //});


                        }
                    });
                }else{
                  $("#searchResultCotizacion").empty();
                }

            });


        });

function agregarACotizacion(producto){
  console.log("Agregando producto a cotizacion");
  $("#searchResultCotizacion1").show().append("<li>"+producto+"&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-times eliminarEsteProducto'></i><hr></li>");
  $("#txt_search_cotizacion").val("");
  $("#searchResultCotizacion").empty();
}
function agregarEsteProducto(){
  var producto = $("#cotizarProducto").val();
  if (producto != "") {
  console.log("Agregando producto a cotizacion");
  $("#searchResultCotizacion1").show().append("<li>"+producto+"&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-times eliminarEsteProducto'></i><hr></li>");
  $("#cotizarProducto").val("");
  }
}


function preguntar(){


  var nombre = $("#pregunta_nombre").val();
  var correo = $("#pregunta_correo").val();
  var pregunta = $("#pregunta_pregunta").val();

console.log(nombre+correo+pregunta);
   $.ajax(
                                  {
                                    url : 'enviarPregunta.php',
                                    type: "POST",
                                    data : {nombre: nombre, correo : correo, pregunta:pregunta}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                 if (data=="1") {
                                      $(".eliminar").remove();
                                      $(".sent-messageCot").show();
                                 }
                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    }) 



  $("#pregunta_pregunta").val('');
  $(".mensajePregunta").show("slow");
  $("#contactformPregunta").hide("slow");
  setTimeout(function() { 
          $(".mensajePregunta").hide("slow");
          $("#contactformPregunta").show("slow");
            }, 5000);
}






        function verProducto(element){
            var producto_id = $(element).val();
            console.log("el id es: "+producto_id);
            window.location.href = 'ver_producto.php?id_producto='+producto_id;
        }



        function focusSearch(){
          console.log("entro focus");
          setTimeout(function() { 
          $("#txt_search").focus();
            }, 500);
        }

        //BUSCADOR


        //Exelent little functions to use any time when class modification is needed
function hasClass(ele, cls) {
 return !!ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
}
function addClass(ele, cls) {
 if (!hasClass(ele, cls)) ele.className += " " + cls;
}
function removeClass(ele, cls) {
 if (hasClass(ele, cls)) {
 var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
 ele.className = ele.className.replace(reg, ' ');
 }
}
//Add event from js the keep the marup clean
/*function init() {
 document.getElementById("menu-toggle").addEventListener("click", toggleMenu);
} 
function toggleMenu() {
 var ele = document.getElementsByTagName('body')[0];
 if (!hasClass(ele, "open")) {
 addClass(ele, "open");
 } else {
 removeClass(ele, "open");
 }
}
//Prevent the function to run before the document is loaded
document.addEventListener('readystatechange', function() {
 if (document.readyState === "complete") {
 init();
 }
});
*/

//slider




// formulario contacto productos
// Check for valid email syntax
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function closeForm() {
  document.contactform.name.value = "";
  document.contactform.email.value = "";
  document.contactform.message.value = "";

  $(".email").removeClass("typing");
  $(".name").removeClass("typing");
  $(".message").removeClass("typing");

  $(".cd-popup").removeClass("is-visible");
  $(".notification").addClass("is-visible");
  $("#notification-text").html("Thanks for contacting us!");
}

$(document).ready(function ($) {
  /* ------------------------- */
  /* Contact Form Interactions */
  /* ------------------------- */
  $("#contact").on("click", function (event) {
    event.preventDefault();

    $("#contactblurb").html(
      "Preguntas, sugerencias y comentarios en general también son importantes para nosotros"
    );
    $(".contact").addClass("is-visible");

    if ($("#name").val().length != 0) {
      $(".name").addClass("typing");
    }
    if ($("#email").val().length != 0) {
      $(".email").addClass("typing");
    }
    if ($("#message").val().length != 0) {
      $(".message").addClass("typing");
    }
  });

  //close popup when clicking x or off popup
  $(".cd-popup").on("click", function (event) {
    if (
      $(event.target).is(".cd-popup-close") ||
      $(event.target).is(".cd-popup")
    ) {
      event.preventDefault();
      $(this).removeClass("is-visible");
    }
  });

  //close popup when clicking the esc keyboard button
  $(document).keyup(function (event) {
    if (event.which == "27") {
      $(".cd-popup").removeClass("is-visible");
    }
  });

  /* ------------------- */
  /* Contact Form Labels */
  /* ------------------- */
  $("#name").keyup(function () {
    $(".name").addClass("typing");
    if ($(this).val().length == 0) {
      $(".name").removeClass("typing");
    }
  });
  $("#email").keyup(function () {
    $(".email").addClass("typing");
    if ($(this).val().length == 0) {
      $(".email").removeClass("typing");
    }
  });
  $("#message").keyup(function () {
    $(".message").addClass("typing");
    if ($(this).val().length == 0) {
      $(".message").removeClass("typing");
    }
  });

  /* ----------------- */
  /* Handle submission */
  /* ----------------- */
  $("#contactform").submit(function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();
    var human = $("#human:checked").val();

    if (human) {
      if (validateEmail(email)) {
        if (name) {
          if (message) {
            // Handle submitting data somewhere
            // For a tutorial on submitting the form to a Google Spreadsheet, see:
            // https://notnaturaltutorials.wordpress.com/2016/03/20/submit-form-to-spreadsheet/

            /*
            var googleFormsURL = "https://docs.google.com/forms/d/1dHaFG67d7wwatDtiVNOL98R-FwW1rwdDwdFqqKJggBM3nFB4/formResponse";
            // replace these example entry numbers
            var spreadsheetFields = {
              "entry.212312005": name,
              "entry.1226278897": email,
              "entry.1835345325": message
            }
            $.ajax({
              url: googleFormsURL,
              data: spreadsheetFields,
              type: "POST",
              dataType: "xml",
              statusCode: {
                0: function() {

                },
                200: function() {

                }
              }
            });
*/

            closeForm();
          } else {
            $("#notification-text").html(
              "<strong>Please let us know what you're thinking!</strong>"
            );
            $(".notification").addClass("is-visible");
          }
        } else {
          $("#notification-text").html(
            "<strong>Por favor ingresa tu nombre.</strong>"
          );
          $(".notification").addClass("is-visible");
        }
      } else {
        $("#notification-text").html(
          "<strong>Por favor ingresa un correo válido.</strong>"
        );
        $(".notification").addClass("is-visible");
      }
    } else {
      $("#notification-text").html(
        "<h3><strong><em>Atención: Debes seleccionar que no eres un robot.</em></strong></h3>"
      );
      $(".notification").addClass("is-visible");
    }

    return false;
  });
});




//lista de marcas ver_marcas.php

(function() {
  // TODO: be more elegant here
  function format(text) {
    return text.replace(/ /g,'').replace(/(<([^>]+)>)/ig, '').toLowerCase();  
  }
  
  var SearchOnList = {
    $LIST           : '[data-search-on-list=list]',
    $SEARCH         : '[data-search-on-list=search]',
    $LIST_ITEM      : '[data-search-on-list=list-item]',
    $COUNTER        : '[data-search-on-list=counter]',
    TEMPLATE_EMTPY  : '<li class="list-item list-item--disable">No results found</li>', 
    
    
    init: function($element) {
      this.items = [];
      this.itemsMatched = [];
      
      this.$element = $element;
      this.$list = this.$element.find(this.$LIST);
      this.$search = this.$element.find(this.$SEARCH);
      this.$counter = this.$element.find(this.$COUNTER);
      
      this.items = this._getAllItems();
      this.itemsMatched = this.items;
      
      this._updateCounter();
      this._handleResults();
      this._setEventListeners();
    },
    
    _setEventListeners: function() {
      this.$search
        .on('keyup', $.proxy(this._onKeyup, this))
        .on('query:changed', $.proxy(this._handleQueryChanged, this))
        .on('query:results:some', $.proxy(this._handleResults, this))
        .on('query:results:none', $.proxy(this._handleNoResults, this))
    },
    
    _onKeyup: function() {
      var query = this.$search.val(),
          previousQuery = this.$search.data('previousQuery', query);
      
      // TODO: Decide when query actually changed
      if (this._queryChanged()) {
        this.$search.trigger('query:changed', { 
          query: query, 
          previousQuery: previousQuery 
        });
      }
    },
    
    _queryChanged: function() {
      var query = this.$search.val();
      if ($.trim(query).length === 0 && this.$search.data('previousQuery') === undefined) {
        return false;
      }
      return true;
    },
    
    _handleQueryChanged: function(e, data) {   
      this.itemsMatched = this.items.map(function(item) {
        if (format(item.name).match(format(data.query))) {
          return { 
            name: item.name, 
            visible: true 
          } 
        }
        return { 
          name: item.name, 
          visible: false
        } 
      });
      
      this._render();
      this._updateCounter();
    },
    
    _handleNoResults: function() {
      this.$list.html(this.TEMPLATE_EMTPY);
    },
    
    _handleResults: function() {
      this.$list.empty().append(this._renderItemsVisible())
    },
    
    _someItemsVisible: function() {
      return this.itemsMatched.some(function(item) { 
        return item.visible;
      });
    },
    
    _render: function() {
      (this._someItemsVisible()) ?
        this.$search.trigger('query:results:some') :
        this.$search.trigger('query:results:none'); 
    },
    
    _updateCounter: function() {
      (this._someItemsVisible()) ?
        this.$counter.text(this._renderItemsVisible().length) :
        this.$counter.text('');
    },
    
    _getAllItems: function() {
      var $items = this.$list.find(this.$LIST_ITEM);
      
      return $items.map(function() {
        var $item = $(this);
        
        return {
          name: $item.html(),
          visible: true
        };
      }).toArray();     
    },
    
    _renderItemsVisible: function() {
      var itemInTemplate;
      return this.itemsMatched.sort(function(a, b) {
        if (a.name < b.name) return -1
        if (a.name > b.name) return 1;
        return 0;
      }).reduce(function(items, item) {
        itemInTemplate = '<li class="list-item" data-search-on-list="list-item">' + item.name + '</li>';
        if (item.visible) {
          items.push(itemInTemplate);
        }  
        return items;
      }, []);
    }
  };
  
  window.SearchOnList = SearchOnList;
})();

SearchOnList.init($('[data-behaviour=search-on-list]'));
    


    /* menu */

/*

    OPTIONS:
    menuWidth: Number,
    duration: Number,
    position: String ( left, right),
    verticalAlign: String ( top, middle, bottom )
    classBackButton: String,
    backButton: Tag html + {{backName}},
    classActive: String,
    easing: String (easing css),
    arrow: Tag html
*/

Element.prototype.wilHasClass = function(className) {
  var hasClass = '';
  if (this !== null) {
    hasClass = this.className.search(new RegExp(className + '(\\s|$)', 'g')) !== -1;
  }
  return hasClass;
}
Element.prototype.wilAddClass = function(className) {
  if (this !== null) {
    if (!this.wilHasClass(className)) {
      this.className += ' ' + className;
    }
  }
}
Element.prototype.wilRemoveClass = function(className) {
  if (this !== null) {
    if (this.wilHasClass(className)) {
      this.className = this.className.replace(new RegExp(' ' + className + '(\\s|$)', 'g'), '');
    }
    }
}
Element.prototype.wilStyles = function(obj) {
  for (var prop in obj) {
        this.style[prop] = obj[prop];
    }
}
function wilEach(els, cb) {
  for(var i = 0, len = els.length; i < len; i++) {
    if (i === len) break;
    cb(els[i], i);
  }
}
function wilExtend(obj, src) {
    if (typeof src === 'object') {
        wilEach(Object.keys(src), (key) => {
            obj[key] = src[key];
        });
    }
    return obj;
}

// create wilMenuMobile
class wilMenuVertical {
    constructor(el, opt) {
        this.optDefault = {
            menuWidth: 300,
            duration: 300,
            position: 'left',
            verticalAlign: 'middle',
            classBackButton: 'nav-back-button',
            backButton: '<a href="#">Back to {{backName}}</a>',
            classActive: 'active',
            easing: 'ease',
            arrow: '<span class="nav-arrow"></span>'
        };
        this.nav = el;
        this.opts = wilExtend(this.optDefault, opt);
        this.level = 0;
        this.create(document.querySelectorAll(this.nav));
    }
    
    create(els) {
        const {opts, nav} = this;
        
        wilEach(els, (el) => {
            this.wrapper(el);
            this.position(el);
            el.style.width = opts.menuWidth + 'px';
        });
        
        const menus = document.querySelectorAll(`${nav} .nav-menu`);
        const subMenus = document.querySelectorAll(`${nav} .sub-menu`);
        wilEach(menus, (menu) => {
            menu.setAttribute('data-height-default', menu.offsetHeight);
            menu.style.transition = `all ${opts.duration}ms ${opts.easing}`;
            menu.parentNode.style.height = `${menu.offsetHeight}px`;
        });
        /*wilEach(subMenus, (subMenu) => {
            this.createBackButton(menus, subMenu, (back, menus) => {
                this.handleClickBack(back, menus);
                this.handleClickLink(back, subMenu, menus);
            });
        });*/
        this.menuTranslate(menus, this.level);
    }
    
    wrapper(el) {
        const {opts} = this;
        const innerHtml = el.innerHTML;
        el.innerHTML = `
            <div class="nav-wrapper-outer" style="display: table; width: 100%; height: 100%">
                <div class="nav-wrapper" style="display: table-cell; width: 100%; vertical-align: ${opts.verticalAlign}">
                    <div class="nav-wrapper-inner" style="overflow: hidden; position: relative">
                        ${innerHtml}
                    </div>
                </div>
            </div>
        `;
    }
    
    verticalAlign() {
        const {opts} = this;
        let y = 50;
        if (opts.verticalAlign === 'middle') y = 50;
        if (opts.verticalAlign === 'top') y = 0;
        if (opts.verticalAlign === 'bottom') y = 100;
        return y;
    }
    
    menuTranslate(menus, level, height) {
        const {opts} = this;
        wilEach(menus, (menu) => {
            menu.wilStyles({
                top: `${this.verticalAlign()}%`,
                transform: `translate(-${opts.menuWidth*level}px, -${this.verticalAlign()}%)`,
                width: `${opts.menuWidth}px`
            });
            menu.parentNode.wilStyles({
                width: `${opts.menuWidth*(level+1)}px`,
                height: '80vh'
            });
            setTimeout(() => menu.parentNode.style.height = height, opts.duration);
        });
    }
    
    position(el) {
        const {opts} = this;
        if (opts.position === 'left') {
            el.wilStyles({
                left: 0,
                right: 'auto'
            });
        } else if (opts.position === 'right') {
            el.wilStyles({
                right: 0,
                left: 'auto'
            });
        }
    }
    /*
    createBackButton(menus, subMenu, cb) {
        const {nav, opts} = this;
        const firstList = subMenu.children[0];
        const back = document.createElement('LI');
        back.wilAddClass(opts.classBackButton);
        back.innerHTML = opts.backButton;
        subMenu.insertBefore(
            back,
            firstList
        );
        cb(back, menus);
    }
    
    handleClickLink(back, subMenu, menus) {
        const {nav, opts} = this;
        const menuHasSubMenu = subMenu.previousElementSibling;
        subMenu.wilStyles({
            visibility: 'hidden',
            top: `${this.verticalAlign()}%`,
            transform: `translate(100%, -${this.verticalAlign()}%)`
        });
        menuHasSubMenu.innerHTML = menuHasSubMenu.innerHTML + opts.arrow;
        menuHasSubMenu.addEventListener('click', (event) => {
            event.preventDefault();
            let subMenuHeight = event.currentTarget.nextElementSibling.offsetHeight;
            this.level++;
            this.menuTranslate(menus, this.level, `${subMenuHeight}px`);
            event.currentTarget.parentNode.wilAddClass(opts.classActive);
            subMenu.style.visibility = 'visible';
            
            let {backButton} = opts;
            if (backButton.indexOf('{{backName}}') !== -1) {
                backButton = backButton.replace(/{{backName}}/g, event.currentTarget.innerText);
            }
            back.innerHTML = backButton;
        });
    }
    
    handleClickBack(back, menus) {
        const {opts} = this;
        const subMenu = back.parentNode;
        back.addEventListener('click', (event) => {
            event.preventDefault();
            this.level--;
            let ul = back.parentNode.parentNode.parentNode;
            let parentHeight = ul.offsetHeight;
            if (ul.getAttribute('data-height-default') !== null) {
                parentHeight = Number(ul.getAttribute('data-height-default'));
            }
            this.menuTranslate(menus, this.level, `${parentHeight}px`);
            back.parentNode.parentNode.wilRemoveClass(opts.classActive);
            setTimeout(() => subMenu.style.visibility = 'hidden', opts.duration);
        });
    }*/
}


/*
    AUTHOR: LONG NGUYEN

    OPTIONS:
    menuWidth: Number,
    duration: Number,
    position: String ( left, right),
    verticalAlign: String ( top, middle, bottom )
    classBackButton: String,
    backButton: Tag html + {{backName}},
    classActive: String,
    easing: String (easing css),
    arrow: Tag html
*/
const menu = new wilMenuVertical('.nav-mobile', {
    menuWidth: 250,
    duration: 250,
    verticalAlign: 'top',
    arrow: '<span class="nav-arrow"></span>',
    backButton: '<a href="#">&lt; Regresar a {{backName}}</a>',
    classBackButton: 'nav-back-button'
});



//si hacemos clic fuera del buscador
$("body").click
(
  function(e)
  {
    if(e.target.className !== "s130")
    {
      $("#searchResult").empty();
    }
  }
);


//esconder buscado al apretar esc


document.addEventListener('keydown', function(event){
  if(event.key === "Escape"){
    $("#txt_search").val('');
     $("#searchResult").empty();
  }
});

/* promociones especiales */

jQuery(document).ready(function ($) {
  "use strict";
  $("#customers-testimonials").owlCarousel({
    loop: true,
    center: true,
    items: 3,
    margin: 30,
    autoplay: true,
    dots: true,
    nav: true,
    autoplayTimeout: 8500,
    smartSpeed: 450,
    navText: [
      '<i class="fa fa-angle-left"></i>',
      '<i class="fa fa-angle-right"></i>'
    ],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      1170: {
        items: 3
      }
    }
  });
});

 function ingresar(){
        var usuario = $("#usuario").val();
        var password = $("#password").val();
        //var token = generateToken();
        var url      = window.location.href; 

        console.log(url);


        $.ajax(
                                  {
                                    url : 'clientes/checklogin.php',
                                    type: "POST",
                                    data : {usuario: usuario, password : password, token : 'token', url : url}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                

                                 if (data=="1"||data=="3") {
                                      swal({
                                          title: 'Error',
                                          text: 'Usuario o contraseña incorrectos, intenta nuevamente',
                                          type: 'error'
                                        })
                                 }else{
                                  $('#iniciarSesion').modal('hide');
                                   swal({
                                          title: 'Haz iniciado sesión',
                                          text: 'correctamente',
                                          type: 'success'
                                        }).then(function() {
                                            window.location.href = url;
                                        })
                                 }
                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    }) 

                                    
                                    
      }



       function ingresarCarrito(){

        console.log("ingresando desde carrito");
        var usuario = $("#usuarioCarrito").val();
        var password = $("#passwordCarrito").val();
        //var token = generateToken();
        var url      = window.location.href; 

        //console.log(url);


        $.ajax(
                                  {
                                    url : 'clientes/checklogin.php',
                                    type: "POST",
                                    data : {usuario: usuario, password : password, token : 'token', url : url}
                                  })
                                    .done(function(data) {
                                  //console.log(data);

                                

                                 if (data=="1"||data=="3") {
                                      swal({
                                          title: 'Error',
                                          text: 'Usuario o contraseña incorrectos, intenta nuevamente',
                                          type: 'error'
                                        })
                                 }else{
                                  $('#iniciarSesionDesdeCarrito').modal('hide');
                                   swal({
                                          title: 'Haz iniciado sesión',
                                          text: 'correctamente',
                                          type: 'success'
                                        }).then(function() {
                                            window.location.href = "mostrarCarrito.php";
                                        })
                                 }
                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })  

                                    
                                    
      }


      function eliminarEsteProducto(){
          console.log("entro");
          $(this).parent().remove();

      }

      $(document).on('click', 'i.eliminarEsteProducto', function () {
        console.log("entro");
          $(this).closest('li').remove();
});


      /* cookies */

      /* Cookies */
$(document).ready(function(){
  //si aún no han aceptados las cookies seguimos mostrando mensaje
  if ($.cookie("aceptoCookies") == null) {
  $("#cookies").addClass("display");
  }
   $("#close-cookies").click(function(){ 
    event.preventDefault();
    console.log("entrando");
    $("#cookies").slideUp("slow");
    //guardamos que ya se aceptaron las cookies para no volver a mostrar mensaje
    $.cookie("aceptoCookies", "2");
  });
});



/* cokies */




$("#btnterminarCompra").click(function(){ 

   $('html, body').animate({
        scrollTop: $("#contenedorPago").offset().top - 65
    }, 500);

});





/* cotizacion formulario *//* cotizacion formulario */

function cotizacion(){

      $(".validateCot").hide();
      var nombre = $("#nombreCot").val();
      var correo = $("#correoCot").val();
      
      if (nombre=="") {
        $("#validatenombreCot").show();
        $("#nombreCot").focus();
      }else if(correo==""){
        $("#validatecorreoCot").show();
        $("#correoCot").focus();
      }else{

        var productos = $("#searchResultCotizacion1").text();

                        $.ajax(
                                  {
                                    url : 'enviarCotizacion.php',
                                    type: "POST",
                                    data : {nombre: nombre, correo : correo, productos : productos}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                 if (data=="1") {
                                      $(".eliminar").remove();
                                      $(".sent-messageCot").show();
                                 }
                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    
                               


      }

    }
/* cotizacion formulario */

//mostrar modal si la información le pareció util


function meParecioUtil(){
  setTimeout(function(){$('#faqsGracias').modal('toggle'); }, 500);

}

//evitar que en el buscador den enter
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});