
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Acceso al Panel de Administración
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
   <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="">
  <div class="main-content">
    <!-- Navbar -->
    <!--<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.html">
          <img src="assets/img/brand/white.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="login.php">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Inicio</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="registrarse.php">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Registrarse</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav> -->

      <!-- lookbook -->
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
  background: url('assets/img/fondo.jpg') no-repeat 40% -400px fixed rgba(255, 0, 150, 0.3);
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

    <section>
      <div class="container-fluid bgContacto" style="padding: 0 !important;">
            
            <div id="overlay">
             
              <div class="row">
                <div class="col-lg-2 text-center">
                  <br><br>
                  <img src="../assets/images/logo.png" alt="">
                </div>
                <div class="col-lg-8 text-center">
                  <br><br><br><br>
                  <h1 class="textoBlanco" style="font-weight: bold;">!Bienvenido!</h1>
                </div>
               
                <div class="col-lg-12">
                  <h1 class="textoBlanco text-center">
                    Por favor ingresa tu usuario y contraseña para acceder al administrador.
                  </h1>
                </div>
              </div>

            </div>

      
    </section>
    <!-- Header -->
    <br><br>
    <!-- Page content -->
    <div class="container">
      <div class="row justify-content-center">
        <br><br><br>
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
               <form class="form-signin" >
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="usuario" id="usuario" placeholder="Usuario" type="text" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" id="password" placeholder="Password" type="password" required>
                  </div>
                </div>
                
                <div class="text-center">
                   <button type="button" onclick="ingresar(); return false;" class="btn btn-primary my-4">Ingresar</button>
                </div>
              </form>
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
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <!-- <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script> -->
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });


      function ingresar(){
        var usuario = $("#usuario").val();
        var password = $("#password").val();
        //var token = generateToken();

        
        $.ajax(
                                  {
                                    url : 'checklogin.php',
                                    type: "POST",
                                    data : {usuario: usuario, password : password, token : 'token'}
                                  })
                                    .done(function(data) {
                                  console.log(data);

                                

                                 if (data=="1"||data=="3") {
                                      swal({
                                          title: 'Error',
                                          text: 'Usuario o contraseña incorrectos, intenta nuevamente',
                                          type: 'error'
                                        })
                                 }else{
                                   swal({
                                          title: 'Bienvenid@',
                                          text: 'al panel administrador',
                                          type: 'success'
                                        }).then(function() {
                                            window.location.href = "panel.php";
                                        })
                                 }
                                   

                                    })
                                    .fail(function(data) {
                                      alert("Error");

                                    }) 
                                    
      }


      function generateToken() {
    Math.floor(1000000000000000 + Math.random() * 9000000000000000)
          .toString(36).substr(0, 10)
}
  </script>
</body>

</html>