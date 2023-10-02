<?php

       
        require_once "db.php";
        


        if (isset($_POST['nuevo_usuario'])) {

          require_once "lib/password.php";

        $nombre=mysqli_real_escape_string($con, $_POST["nombre"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuario"]);
        $pass=mysqli_real_escape_string($con, $_POST["password"]);
        $correo=mysqli_real_escape_string($con, $_POST["correo"]);
        $telefono=mysqli_real_escape_string($con, $_POST["telefono"]);
        $tipo=mysqli_real_escape_string($con, $_POST["tipo"]);
        $privilegio=mysqli_real_escape_string($con, $_POST["privilegio"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
        $region1=mysqli_real_escape_string($con, $_POST["region1"]);
        $region2=mysqli_real_escape_string($con, $_POST["region2"]);
       
        $hash = password_hash($pass, PASSWORD_BCRYPT);



        $sql="INSERT INTO usuarios (nombre, usuario, pass, tipo, privilegio, municipio, correo, telefono, region1, region2 ) VALUES ( '$nombre','$usuario', '$hash', '$tipo','$privilegio', '$municipio', '$correo', '$telefono', '$region1', '$region2');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "usuario registrado correctamente <br><br>"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }     


            }

            if (isset($_POST['usuarioMod'])) {
          # code...
        
        $idusuario=mysqli_real_escape_string($con, $_POST["idusuarioMod"]);
        $nombre=mysqli_real_escape_string($con, $_POST["nombreMod"]);
        $usuario=mysqli_real_escape_string($con, $_POST["usuarioMod"]);
        $pass=mysqli_real_escape_string($con, $_POST["passwordMod"]);
        $correo=mysqli_real_escape_string($con, $_POST["correoMod"]);
        $telefono=mysqli_real_escape_string($con, $_POST["telefonoMod"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipioMod"]);
        $tipo=mysqli_real_escape_string($con, $_POST["tipoMod"]);
        $privilegio=mysqli_real_escape_string($con, $_POST["privilegioMod"]);
        $region1=mysqli_real_escape_string($con, $_POST["region1Mod"]);
        $region2=mysqli_real_escape_string($con, $_POST["region2Mod"]);
       

       
        $hash = password_hash($pass, PASSWORD_BCRYPT);



        $sql="UPDATE usuarios SET nombre = '$nombre', usuario = '$usuario', pass = '$hash',  correo = '$correo', telefono = '$telefono', municipio = '$municipio', tipo = '$tipo', privilegio = '$privilegio', region1 = '$region1', region2 = '$region2' WHERE id='$idusuario' ";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion <BR>";
          } else{

          echo "usuario modificado correctamente <br><br>"; 
          //echo "<a href='panel.php'>Regresar</a>"; 

       
        mysqli_close($con);
             }    



      } 









        if (isset($_POST['nuevadireccion'])) {

       

        $id_datos_cliente=mysqli_real_escape_string($con, $_POST["id_datos_cliente"]);
        $calle=mysqli_real_escape_string($con, $_POST["calle"]);
        $numero_exterior=mysqli_real_escape_string($con, $_POST["numero_exterior"]);
        $numero_interior=mysqli_real_escape_string($con, $_POST["numero_interior"]);
        $colonia=mysqli_real_escape_string($con, $_POST["colonia"]);
        $cp=mysqli_real_escape_string($con, $_POST["cp"]);
        $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
        $estado=mysqli_real_escape_string($con, $_POST["estado"]);
        

        //actualizamos las otras direcciones como alternativas
        $sql1="UPDATE direcciones SET tipo = 'alternativa' WHERE id_datos_cliente='$id_datos_cliente'";
        $res1=mysqli_query($con, $sql1);

        $sql="INSERT INTO direcciones (id_datos_cliente, calle, numero_exterior, numero_interior, colonia, cp, ciudad, municipio, estado, tipo ) VALUES ( '$id_datos_cliente','$calle', '$numero_exterior', '$numero_interior','$colonia', '$cp', '$ciudad', '$municipio', '$estado', 'principal');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la insercion";
          } else{

          echo "direccion guardada correctamente"; 
          $_SESSION['ciudad']=$municipio;  
          //echo "<a href='panel.php'>Regresar</a>"; 


?>
                          <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dirección agregada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Dirección',
                  text: 'agregada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "direcciones.php";
                  }
                }
              )
</script>
</body>
</html>
<?php

       
        mysqli_close($con);
             }     


            }

            if (isset($_POST['nuevafacturacion'])) {

       
              $razon_social=mysqli_real_escape_string($con, $_POST["razon_social"]);
              $regimen=mysqli_real_escape_string($con, $_POST["regimen"]);
              $correo=mysqli_real_escape_string($con, $_POST["correo"]);
              $correo_alt=mysqli_real_escape_string($con, $_POST["correo_alt"]);
        $id_datos_cliente=mysqli_real_escape_string($con, $_POST["id_datos_cliente"]);
        $calle=mysqli_real_escape_string($con, $_POST["calle"]);
        $numero=mysqli_real_escape_string($con, $_POST["numero"]);
        $colonia=mysqli_real_escape_string($con, $_POST["colonia"]);
        $cp=mysqli_real_escape_string($con, $_POST["cp"]);
        $ciudad=mysqli_real_escape_string($con, $_POST["ciudad"]);
        $municipio=mysqli_real_escape_string($con, $_POST["municipio"]);
        $estado=mysqli_real_escape_string($con, $_POST["estado"]);
        $pais=mysqli_real_escape_string($con, $_POST["pais"]);
        $rfc=mysqli_real_escape_string($con, $_POST["rfc"]);
        $cfdi=mysqli_real_escape_string($con, $_POST["cfdi"]);


        //actualizamos las otras direcciones como alternativas
        $sql1="UPDATE facturacion SET tipo = 'alternativa' WHERE id_datos_clientes='$id_datos_cliente'";
        $res1=mysqli_query($con, $sql1);
        



        $sql="INSERT INTO facturacion (id_datos_clientes, regimen, razon_social, rfc, calle, numero, colonia, cp, correo, correo_alt, ciudad, municipio, estado, pais, cfdi, tipo ) VALUES ( '$id_datos_cliente', '$regimen', '$razon_social', '$rfc', '$calle', '$numero','$colonia', '$cp', '$correo', '$correo_alt', '$ciudad', '$municipio', '$estado', '$pais', '$cfdi', 'principal');";
        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo("Error en la insercion facturacion: " . mysqli_error($con));
          } else{

          echo "facturacion guardada correctamente"; 
          //echo "<a href='panel.php'>Regresar</a>"; 


?>
                          <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dirección de facturación agregada</title>
<link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
</head>
<body>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<script>
   swal({
                 title: 'Dirección',
                  text: ' de facturación agregada correctamente',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    window.location.href = "facturacion.php";
                  }
                }
              )
</script>
</body>
</html>
<?php

       
        mysqli_close($con);
             }     


            }
// nuevafacturacion


?>