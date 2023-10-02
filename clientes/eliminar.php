<?php 

require_once "db.php";

//eliminar direccion
 if (isset($_POST['eliminar_direccion'])) {
    echo "entro eliminar";

  $id_direccion=mysqli_real_escape_string($con, $_POST["id_direccion"]);


    $sql="DELETE FROM direcciones WHERE id='$id_direccion'";
    $res=mysqli_query($con, $sql) or die(mysqli_error($con));
     mysqli_close($con);
    }
    //eliminar direccion




//eliminar facturacion
 if (isset($_POST['eliminar_facturacion'])) {
    echo "entro eliminar";

  $id_facturacion=mysqli_real_escape_string($con, $_POST["id_facturacion"]);


    $sql="DELETE FROM facturacion WHERE id='$id_facturacion'";
    $res=mysqli_query($con, $sql) or die(mysqli_error($con));
     mysqli_close($con);
    }
    //eliminar facturacion




     ?>