<?php


 if (isset($_POST['nuevafactura']))
  
 { 

   //echo "entro";

$nopedido = $_POST['nopedido'];



function limpiarCaracteresEspeciales($string ){
 $string = htmlentities($string);
 $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
 return $string;
}

$nopedido = limpiarCaracteresEspeciales($nopedido);


function limpiarCaracteresEspeciales2($string){
$string = htmlspecialchars(addslashes(stripslashes(strip_tags(trim($string)))));
return $string;
}

$nopedido = limpiarCaracteresEspeciales2($nopedido);




require_once "db.php";





if ($_FILES['pdf']['size'] != 0 && $_FILES['pdf']['error'] == 0){

      //si hay pdfn guardamos los datos y la pdfn 
      //echo "entro a guardar pdfn"; 
      $errors= array();
      $file_name = $_FILES['pdf']['name'];
      $file_size =$_FILES['pdf']['size'];
      $file_tmp =$_FILES['pdf']['tmp_name'];
      $file_type=$_FILES['pdf']['type'];

     
      
      
     if(empty($errors)==true){
         
         
         $temp = explode(".", $_FILES["pdf"]["name"]);
          $newfilename = $nopedido;

        // move_uploaded_file($file_tmp,"adjuntos/".$mes."-".$dia."-".$file_name);
         move_uploaded_file($_FILES["pdf"]["tmp_name"], "../clientes/facturas/" . $newfilename .".zip");
   


         //echo "Success";
         echo "<script>alert('Factura adjuntada al pedido');</script>";
         echo "<script>window.location.replace('facturacion.php');</script>";
      }else{
         print_r($errors);
         echo "<script>alert('Error, intenta nuevamente');
         window.location.replace('facturacion.php);</script>";
      }
   }









}else{
   echo "exit";
  exit();
}








?>