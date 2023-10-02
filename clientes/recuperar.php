<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Recuperar contraseña
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/general.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <style>
    <style>
  
  .contacto{
    color: #F7CC19 !important;
    text-align: center;
    position: absolute;
    right: 2rem;
    bottom: 1rem;
    text-shadow: 2px 2px 9px rgba(150, 150, 150, 1);
  }
  
  .contacto small{
    color: white;
    font-size: 20px;
    line-height: 2px !important;
  }
  
  
  
  
  .bgContacto{
    background: url('assets/img/fondo.jpg') no-repeat center center fixed rgba(248, 249, 254, 1);
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    width: 100%; 
    height: 230px;
  
  }
  
  #overlay{
  height:100%;
  width:100%;
  background-color:rgba(255,255,255,0.3);
  }
  
  
  .textoContacto{
    font-size: 14px;
  }
  
  .formContacto input, .formContacto textarea{
    background-color: #dddddd;
    padding: .3em;
  }
  
  .formContacto label{
    font-size: 13px;
  }
  
  .formContacto a{
    font-size: 13px;
    text-align: center !important;
    margin-bottom: 10px;
  }
  #input-submit1{
    background-color: #009BDE;
    color: white;
    padding: 5px 40px 5px 40px;
    border: 0;
    border-radius: 5px;
  }
  #input-submit1:hover{
    color: #F7CC19;
    background-color: #27278F;
  }
  .btnRegistrarse{
    color: #020068;
    background-color: #F7CC19;
    padding: 5px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
  }
  .textoLinks{
    color: #389BF2;
    font-weight: bold;
    font-size: 18px;
  }
  
  
  </style>
</head>

<body>


<div class="main-content">

<section>
      <div class="container-fluid bgContacto" style="padding: 0 !important;">
          
          <div id="overlay">
           
            <div class="row">
              <div class="col-lg-2 text-center">
                <br><br>
                <a href="../index.php"><img src="../assets/images/logo.png" alt=""></a>
              </div>
              <div class="col-lg-8 text-center">
                <br><br><br><br>
                <h1 class="textoBlanco" style="font-weight: bold;">!Bienvenido!</h1>
              </div>
              <div class="col-lg-2 text-center">
                <br><br>
                <a href="login.php" style="display: inline-block;"><h3 class="textoBlanco">Inicio</h3></a> &nbsp;&nbsp;&nbsp;
                <a href="registrarse.php" class="btnRegistrarse">Registrarse</a>
              </div>
              <div class="col-lg-12">
                <h1 class="textoBlanco text-center">
                  ¡Vamos a recuperar tu cuenta!
                </h1>
              </div>
            </div>

          </div>
      </div>

    
  </section>

  



  



  <br><br>

  <div class="container">
      <div class="row justify-content-center">
        <br><br><br>
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
               <form class="form-signin" role="form" >
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="correo" id="correo" placeholder="Correo electrónico registrado" type="text" required>
                  </div>
                </div>          
                <div class="text-center">
                  <button type="button" onclick="recuperar(); return false;" class="btn btn-primary my-4">Recuperar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="login.php" class="textoLinks"><small>¿Tienes cuenta? Inicia sesión</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="registrarse.php" class="textoLinks"><small>Crear cuenta</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  


    <footer class="py-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-1"></div>
          <div class="col-xl-5">
            <div class="textoAzul">
             <span style="font-weight: bold;color: #020068 !important;"> © <?php echo date("Y") ?> <a href="http://ferreteriataximaroa.com.mx/"  style="color: #020068 !important;" target="_blank">Taximaroa</a></span>
            </div>
          </div>
          <div class="col-xl-6">
           
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>


  <script>


function recuperar(){
        var correo = $("#correo").val();
        
        $.ajax(
                                  {
                                    url : 'recuperar_contrasena.php',
                                    type: "POST",
                                    data : {correo: correo}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                

                                 if (data=="0") {
                                      swal({
                                          title: 'Error',
                                          text: 'El correo introducido no está registrado, intenta nuevamente',
                                          type: 'error'
                                        })
                                 }else{
                                   swal({
                                          title: 'Recuperación correcta',
                                          text: 'por favor revisa el correo registrado para finalizar el proceso de recuperación (te recomendamos revisar tu bandeja de SPAM)',
                                          type: 'success'
                                        }).then(function() {
                                            window.location.href = "login.php";
                                        })
                                 }
                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    }) 
                                    
      }


  </script>

</body>

</html>