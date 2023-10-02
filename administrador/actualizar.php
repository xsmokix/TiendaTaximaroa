<?php  
require_once "seguridad.php"; 
require_once "db.php";


//actualizar usuario
if (isset($_POST['actualizarusuarioadmin'])) {

          require_once "lib/password.php";

        $id_usuario=mysqli_real_escape_string($con, $_POST["id_usuario"]);  
        $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass= $_POST["password"];
        $privilegio=mysqli_real_escape_string($con, $_POST["privilegio"]);

        echo "pass:". $oldpass = mb_substr($pass, 0, 3);
     
        if($oldpass==="$2y"){
          $hash = $pass;
        }else{
          $hash = password_hash($pass, PASSWORD_BCRYPT);
        }


        $sql="UPDATE usuarios_admin SET nombre = '$nombre', usuario = '$usuario', password = '$hash', privilegio = '$privilegio' WHERE id='$id_usuario'";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion";
          } else{

          echo "usuario actualizado correctamente"; 

       
        mysqli_close($con);
             }     


}
//actualizar usuario

    //desactivar usuario_admin
 if (isset($_POST['desactivar_usuario'])) {

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE usuarios_admin SET estado = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar usuario_admin



  //cambiar orden menu
 if (isset($_POST['ordenmenu'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["idmenu"]);
  $orden=mysqli_real_escape_string($con, $_POST["orden"]);

  $sql="UPDATE menu SET orden = '$orden' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //cambiar orden menu


    //cambiar orden submenu
 if (isset($_POST['ordensubmenu'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["idmenu"]);
  $orden=mysqli_real_escape_string($con, $_POST["orden"]);

  $sql="UPDATE submenu SET orden = '$orden' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //cambiar orden submenu

    //cambiar orden marcas
 if (isset($_POST['ordenmarca'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["idmarca"]);
  $orden=mysqli_real_escape_string($con, $_POST["orden"]);

  $sql="UPDATE marcas SET orden = '$orden' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //cambiar orden marcas


      //cambiar orden recomendado
 if (isset($_POST['ordenrecomendados'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["idrecomendado"]);
  $orden=mysqli_real_escape_string($con, $_POST["orden"]);

  $sql="UPDATE recomendados SET orden = '$orden' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //cambiar orden recomendado


  //activar menu
 if (isset($_POST['activar_menu'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE menu SET activo = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //activar menu




    //desactivar menu
 if (isset($_POST['desactivar_menu'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE menu SET activo = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar menu





    //activar submenu
 if (isset($_POST['activar_submenu'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE submenu SET activo = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //activar submenu


    //desactivar submenu
 if (isset($_POST['desactivar_submenu'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE submenu SET activo = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar submenu


//activar categoria
 if (isset($_POST['activar_categoria'])) {
 	echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="UPDATE categorias SET estado = '1' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//activar categoria





 	//desactivar categoria
 if (isset($_POST['desactivar_promocion'])) {
 	echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="UPDATE promociones SET estado = '0' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//desactivar categoria



  //activar categoria
 if (isset($_POST['activar_promocion'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE promociones SET estado = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //activar categoria



  //desactivar recomendados
 if (isset($_POST['desactivar_recomendados'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE recomendados SET estado = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar recomendados



  //activar recomendados
 if (isset($_POST['activar_recomendados'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE recomendados SET estado = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //activar recomendados





    //desactivar pregunta
 if (isset($_POST['desactivar_pregunta'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE preguntas_frecuentes SET estado = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar pregunta



  //activar pregunta
 if (isset($_POST['activar_pregunta'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE preguntas_frecuentes SET estado = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //activar pregunta


  //actualizar pregunta
 if (isset($_POST['actualizar_pregunta'])) {
  echo "entro actualizar pregunta";

  $id=mysqli_real_escape_string($con, $_POST["idpreguntas"]);
  $pregunta=mysqli_real_escape_string($con, $_POST["pregunta"]);
  $respuesta=mysqli_real_escape_string($con, $_POST["respuesta"]);
  $categoria=mysqli_real_escape_string($con, $_POST["categoria"]);

  $sql="UPDATE preguntas_frecuentes SET categoria = '$categoria', pregunta = '$pregunta', respuesta = '$respuesta' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);

   ?>
   <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Pregunta',
                  text: ' actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "preguntas.php";
                  }
                }
              )
</script>
</body>
</html>
<?php
  }
  //actualizar pregunta






  //desactivar categoria
 if (isset($_POST['desactivar_categoria'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE categorias SET estado = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar categoria




//activar producto
 if (isset($_POST['activar_producto'])) {
 	echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="UPDATE productos SET activo = '1' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//activar producto



 	//desactivar producto
 if (isset($_POST['desactivar_producto'])) {
 	echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="UPDATE productos SET activo = '0' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//desactivar producto




 	//activar marca
 if (isset($_POST['activar_marca'])) {
 	echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="UPDATE marcas SET estado = '1' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//activar marca



 	//desactivar marca
 if (isset($_POST['desactivar_marca'])) {
 	echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="UPDATE marcas SET estado = '0' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//desactivar marca



  //activar categoria
 if (isset($_POST['activar_slider'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE slider SET estado = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //activar categoria



  //desactivar categoria
 if (isset($_POST['desactivar_slider'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE slider SET estado = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar categoria



    //activar comentarios
 if (isset($_POST['activar_comentarios'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE comentarios SET aprobado = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //activar comentarios



  //desactivar comentarios
 if (isset($_POST['desactivar_comentarios'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE comentarios SET aprobado = '0' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //desactivar comentarios


    //leído comentarios
 if (isset($_POST['leido_comentarios'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE comentarios SET leido = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //leído comentarios


      //pedido visto
 if (isset($_POST['pedido_visto'])) {
  echo "entro actualizar pedido";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE pedidos SET leido = '1' WHERE numero_pedido='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //pedido visto


        //cliente visto
 if (isset($_POST['cliente_visto'])) {
  echo "entro actualizar cliente";

  $id=mysqli_real_escape_string($con, $_POST["id"]);

  $sql="UPDATE datos_clientes SET visto = '1' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //cliente visto




 	 	//actualizar foto
 if (isset($_POST['actualizar_foto'])) {
 	echo "entro actualizar";

 	$id=mysqli_real_escape_string($con, $_POST["idProducto"]);
 	$numero=mysqli_real_escape_string($con, $_POST["numero"]);
 	$foto = "foto".$numero;

 	$sql="UPDATE productos SET $foto = '' WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//actualizar foto



 if (isset($_POST['actualizarimagen1'])) {
 	echo "entro actualizar imagen 1";

$id_producto = $_POST['id_producto'];
$codigo_fabricante = $_POST['codigo_fabricante'];

  $numero1 = rand(1,100);
  $nombreimagen1 = preg_replace('([^A-Za-z0-9])', '', $codigo_fabricante);





  //si ha imagen 2
if($_FILES['imagen1']['name'] == "") {
     $imagen1 = ""; }else{
     $imagen1 = "assets/images/productos/".$nombreimagen1.$numero1.".jpg";
    }
   
    $query = mysqli_query($con, "UPDATE productos SET foto1 = '$imagen1' WHERE id='$id_producto' ");
    //echo json_encode(mysqli_insert_id($con));


         if( isset($_FILES['imagen1']) ) {
         	 $targetdir = '../assets/images/productos/';
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen1.$numero1.".jpg";
  if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $targetfile)) {
    echo "se subio2";
     //header("Location: productos_editar.php?id_producto=$id_producto");

      ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Imagen actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto; ?>#imagenes";
                  }
                }
              )
</script>
</body>
</html>
<?php


  } else { 
    // file upload failed
    echo "nada2";
     //header("Location: productos_editar.php?id_producto=$id_producto");
        }
}

 //header("Location: productos_editar.php?id_producto=$id_producto");
 ?>
 <script type="text/javascript">
   // window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto ?>";
</script>
<?php

}




 if (isset($_POST['actualizarimagen2'])) {
 	echo "entro actualizar imagen 2";

$id_producto = $_POST['id_producto'];
$codigo_fabricante = $_POST['codigo_fabricante'];

  $numero2 = rand(1,100);
  $nombreimagen2 = preg_replace('([^A-Za-z0-9])', '', $codigo_fabricante);





  //si ha imagen 2
if($_FILES['imagen2']['name'] == "") {
     $imagen2 = ""; }else{
     $imagen2 = "assets/images/productos/".$nombreimagen2.$numero2.".jpg";
    }
   
    $query = mysqli_query($con, "UPDATE productos SET foto2 = '$imagen2' WHERE id='$id_producto' ");
    //echo json_encode(mysqli_insert_id($con));


         if( isset($_FILES['imagen2']) ) {
         	 $targetdir = '../assets/images/productos/';
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen2.$numero2.".jpg";
  if (move_uploaded_file($_FILES['imagen2']['tmp_name'], $targetfile)) {
    echo "se subio2";
     //header("Location: productos_editar.php?id_producto=$id_producto");

      ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Imagen actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto; ?>#imagenes";
                  }
                }
              )
</script>
</body>
</html>
<?php


  } else { 
    // file upload failed
    echo "nada2";
     //header("Location: productos_editar.php?id_producto=$id_producto");
        }
}

 //header("Location: productos_editar.php?id_producto=$id_producto");
  ?>
 <script type="text/javascript">
    //window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto ?>";
</script>
<?php

}


 if (isset($_POST['actualizarimagen3'])) {
 	echo "entro actualizar imagen 3";

$id_producto = $_POST['id_producto'];
$codigo_fabricante = $_POST['codigo_fabricante'];

  $numero3 = rand(1,100);
  $nombreimagen3 = preg_replace('([^A-Za-z0-9])', '', $codigo_fabricante);





  //si ha imagen 2
if($_FILES['imagen3']['name'] == "") {
     $imagen3 = ""; }else{
     $imagen3 = "assets/images/productos/".$nombreimagen3.$numero3.".jpg";
    }
   
    $query = mysqli_query($con, "UPDATE productos SET foto3 = '$imagen3' WHERE id='$id_producto' ");
    //echo json_encode(mysqli_insert_id($con));


         if( isset($_FILES['imagen3']) ) {
         	 $targetdir = '../assets/images/productos/';
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen3.$numero3.".jpg";
  if (move_uploaded_file($_FILES['imagen3']['tmp_name'], $targetfile)) {
    echo "se subio3";
    // header("Location: productos_editar.php?id_producto=$id_producto");

      ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Imagen actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto; ?>#imagenes";
                  }
                }
              )
</script>
</body>
</html>
<?php

  } else { 
    // file upload failed
    echo "nada3";
    // header("Location: productos_editar.php?id_producto=$id_producto");
        }
}

 //header("Location: productos_editar.php?id_producto=$id_producto");
  ?>
 <script type="text/javascript">
   // window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto ?>";
</script>
<?php

}


//actualizar pedido a enviado y agregar guia
 if (isset($_POST['actualizar_pedido'])) {
  echo "entro actualizar";

  $numero_pedido=mysqli_real_escape_string($con, $_POST["numero_pedido"]);
  $guia=mysqli_real_escape_string($con, $_POST["numero_guia"]);

  $sql="UPDATE pedidos SET estatus = 'proceso', guia = '$guia' WHERE numero_pedido='$numero_pedido' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //actualizar pedido a enviado y agregar guia


  //actualizar pedido finalizado y recibido por el cliente
 if (isset($_POST['finalizar_pedido'])) {
  echo "entro actualizar";

  $numero_pedido=mysqli_real_escape_string($con, $_POST["numero_pedido"]);

  $sql="UPDATE pedidos SET estatus = 'finalizado' WHERE numero_pedido='$numero_pedido' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //actualizar pedido finalizado y recibido por el cliente


  //cancr pedido 
 if (isset($_POST['cancelar_pedido'])) {
  echo "entro actualizar";

  $numero_pedido=mysqli_real_escape_string($con, $_POST["numero_pedido"]);
 

  $sql="UPDATE pedidos SET estatus = 'cancelado'WHERE numero_pedido='$numero_pedido' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //cancr pedido 

    //aceptar cancelacion pedido
 if (isset($_POST['aceptar_cancelacion'])) {
  echo "entro entro aceptar canc";

  $numero_pedido=mysqli_real_escape_string($con, $_POST["numero_pedido"]);
 

  $sql="UPDATE pedidos SET estatus = 'cancelacionaceptada' WHERE numero_pedido='$numero_pedido' ";
  $res=mysqli_query($con, $sql) or die(mysqli_error($con));
   mysqli_close($con);
  }
  //aceptar cancelacion pedido


    //actualizar pago validado 
 if (isset($_POST['actualizar_pago'])) {
  echo "entro actualizar";

  $numero_pedido=mysqli_real_escape_string($con, $_POST["numero_pedido"]);
  $valor=mysqli_real_escape_string($con, $_POST["valor"]);
 

  $sql="UPDATE pedidos SET pagovalido = '$valor' WHERE numero_pedido='$numero_pedido' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //actualizar pago validado 


    //desactivar cliente 
 if (isset($_POST['desactivar_cliente'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id_cliente"]);
 

  $sql="UPDATE usuarios SET activo = '0' WHERE id_datos_clientes='$id' ";
  $res=mysqli_query($con, $sql);
  $sql="UPDATE datos_clientes SET activo = '0' WHERE id='$id'";
  $res=mysqli_query($con, $sql);

   mysqli_close($con);
  }
  //desactivar cliente 

      //activar cliente 
 if (isset($_POST['activar_cliente'])) {
  echo "entro actualizar";

  $id=mysqli_real_escape_string($con, $_POST["id_cliente"]);
 

  $sql="UPDATE usuarios SET activo = '1' WHERE id_datos_clientes='$id' ";
  $res=mysqli_query($con, $sql);
  $sql="UPDATE datos_clientes SET activo = '1' WHERE id='$id'";
  $res=mysqli_query($con, $sql);

   mysqli_close($con);
  }
  //desactivar cliente 



//nuevo producto

if (isset($_POST['modificar_producto'])) {

  $id_producto=mysqli_real_escape_string($con, $_POST["id_producto"]);
  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $categoria=mysqli_real_escape_string($con, $_POST["categoria"]);
  $submenu=mysqli_real_escape_string($con, $_POST["submenu"]);
  $descripcion_corta=mysqli_real_escape_string($con, $_POST["descripcion_corta"]);
  $descripcion=mysqli_real_escape_string($con, $_POST["descripcion"]);
  $marca=mysqli_real_escape_string($con, $_POST["marca"]);
  $clave_producto=mysqli_real_escape_string($con, $_POST["clave_producto"]);
  $codigo_fabricante=mysqli_real_escape_string($con, $_POST["codigo_fabricante"]);
  $precio_compra=mysqli_real_escape_string($con, $_POST["precio_compra"]);
  $precio_venta=mysqli_real_escape_string($con, $_POST["precio_venta"]);
  $impuesto=mysqli_real_escape_string($con, $_POST["impuesto"]);
  $IVA=mysqli_real_escape_string($con, $_POST["IVA"]);
  $existencia=mysqli_real_escape_string($con, $_POST["existencia"]);
  $clave_unidad=mysqli_real_escape_string($con, $_POST["clave_unidad"]);
  $clave_linea=mysqli_real_escape_string($con, $_POST["clave_linea"]);
  $clave_marca=mysqli_real_escape_string($con, $_POST["clave_marca"]);
  $maximo=mysqli_real_escape_string($con, $_POST["maximo"]);
  $minimo=mysqli_real_escape_string($con, $_POST["minimo"]);
  $ubicacion_zona=mysqli_real_escape_string($con, $_POST["ubicacion_zona"]);
  $ubicacion_pasillo=mysqli_real_escape_string($con, $_POST["ubicacion_pasillo"]);
  $ubicacion_anaquel=mysqli_real_escape_string($con, $_POST["ubicacion_anaquel"]);
  $ubicacion_repisa=mysqli_real_escape_string($con, $_POST["ubicacion_repisa"]);
  $descuento=mysqli_real_escape_string($con, $_POST["descuento"]);
  $valorcfdi=mysqli_real_escape_string($con, $_POST["valorcfdi"]);
  $ancho=mysqli_real_escape_string($con, $_POST["ancho"]);
  $alto=mysqli_real_escape_string($con, $_POST["alto"]);
  $largo=mysqli_real_escape_string($con, $_POST["largo"]);
  $peso=mysqli_real_escape_string($con, $_POST["peso"]);

   $tipo_envio=mysqli_real_escape_string($con, $_POST["tipo_envio"]);



    $query = mysqli_query($con, "UPDATE `productos` SET `nombre` = '$nombre', `marca` = '$marca', `categoria` = '$categoria', `submenu` = '$submenu', `descripcion_corta` = '$descripcion_corta',`descripcion` = '$descripcion', `codigo_fabricante` = '$codigo_fabricante', `precio_compra` = '$precio_compra', `precio_venta` = '$precio_venta', `impuesto` = '$impuesto', `IVA` = '$IVA', `existencia` = '$existencia', `clave_unidad` = '$clave_unidad', `clave_linea` = '$clave_linea', `clave_marca` = '$clave_marca', `maximo` = '$maximo', `minimo` = '$minimo', `ubicacion_zona` = '$ubicacion_zona', `ubicacion_pasillo` = '$ubicacion_pasillo', `ubicacion_anaquel` = '$ubicacion_anaquel', `ubicacion_repisa` = '$ubicacion_repisa',`descuento` = '$descuento', `valorcfdi` = '$valorcfdi', `ancho` = '$ancho', `alto` = '$alto', `largo`= '$largo', `peso` = '$peso', `tipo_envio` = '$tipo_envio'  WHERE id = '$id_producto';") or die(mysqli_error($con));
    //echo json_encode(mysqli_insert_id($con));



?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Producto guardado</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Producto actualizado correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "productos.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
//nuevo producto


//ficha tecnica



if (isset($_POST['fichatecnica'])) {
  

$id_producto = $_POST['id_producto'];

$targetfolder = "../assets/images/productos/fichatecnica/";
$target_file = $targetfolder.$id_producto.".pdf";


if (move_uploaded_file($_FILES["fichatecnicapdf"]["tmp_name"], $target_file )) { 



  ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>PDF actualizado</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Ficha técnica',
                  text: 'agregada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto; ?>#imagenes";
                  }
                }
              )
</script>
</body>
</html>

<?php

 }

 else {

 echo "<script>alert('Error intenta nuevamente');</script>";

 }





}

//ficha tecnica




//actualizar promoción

if (isset($_POST['id_promocion'])) {


  $id_promocion=mysqli_real_escape_string($con, $_POST["id_promocion"]);
  $nombrePromocion=mysqli_real_escape_string($con, $_POST["nombrePromocion"]);
  $urlPromocion=mysqli_real_escape_string($con, $_POST["urlPromocion"]);

  $numero = rand(1,100);

  $nombreimagen = preg_replace('([^A-Za-z0-9])', '', $nombre);

    $imagen = "assets/images/promociones/activas/".$nombreimagen.$numero.".jpg";
    $query = mysqli_query($con, "INSERT INTO `promociones` (`promocion`, `imagen`, `url`) VALUES ('$nombre', '$imagen', '$url');");
    //echo json_encode(mysqli_insert_id($con));
    //$idecedula = mysqli_insert_id($con);
    $targetdir = '../assets/images/promociones/activas/';   
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen.$numero.".jpg";
  if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $targetfile)) {
   // echo "se subio";
  } else { 
    // file upload failed
 // echo "nada";
        }

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Promoción guardada</title>
<!-- <link rel="stylesheet" href="css/bootstrap.min.css" media="screen"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Promoción guardada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "promociones.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
//actualizar promoción





//actualizar categoria

if (isset($_POST['actualizarcategoria'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $icono=mysqli_real_escape_string($con, $_POST["icono"]);
  $idcategoria=mysqli_real_escape_string($con, $_POST["idcategoria"]);


    $query = mysqli_query($con, "UPDATE `categorias` SET `icono`='$icono',`nombre`='$nombre' WHERE `id` = '$idcategoria'") or die(mysqli_error($con));
    $query1= mysqli_query($con, "UPDATE `menu` SET `icono` = '$icono', `nombre` = '$nombre' WHERE `id_categoria` = '$idcategoria'") or die(mysqli_error($con));
    //echo json_encode(mysqli_insert_id($con));
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Categoria guardada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Categoría actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "categorias.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
//actualizar categoria



//actualizar imagen categoria



if (isset($_POST['actulizarimagencategoria'])) {
  

echo $idcategoria = $_POST['idcategoria'];
$nombre = $_POST['nombre'];

function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

$nombre = stripAccents($nombre);
$nombre = preg_replace('/\s+/', '', $nombre);


$numero = rand(1,100);
echo $imagen = "assets/images/categorias/".$nombre.$numero.".jpg";
$query = mysqli_query($con, "UPDATE `categorias` SET `imagen` = '$imagen' WHERE `id` = '$idcategoria'") or die(mysqli_error($con));

$targetdir = '../assets/images/categorias/';   
$target_file = $targetdir.$nombre.$numero.".jpg";


if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file )) { 



  ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Imagen',
                  text: 'agregada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "categorias.php";
                  }
                }
              )
</script>
</body>
</html>

<?php

 }

 else {

 echo "<script>alert('Error intenta nuevamente');</script>";

 }





}

//actualizar imagen categoria



//actualizar MARCA

if (isset($_POST['actualizarmarca'])) {

  $marca=mysqli_real_escape_string($con, $_POST["marca"]);
  $idmarca=mysqli_real_escape_string($con, $_POST["idmarca"]);


    $query = mysqli_query($con, "UPDATE `marcas` SET `marca`='$marca' WHERE `id` = '$idmarca'") or die(mysqli_error($con));
    
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Marca guardada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'marca actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "marcas.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
//actualizar MARCA


//actualizar imagen marca



if (isset($_POST['actualizarimagenmarca'])) {
  

echo $idmarca = $_POST['idmarca'];
$nombre = $_POST['nombre'];

function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

$nombre = stripAccents($nombre);
$nombre = preg_replace('/\s+/', '', $nombre);


$numero = rand(1,100);
echo $nombre = $nombre.".jpg";
$query = mysqli_query($con, "UPDATE `marcas` SET `imagen` = '$nombre' WHERE `id` = '$idmarca'") or die(mysqli_error($con));

$targetdir = '../assets/images/marcas/';   
$target_file = $targetdir.$nombre;


if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file )) { 



  ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Imagen',
                  text: 'actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "marcas.php";
                  }
                }
              )
</script>
</body>
</html>

<?php

 }

 else {

 echo "<script>alert('Error intenta nuevamente');</script>";

 }





}

//actualizar imagen marca




//actualizar PROMOCIONES

if (isset($_POST['actualizarpromocion'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $url=mysqli_real_escape_string($con, $_POST["url"]);
  $idpromocion=mysqli_real_escape_string($con, $_POST["idpromocion"]);


    $query = mysqli_query($con, "UPDATE `promociones` SET `promocion`='$nombre', `url`='$url' WHERE `id` = '$idpromocion'") or die(mysqli_error($con));
    
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Promoción actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'promoción actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "promociones.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
//actualizar PROMOCIONES


//actualizar imagen PROMOCIONES



if (isset($_POST['actualizarimagenpromocion'])) {
  

echo $idpromocion = $_POST['idpromocion'];
$nombre = $_POST['nombre'];

function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

$nombre = stripAccents($nombre);
$nombre = preg_replace('/\s+/', '', $nombre);


$numero = rand(1,100);
echo $nombre = $nombre.".jpg";
$query = mysqli_query($con, "UPDATE `promociones` SET `imagen` = 'assets/images/promociones/activas/$nombre' WHERE `id` = '$idpromocion'") or die(mysqli_error($con));

$targetdir = '../assets/images/promociones/activas/';   
$target_file = $targetdir.$nombre;


if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file )) { 



  ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Imagen',
                  text: 'actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "promociones.php";
                  }
                }
              )
</script>
</body>
</html>

<?php

 }

 else {

 echo "<script>alert('Error intenta nuevamente');</script>";

 }





}

//actualizar imagen PROMOCIONES






//actualizar recomendados

if (isset($_POST['actualizarrecomendados'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $url=mysqli_real_escape_string($con, $_POST["url"]);
  $idrecomendado=mysqli_real_escape_string($con, $_POST["idrecomendados"]);


    $query = mysqli_query($con, "UPDATE `recomendados` SET `producto`='$nombre', `url`='$url' WHERE `id` = '$idrecomendado'") or die(mysqli_error($con));
    
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Recomendado actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'recomendado actualizado correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "recomendados.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
//actualizar RECOMENDADOS


//actualizar imagen RECOMENDADOS



if (isset($_POST['actualizarimagenrecomendados'])) {
  

echo $idrecomendados = $_POST['idrecomendados'];
$nombre = $_POST['nombre'];

function stripAccents($str) {
    return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

$nombre = stripAccents($nombre);
$nombre = preg_replace('/\s+/', '', $nombre);


$numero = rand(1,100);
echo $nombre = $nombre.".jpg";
$query = mysqli_query($con, "UPDATE `recomendados` SET `imagen` = 'assets/images/recomendados/activos/$nombre' WHERE `id` = '$idrecomendados'") or die(mysqli_error($con));

$targetdir = '../assets/images/recomendados/activos/';   
$target_file = $targetdir.$nombre;


if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file )) { 



  ?>
    <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Imagen actualizada</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Imagen',
                  text: 'actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "recomendados.php";
                  }
                }
              )
</script>
</body>
</html>

<?php

 }

 else {

 echo "<script>alert('Error intenta nuevamente');</script>";

 }





}

//actualizar imagen PROMOCIONES





  //actualizar datos cliente
 if (isset($_POST['actualizar_cliente'])) {
  echo "entro actualizar cliente";

  $id=mysqli_real_escape_string($con, $_POST["id"]);
  $nombre_completo=mysqli_real_escape_string($con, $_POST["nombre_completo"]);
  $telefono=mysqli_real_escape_string($con, $_POST["telefono"]);
  $correo=mysqli_real_escape_string($con, $_POST["correo"]);
  $anuncios=mysqli_real_escape_string($con, $_POST["anuncios"]);

  $sql="UPDATE datos_clientes SET nombreCompleto = '$nombre_completo', telefono = '$telefono', correo = '$correo', anuncios = '$anuncios' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);

   ?>
   <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cliente actualizado</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Datos del cliente',
                  text: 'actualizados correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "clientes_editar.php?id_cliente=<?php echo $id ?>";
                  }
                }
              )
</script>
</body>
</html>
<?php
  }
  //actualizar datos cliente


  //actualizar datos cliente
 if (isset($_POST['actualizar_direccion'])) {
  echo "entro actualizar direccion";

  $id=mysqli_real_escape_string($con, $_POST["id"]);
  $calle=mysqli_real_escape_string($con, $_POST["calle"]);
  $numero_exterior=mysqli_real_escape_string($con, $_POST["numero_exterior"]);
  $colonia=mysqli_real_escape_string($con, $_POST["colonia"]);
  $numero_interior=mysqli_real_escape_string($con, $_POST["numero_interior"]);
  $cp=mysqli_real_escape_string($con, $_POST["cp"]);
  $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);
  $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
  $estado=mysqli_real_escape_string($con, $_POST["estado"]);

  $sql="UPDATE direcciones SET calle = '$calle', numero_exterior = '$numero_exterior', colonia = '$colonia', numero_interior = '$numero_interior', cp = '$cp', ciudad = '$ciudad', municipio = '$municipio', estado = '$estado' WHERE id='$id' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);

   ?>
   <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dirección actualizada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Dirección del cliente',
                  text: 'actualizada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "direcciones_editar.php?id_direccion=<?php echo $id ?>";
                  }
                }
              )
</script>
</body>
</html>
<?php
  }
  //actualizar datos cliente