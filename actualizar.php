<?php  

require_once "db.php";


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
     header("Location: productos_editar.php?id_producto=$id_producto");
  } else { 
    // file upload failed
    echo "nada2";
     header("Location: productos_editar.php?id_producto=$id_producto");
        }
}

 header("Location: productos_editar.php?id_producto=$id_producto");
 ?>
 <script type="text/javascript">
    window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto ?>";
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
     header("Location: productos_editar.php?id_producto=$id_producto");
  } else { 
    // file upload failed
    echo "nada2";
     header("Location: productos_editar.php?id_producto=$id_producto");
        }
}

 header("Location: productos_editar.php?id_producto=$id_producto");
  ?>
 <script type="text/javascript">
    window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto ?>";
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
     header("Location: productos_editar.php?id_producto=$id_producto");
  } else { 
    // file upload failed
    echo "nada3";
     header("Location: productos_editar.php?id_producto=$id_producto");
        }
}

 header("Location: productos_editar.php?id_producto=$id_producto");
  ?>
 <script type="text/javascript">
    window.location.href = "productos_editar.php?id_producto=<?php echo $id_producto ?>";
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


  //cancr pedido 
 if (isset($_POST['cancelar_pedido'])) {
  echo "entro actualizar";

  $numero_pedido=mysqli_real_escape_string($con, $_POST["numero_pedido"]);
 

  $sql="UPDATE pedidos SET estatus = 'cancelado'WHERE numero_pedido='$numero_pedido' ";
  $res=mysqli_query($con, $sql);
   mysqli_close($con);
  }
  //cancr pedido 



//nuevo producto

if (isset($_POST['modificar_producto'])) {

  $id_producto=mysqli_real_escape_string($con, $_POST["id_producto"]);
  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $categoria=mysqli_real_escape_string($con, $_POST["categoria"]);
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

  $valorcfdi=mysqli_real_escape_string($con, $_POST["valorcfdi"]);

  $ancho=mysqli_real_escape_string($con, $_POST["ancho"]);
  $alto=mysqli_real_escape_string($con, $_POST["alto"]);
  $largo=mysqli_real_escape_string($con, $_POST["largo"]);
  $peso=mysqli_real_escape_string($con, $_POST["peso"]);



    $query = mysqli_query($con, "UPDATE `productos` SET `nombre` = '$nombre', `marca` = '$marca', `categoria` = '$categoria', `descripcion` = '$descripcion', `codigo_fabricante` = '$codigo_fabricante', `precio_compra` = '$precio_compra', `precio_venta` = '$precio_venta', `impuesto` = '$impuesto', `IVA` = '$IVA', `existencia` = '$existencia', `clave_unidad` = '$clave_unidad', `clave_linea` = '$clave_linea', `clave_marca` = '$clave_marca', `maximo` = '$maximo', `minimo` = '$minimo', `ubicacion_zona` = '$ubicacion_zona', `ubicacion_pasillo` = '$ubicacion_pasillo', `ubicacion_anaquel` = '$ubicacion_anaquel', `ubicacion_repisa` = '$ubicacion_repisa', `valorcfdi` = '$valorcfdi', `ancho` = '$ancho', `alto` = '$alto', `largo`= '$largo', `peso` = '$peso' WHERE id = '$id_producto';");
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
<title>Producto guardado</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Ficha técnica',
                  text: 'Gurdada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "productos_editar.php?id_producto="<?php echo $id_producto ?>;
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


