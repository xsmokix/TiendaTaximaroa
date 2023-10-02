<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Index</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
   <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
</head>
<body>


  <?php
       
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
          
          
          header('Location: login.php');
          echo "El nombre de usuario o contraseña es inválido<br><br>";
          echo "<a href='login.php'>Reintentar</a>";
          
          
          } 

        elseif (password_verify($pass, $registro['password'])) {
        
     $_SESSION['nombre']=$usuario;
     $_SESSION['idcliente']=$registro['id_datos_clientes'];
   
      
    ?> 
<script>
    
            swal({
      title: 'Bienvenid@',
      text: '<?php echo $usuario ?>',
      type: 'success'
    }).then(function() {
        window.location.href = "panel.php";
    })


</script>
<?php 

        } else{
           

              echo "El nombre de usuario o contraseña es inválido<br><br>";
              echo "<a href='login.php'>Reintentar</a>";
        }

       
?>


  
</body>
</html>
