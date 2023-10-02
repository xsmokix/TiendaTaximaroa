<?php
include "db.php";

if(isset($_POST['usuario'])){
  $usuario = mysqli_real_escape_string($con,$_POST['usuario']);
//$usuario = "osvaldo1";

   $query = "select count(*) as cntUser from usuarios where usuario='".$usuario."'";

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