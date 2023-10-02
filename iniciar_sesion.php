<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciando sesion de cliente...</title>
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



        $sql="SELECT * FROM usuarios WHERE usuario = '$usuario'";





        $res=mysqli_query($con, $sql);
        if (!$res)
          {
          echo "Error en la consulta <BR>";
          } 
        $registro=mysqli_fetch_array($res);
        mysqli_close($con);



         if ($registro==NULL) 
          {
          
          
          ?>

          <script>
    
            swal({
      title: 'Error',
      text: 'Los datos que ingresaste no son correctos, intenta nuevamente',
      type: 'error'
    }).then(function() {
        window.location.href = "pagar.php";
    })


</script>

<?php
          
          
          } 

        elseif (password_verify($pass, $registro['password'])) {
     
     $_SESSION['id_usuario']=$registro['id'];  
     $_SESSION['nombre']=$usuario;
     $_SESSION['idcliente']=$registro['id_datos_clientes'];
   
      
    ?> 
<script>
    
            swal({
      title: 'Bienvenid@',
      text: '<?php echo $usuario ?>',
      type: 'success'
    }).then(function() {
        window.location.href = "pagar.php";
    })


</script>
<?php 

        } else{
           

              ?>
                <script>
    
            swal({
      title: 'Error',
      text: 'Los datos que ingresaste no son correctos, intenta nuevamente',
      type: 'error'
    }).then(function() {
        window.location.href = "pagar.php";
    })


</script>
<?php
        }

       
?>


  
</body>
</html>
