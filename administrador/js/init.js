
function guardarUsuario(){
  var nombre = $("#nombre").val();
  var usuario = $("#usuario").val();
  var password = $("#password").val();
  var privilegio = $( "#privilegio option:selected" ).val();

   
$.ajax(
{
  url : 'guardar.php',
  type: "POST",
  data : {nuevousuarioadmin: "1", nombre: nombre,usuario: usuario, password: password, privilegio: privilegio }
})
  .done(function(data) {
console.log(data);

swal({
      title: 'Usuario',
      text: 'Agregado Correctamente',
      type: 'success'
    }).then(function() {
        window.location.href = "usuarios.php";
    })

 

  })
  .fail(function(data) {
    alert("Error");

  })
  /*always(function(data) {
    alert( "complete" );
  });*/


  };//guardarUsuario



function actualizarUsuario(){
  var id_usuario = $("#id_usuario").val();
  var nombre = $("#nombre").val();
  var usuario = $("#usuario").val();
  var password = $("#password").val();
  var privilegio = $( "#privilegio option:selected" ).val();

   
$.ajax(
{
  url : 'actualizar.php',
  type: "POST",
  data : {actualizarusuarioadmin: "1", nombre: nombre,usuario: usuario, password: password, privilegio: privilegio, id_usuario: id_usuario }
})
  .done(function(data) {
console.log(data);

swal({
      title: 'Usuario',
      text: 'Actualizado Correctamente',
      type: 'success'
    }).then(function() {
        window.location.href = "usuarios.php";
    })

 

  })
  .fail(function(data) {
    alert("Error");

  })
  /*always(function(data) {
    alert( "complete" );
  });*/


  };//guardarUsuario



  //subir imagen categoria
  function makeFileList() {
                              var input = document.getElementById("multiFiles");
                                if (input.files.length>1) {
                                  swal({
                                      title: 'Error',
                                      text: 'estás intentando subir más de 1 fotografía, no podrás guardar, intenta nuevamente',
                                      type: 'error'
                                    })
                                }
                                else{
                                $("#contenedorNombreImagen").show("slow");
                                $("#nombreImagen").empty();
                                //$("#nombreImagen").show("slow");
                                $("#sinImagen").hide("slow");
                                for (var i = 0; i < input.files.length; i++) {
                                  var nombreImagen = input.files[i].name;
                                  $("#nombreImagen").append((i+1)+"."+nombreImagen);
                                }
                                if (input.files.length==0) {
                                  $("#contenedorNombreImagen").hide("slow");
                                $("#sinImagen").show("slow");
                                }
                              }//else

                              }
                                function makeFileList2() {
                              var input = document.getElementById("multiFiles2");
                                if (input.files.length>1) {
                                  swal({
                                      title: 'Error',
                                      text: 'estás intentando subir más de 1 fotografía, no podrás guardar, intenta nuevamente',
                                      type: 'error'
                                    })
                                }
                                else{
                                $("#contenedorNombreImagen2").show("slow");
                                $("#nombreImagen2").empty();
                                //$("#nombreImagen").show("slow");
                                $("#sinImagen2").hide("slow");
                                for (var i = 0; i < input.files.length; i++) {
                                  var nombreImagen = input.files[i].name;
                                  $("#nombreImagen2").append((i+1)+"."+nombreImagen);
                                }
                                if (input.files.length==0) {
                                  $("#contenedorNombreImagen2").hide("slow");
                                $("#sinImagen2").show("slow");
                                }
                              }//else

                              }


                              function activarCategoria(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_categoria: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Categoría',
                                        text: 'Activada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "categorias.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar categoria




                               function desactivarCategoria(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_categoria: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Categoría',
                                        text: 'Desactivada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "categorias.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar categoria


                              function desactivarUsuario(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_usuario: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Usuario',
                                        text: 'Desactivado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "usuarios.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                               

                              } //desactivar usuario



                              function activarPromocion(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_promocion: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Promoción',
                                        text: 'Activada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "promociones.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar categoria




                               function desactivarPromocion(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_promocion: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Promocion',
                                        text: 'Desactivada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "promociones.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar categoria



                               function activarMarca(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_marca: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Marca',
                                        text: 'Activada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "marcas.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar categoria




                               function desactivarMarca(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_marca: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Marca',
                                        text: 'Desactivada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "marcas.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar marca



                              function activarProducto(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_producto: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Producto',
                                        text: 'Activada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "productos.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar producto




                               function desactivarProducto(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_producto: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Producto',
                                        text: 'Desactivada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "productos.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar producto




                              function activarSlider(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_slider: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Slider',
                                        text: 'Activado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "slider.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar categoria




                               function desactivarSlider(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_slider: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Slider',
                                        text: 'Desactivado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "slider.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar categoria





                              function eliminarCategoria(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_categoria: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Categoría',
                                        text: 'Eliminada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "categorias.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar categoria

                               function eliminarUsuario(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_usuario: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Usuario',
                                        text: 'Eliminado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "usuarios.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })

                              } //eliminar usuarios

                              function eliminarComentarios(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_comentarios: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Comentario',
                                        text: 'Eliminado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "comentarios.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar comentarios



                              function eliminarPromocion(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_promocion: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Promocion',
                                        text: 'Eliminada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "promociones.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar promocion




                              function eliminarRecomendados(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_recomendado: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Recomendado',
                                        text: 'Eliminado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "recomendados.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar recomendados


                               function cambiarOrdenRecomendados(arg){
                                    console.log("cambiando orden");
                                       var id = arg.getAttribute('id');
                                       var orden = arg.value;

                                      
                                       

                                       $.ajax({
                            url : 'actualizar.php',
                            type: "POST",
                            data : {ordenrecomendados: "1", idrecomendado: id,orden: orden }
                          })
                            .done(function(data) {
                                console.log(data);
                            })
                            .fail(function(data) {
                              alert("Error");

                            })



                                      }

                               function eliminarProducto(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_producto: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Producto',
                                        text: 'Eliminado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "productos.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar productos



                              function eliminarMarca(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_marca: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Marca',
                                        text: 'Eliminada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "marcas.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar marca

                              function eliminarSlider(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_slider: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Slider',
                                        text: 'Eliminado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "slider.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar marca



                              function eliminarFoto(numero, idProducto){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {actualizar_foto: "1", idProducto: idProducto, numero: numero}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Foto',
                                        text: 'Eliminada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          //window.location.href = "marcas.php";
                                          window.location.href = "productos_editar.php?id_producto="+idProducto; 
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar marca



                               function activarMenu(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_menu: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Menu',
                                        text: 'Activada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "menu.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar producto




                               function desactivarMenu(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_menu: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Menu',
                                        text: 'Desactivado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "menu.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar menu


                               function eliminarMenu(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_menu: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Menu',
                                        text: 'Eliminado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "menu.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar menu





                              /**/
                                function activarSubMenu(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_submenu: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'SubMenu',
                                        text: 'Activada Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                           window.location.reload();
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar producto




                               function desactivarSubMenu(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_submenu: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'SubMenu',
                                        text: 'Desactivado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                           window.location.reload();
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar submenu


                               function eliminarSubMenu(id){


                                $.ajax(
                                  {
                                    url : 'eliminar.php',
                                    type: "POST",
                                    data : {eliminar_submenu: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'SubMenu',
                                        text: 'Eliminado Correctamente',
                                        type: 'success'
                                      }).then(function() {
                                           window.location.reload();
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //eliminar productos



                                function activarComentarios(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_comentarios: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Comentario',
                                        text: 'Aprobado',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "comentarios.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar comentarios




                               function desactivarComentarios(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_comentarios: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Comentario',
                                        text: 'despublicado',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "comentarios.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //desactivar comentarios


                               function leidoComentarios(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {leido_comentarios: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Comentario',
                                        text: 'marcado como leído',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "comentarios.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                               

                              } //comentario leido




                               function activarRecomendados(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_recomendados: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Recomendado',
                                        text: 'Activado',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "recomendados.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar categoria




                               function desactivarRecomendados(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_recomendados: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Recomendado',
                                        text: 'desactivado',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "recomendados.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                                  }



                                   function activarPregunta(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {activar_pregunta: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Pregunta',
                                        text: 'Activada',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "preguntas.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                              } //activar categoria




                               function desactivarPregunta(id){


                                $.ajax(
                                  {
                                    url : 'actualizar.php',
                                    type: "POST",
                                    data : {desactivar_pregunta: "1", id: id}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                  swal({
                                        title: 'Pregunta',
                                        text: 'desactivada',
                                        type: 'success'
                                      }).then(function() {
                                          window.location.href = "preguntas.php";
                                      })

                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    })
                                    /*always(function(data) {
                                      alert( "complete" );
                                    });*/

                                  }







function eliminarImagen(){
            $("#multiFiles").val(null);
            $("#contenedorNombreImagen").hide();
            $("#sinImagen").show("slow");
          }

          function eliminarImagenProductos(){
            $("#multiFiles").val(null);
            $("#multiFiles2").val(null);
            $("#multiFiles3").val(null);
            $("#contenedorNombreImagen").hide();
            $("#sinImagen").show("slow");
          }