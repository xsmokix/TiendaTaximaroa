<?php
session_start();
if (isset($_SESSION['nombre'])&&isset($_SESSION['administrador'])) {
  header("Location: panel.php");
  die();
}elseif($_POST["usuario"]) {

        require_once "db.php";
        require_once "lib/password.php";

        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);
        $sql="SELECT * FROM usuarios_admin WHERE usuario = '$usuario'";

        $res=mysqli_query($con, $sql);
        if (!$res)
          {
            echo "Error en la consulta <BR>";
          } 
        $registro=mysqli_fetch_array($res);
        mysqli_close($con);

         if ($registro==NULL) 
          {
            echo "1";
          } 

          elseif (password_verify($pass, $registro['password'])) {

          //si el password match
          echo "2";
        
          $_SESSION['nombre']=$usuario;
          $_SESSION['administrador']="logeado";

        } else{
     //si existe usuario pero mal pass      
              echo "3";
        }

 }else{
   header("Location: login.php");
  die();
} 

?>