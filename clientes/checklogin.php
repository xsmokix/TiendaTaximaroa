<?php
session_start();
if (isset($_SESSION['nombre'])&&isset($_SESSION['idcliente'])) {
  echo "set session";
  header("Location: panel.php");
  die();
}elseif($_POST["usuario"]) {


       
        require_once "db.php";
        require_once "lib/password.php";

        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);



        $sql="SELECT * FROM usuarios WHERE usuario = '$usuario' AND activo='1'";





        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la consulta <BR>";
          } 
        $registro=mysqli_fetch_array($res);
        //mysqli_close($con);



         if ($registro==NULL) 
          {
          
          
          //header('Location: login.php');
          //echo "El nombre de usuario o contraseña es inválido<br><br>";
          echo "1";
          
          
          } 

        elseif (password_verify($pass, $registro['password'])) {

          //si el password match
          echo "2";
          $idregistro =  $registro['id_datos_clientes'];
        //buscamos la ciudad del cliente
        $sql1="SELECT municipio FROM `direcciones` WHERE `id_datos_cliente` = '$idregistro' AND `tipo` = 'principal'";
        $res1=mysqli_query($con, $sql1) or die(mysqli_error($con));
        $registro1=mysqli_fetch_array($res1);



        
           $_SESSION['nombre']=$usuario;
           $_SESSION['idcliente']=$registro['id_datos_clientes'];
           $_SESSION['id_usuario']=$registro['id']; 
           $_SESSION['ciudad']=$registro1['municipio'];  
   
      

        } else{
     //si existe usuario pero mal pass      

              
              echo "3";
        }

       
 }else{
   header("Location: login.php");
  die();
} 

?>