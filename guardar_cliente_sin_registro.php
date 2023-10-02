<?php 


 if (isset($_POST['correoreg'])) {

  require_once "db.php";


        $nombrereg=mysqli_real_escape_string($con, $_POST["nombrereg"]);
        $correoreg=mysqli_real_escape_string($con, $_POST["correoreg"]);
        $telefonoreg=mysqli_real_escape_string($con, $_POST["telefonoreg"]);
        $estadoreg=mysqli_real_escape_string($con, $_POST["estadoreg"]);
        $municipioreg=mysqli_real_escape_string($con, $_POST["municipioreg"]);
        $ciudadreg=mysqli_real_escape_string($con, $_POST["ciudadreg"]);
        $callereg=mysqli_real_escape_string($con, $_POST["callereg"]);
        $num_extreg=mysqli_real_escape_string($con, $_POST["num_extreg"]);
        $num_intreg=mysqli_real_escape_string($con, $_POST["num_intreg"]);
        if ($num_intreg=="" || $num_intreg==NULL) {
          $num_intreg="0";
        }
        $coloniareg=mysqli_real_escape_string($con, $_POST["coloniareg"]);
        $cpreg=mysqli_real_escape_string($con, $_POST["cpreg"]);
        date_default_timezone_set('America/Mexico_City');
        $hoy = date("Y-m-d");
 

          // guardamos el cliente

            
        $sql="INSERT INTO datos_clientes (nombreCompleto, telefono, correo, anuncios, fecha_registro, hash, activo ) VALUES ( '$nombrereg', '$telefonoreg', '$correoreg', '0', '$hoy', '0', '0');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion datos_clientes";
          die();
          }else{

          // Obtener el último id de inserción
          $lastid = mysqli_insert_id($con); 
        
          }

        $sql="INSERT INTO direcciones (id_datos_cliente, calle, numero_exterior, numero_interior, colonia, cp, ciudad, municipio, estado, tipo) VALUES ( '$lastid','$callereg', '$num_extreg', '$num_intreg', '$coloniareg', '$cpreg', '$ciudadreg', '$municipioreg', '$estadoreg', 'principal');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion";
          } else{
       
        mysqli_close($con);
             }      



        

        
     



            }

