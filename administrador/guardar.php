<?php
require_once "seguridad.php"; 

       
        require_once "db.php";
        


        if (isset($_POST['nuevo_usuario'])) {

          require_once "lib/password.php";

        $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);
        $correo=mysqli_real_escape_string($con, $_POST["correo"]);
        $telefono=mysqli_real_escape_string($con, $_POST["telefono"]);
        $tipo=mysqli_real_escape_string($con, $_POST["tipo"]);
        $privilegio=mysqli_real_escape_string($con, $_POST["privilegio"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
        $region1=mysqli_real_escape_string($con, $_POST["region1"]);
        $region2=mysqli_real_escape_string($con, $_POST["region2"]);
       
        $hash = password_hash($pass, PASSWORD_BCRYPT);



        $sql="INSERT INTO usuarios (nombre, usuario, pass, tipo, privilegio, municipio, correo, telefono, region1, region2 ) VALUES ( '$nombre','$usuario', '$hash', '$tipo','$privilegio', '$municipio', '$correo', '$telefono', '$region1', '$region2');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "usuario registrado correctamente <br><br>"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }     


            }



    if (isset($_POST['nuevousuarioadmin'])) {

          require_once "lib/password.php";

        $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);
        $privilegio=mysqli_real_escape_string($con, $_POST["privilegio"]);
     
       
        $hash = password_hash($pass, PASSWORD_BCRYPT);



        $sql="INSERT INTO usuarios_admin (nombre, usuario, password, privilegio, estado) VALUES ( '$nombre','$usuario', '$hash', '$privilegio', '1');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "usuario registrado correctamente <br><br>"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }     


}

            if (isset($_POST['usuarioMod'])) {
          # code...
        
        $idusuario=mysqli_real_escape_string($con, $_POST["idusuarioMod"]);
        $nombre=mysqli_real_escape_string($con, $_POST["nombreMod"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuarioMod"]);
        $pass=mysqli_real_escape_string($con, $_POST["passwordMod"]);
        $correo=mysqli_real_escape_string($con, $_POST["correoMod"]);
        $telefono=mysqli_real_escape_string($con, $_POST["telefonoMod"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipioMod"]);
        $tipo=mysqli_real_escape_string($con, $_POST["tipoMod"]);
        $privilegio=mysqli_real_escape_string($con, $_POST["privilegioMod"]);
        $region1=mysqli_real_escape_string($con, $_POST["region1Mod"]);
        $region2=mysqli_real_escape_string($con, $_POST["region2Mod"]);
       

       
        $hash = password_hash($pass, PASSWORD_BCRYPT);



        $sql="UPDATE usuarios SET nombre = '$nombre', usuario = '$usuario', pass = '$hash',  correo = '$correo', telefono = '$telefono', municipio = '$municipio', tipo = '$tipo', privilegio = '$privilegio', region1 = '$region1', region2 = '$region2' WHERE id='$idusuario' ";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "usuario modificado correctamente <br><br>"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }    



      } 


      if (isset($_POST['nuevoinventario'])) {
          # code...
        
        $concepto=mysqli_real_escape_string($con, $_POST["concepto"]);
        $fecha=mysqli_real_escape_string($con, $_POST["fecha"]);
        $clave_producto=mysqli_real_escape_string($con, $_POST["clave"]);
        $nombre_producto=mysqli_real_escape_string($con, $_POST["producto"]);
        $codigo_fabricante=mysqli_real_escape_string($con, $_POST["codigo_fabricante"]);
        $existencia_anterior=mysqli_real_escape_string($con, $_POST["existencia_anterior"]);
        $ajustado_a=mysqli_real_escape_string($con, $_POST["ajustado_a"]);
        $diferencia=mysqli_real_escape_string($con, $_POST["diferencia"]);
        $precio_compra=mysqli_real_escape_string($con, $_POST["precio_compra"]);
        $monto=mysqli_real_escape_string($con, $_POST["monto"]);
        $precio_venta=mysqli_real_escape_string($con, $_POST["precio_venta"]);
       

       


        $sql="INSERT INTO `ajustes_inventario` (`concepto`, `fecha`, `clave_producto`, `nombre_producto`, `codigo_fabricante`, `existencia_anterior`, `ajustado_a`, `diferencia`, `precio_compra`, `monto`, `precio_venta`) VALUES ('$concepto', '2021-10-29 13:27:16', '$clave_producto', '$nombre_producto', '$codigo_fabricante', '$existencia_anterior', '$ajustado_a', '$diferencia', '$precio_compra', '$monto', '$precio_venta');";
        $res=mysqli_query($con, $sql);

        //actualizamos existencia y precio en productos
        $sql2="UPDATE productos SET existencia = '$ajustado_a', precio_compra = '$precio_compra', precio_venta = '$precio_venta' WHERE clave_producto = '$clave_producto'";
        $res2=mysqli_query($con, $sql2);


        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "inventario ajustado correctamente <br><br>"; 
         
        mysqli_close($con);
             }    



      } //nuevoinventario



//nuevo menu

if (isset($_POST['nuevomenu'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);


 $sql="INSERT INTO menu (nombre) VALUES ( '$nombre' );";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{
 

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Menú guardado</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Menu',
                  text: 'agregado correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "menu.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
}
//nuevo menu


//nuevo submenu

if (isset($_POST['nuevosubmenu'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $url=mysqli_real_escape_string($con, $_POST["url"]);
  $idmenu=mysqli_real_escape_string($con, $_POST["idmenu"]);


 $sql="INSERT INTO submenu (idmenu, nombre, url) VALUES ( '$idmenu','$nombre','$url' );";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{
 

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>SubMenú guardado</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'SubMenu',
                  text: 'agregado correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "submenu.php?idmenu=<?php echo $idmenu ?>";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
}
//nuevo submenu




//nueva categoria

if (isset($_POST['nuevacategoria'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $icono=mysqli_real_escape_string($con, $_POST["icono"]);

  $numero = rand(1,100);

    $imagen = "assets/images/categorias/".$nombre.$numero.".jpg";
    $query = mysqli_query($con, "INSERT INTO `categorias` (`icono`,`nombre`, `imagen`) VALUES ('$icono','$nombre', '$imagen');");
    $id_categoria = mysqli_insert_id($con);
    $query1= mysqli_query($con, "INSERT INTO menu (icono,nombre,id_categoria,orden) VALUES ( '$icono','$nombre', '$id_categoria','0' );");
    //echo json_encode(mysqli_insert_id($con));
    
    $targetdir = '../assets/images/categorias/';   
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombre.$numero.".jpg";
  if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $targetfile)) {
    //echo "se subio";
  } else { 
    // file upload failed
  //echo "nada";
        }

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
                  text: 'Categoría guardada correctamente',
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
//nueva categoria




//nuevo slider

if (isset($_POST['nuevoslider'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);

  $numero = rand(1,100);

    $imagen = "assets/images/slider/".$nombre.$numero;
    $query = mysqli_query($con, "INSERT INTO `slider` (`nombre`, `imagen`) VALUES ('$nombre', '$imagen');");
    //echo json_encode(mysqli_insert_id($con));
    $idecedula = mysqli_insert_id($con);
    $targetdir = '../assets/images/slider/';   
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombre.$numero.".jpg";
  $targetfile1 = $targetdir.$nombre.$numero."-movil.jpg";
  if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $targetfile)) {
      move_uploaded_file($_FILES['imagen2']['tmp_name'], $targetfile1);
    //echo "se subio";
  } else { 
    // file upload failed
  //echo "nada";
        }

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Slider guardado</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Slider agregado correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "slider.php";
                  }
                }
              )
</script>
</body>
</html>
<?php 
}
//nuevo slider




//nueva marca

if (isset($_POST['nuevamarca'])) {

  $marca=mysqli_real_escape_string($con, $_POST["marca"]);

  $numero = rand(1,100);

    $imagen = $marca.$numero.".jpg";
    $query = mysqli_query($con, "INSERT INTO `marcas` (`marca`, `imagen`) VALUES ('$marca', '$imagen');");
    //echo json_encode(mysqli_insert_id($con));
    $idecedula = mysqli_insert_id($con);
    $targetdir = '../assets/images/marcas/';   
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$marca.$numero.".jpg";
  if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $targetfile)) {
    //echo "se subio";
  } else { 
    // file upload failed
  //echo "nada";
        }

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
                  text: 'Marca guardada correctamente',
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
//nueva marca



//nuevo producto

if (isset($_POST['nuevoproducto'])) {

  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $categoria=mysqli_real_escape_string($con, $_POST["categoria"]);
  $submenu=mysqli_real_escape_string($con, $_POST["subcategoria"]);
  $descripcion=mysqli_real_escape_string($con, $_POST["descripcion"]);
  $descripcion_corta=mysqli_real_escape_string($con, $_POST["descripcion_corta"]);
  $marca=mysqli_real_escape_string($con, $_POST["marca"]);
  $clave_producto=mysqli_real_escape_string($con, $_POST["clave_producto"]);
  $codigo_fabricante=mysqli_real_escape_string($con, $_POST["codigo_fabricante"]);
  $precio_compra=mysqli_real_escape_string($con, $_POST["precio_compra"]);
  $precio_venta=mysqli_real_escape_string($con, $_POST["precio_venta"]);
  $impuesto=mysqli_real_escape_string($con, $_POST["impuesto"]);
  $iva=mysqli_real_escape_string($con, $_POST["iva"]);
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

  $tipo_envio =mysqli_real_escape_string($con, $_POST["tipo_envio"]);


  $numero = rand(1,100);
  $numero2 = rand(1,100);
  $numero3 = rand(1,100);

  $nombreimagen = preg_replace('([^A-Za-z0-9])', '', $codigo_fabricante);
  $nombreimagen2 = preg_replace('([^A-Za-z0-9])', '', $codigo_fabricante);
  $nombreimagen3 = preg_replace('([^A-Za-z0-9])', '', $codigo_fabricante);

if($_FILES['imagen1']['name'] == "") { 
    $imagen = "";
  }else{ 
    $imagen = "assets/images/productos/".$nombreimagen.$numero.".jpg";
  }
  //si ha imagen 2
if($_FILES['imagen2']['name'] == "") {
     $imagen2 = ""; }else{
     $imagen2 = "assets/images/productos/".$nombreimagen2.$numero2.".jpg";
    }
    //si ha imagen 3
if($_FILES['imagen3']['name'] == "") {
    $imagen3 = "";}else{
       $imagen3 = "assets/images/productos/".$nombreimagen3.$numero3.".jpg";
    }
    $query = mysqli_query($con, "INSERT INTO `productos` (`clave_producto`,`nombre`, `marca`, `categoria`, `submenu`, `descripcion_corta`, `descripcion`, `codigo_fabricante`, `precio_compra`, `precio_venta`, `impuesto`, `IVA`, `existencia`, `clave_unidad`, `clave_linea`, `clave_marca`, `foto1`, `foto2`, `foto3`, `maximo`, `minimo`, `ubicacion_zona`, `ubicacion_pasillo`, `ubicacion_anaquel`, `ubicacion_repisa`, `descuento`, `producto_inactivo`, `valorcfdi`, `ancho`, `alto`, `largo`, `peso`, `persCalificaron`, `calificacion`, `tipo_envio`) VALUES ( '$clave_producto','$nombre','$marca', '$categoria','$submenu', '$descripcion_corta', '$descripcion', '$codigo_fabricante', '$precio_compra', '$precio_venta', '$impuesto', '$iva', '$existencia', '$clave_unidad', '$clave_linea', '$clave_marca', '$imagen', '$imagen2', '$imagen3', '$maximo', '$minimo', '$ubicacion_zona', '$ubicacion_pasillo', '$ubicacion_anaquel', '$ubicacion_repisa', '$descuento', '0', '$valorcfdi', '$ancho', '$alto', '$largo', '$peso', '0', '0', '$tipo_envio')") or die(mysqli_error($con));
    //echo json_encode(mysqli_insert_id($con));

if( isset($_FILES['imagen1']) ) {
    $targetdir = '../assets/images/productos/';   
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen.$numero.".jpg";
  if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $targetfile)) {
    //echo "se subio";
  } else { 
    // file upload failed
  //echo "nada";
        }
      }
         if( isset($_FILES['imagen2']) ) {
           $targetdir = '../assets/images/productos/';
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen2.$numero2.".jpg";
  if (move_uploaded_file($_FILES['imagen2']['tmp_name'], $targetfile)) {
    echo "se subio2";
  } else { 
    // file upload failed
    echo "nada2";
        }
}
 if( isset($_FILES['imagen3']) ) {
   $targetdir = '../assets/images/productos/';
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombreimagen3.$numero3.".jpg";
  if (move_uploaded_file($_FILES['imagen3']['tmp_name'], $targetfile)) {
    echo "se subio3";
  } else { 
    // file upload failed
    echo "nada3";
        }
}

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
                  text: 'Producto guardado correctamente',
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


//nueva promocion

if (isset($_POST['nuevapromocion'])) {



  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $url=mysqli_real_escape_string($con, $_POST["url"]);

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
//nueva promocion



//nuevo producto recomendado

if (isset($_POST['nuevorecomendado'])) {



  $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
  $url=mysqli_real_escape_string($con, $_POST["url"]);

  $numero = rand(1,100);

  $nombreimagen = preg_replace('([^A-Za-z0-9])', '', $nombre);


    $imagen = "assets/images/recomendados/activos/".$nombreimagen.$numero.".jpg";
    $query = mysqli_query($con, "INSERT INTO `recomendados` (`producto`,`url`, `imagen`) VALUES ('$nombre', '$url', '$imagen');");
    //echo json_encode(mysqli_insert_id($con));
    //$idecedula = mysqli_insert_id($con);
    $targetdir = '../assets/images/recomendados/activos/';   
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
<title>Recomendado guardado</title>
<!-- <link rel="stylesheet" href="css/bootstrap.min.css" media="screen"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'Producto recomendado guardado correctamente',
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
//nuevo producto recomendado




//nueva pregunta

if (isset($_POST['nuevapregunta'])) {

  $categoria=mysqli_real_escape_string($con, $_POST["categoria"]);
  $pregunta=mysqli_real_escape_string($con, $_POST["pregunta"]);
  $respuesta=mysqli_real_escape_string($con, $_POST["respuesta"]);

  
    $query = mysqli_query($con, "INSERT INTO `preguntas_frecuentes` (`categoria`,`pregunta`, `respuesta`) VALUES ('$categoria','$pregunta', '$respuesta');");
    
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Pregunta guardada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Felicidades',
                  text: 'pregunta guardada correctamente',
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
//nueva pregunta

?>