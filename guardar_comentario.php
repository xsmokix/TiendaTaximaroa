<?php 

require_once "db.php";

$id_producto = $_POST['id_producto'];
if (isset($_SESSION['nombre'])) {
  $usuario=mysqli_real_escape_string($con, $_SESSION['nombre']);
}else{
  $usuario="Anónimo";
}
if (isset($_SESSION['idcliente'])) {
  $id_cliente=mysqli_real_escape_string($con, $_SESSION['idcliente']);
}else{
  $id_cliente="0";
}
$comentario=mysqli_real_escape_string($con, $_POST["comentario"]);
$fecha = date("Y-m-d");



 $sql="INSERT INTO comentarios (id_productos, id_cliente, usuario, comentario, fecha) VALUES ( '$id_producto','$id_cliente', '$usuario','$comentario', '$fecha');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion";
          } else{

          echo "comentario guardado"; 
          //echo "<a href='panel.php'>Regresar</a>"; 
          $id_comentario = mysqli_insert_id($con);

        }



// Count # of uploaded files in array
$total = count($_FILES['files']['name']);


if (!file_exists('assets/images/productos/'.$id_producto.'/')) {
    mkdir('assets/images/productos/'.$id_producto.'/', 0777, true);
}
if (!file_exists('assets/images/productos/'.$id_producto.'/comentarios/')) {
    mkdir('assets/images/productos/'.$id_producto.'/comentarios/', 0777, true);
}

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
  $tmpFilePath = $_FILES['files']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = 'assets/images/productos/'.$id_producto.'/comentarios/' . $_FILES['files']['name'][$i];
    $nombreImagen = $_FILES['files']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {


         $sql="INSERT INTO comentarios_imagenes (id_comentario, nombre_imagen) VALUES ( '$id_comentario', '$nombreImagen');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion";
          } else{

        }


    }
  }
}

header("Location: http://localhost/ferreteriataximaroa.com/ver_producto.php?id_producto=".$id_producto."&comentario=guardado");




/*

if (isset($_POST['id_producto'])) {

  $id_producto=mysqli_real_escape_string($con, $_POST["id_producto"]);
  $comentario=mysqli_real_escape_string($con, $_POST["comentario"]);

  $numero = rand(1,100);

    $imagen = "assets/images/productos/".$id_producto."/comentarios/";
    $query = mysqli_query($con, "INSERT INTO `categorias` (`icono`,`nombre`, `imagen`) VALUES ('$icono','$nombre', '$imagen');");

     $sql="INSERT INTO comentarios (id_productos, usuario, comentario, fecha) VALUES ( '$id_producto','$usuario','$comentario', '$fecha');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "guardado"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);




    $id_categoria = mysqli_insert_id($con);
    $query1= mysqli_query($con, "INSERT INTO menu (icono,nombre,id_categoria,orden) VALUES ( '$icono','$nombre', '$id_categoria','0' );");
    //echo json_encode(mysqli_insert_id($con));
    
    $targetdir = "assets/images/productos/".$id_producto."/comentarios/";   
      // name of the directory where the files should be stored
  $targetfile = $targetdir.$nombre.$numero.".jpg";
  if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $targetfile)) {
    //echo "se subio";
  } else { 
    // file upload failed
  //echo "nada";
        }

*/
?>
<!--
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
</html> -->
