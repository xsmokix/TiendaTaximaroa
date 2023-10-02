<?php 


 if (isset($_POST['id_datos_cliente'])) {

  require_once "db.php";

        $id_datos_cliente=mysqli_real_escape_string($con, $_POST["id_datos_cliente"]);
        $razonsocial=mysqli_real_escape_string($con, $_POST["razonsocial"]);
        $rfc=mysqli_real_escape_string($con, $_POST["rfc"]);
        $regimen=mysqli_real_escape_string($con, $_POST["regimen"]);
        $calle=mysqli_real_escape_string($con, $_POST["calle"]);
        $numero=mysqli_real_escape_string($con, $_POST["numero"]);
        $colonia=mysqli_real_escape_string($con, $_POST["colonia"]);
        $cp=mysqli_real_escape_string($con, $_POST["cp"]);
        $correo=mysqli_real_escape_string($con, $_POST["correo"]);
        $correo_alt=mysqli_real_escape_string($con, $_POST["correo_alt"]);
        $estado=mysqli_real_escape_string($con, $_POST["estado"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
        $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);
        $pais=mysqli_real_escape_string($con, $_POST["pais"]);
        $usocfdi=mysqli_real_escape_string($con, $_POST["usocfdi"]);

        $existefacturacion=mysqli_real_escape_string($con, $_POST["existefacturacion"]);

        if ($existefacturacion==0) {
          // si no existe esa dirección la agregamos al cliente y a la bd

          //todas las direcciones anteriores las marcamos como alternativas
          $sql1="UPDATE facturacion SET tipo = 'alternativa' WHERE id_datos_clientes='$id_datos_cliente'";
          $res1=mysqli_query($con, $sql1);

           $sql="INSERT INTO facturacion (regimen, id_datos_clientes, razon_social, rfc, calle, numero, colonia, cp, correo, correo_alt, ciudad, municipio, estado, pais, cfdi, tipo) VALUES ( '$regimen','$id_datos_cliente','$razonsocial', '$rfc', '$calle', '$numero', '$colonia', '$cp', '$correo', '$correo_alt', '$ciudad', '$municipio', '$estado', '$pais', '$usocfdi', 'principal');";
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

        }
        
    }

