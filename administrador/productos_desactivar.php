<?php 
//$_POST['modificar_producto']=3;
if(!isset($_POST['desactivar_producto'])){
  die();
  exit();

}else{
  require_once "db.php";
 echo $id_producto = $_POST['id_producto'];
 if ($_POST['desactivar_producto']==0) {
 

   $productos = $con->query("UPDATE productos SET activo = '0' WHERE productos.id = $id_producto");

   }else{
    $productos = $con->query("UPDATE productos SET activo = '1' WHERE productos.id = $id_producto");

   }
    ?>



<?php } ?>