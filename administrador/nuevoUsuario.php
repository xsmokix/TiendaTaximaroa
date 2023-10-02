<?php
require_once "seguridad.php"; 

       
        require_once "db.php";
        require_once "lib/password.php";


        if (isset($_POST['usuario'])) {

        $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);
        $correo=mysqli_real_escape_string($con, $_POST["correo"]);
        $telefono=mysqli_real_escape_string($con, $_POST["telefono"]);
        
        $hash = password_hash($pass, PASSWORD_BCRYPT);

        date_default_timezone_set('America/Mexico_City  ');
        $hoy = date("Y-m-d");

        $sql="INSERT INTO datos_clientes (nombreCompleto, telefono, correo, fecha_registro ) VALUES ( '$nombre', '$telefono', '$correo', '$hoy');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          die();
          } else{


            $idCliente=mysqli_insert_id($con);
            $sql="INSERT INTO usuarios (id_datos_clientes, usuario, password ) VALUES ( '$idCliente', '$usuario', '$hash');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          die();
          }

          echo "usuario registrado correctamente <br><br>"; 
        
          

       
        mysqli_close($con);
             }     


            }




?>