<?php
        require_once "db.php";
        require_once "lib/password.php";

        if (isset($_POST['usuario'])) {
        
        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);
   
        
        $hash = password_hash($pass, PASSWORD_BCRYPT);

        $sql="UPDATE usuarios SET password = '".$hash."' WHERE usuario = '".$usuario."';";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
            printf("Errormessage: %s\n", $mysqli->error);
            echo "Error en la insercion";
          die();
          }    
             
        echo "1";  
        mysqli_close($con);

    }




?>