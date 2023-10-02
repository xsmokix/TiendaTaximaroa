<?php 


 if (isset($_POST['id_datos_cliente'])) {

  require_once "db.php";

          

        $id_datos_cliente=mysqli_real_escape_string($con, $_POST["id_datos_cliente"]);
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
        $existedireccion=mysqli_real_escape_string($con, $_POST["existedireccion"]);

        if ($existedireccion==0) {
          // si no existe esa dirección la agregamos al cliente y a la bd

          //todas las direcciones anteriores las marcamos como alternativas
          $sql1="UPDATE direcciones SET tipo = 'alternativa' WHERE id_datos_cliente='$id_datos_cliente'";
          $res1=mysqli_query($con, $sql1);

           $sql="INSERT INTO direcciones (id_datos_cliente, calle, numero_exterior, numero_interior, colonia, cp, ciudad, municipio, estado, tipo) VALUES ( '$id_datos_cliente','$callereg', '$num_extreg', '$num_intreg', '$coloniareg', '$cpreg', '$ciudadreg', '$municipioreg', '$estadoreg', 'principal');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion";
          } else{

          // Obtener el último id de inserción
          $lastid = mysqli_insert_id($con); 
          echo $lastid;

       
        mysqli_close($con);
             }     



        }else{

           $sql="UPDATE direcciones SET  calle = '$callereg', numero_exterior = '$num_extreg', numero_interior = '$num_intreg', colonia = '$coloniareg', cp = '$cpreg', ciudad = '$ciudadreg', municipio = '$municipioreg', estado = '$estadoreg' WHERE id_datos_cliente = '$id_datos_cliente'";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la actualizacion <BR>";
          } else{

          echo "actualizado"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }     



        }
        

        
     



            }

