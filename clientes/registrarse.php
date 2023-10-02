<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
Crea cuenta </title>
<!-- Favicon -->
<link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet"/>
<link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="assets/css/general.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
<!--   Core   -->
<script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
<!-- CSS Files -->
<link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet"/>
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
  background: url('assets/img/registrarse.jpg') no-repeat center center fixed rgba(255, 0, 150, 0.3);
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
.checkbox {
  position: relative;
  top: 1rem;
  left: -80px;
  margin: 0 1rem 0 0;
  cursor: pointer;
}
.checkbox:before {
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  content: "";
  position: absolute;
  left: 0;
  z-index: 1;
  width: 1rem;
  height: 1rem;
  border: 2px solid #f2f2f2;
}
.checkbox:checked:before {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  height: 0.5rem;
  border-color: #009688;
  border-top-style: none;
  border-right-style: none;
}
.checkbox:after {
  content: "";
  position: absolute;
  top: -0.125rem;
  left: 0;
  width: 1.1rem;
  height: 1.1rem;
  background: #fff;
  cursor: pointer;
}
ul{
  list-style: none;
}
</style>
</head>
<body class="">
<div class="main-content">
	<section>
	<div class="container-fluid bgContacto" style="padding: 0 !important;">
		<div id="overlay">
			<div class="row">
				<div class="col-lg-2 text-center">
					<br>
					<br>
					<a href="../index.php"><img src="../assets/images/logo.png" alt=""></a>
				</div>
				<div class="col-lg-8 text-center">
					<br>
					<br>
					<br>
					<br>
					<h1 class="textoBlanco" style="font-weight: bold;">!Bienvenido!</h1>
				</div>
				<div class="col-lg-2 text-center">
					<br>
					<br>
					<a href="login.php" style="display: inline-block;">
					<h3 class="textoBlanco">Inicio</h3>
					</a> &nbsp;&nbsp;&nbsp; <a href="registrarse.php" class="btnRegistrarse">Registrarse</a>
				</div>
				<div class="col-lg-12">
					<h1 class="textoBlanco text-center">
					Por favor ingresa los datos solicitados para registrarte. </h1>
				</div>
			</div>
		</div>
	</div> </section>
	<!-- Header -->
	<br>
	<br>
	<!-- Page content -->
	<div class="container">
		<div class="row justify-content-center">
			<br>
			<br>
			<br>
			<div class="col-lg-5 col-md-7">
				<div class="card bg-secondary shadow border-0">
					<div class="card-body px-lg-5 py-lg-5">
						<form class="form-signin" role="form">
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class=""></i></span>
									</div>
									<input class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo" type="text" required>
								</div>
								<span style="color: red; font-size: 12px; display: none;" class="errores nombreerror">Ingresa tu nombre completo</span>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class=""></i></span>
									</div>
									<input class="form-control" name="correo" id="correo" placeholder="Correo electrónico" type="email" required>
								</div>
								<span id="error" style="display:none;color:red;">Correo no válido</span>
								<span id="success" style="display:none;color:green;">Correo válido</span>
								<span style="color: red; font-size: 12px; display: none;" class="errores correoerror">Ingresa tu correo</span>
                <span style="color: red; font-size: 12px; display: none;" id="errorcorreo">Este correo ya está registrado, intenta con otro</span>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class=""></i></span>
									</div>
									<input class="form-control" maxlength="10" name="telefono" id="telefono" placeholder="Teléfono" type="text" required>
								</div>
								<span style="color: red; font-size: 12px; display: none;" class="errores telefonoerror">Ingresa tu teléfono</span>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class=""></i></span>
									</div>
									<input class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" type="text" required>
								</div>
								<span style="color: red; font-size: 12px; display: none;" class="errores usuarioerror">Ingresa tu usuario</span>
								<span style="color: red; font-size: 12px; display: none;" id="errorusuario">Usuario no disponible, intenta con otro</span>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class=""></i></span>
									</div>
									<input class="form-control" name="password" id="password" placeholder="Contraseña" type="password" required>
								</div>
								<span style="color: red; font-size: 12px; display: none;" class="errores passworderror">Ingresa tu password</span>
							</div>
							<div class="">
								<div class="row">
									<div class="col-lg-11">
										<small class="text-right">Acepta recibir a su correo avisos comerciales y promociones de Ferretería Taximaroa</small>
									</div>
									<div class="col-lg-1">
										<ul class="list">
											<li class="list__item">
											<label class="label--checkbox">
											<input id="anuncios" name="anuncios" type="checkbox" class="checkbox" checked>
											</label>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row">
									<div class="col-lg-12">
										<hr style="margin: 10px;">
									</div>
									<div class="col-lg-12">
										<center><small>Al crear una cuenta de Taximaroa, aceptas nuestros <a href="../terminos-y-condiciones.php" target="_blank">Términos y condiciones</a> y <a href="../aviso-de-privacidad.php" target="_blank">Aviso de Privacidad</a>.</small></center>
									</div>
								</div>
							</div>
							<div class="text-center">
								<button type="button" style="display: none;" id="btnRegistrarse" onclick="registrarse(); return false;" class="btn btn-primary my-4">Registrarse</button>
							</div>
						</form>
					</div>
				</div>
				<div class="row mt-3">
            <div class="col-6">
              <a href="recuperar.php" class="textoLinks"><small>¿Olvidaste tu contraseña?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="login.php" class="textoLinks"><small>Inicia sesión</small></a>
            </div>
          </div>
			</div>
		</div>
	</div>
	<footer class="py-5">
	<div class="container-fluid">
		<div class="row align-items-center justify-content-xl-between">
			<div class="col-xl-1">
			</div>
			<div class="col-xl-5">
				<div class="textoAzul">
					<span style="font-weight: bold;color: #020068 !important;"> © <?php echo date("Y") ?>
					<a href="http://ferreteriataximaroa.com.mx/" style="color: #020068 !important;" target="_blank">Taximaroa</a></span>
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

