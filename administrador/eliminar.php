<?php  
require_once "seguridad.php"; 
require_once "db.php";



//eliminar menu
 if (isset($_POST['eliminar_menu'])) {
 	echo "entro eliminar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="DELETE FROM menu WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//eliminar menu


   //eliminar usuario
 if (isset($_POST['eliminar_usuario'])) {
   echo "entro eliminar";

   $id=mysqli_real_escape_string($con, $_POST["id"]);

   $sql="DELETE FROM usuarios_admin WHERE id='$id' ";
   $res=mysqli_query($con, $sql);
    mysqli_close($con);
   }
   //eliminar usuario

 	//eliminar menu
 if (isset($_POST['eliminar_submenu'])) {
 	echo "entro eliminar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="DELETE FROM submenu WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//eliminar menu


//eliminar categoria
 if (isset($_POST['eliminar_categoria'])) {
 	echo "entro eliminar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="DELETE FROM categorias WHERE id='$id' ";
 	$sql1="DELETE FROM menu WHERE id_categoria='$id' ";
 	$res=mysqli_query($con, $sql);
 	$res1=mysqli_query($con, $sql1);
 	 mysqli_close($con);
 	}
 	//eliminar categoria



 	//eliminar promocion
 if (isset($_POST['eliminar_promocion'])) {
 	echo "entro eliminar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="DELETE FROM promociones WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//eliminar promocion

      //eliminar recomendado
 if (isset($_POST['eliminar_recomendado'])) {
   echo "entro eliminar";

   $id=mysqli_real_escape_string($con, $_POST["id"]);

   $sql="DELETE FROM recomendados WHERE id='$id' ";
   $res=mysqli_query($con, $sql);
    mysqli_close($con);
   }
   //eliminar recomendado



      //eliminar recomendados
 if (isset($_POST['eliminar_recomendado'])) {
   echo "entro eliminar";

   $id=mysqli_real_escape_string($con, $_POST["id"]);

   $sql="DELETE FROM recomendados WHERE id='$id' ";
   $res=mysqli_query($con, $sql);
    mysqli_close($con);
   }
   //eliminar recomendados


 	//eliminar producto
 if (isset($_POST['eliminar_producto'])) {
 	echo "entro eliminar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="DELETE FROM productos WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//eliminar producto



 	 	//eliminar marca
 if (isset($_POST['eliminar_marca'])) {
 	echo "entro eliminar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="DELETE FROM marcas WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//eliminar marca



 	 	 	//eliminar slider
 if (isset($_POST['eliminar_slider'])) {
 	echo "entro eliminar";

 	$id=mysqli_real_escape_string($con, $_POST["id"]);

 	$sql="DELETE FROM slider WHERE id='$id' ";
 	$res=mysqli_query($con, $sql);
 	 mysqli_close($con);
 	}
 	//eliminar slider

    //eliminar comentarios
 if (isset($_POST['eliminar_comentarios'])) {
    echo "entro eliminar";

    $id=mysqli_real_escape_string($con, $_POST["id"]);

    $sql="DELETE FROM comentarios WHERE id='$id' ";
    $res=mysqli_query($con, $sql);
     mysqli_close($con);
    }
    //eliminar comentarios



    //eliminar ficha técnica
 if (isset($_POST['eliminar_fichat'])) {
    echo "entro eliminar";
    $id_producto = "../assets/images/productos/fichatecnica/".$_POST['id_producto'].".pdf";

      unlink($id_producto);
    }
    //eliminar ficha técnica



	    //eliminar comentarios
		if (isset($_POST['eliminar_cliente'])) {
			echo "entro eliminar";
		
			$id=mysqli_real_escape_string($con, $_POST["id_cliente"]);
		
			$sql="DELETE FROM usuarios WHERE id_datos_clientes='$id' ";
			$res=mysqli_query($con, $sql);
			$sql="DELETE FROM datos_clientes WHERE id='$id' ";
			$res=mysqli_query($con, $sql);
			$sql="DELETE FROM direcciones WHERE id_datos_cliente='$id' ";
			$res=mysqli_query($con, $sql);



			 mysqli_close($con);
			}
			//eliminar cliente



 	


