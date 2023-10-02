<?php
include "db.php";

if(isset($_POST['correo'])){
  $correo = mysqli_real_escape_string($con,$_POST['correo']);
//$correo = "osvaldo1";

   $query = "select count(*) as cntUser from datos_clientes where correo='".$correo."'";

   $result = mysqli_query($con,$query);
   $response = "0";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "1";
      }
   
   }

   echo $response;
   die;
}