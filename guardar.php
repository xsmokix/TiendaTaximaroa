<?php 


 if (isset($_POST['comentario'])) {

  require_once "db.php";

          
         $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
         $comentario=mysqli_real_escape_string($con, $_POST["comentario"]);
         $id_producto=mysqli_real_escape_string($con, $_POST["id_producto"]);
        
     
       $fecha = date("Y-m-d");
       



        $sql="INSERT INTO comentarios (id_productos, usuario, comentario, fecha) VALUES ( '$id_producto','$usuario','$comentario', '$fecha');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "guardado"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }     


            }


             if (isset($_POST['calificacion'])) {

              echo "etro";

  require_once "db.php";

          

        $calificacion=mysqli_real_escape_string($con, $_POST["calificacion"]);
         $id_producto=mysqli_real_escape_string($con, $_POST["id_producto"]);

         echo $calificacion;
        
     


        $sql="UPDATE productos SET `persCalificaron` = `persCalificaron`+1, calificacion = `calificacion`+".$calificacion."  WHERE id = ".$id_producto.";";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "guardado"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }     


            }


             ?>