$(document).ready(function(){
   $("#usuario").focusout(function(){
      var usuario = $(this).val();
      //console.log(usuario);
      if(usuario != ''){
         $.ajax({
            url: 'checar_usuario.php',
            type: 'post',
            data: {usuario: usuario},
            success: function(response){
              //console.log(response);
                if (response=="1") {
                    $("#errorusuario").show();
                    $("#btnRegistrarse").hide();
                }else{
                  $("#btnRegistrarse").show();
                  $("#errorusuario").hide();
                }
             }
         });
      }
    });
    $("#correo").focusout(function(){
      var correo = $(this).val();
      //console.log(correo);
      if(correo != ''){
         $.ajax({
            url: 'checar_correo.php',
            type: 'post',
            data: {correo: correo},
            success: function(response){
             // console.log(response);
                if (response=="1") {
                    $("#errorcorreo").show();
                    $("#error").hide();
                    $("#success").hide();
                    $("#btnRegistrarse").hide();
                }else{
                  $("#btnRegistrarse").show();
                  $("#errorcorreo").hide();
                }
             }
         });
      }
    });
 });
$('#correo').on('keyup', function() {
    var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
    if(!re) {
        $('#error').show();
        $('#success').hide();
    } else {
        $('#error').hide();
        $('#success').show();
    }
})
function registrarse(){
$(".errores").hide();
var nombre = $("#nombre").val();
var usuario = $("#usuario").val();
  var password = $("#password").val();
  var correo = $("#correo").val();
  var telefono = $("#telefono").val();
  if($("#anuncios").is(':checked')) {  
            var anuncios = "1";
        } else {  
             var anuncios = "0";
        }  
  if (nombre=="") {
    $(".nombreerror").show();
    $("#nombre").focus();
  }else if (usuario=="") {
    $(".usuarioerror").show();
    $("#usuario").focus();
  }else if (password=="") {
    $(".passworderror").show();
    $("#password").focus();
  }else if (correo=="") {
    $(".correoerror").show();
    $("#correo").focus();
  }else if (telefono=="") {
    $(".telefonoerror").show();
    $("#telefono").focus();
  }else {  
  /*var usuario = $("#usuario").val();
  var password = $("#password").val();
  var correo = $("#correo").val();
  var telefono = $("#telefono").val();
  */
  //console.log("datos enviados:" + nombre + correo + telefono + usuario + password + "anuncios: "+anuncios);
$.ajax(
{
  url : 'nuevoUsuario.php',
  type: "POST",
  data : {nuevo_usuario:"1", nombre: nombre,usuario: usuario, password: password, correo: correo, telefono: telefono, anuncios : anuncios}
})
  .done(function(data) {
    console.log(data);
swal({
      title: 'Usuario Registrado',
      text: 'por favor revisa bandeja de correo electrónico para activar tu cuenta (también la carpeta de Spam)',
      type: 'success'
    }).then(function() {
        window.location.href = "login.php";
    })
  })
  .fail(function(data) {
    alert("Error");
  }) 
  }
  };//guardarUsuario


    $('input[name="telefono"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
  </script>
</body>
</html>