<?php
    session_start();
    $currentPage = $_SERVER['REQUEST_URI']; 

    if(!isset($_SESSION['currentPage'])){ 
      $_SESSION['currentPage'] = $currentPage;     
    }

     // if($_SESSION['currentPage'] == $currentPage || $_SESSION['currentPage']=='http://localhost/ferreteriataximaroa.com/metodo-de-pago.php'){
     //    header("Location: mostrarCarrito.php");
     //   die();
     // }

    $_SESSION['currentPage'] = $currentPage; 


   

    if (!isset($_SESSION['idcliente'])) {
      $ciudad_cliente = "Morelia";
    }else{
      $ciudad_cliente = $_SESSION['ciudad'];
    }

    if (!isset($_SESSION['idcliente'])) {
      $idcliente = "";
    }else{
      $idcliente = $_SESSION['idcliente'];
    }


include "carrito.php";
require_once "db.php";
?>


<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//validamos que tenga una ciudad el cliente
if (isset($_SESSION['ciudad'])) {
    if ($_SESSION['ciudad']=="" || $_SESSION['ciudad']==NULL) { ?>
      <script>alert("No tienes una dirección válida en tu cuenta, por favor ingresa una o actualízala para poder continuar");
    window.location.href = "clientes/direcciones.php";
  </script>
  <?php
    }
}
 ?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
<link rel="stylesheet" href="assets/css/vendor.css"/>
<link rel="stylesheet" href="assets/css/style.css?ver=2.03"/>
<!-- <link rel="stylesheet" href="assets/css/carousel.css"> -->
<link href="assets/css/estilos.css?ver=2.00" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" href="assets/images/favicon/apple-touch-icon.png"/>
<link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-touch-icon-57x57.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-touch-icon-72x72.png"/>
<link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-touch-icon-76x76.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-touch-icon-114x114.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-touch-icon-120x120.png"/>
<link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-touch-icon-144x144.png"/>
<link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-touch-icon-152x152.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon-180x180.png"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Quicksand:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
<!-- MARCAS -->
<link href="assets/css/slick-theme.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">
<title>Ferretería Taximaroa - Tienda Virtual</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-217405467-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-217405467-1');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.js"></script>
</head>
<body>


<!-- cabecera -->


  <style>
    .tabs-bar{
  width: 100%;
  list-style: none;
  display: block;
  /*border-bottom: 1px solid #ddd;*/
  padding-left: 5px;

}

.tabs-bar .tab{
  display: inline-block;
  cursor: pointer;
  margin-right: 5px;
  margin-bottom: -1px;
  padding: 10px;
  background-color: #27278F;
  color: white;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.tab-active{
  border: 1px solid #ddd;
  border-bottom: 1px solid #fff;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  background-color: white !important;
  color: #27278F !important;
}

.content{
  display: none;
}

.content-active{
  display: block;

}

.content-tab1,.content-tab3{
  -webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
-moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15)
}
ul.tabs-bar{
  margin-bottom: 0 !important;
}

.custom-choice{
  -webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
-moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.15);
border-radius: 8px;
margin-bottom: 20px;
margin-left: 5px;
margin-right: 5px;
}

.custom-choice .choice-indicator{
  border: none !important;
}
.custom-control-label::before, .custom-choice .custom-control-label::before{
  border: transparent !important;
  background-color: #f9f9f9;
}

.custom-control-label::before{
  /*border: 1px solid #f9f9f9;*/

  border-radius: 4px;
  top: 5px !important;
  left: 5px !important;
}
.custom-choice .custom-control-label::after, .custom-choice .custom-control-label::before{
  top: 5px !important;
  left: 5px !important;
}
.mercadopago-button{
  background-color: #a2a2e5;
  color: white;
  font-size: 1.5rem;
  font-weight: bold;
  /* padding: 13px 28px 13px 28px; */
  border-radius: 5px;
  cursor: not-allowed;
  pointer-events: none;
  border: none;
    
}

.mercadopago-button:hover{
  color: #F8CB19;
}
</style>


     <!-- hero -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <h2 class="mb-0 textoAzul"><strong>FINALIZAR PEDIDO</strong></h2>
            
          </div>
        </div>
      </div>
    </section>
  <hr>


 <?php 
      $total = 0;
      $SID=session_id();
      foreach ($_SESSION['carrito'] as $indice => $producto) {
          $total = $total+($producto['precio_venta']*$producto['cantidad']);
      }
  ?>
   <section class="no-overflow pt-0">
      <div class="container">
        <div class="row gutter-4 justify-content-between">
          <div class="col-lg-6 col-12 text-center">
            <ul class="tabs-bar">
              <li id="tab1" class="tab tab-active">Dirección</li>
              <li onclick="validarDireccion(); return false;"  id="tab2" class="tab">Envío</li>
              <li onclick="validarFacturacion(); return false;" id="tab3" class="tab">Facturación</li>
            </ul>
            <div class="content-container">
              <div class="content content-tab1 content-active">
              <?php 
                if (isset($_SESSION['nombre']) && isset($_SESSION['idcliente'])) {
              ?>
              <div class="col-lg-12 col-12 text-center">
                <h4>Bienvenid@ <small> <?php echo $_SESSION['nombre']; ?></small></h4>
                <p>Estás listo para terminar tu compra</p>
                <hr>
              </div>
    <?php 
    //REVISAMOS QUE HAYA DIRECCION PRINCIPAL
    //$direccion = $con->query("SELECT dc.*, d.* FROM datos_clientes dc LEFT JOIN direcciones d ON dc.id=d.id_datos_cliente WHERE dc.id  ='$_SESSION[idcliente]' AND d.tipo='principal'");
    $direccion = $con->query("SELECT dc.nombreCompleto, dc.correo, d.* FROM datos_clientes dc LEFT JOIN direcciones d ON dc.id=d.id_datos_cliente WHERE dc.id  ='$_SESSION[idcliente]' AND d.tipo='principal' LIMIT 1");
    if (mysqli_num_rows($direccion)>0){
    //echo "hay principal";
    $existedireccion = "1";
    } else {
    $direccion = $con->query("SELECT dc.nombreCompleto, dc.correo, d.* FROM datos_clientes dc LEFT JOIN direcciones d ON dc.id=d.id_datos_cliente WHERE dc.id  ='$_SESSION[idcliente]' AND d.cp != '0' LIMIT 1");
    if (mysqli_num_rows($direccion)>0){
    //echo "hay direccion alternativa";
    $existedireccion = "2";
    }else{
      $existedireccion = "0";
    }
    }

    if ($existedireccion=="1" || $existedireccion=="2") {
      $readonly = 0;
    ?>
        <!-- si ya existe dirección principal o alternativa mostramos el form lleno -->
            <form action="" id="formDireccion" name="formDireccion" style="max-width: 100%;">
            <div class="row text-left mb-2">
              <div class="col-md-12">
                <div class="numberCircle" style="display: inline-block;">1</div>
                <h4 class="mb-0" style="display: inline-block;">DIRECCIÓN DE ENTREGA</h4>
              </div>
            </div>
            <?php while($rowdireccion = $direccion->fetch_object()){
              $_SESSION['correoe'] = $rowdireccion->correo;
            ?>
            <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">  
              <input  type="text" class="" id="existedireccion" value="<?php echo $existedireccion ?>">
              <input  type="hidden" class="direccionentrega" id="id_direccion" value="<?php echo $rowdireccion->id ?>">
              <div class="form-group col-md-12">
                <label for="firstName">Nombre Completo</label>
                <div id="search3">
                  <input  type="text" id="nombrereg" value="<?php echo $rowdireccion->nombreCompleto ?>" <?php if ($rowdireccion->nombreCompleto!="") { echo "readonly"; $readonly++; } ?>>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="country">Estado</label>
                <select id="jmr_contacto_estado" name="estadoreg" class="form-control direccionentrega" style="background: none;" <?php if ($rowdireccion->estado!="") { echo "readonly disabled"; $readonly++; } ?>>
                  <option value="<?php echo $rowdireccion->estado ?>" selected><?php echo $rowdireccion->estado ?></option>
                    <option value="0">Selecciona...</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="CDMX">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="city">Municipio</label>
                <select id="jmr_contacto_municipio" name="municipioreg" class="form-control direccionentrega"  style="background: none;" <?php if ($rowdireccion->municipio!="") { echo "readonly disabled"; $readonly++; } ?>>
                  <option value="<?php echo $rowdireccion->municipio ?>" selected><?php echo $rowdireccion->municipio ?></option>
                  <option value="0">Seleciona...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="direccionentrega" id="ciudadreg" value="<?php echo $rowdireccion->ciudad ?>" <?php if ($rowdireccion->ciudad!="") { echo "readonly"; $readonly++; } ?>>
              </div>
              <div class="form-group col-md-3">
                <label for="postcode">CP</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" name="cpreg" class="direccionentrega" id="cpreg" value="<?php echo $rowdireccion->cp ?>" <?php if ($rowdireccion->cp!="") { echo "readonly"; $readonly++; } ?>>
              </div>
              <div class="form-group col-md-6">
                <label for="address">Calle</label>
                <input type="text" class="direccionentrega" id="callereg" value="<?php echo $rowdireccion->calle ?>" <?php if ($rowdireccion->calle!="") { echo "readonly"; $readonly++; } ?>>
              </div>
              <div class="form-group col-md-6">
                <label for="address">Colonia</label>
                <input type="text" class="direccionentrega" id="coloniareg" value="<?php echo $rowdireccion->colonia ?>" <?php if ($rowdireccion->colonia!="") { echo "readonly"; $readonly++; } ?>>
              </div>
              <div class="form-group col-md-3">
                <label for="city">No Ext</label>
                <input type="number" class="direccionentrega" id="num_extreg" value="<?php echo $rowdireccion->numero_exterior ?>" <?php if ($rowdireccion->numero_exterior!="") { echo "readonly"; $readonly++; } ?>>
              </div>
              <div class="form-group col-md-3">
                <label for="city">No Int</label>
                <input type="number" class="" id="num_intreg" value="<?php echo $rowdireccion->numero_interior ?>" readonly>
              </div>
              <div class="col-6">
                <button type="button" class="btnAzulRedondo" id="configreset" style="color: white;">Cambiar dirección</button>
              </div>
              <div class="col-6" id="guardarDireccion">
              </div>
            </div>
        </form>

        <?php
          } //while
      }else{
        ?>
          <!-- si no existe ninguna dirección, forzamos a que capture una -->
            <form action="" id="formDireccion" name="formDireccion" style="max-width: 100%;">
            <div class="row text-left mb-2">
              <div class="col-md-12">
                <div class="numberCircle" style="display: inline-block;">1</div>
                <h4 class="mb-0" style="display: inline-block;">DIRECCIÓN DE ENTREGA</h4>   
              </div>
            </div>
            <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">
              <input  type="text" class="" id="existedireccion" value="<?php echo $existedireccion ?>">
              <input  type="text" class="direccionentrega" id="existedireccion" value="0">
              <div class="form-group col-md-12">
                <label for="firstName">Nombre Completo</label>
                <div id="search3">
                <input  type="text" class="direccionentrega" id="nombrereg">
              </div>
              </div>
              <div class="form-group col-md-4">
                <label for="country">Estado</label>
                <select id="jmr_contacto_estado estadoreg" name="estadoreg" class="form-control direccionentrega" style="background: none;">
                    <option value="0">Selecciona...</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="CDMX">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="city">Municipio</label>
                <select id="jmr_contacto_municipio municipioreg" name="municipioreg" class="form-control direccionentrega"  style="background: none;">
                  <option value="0">Seleciona...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="direccionentrega" id="ciudadreg" >
              </div>
              <div class="form-group col-md-2">
                <label for="postcode">CP</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" name="cpreg" class="direccionentrega" id="cpreg" >
              </div>
              <div class="form-group col-md-4">
                <label for="address">Calle</label>
                <input type="text" class="direccionentrega" id="callereg">
              </div>
              <div class="form-group col-md-4">
                <label for="address">Colonia</label>
                <input type="text" class="direccionentrega" id="coloniareg">
              </div>
              <div class="form-group col-md-2">
                <label for="city">No Ext</label>
                <input type="text" class="direccionentrega" id="num_extreg">
              </div>
              <div class="form-group col-md-2">
                <label for="city">No Int</label>
                <input type="text" class="" id="num_intreg">
              </div>
              <div class="col-6">
              </div>
              <div class="col-6" id="guardarDireccion">
              </div>
            </div>
          </form>

        <?php
    }// else if $existedireccion
       
    }else{ ?>
            <br><br><br>
            <!--
            <h5>¡REGÍSTRATE Y AHORRA TIEMPO!</h5>
            <p>Compra más fácil y rápido, podrás consultar tus pedidos</p>
            <a id="btnRegistrarse" href="clientes/registrarse.php" class="btn btn-warning btn-sm">Registrarte</a>
            <br><br><br>
            <a class="btn btn-success btn-sm" href=""  data-toggle="modal" data-target="#iniciarSesionCarrito">Iniciar sesión</a>

          -->


           <!-- si no esta registrado, forzamos a que capture una dirección -->
            <form action="" id="formClienteSinRegistro" name="formClienteSinRegistro" style="max-width: 100%;">
            <div class="row text-left mb-2">
              <div class="col-md-12">
                <div class="numberCircle" style="display: inline-block;">1</div>
                <h4 class="mb-0" style="display: inline-block;">DIRECCIÓN DE ENTREGA</h4>   
              </div>
            </div>
            <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">

              <input  type="text" id="existedireccion" value="0">
              <div class="form-group col-md-12">
                <label for="firstName">Nombre Completo</label>
                <div id="search3">
                <input  type="text" class="nombre_completo_sinreg direccionentrega" id="nombrereg">
              </div>
              </div>
              <div class="form-group col-md-6">
                <label for="Correo">Correo</label>
                <input  type="text" class="correo direccionentrega" id="correoreg">
              </div>
              <div class="form-group col-md-6">
                <label for="Teléfono">Teléfono</label>
                <input  type="text" class="telefono direccionentrega" id="telefonoreg">
              </div>
              <div class="form-group col-md-4">
                <label for="country">Estado</label>
                <select id="jmr_contacto_estado1" name="estadoreg" class="form-control direccionentrega" style="background: none;">
                    <option value="0">Selecciona...</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="CDMX">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                  </select>
              </div>
              <div class="form-group col-md-3">
                <label for="city">Municipio</label>
                <select id="jmr_contacto_municipio1" name="municipioreg" class="form-control direccionentrega"  style="background: none;">
                  <option value="0">Seleciona...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="direccionentrega" id="ciudadreg" >
              </div>
              <div class="form-group col-md-2">
                <label for="postcode">CP</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" name="cpreg" class="direccionentrega" id="cpreg" >
              </div>
              <div class="form-group col-md-4">
                <label for="address">Calle</label>
                <input type="text" class="direccionentrega" id="callereg">
              </div>
              <div class="form-group col-md-4">
                <label for="address">Colonia</label>
                <input type="text" class="direccionentrega" id="coloniareg">
              </div>
              <div class="form-group col-md-2">
                <label for="city">No Ext</label>
                <input type="text" class="direccionentrega" id="num_extreg">
              </div>
              <div class="form-group col-md-2">
                <label for="city">No Int</label>
                <input type="text" class="" id="num_intreg">
              </div>
              <div class="col-6">
              </div>
              <div class="col-6" id="guardarSinRegistro">
                <button type="button" class="btnAzulRedondo" onclick="guardarSinRegistro(); return false;" style="color: white;">Guardar</button>
              </div>
            </div>
          </form>
    <?php } ?>
  </div>

  <div class="content content-tab2">
    <div class="row align-items-end mb-2">
      <div class="col-md-6">
        <h2 class="h3 mb-0"><span class="text-muted">02.</span> Envío</h2>
      </div>
      <div class="col-md-6 text-right">
        <button type="button" onclick="validarFacturacion(); irTabFacturacion(); return false;" class="btnAzulRedondo" style="color:white;">Guardar envío</button>
      </div>
    </div> 
    <div class="contenedorEnvioLocal" style="display: none;">
      <div class="row">
      <?php 
        if ($_GET['tipo_envio']=='Morelia') { ?>
          <div class="col-md-6">
            <div class="custom-control custom-choice" onclick="seleccionarPaqueteria('101','0','tienda'); return false;">
              <input type="radio" name="choice-shipping" class="custom-control-input radioEnvio" id="choice-shipping-101">
              <label class="custom-control-label text-dark" for="choice-shipping-1">
                <div class="row">
                  <div class="col-3">
                    <img src="assets/images/paqueterias/tienda.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-xs-9">
                    <b>Recoger en tienda</b>
                  </div>
                  <span class="d-flex justify-content-between mb-1 eyebrow"> <h5 class=""><br>GRATIS</h5></span>Tiempo de entrega estimado 2 días
                </div>
              </label>
              <span class="choice-indicator"></span>
            </div>
          </div>
      <?php } ?>
        <div class="col-md-6">
          <div class="custom-control custom-choice" onclick="seleccionarPaqueteria('102','59.00','taximaroa'); return false;">
          <input type="radio" name="choice-shipping" class="custom-control-input radioEnvio" id="choice-shipping-102">
          <label class="custom-control-label text-dark" for="choice-shipping-1">
            <div class="row">
              <div class="col-3">
                <img src="assets/images/paqueterias/taximaroa.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-xs-9">
                <b>Envío estándar</b>
              </div>
              <span class="d-flex justify-content-between mb-1 eyebrow"> <h5 class=""><br>$59.00 MXN</h5></span>Tiempo de entrega estimado 2 días
            </div>
          </label>
          <span class="choice-indicator"></span>
          </div>
        </div>
      </div>                                               
    </div>
    <div class="contenedorCalcularEnvio">
      <div class="loader loader--style1" title="0">
        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
        <path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
        <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                C22.32,8.481,24.301,9.057,26.013,10.047z">
        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"/>
        </path>
        </svg>
      </div>
      <i>Calculando costo de envío, espere por favor</i>
    </div>
  </div>
  <div class="content content-tab3 text-center">
       <br>
       <h5>¿Requieres factura?</h5>
        <select onchange="mostrarFacturacion(this); return false;" name="requieresfactura" class="form-control" id="requieresfactura" style="max-width: 150px; background-position-x: 120px; margin: 0 auto;">
          <option value="No" selected>Selecciona...</option>
          <option value="No">No</option>
          <option value="Si">Si</option>
        </select>
        <br>

             <?php 
             $existefacturacion = "0";
             $facturacion = $con->query("SELECT dc.nombreCompleto, f.* FROM datos_clientes dc LEFT JOIN facturacion f ON dc.id=f.id_datos_clientes WHERE dc.id  ='$_SESSION[idcliente]' AND f.tipo='principal' LIMIT 1");
              if (mysqli_num_rows($facturacion)>0){
              $existefacturacion = "1";
              $rowfacturacion = $facturacion->fetch_object();
            }else{
             $facturacion = $con->query("SELECT dc.nombreCompleto, f.* FROM datos_clientes dc LEFT JOIN facturacion f ON dc.id=f.id_datos_clientes WHERE dc.id  ='$_SESSION[idcliente]' AND f.tipo='alternativa' LIMIT 1");
              if (mysqli_num_rows($facturacion)>0){
                $existefacturacion = "1";
                $rowfacturacion = $facturacion->fetch_object();
              }else{
                $existefacturacion = "0"; 
              }
          }
          if ($existefacturacion=="1") {
 ?>             
            <form action="" id="formFacturacion" name="formFacturacion" style="max-width: 100%; display: none;" >
            <div class="row text-left mb-2">
              <div class="col-md-12">
                <div class="numberCircle" style="display: inline-block;">3</div>
                <h4 class="mb-0" style="display: inline-block;">DATOS DE FACTURACIÓN</h4>
              </div>
              
            </div>
           
            <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">
              <input type="text" id="existefacturacion" value="<?php echo $existefacturacion ?>">
               <input type="hidden" id="id_facturacion" value="<?php echo $rowfacturacion->id ?>">
              <div class="form-group col-md-6">
                <label for="firstName">Razón social</label>
                <input  type="text" class="inputfacturacion razonsocial" id="razonsocial" <?php echo "value='$rowfacturacion->razon_social' readonly"; ?>>
         </div>
              <div class="form-group col-md-6">
                <label for="rfc">RFC</label>
                <input type="text"  oninput="javascript: if(this.value.length>this.maxLength) this.value=this.value.slice(0, this.maxLength);" maxlength="13"  class="inputfacturacion rfc" id="rfc" <?php echo "value='$rowfacturacion->rfc' readonly"; ?>>
              </div>
              <div class="form-group col-md-12">
                <label for="rfc">Régimen fiscal</label>
                  <select class="inputfacturacion form-control" name="regimen" id="regimen" style="background: none;">
                                <option value="<?php echo $rowfacturacion->regimen; ?>"><?php echo $rowfacturacion->regimen; ?></option>
                                <option value="General de Ley Personas Morales">General de Ley Personas Morales</option>
                                <option value="Personas Morales con Fines no Lucrativos">Personas Morales con Fines no Lucrativos</option>
                                <option value="Sueldos y Salarios e Ingresos Asimilados a Salarios">Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                                <option value="Arrendamiento">Arrendamiento</option>
                                <option value="Régimen de Enajenación o Adquisición de Bienes">Régimen de Enajenación o Adquisición de Bienes</option>
                                <option value="Demás ingresos">Demás ingresos</option>
                                <option value="Consolidación">Consolidación</option>
                                <option value="Residentes en el Extranjero sin Establecimiento Permanente en México">Residentes en el Extranjero sin Establecimiento Permanente en México</option>
                                <option value="Ingresos por Dividendos (socios y accionistas)">Ingresos por Dividendos (socios y accionistas)</option>
                                <option value="Personas Físicas con Actividades Empresariales y Profesionales">Personas Físicas con Actividades Empresariales y Profesionales</option>
                                <option value="Ingresos por intereses">Ingresos por intereses</option>
                                <option value="Régimen de los ingresos por obtención de premios">Régimen de los ingresos por obtención de premios</option>
                                <option value="Sin obligaciones fiscales">Sin obligaciones fiscales</option>
                                <option value="Sociedades Cooperativas de Producción que optan por diferir sus ingresos">Sociedades Cooperativas de Producción que optan por diferir sus ingresos</option>
                                <option value="Incorporación Fiscal">Incorporación Fiscal</option>
                                <option value="Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras">Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
                                <option value="Opcional para Grupos de Sociedades">Opcional para Grupos de Sociedades</option>
                                <option value="Coordinados">Coordinados</option>
                                <option value="Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas">Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas</option>
                                <option value="Régimen Simplificado de Confianza">Régimen Simplificado de Confianza</option>
                                <option value="Hidrocarburos">Hidrocarburos</option>
                                <option value="De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales">De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
                                <option value="Enajenación de acciones en bolsa de valores">Enajenación de acciones en bolsa de valores</option>
                  </select>
              </div>
        
           
        
              <div class="form-group col-md-5">
                <label for="city">Calle</label>
                <input type="text" class="inputfacturacion calle" id="calle" <?php echo "value='$rowfacturacion->calle' readonly"; ?>>
              </div>
              <div class="form-group col-md-2">
                <label for="postcode">Número</label>
                <input type="number" class="inputfacturacion numero" id="numero" <?php echo "value='$rowfacturacion->numero' readonly"; ?>>
              </div>
              <div class="form-group col-md-5">
                <label for="address">Colonia</label>
                <input type="text" class="inputfacturacion colonia" id="colonia" <?php echo "value='$rowfacturacion->colonia' readonly"; ?>>
              </div>
              <div class="form-group col-md-4">
                <label for="cp">Código postal</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" class="inputfacturacion cp" id="cp" <?php echo "value='$rowfacturacion->cp' readonly"; ?>>
              </div>
              
              <div class="form-group col-md-8">
                <label for="correo">Correo</label>
                <input type="text" class="inputfacturacion correo" id="correo" <?php echo "value='$rowfacturacion->correo' readonly"; ?>>
              </div>
              <div class="form-group col-md-6">
                <label for="correo">Correo alternativo</label>
                <input type="text" class="correo2" id="correo_alt" <?php echo "value='$rowfacturacion->correo_alt' readonly"; ?>>
              </div>
              <div class="col-md-6"></div>
              <div class="form-group col-md-6">
                <label for="Estado">Estado</label>
                <select name="estado" id="jmr_contacto_estado1" class="form-control inputfacturacion" style="background: none;" readonly disabled>
                  <option <?php echo "value='$rowfacturacion->estado' selected"; ?>><?php echo $rowfacturacion->estado; ?></option>
                  <option value="0">Selecciona estado...</option>
                  <option value="Aguascalientes">Aguascalientes</option>
                  <option value="Baja California">Baja California</option>
                  <option value="Baja California Sur">Baja California Sur</option>
                  <option value="Campeche">Campeche</option>
                  <option value="Chiapas">Chiapas</option>
                  <option value="Chihuahua">Chihuahua</option>
                  <option value="CDMX">Ciudad de México</option>
                  <option value="Coahuila">Coahuila</option>
                  <option value="Colima">Colima</option>
                  <option value="Durango">Durango</option>
                  <option value="Estado de México">Estado de México</option>
                  <option value="Guanajuato">Guanajuato</option>
                  <option value="Guerrero">Guerrero</option>
                  <option value="Hidalgo">Hidalgo</option>
                  <option value="Jalisco">Jalisco</option>
                  <option value="Michoacán">Michoacán</option>
                  <option value="Morelos">Morelos</option>
                  <option value="Nayarit">Nayarit</option>
                  <option value="Nuevo León">Nuevo León</option>
                  <option value="Oaxaca">Oaxaca</option>
                  <option value="Puebla">Puebla</option>
                  <option value="Querétaro">Querétaro</option>
                  <option value="Quintana Roo">Quintana Roo</option>
                  <option value="San Luis Potosí">San Luis Potosí</option>
                  <option value="Sinaloa">Sinaloa</option>
                  <option value="Sonora">Sonora</option>
                  <option value="Tabasco">Tabasco</option>
                  <option value="Tamaulipas">Tamaulipas</option>
                  <option value="Tlaxcala">Tlaxcala</option>
                  <option value="Veracruz">Veracruz</option>
                  <option value="Yucatán">Yucatán</option>
                  <option value="Zacatecas">Zacatecas</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="Municipio">Municipio</label>
                <select name="municipioFacturacion" class="form-control inputfacturacion" id="jmr_contacto_municipio1" style="background: none;" readonly disabled>
                  <option <?php echo "value='$rowfacturacion->municipio' readonly disabled selected"; ?>><?php echo $rowfacturacion->municipio; ?></option>
                  <option value="0">Selecciona municipio...</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="Ciudad">Ciudad</label>
                <input type="text" class="inputfacturacion ciudad" id="ciudad" <?php echo "value='$rowfacturacion->ciudad' readonly"; ?>>
              </div>
              <div class="form-group col-md-6">
                <label for="pais">País</label>
                <input type="text" class="inputfacturacion pais" id="pais" <?php echo "value='$rowfacturacion->pais' readonly"; ?>>
              </div>
              <div class="form-group col-md-12">
                <label for="uso CFDI">uso CFDI</label>
                
                <select name="usocfdi" class="form-control inputfacturacion" id="usocfdi" style="background: none;" readonly disabled>
                  <option <?php echo "value='$rowfacturacion->cfdi' selected disabled readonly"; ?>><?php echo $rowfacturacion->cfdi; ?></option>
                  <option value="0">Selecciona...</option>
                  <option value="G01">G01 Adquisición de mercancias</option>
                  <option value="G02">G02 Devoluciones, descuentos o bonificaciones</option>
                  <option value="G03">G03 Gastos en general</option>
                  <option value="I01">I01 Construcciones</option>
                  <option value="I02">I02 Mobilario y equipo de oficina por inversiones</option>
                  <option value="I03">I03 Equipo de transporte</option>
                  <option value="I04">I04 Equipo de computo y accesorios</option>
                  <option value="I05">I05 Dados, troqueles, moldes, matrices y herramental</option>
                  <option value="I06">I06 Comunicaciones telefónicas</option>
                  <option value="I07">I07 Comunicaciones satelitales</option>
                  <option value="I08">I08 Otra maquinaria y equipo</option>
                  <option value="D01">D01 Honorarios médicos, dentales y gastos hospitalarios.</option>
                  <option value="D02">D02 Gastos médicos por incapacidad o discapacidad</option>
                  <option value="D03">D03 Gastos funerales.</option>
                  <option value="D04">D04 Donativos.</option>
                  <option value="D05">D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
                  <option value="D06">D06 Aportaciones voluntarias al SAR.</option>
                  <option value="D07">D07 Primas por seguros de gastos médicos.</option>
                  <option value="D08">D08 Gastos de transportación escolar obligatoria.</option>
                  <option value="D09">D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                  <option value="D10">D10 Pagos por servicios educativos (colegiaturas)</option>
                  <option value="P01">P01 Por definir</option>
                </select>
              </div>
            </div>

             <div class="row">
              <div class="col-md-6">
                    <button type="button" class="btnAzulRedondo" id="configresetfacturacion" style="color: white;">Cambiar dirección facturación</button>
              </div>
              <div class="col-md-6">
                <div id="terminarCompra" style="display: none;">
              <button type="button" id="btnterminarCompra" onclick="validarInfoFacturacion(); return false;" type="button" class="btnAzulRedondo" style="color: white;">Ir a pagar <i class="fas fa-arrow-right"></i></button>
            </div>
              </div>
            </div>
        </form>

      <?php }else{ ?>

        <form action="" id="formFacturacion" name="formFacturacion" style="max-width: 100%; display: none;" >
            <div class="row text-left mb-2">
              <div class="col-md-12">
                <div class="numberCircle" style="display: inline-block;">3</div>
                <h4 class="mb-0" style="display: inline-block;">DATOS DE FACTURACIÓN</h4>
              </div>
              
            </div>
           
            <div class="row gutter-1 mb-6" style="background-color: rgba(0, 0, 0, 0.03); padding:20px 20px;">
              <input type="hidden" id="existefacturacion" value="<?php echo $existefacturacion ?>">
              <div class="form-group col-md-6">
                <label for="firstName">Razón social</label>
                <input  type="text" class="inputfacturacion razonsocial" id="razonsocial" value="">
         </div>
              <div class="form-group col-md-6">
                <label for="rfc">RFC</label>
                <input type="text"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "13"  class="inputfacturacion rfc" id="rfc" value="">
              </div>

               <div class="form-group col-md-12">
                <label for="rfc">Régimen fiscal</label>
                  <select class="inputfacturacion form-control" name="regimen" id="regimen" style="background: none;">
                                <option value="<?php echo $rowfacturacion->regimen; ?>"><?php echo $rowfacturacion->regimen; ?></option>
                                <option value="General de Ley Personas Morales">General de Ley Personas Morales</option>
                                <option value="Personas Morales con Fines no Lucrativos">Personas Morales con Fines no Lucrativos</option>
                                <option value="Sueldos y Salarios e Ingresos Asimilados a Salarios">Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                                <option value="Arrendamiento">Arrendamiento</option>
                                <option value="Régimen de Enajenación o Adquisición de Bienes">Régimen de Enajenación o Adquisición de Bienes</option>
                                <option value="Demás ingresos">Demás ingresos</option>
                                <option value="Consolidación">Consolidación</option>
                                <option value="Residentes en el Extranjero sin Establecimiento Permanente en México">Residentes en el Extranjero sin Establecimiento Permanente en México</option>
                                <option value="Ingresos por Dividendos (socios y accionistas)">Ingresos por Dividendos (socios y accionistas)</option>
                                <option value="Personas Físicas con Actividades Empresariales y Profesionales">Personas Físicas con Actividades Empresariales y Profesionales</option>
                                <option value="Ingresos por intereses">Ingresos por intereses</option>
                                <option value="Régimen de los ingresos por obtención de premios">Régimen de los ingresos por obtención de premios</option>
                                <option value="Sin obligaciones fiscales">Sin obligaciones fiscales</option>
                                <option value="Sociedades Cooperativas de Producción que optan por diferir sus ingresos">Sociedades Cooperativas de Producción que optan por diferir sus ingresos</option>
                                <option value="Incorporación Fiscal">Incorporación Fiscal</option>
                                <option value="Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras">Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
                                <option value="Opcional para Grupos de Sociedades">Opcional para Grupos de Sociedades</option>
                                <option value="Coordinados">Coordinados</option>
                                <option value="Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas">Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas</option>
                                <option value="Régimen Simplificado de Confianza">Régimen Simplificado de Confianza</option>
                                <option value="Hidrocarburos">Hidrocarburos</option>
                                <option value="De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales">De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
                                <option value="Enajenación de acciones en bolsa de valores">Enajenación de acciones en bolsa de valores</option>
                  </select>
              </div>
        
           
        
              <div class="form-group col-md-5">
                <label for="city">Calle</label>
                <input type="text" class="inputfacturacion calle" id="calle" value="">
              </div>
              <div class="form-group col-md-2">
                <label for="postcode">Número</label>
                <input type="text" class="inputfacturacion numero" id="numero" value="">
              </div>
              <div class="form-group col-md-5">
                <label for="address">Colonia</label>
                <input type="text" class="inputfacturacion colonia" id="colonia" value="">
              </div>
              <div class="form-group col-md-4">
                <label for="cp">Código postal</label>
                <input type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength = "5" class="inputfacturacion cp" id="cp" value="">
              </div>
              
              <div class="form-group col-md-8">
                <label for="correo">Correo</label>
                <input type="text" class="inputfacturacion correo" id="correo" value="">
              </div>
              <div class="form-group col-md-6">
                <label for="correo">Correo alternativo</label>
                <input type="text" class="correo2" id="correo2" value="">
              </div>
              <div class="col-md-6"></div>
              <div class="form-group col-md-6">
                <label for="Estado">Estado</label>
                <select name="estado" id="jmr_contacto_estado1" class="form-control" style="background: none;">
                  <option value="0">Seleccione uno...</option>
                  <option value="Aguascalientes">Aguascalientes</option>
                  <option value="Baja California">Baja California</option>
                  <option value="Baja California Sur">Baja California Sur</option>
                  <option value="Campeche">Campeche</option>
                  <option value="Chiapas">Chiapas</option>
                  <option value="Chihuahua">Chihuahua</option>
                  <option value="CDMX">Ciudad de México</option>
                  <option value="Coahuila">Coahuila</option>
                  <option value="Colima">Colima</option>
                  <option value="Durango">Durango</option>
                  <option value="Estado de México">Estado de México</option>
                  <option value="Guanajuato">Guanajuato</option>
                  <option value="Guerrero">Guerrero</option>
                  <option value="Hidalgo">Hidalgo</option>
                  <option value="Jalisco">Jalisco</option>
                  <option value="Michoacán">Michoacán</option>
                  <option value="Morelos">Morelos</option>
                  <option value="Nayarit">Nayarit</option>
                  <option value="Nuevo León">Nuevo León</option>
                  <option value="Oaxaca">Oaxaca</option>
                  <option value="Puebla">Puebla</option>
                  <option value="Querétaro">Querétaro</option>
                  <option value="Quintana Roo">Quintana Roo</option>
                  <option value="San Luis Potosí">San Luis Potosí</option>
                  <option value="Sinaloa">Sinaloa</option>
                  <option value="Sonora">Sonora</option>
                  <option value="Tabasco">Tabasco</option>
                  <option value="Tamaulipas">Tamaulipas</option>
                  <option value="Tlaxcala">Tlaxcala</option>
                  <option value="Veracruz">Veracruz</option>
                  <option value="Yucatán">Yucatán</option>
                  <option value="Zacatecas">Zacatecas</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="Municipio">Municipio</label>
                <select name="municipioFacturacion" class="form-control" id="jmr_contacto_municipio1" style="background: none;">
                  <option value="0">Selecciona municipio</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="Ciudad">Ciudad</label>
                <input type="text" class="inputfacturacion ciudad" id="ciudad" value="">
              </div>
              <div class="form-group col-md-6">
                <label for="pais">País</label>
                <input type="text" class="inputfacturacion pais" id="pais" value="">
              </div>
              <div class="form-group col-md-12">
                <label for="uso CFDI">uso CFDI</label>
                
                <select name="usocfdi" class="form-control" id="usocfdi" style="background: none;">
                  <option value="" selected>Selecciona...</option>
                  <option value="G01">G01 Adquisición de mercancias</option>
                  <option value="G02">G02 Devoluciones, descuentos o bonificaciones</option>
                  <option value="G03">G03 Gastos en general</option>
                  <option value="I01">I01 Construcciones</option>
                  <option value="I02">I02 Mobilario y equipo de oficina por inversiones</option>
                  <option value="I03">I03 Equipo de transporte</option>
                  <option value="I04">I04 Equipo de computo y accesorios</option>
                  <option value="I05">I05 Dados, troqueles, moldes, matrices y herramental</option>
                  <option value="I06">I06 Comunicaciones telefónicas</option>
                  <option value="I07">I07 Comunicaciones satelitales</option>
                  <option value="I08">I08 Otra maquinaria y equipo</option>
                  <option value="D01">D01 Honorarios médicos, dentales y gastos hospitalarios.</option>
                  <option value="D02">D02 Gastos médicos por incapacidad o discapacidad</option>
                  <option value="D03">D03 Gastos funerales.</option>
                  <option value="D04">D04 Donativos.</option>
                  <option value="D05">D05 Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
                  <option value="D06">D06 Aportaciones voluntarias al SAR.</option>
                  <option value="D07">D07 Primas por seguros de gastos médicos.</option>
                  <option value="D08">D08 Gastos de transportación escolar obligatoria.</option>
                  <option value="D09">D09 Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                  <option value="D10">D10 Pagos por servicios educativos (colegiaturas)</option>
                  <option value="P01">P01 Por definir</option>
                </select>
              </div>              
            </div>

             <div class="row">
                <div class="col-md-6">
                      <button type="button" class="btnAzulRedondo" id="configresetfacturacion" style="color: white;">Cambiar dirección facturación</button>
                </div>
                <div class="col-md-6">
                  <div id="terminarCompra" style="display: none;">
                <button type="button" id="btnterminarCompra" type="button" onclick="validarInfoFacturacion(); return false;" class="btnAzulRedondo" style="color: white;">Ir a pagar <i class="fas fa-arrow-right"></i></button>
              </div>
                </div>
              </div>

        </form>

      <?php } ?>
  
    </div>   
  </div>
 </div> <!-- div col -lg - 6 -->
  <div class="col-lg-2">
    <p style="font-size: 12px;">Completa todas las opciones para poder finalizar tu pedido</p>
    <p id="statusDireccion"><i class="fas fa-window-close colorRojo"></i> Dirección</p>
    <p id="statusEnvio"><i class="fas fa-window-close colorRojo"></i> Envío</p>
    <p id="statusFacturacion"><i class="fas fa-window-close colorRojo"></i> Facturación</p>
  </div>

          <aside class="col-lg-4">
            <div class="row">

              <!-- order preview -->
              <div class="col-12">
                <div class="card card-data bg-light" style=" border-bottom: 0 !important; ">
                  <div class="card-header py-2 px-3" style="background-color: #adadad;">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h3 class="fs-8 mb-0"><strong>TU PEDIDO</strong></h3>
                      </div>
                      <div class="col text-right iconosPagar">
                        <a href="mostrarCarrito.php" class="eyebrow iconoCarrito"><i class="fas fa-2x fa-arrow-left"></i><i class="fas fa-3x fa-shopping-cart textoAzul"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body " style="background-color: rgba(0, 0, 0, 0.03)">
                     <ul class="list-group list-group-line">
                      <div class="row">
                        <li class="col-lg-2  d-flex justify-content-between text-dark align-items-center"><b>Cant.</b></li>
                        <li class="col-lg-7  d-flex justify-content-between text-dark align-items-center"><b>Producto</b></li>
                        <li class="col-lg-3  d-flex justify-content-between text-dark align-items-center"><b>Importe</b></li>
                      </div>
                    </ul>
                    
                      <?php 
              $total = 0;
              $x=0;
             foreach ($_SESSION['carrito'] as $indice=>$producto) {
              $productos = $con->query("SELECT * FROM productos WHERE id='$producto[id_producto]'");
              $totalProductos = $_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
              //$iva = ($_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'])*(.16);
              ?>

                     <ul class="list-group list-group-line">
                      <div class="row">
                        <li class="col-lg-2  d-flex justify-content-between text-dark align-items-center"><?php echo $_SESSION['carrito'][$x]['cantidad'] ?></li>
                        <li class="col-lg-7  d-flex justify-content-between text-dark align-items-center" style="font-size: 12px;"><?php echo $_SESSION['carrito'][$x]['nombre'] ?></li>
                        <li class="col-lg-3  d-flex justify-content-between text-dark align-items-center">$<?php echo number_format((float)$totalProductos, 2, '.', ''); ?></li>
                        <li class="col-12"><hr></li>
                      </div>
                      </ul>
                      <!--<li class="list-group-item d-flex justify-content-between text-dark align-items-center">
                        <?php /* echo $producto['nombre'] ?>
                        <span>$<?php echo number_format($producto['precio_venta']*$producto['cantidad'],2) */ ?></span>
                      </li> -->

                  <?php  $total = $total+$_SESSION['carrito'][$x]['cantidad']*$_SESSION['carrito'][$x]['precio_venta'];
                   $x=$x+1;

                   $subtotal = $total/1.16;
                   $IVA = $total-$subtotal;


                    } ?>

                    <ul>
                      <div class="row">
                        <li class="col-lg-12  d-flex justify-content-between text-dark align-items-center"><small>ARTÍCULOS TOTALES DE LA COMPRA: <b><?php echo sizeof($_SESSION['carrito']) ?></b></small></li>
                      </div>
                    </ul>
                    <ul>
                      <div class="row">
                        <li class="col-lg-9  d-flex justify-content-between"><h5><strong>SUBTOTAL</strong></h5></li>
                        <li class="col-lg-3  d-flex justify-content-between">$<?php echo number_format((float)$subtotal, 2, '.', ''); ?></li>
                        <li class="col-lg-9  d-flex justify-content-between"><h5><strong>IVA</strong></h5></li>
                        <li class="col-lg-3  d-flex justify-content-between">$<?php echo number_format((float)$IVA, 2, '.', ''); ?></li>
                        <li class="col-lg-9  justify-content-between">COSTO DEL ENVÍO <br><b class="textoAzul" style="font-size: 12px;" id="alCP"></b></li>
                        <li class="col-lg-3  d-flex justify-content-between text-dark align-items-center">$<span id="costoEnvio"></span></li>
                        <input type="hidden" id="paqueteria">
                      </div>
                    </ul>



                    
                  </div>
                </div>
              </div>

              <!-- order summary -->
              <div class="col-12 mt-1" style=" position: relative; top: -30px;">
                <div class="card card-data bg-light">
                
                  <div class="card-footer py-2" style="border-top: 0; border-top-left-radius: 0px;">
                    <ul class="list-group list-group-minimal">
                      <li class="list-group-item d-flex justify-content-between fs-18 textoAzul">
                        <input style="display: none;" type="text" id="subtotal" value="<?php echo number_format((float)$total, 2, '.', ''); ?>">
                        <input style="display: none;" type="text" id="iva" value="<?php echo number_format((float)$IVA, 2, '.', ''); ?>">
                        <strong>TOTAL</strong>
                        <span id="totalFinal"></span>
                      </li>
                    </ul>
                  </div> 
                </div>
              </div>
              <!-- order summary -->

         <!-- efecto -->


<style>
.animado{
  transition: all 600ms ease-in-out;
 }
        .square-pulse{
    box-shadow: 0 0 3px #27278F;
    -webkit-animation: pulse 4s infinite; /* Safari 4+ */
    -moz-animation:    pulse 4s infinite; /* Fx 5+ */
    -o-animation:      pulse 4s infinite; /* Opera 12+ */
    animation:         pulse 4s infinite; /* IE 10+ */
}

@-webkit-keyframes pulse {
  0%   { box-shadow: 0 0 3px #515151; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}
@-moz-keyframes pulse {
  0%   { box-shadow: 0 0 3px #27278F; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}
@-o-keyframes pulse {
  0%   { box-shadow: 0 0 3px #27278F; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}
@keyframes pulse {
  0%   { box-shadow: 0 0 3px #27278F; }
  50% { box-shadow: 0 0 100px #ccc; }
  100% { box-shadow: 0 0 3px #27278F; }
}

         </style>
         <div class="col-12">
          <small class="textoAzul">Ubicación aproximada del código postal de envío <i class="fas fa-info-circle" data-toggle="modal" data-target="#modalMaps"></i></small>
           <div id="dvMap" style="width: 100%; height: 200px"></div><br>
         </div>

         <div class="col-12 mt-1">
         <div id="contenedorPago" class="" style="border: 0px solid #f7f7f7;">
          

                        <div class="contenedorPagarPedido">
                            <a href="metodo-de-pago.php?envio=" id="btnPagarPedido" class="btnPagarPedidodisabled"  style="border:none">
                                Ir a Pagar pedido
                            </a>
                        </div>
                        </div>

            </div> <!-- efecto -->

            </div>
          </aside>

        </div>
      </div>
    </section>

<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/slick.min.js"></script>

<?php 

include "modals.php";



 ?>


 <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAuPxWrQ7zxMV9h7dzYKH4Npu11WtNhs3k"></script> 

   <!-- Add step #2 -->
   <script src="https://sdk.mercadopago.com/js/v2"></script>
   <script>
       const mp = new MercadoPago('TEST-97ac4981-5e11-4d72-a2ce-2533a1311058');
       // Add step #3
   </script>
    <script>


  $('.stripe-button').data('amount', 10000); 

  //revisamos que sólo se calcule 1 vez el envío
  var yaSeCalculoEnvio = 0;


    $('#configreset').click(function(){
            
            console.log("entro reset");
           //$('.direccionentrega').val("");
           
           $(".direccionentrega").prop("readonly", false);
           $("#jmr_contacto_estado").val('0');
           $("#jmr_contacto_estado").prop("disabled", false);
           
           $("#jmr_contacto_municipio").val('0');
          $("#jmr_contacto_municipio").prop("disabled", false);


          
          //removemos 1 sola vez lel estado y la ciudad
          if ($('#existedireccion').val()!=0) {
              $("#jmr_contacto_estado").find('option').get(0).remove();
              $("#jmr_contacto_municipio").find('option').get(0).remove();
          }

          $('#existedireccion').val('0');

           //$("input.direccionentrega:text").val("3");
           $("input.direccionentrega").val("");
           //$('.direccionentrega').attr('value', '2');
           //$('.direccionentrega').attr('value', '2');
           $("#statusDireccion").empty();
           $("#statusDireccion").append('<i class="fas fa-window-close colorRojo"></i> Dirección');  

           yaSeCalculoEnvio = 0;
     });

    $('#configresetfacturacion').click(function(){
    console.log("entro reset facturacion");

    $('#existefacturacion').val('0');
           $(".inputfacturacion").prop("readonly", false);
           $("#jmr_contacto_estado1").val('0');
           $("#jmr_contacto_estado1").prop("disabled", false);
           $("#jmr_contacto_estado1").find('option').get(0).remove();
           $("#jmr_contacto_municipio1").val('0');
          $("#jmr_contacto_municipio1").prop("disabled", false);
          $("#jmr_contacto_municipio1").find('option').get(0).remove();
          $("#usocfdi").val('0');
          $("#usocfdi").prop("disabled", false);
          $("#usocfdi").find('option').get(0).remove();

           $('.inputfacturacion').attr('value', '');
           $("#statusFacturacion").empty();
           $("#statusFacturacion").append('<i class="fas fa-window-close colorRojo"></i> Facturación'); 

           
           $("#contenedorPago").removeClass("animado square-pulse");
           $(".contenedorPagarPedido").empty();
           $(".contenedorPagarPedido").append('<a href="metodo-de-pago.php?envio=" id="btnPagarPedido" class="btnPagarPedidodisabled" style="border:none">Ir a Pagar pedido</a>');  


       
     });



function calcularEnvio(){

  
  console.log("ya se calculo el envio: "+yaSeCalculoEnvio);

//subimos scroll
$('html, body').animate({ scrollTop: 0 }, 500);

  //cambiamos a tab de envio


   $("#tab1").removeClass("tab-active");
  $(".content-tab1").hide("");

      $("#tab2").addClass("tab-active");
      $(".content-tab2").show("");


/* var tipo_envio = "<?php echo $_SESSION['direccion'] ?>";
if (tipo_envio=="Morelia") {
   
}
*/

var tipo_envio = "<?php echo $ciudad_cliente ?>";

//si es de morelia
if (tipo_envio=="Morelia") {

  $(".contenedorEnvioLocal").show();



}


//verificamos si ya se ha calculado el costo del envio para no volver a cargar los datos y borrar la selección
if (yaSeCalculoEnvio==0) {
  var calle = $("#callereg").val();
  var numero = $("#num_extreg").val();
  var cp = $("#cpreg").val();
  var contentValue = $("#contentValue").val();
  var weight ="2.00";
  var length = "20.00";
  var height = "20.00";
  var width = "20.00";

  var subtotal = $("#subtotal").val();
  var iva = $("#iva").val();

  totalFinal = parseFloat(subtotal) + parseFloat(iva);
  
 

  console.log("cp "+ cp + "totalfinal: "+totalFinal);

$(".contenedorCalcularEnvio").empty();
  $(".contenedorCalcularEnvio").append('<div class="loader loader--style1" title="0"><svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946                s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634                c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/> <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0C22.32,8.481,24.301,9.057,26.013,10.047z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"/></path></svg></div><i>Calculando costo de envío, espere por favor</i>');


$.ajax(
{
  url : 'obtener_tarifa_envioclick.php',
  type: "POST",
 // data : {envioclick:"1", calle: calle,numero: numero, cp: cp, contentValue: contentValue}
  data : {envioclick:"1", totalFinal: totalFinal, cp: cp}
})
  .done(function(data) {
//console.log(data);
$(".contenedorCalcularEnvio").empty();
$(".contenedorCalcularEnvio").append(data);
$("#alCP").text('al código postal '+cp);
//si hubo algún error dejamos que puedan volver a calcular envio
if (data=="Hay un error en el código postal o tu dirección, verifica de nuevo por favor") {
  yaSeCalculoEnvio = 0;
}else{
//ponemos valor a la variable, para que ya no vuelva a entrar a calcular el envio a menos que se cambie la dirección
yaSeCalculoEnvio = 1;
}
  })
  .fail(function(data) {
    alert("Error");

  })

}



  };//calcularEnvio




$('input[name=cpreg]').change(function() {
console.log("cambiando CP");
    yaSeCalculoEnvio = 0;
 });




$(".tab").click(function(){
    $(".tabs-bar").find(".tab-active").removeClass("tab-active");
    $(".content-container").children().hide();
    $(this).addClass("tab-active");
    $(".content-" + this.id).show();
})

$('#choice-shipping-101').click(function(){
    seleccionarPaqueteria('101','0.00','tienda');

     
     
});

$('#choice-shipping-102').click(function(){
    seleccionarPaqueteria('102','59.00','taximaroa');
});


function seleccionarPaqueteria(id,costoEnvio,paqueteria){


  $(".custom-control-input").attr("checked", false);
  $("#choice-shipping-"+id).attr("checked", true);

  $("#statusEnvio").empty();
  $("#statusEnvio").append('<i class="fas fa-check-square colorVerde"></i> Envío');

  //añadimos el costo al "ticket"  y calculamos el total final
  $("#costoEnvio").text(costoEnvio);
  //añadimos que paquetería se selecciono
  $("#paqueteria").val(paqueteria);
  subtotal = $("#subtotal").val();
  iva = $("#iva").val();
  //totalFinal = parseFloat(subtotal) + parseFloat(costoEnvio) + parseFloat(iva);
  totalFinal = parseFloat(subtotal) + parseFloat(costoEnvio);

  $("#totalFinal").text("$"+totalFinal.toFixed(2));
  //revisamos que este completo el check list

  //agregamos el link alboton de paypal
  $("#btnPagarPaypal").attr("href", "process.php?id="+totalFinal);

  revisarChecklist();

}

function seleccionarPaqueteriaLocal(id,costoEnvio,paqueteria){
  //$(".custom-control-input").attr("checked", false);
  $("#choice-shipping-"+id).prop("checked", true);

  $("#statusEnvio").empty();
  $("#statusEnvio").append('<i class="fas fa-check-square colorVerde"></i> Envío');

  //añadimos el costo al "ticket"  y calculamos el total final
  $("#costoEnvio").text(costoEnvio);
  //añadimos que paquetería se selecciono
  $("#paqueteria").val(paqueteria);
  subtotal = $("#subtotal").val();
  iva = $("#iva").val();
  totalFinal = parseFloat(subtotal) + parseFloat(costoEnvio) + parseFloat(iva);

  $("#totalFinal").text("$"+totalFinal.toFixed(2));
  //revisamos que este completo el check list

  //agregamos el link alboton de paypal
  $("#btnPagarPaypal").attr("href", "process.php?id="+totalFinal);

  revisarChecklist();

}


function mostrarFacturacion(valor){
  $("#terminarCompra").show("slow");
  console.log("entrando facturacion"+valor.value);
  if (valor.value=="Si") {
    $("#formFacturacion").show('slow');
    $("#statusFacturacion").empty();
    $("#statusFacturacion").append('<i class="fas fa-window-close colorRojo"></i> Facturación');

    
    //revisamos que este completo el check list

    setTimeout(function(){ 

  revisarChecklist();

 }, 500);



  }else{
      $("#formFacturacion").hide();
      $("#statusFacturacion").empty();
      $("#statusFacturacion").append('<i class="fas fa-check-square colorVerde"></i> Facturación');

       setTimeout(function(){ 

        revisarChecklist();

       }, 500);
      

  }
  //revisamos que este completo el check list

//revisarChecklist();


}


function revisarChecklist(){

  //revisamos que este completo el check list
  var checlisk = $('.colorVerde').length
  console.log("checklist: "+checlisk);
  if (checlisk == 3) {
    console.log("desbloqueamos botones");

    requieresfactura = $('select[name=requieresfactura] option').filter(':selected').val();
    id_direccion = $("#id_direccion").val();
    id_facturacion = $("#id_facturacion").val();
    subtotal = $("#subtotal").val();
    iva = $("#iva").val();
    costoEnvio = $("#costoEnvio").text();
    paqueteria = $("#paqueteria").val();
    //totalFinal = (parseFloat(subtotal) + parseFloat(costoEnvio) + parseFloat(iva));
    totalFinal = (parseFloat(subtotal) + parseFloat(costoEnvio));

  

  $("#contenedorPago").addClass("animado square-pulse"); 
  document.getElementById("contenedorPago").scrollIntoView();
  $(".contenedorPagarPedido").empty();

  if (requieresfactura=="Si") {
  $(".contenedorPagarPedido").append("<a href='metodo-de-pago.php?costoEnvio="+costoEnvio+"&paqueteria="+paqueteria+"&granTotal="+totalFinal+"&direccionentrega="+id_direccion+"&id_facturacion="+id_facturacion+"' id='btnPagarPedido' class='btnPagarPedido'  style='border:none'>Ir a Pagar pedido</a>");
}else{
  $(".contenedorPagarPedido").append("<a href='metodo-de-pago.php?costoEnvio="+costoEnvio+"&paqueteria="+paqueteria+"&granTotal="+totalFinal+"&direccionentrega="+id_direccion+"&id_facturacion=0' id='btnPagarPedido' class='btnPagarPedido'  style='border:none'>Ir a Pagar pedido</a>");
}

  

}else{

    console.log("entrando checlist menos de 3");
    $("#contenedorPago").removeClass("animado square-pulse"); 
    $(".contenedorPagarPedido").empty();
    $(".contenedorPagarPedido").append('<a href="#" id="btnPagarPedido" class="btnPagarPedidodisabled" style="border:none">Ir a Pagar pedido</a>');  


}

  
}


$( document ).ready(function() {
    //$(".mercadopago-button").html('Pagar con MercadoPago');

    nombrereg = $("#nombrereg").val();
    estadoreg = $("#jmr_contacto_estado").val();
    municipioreg = $("#jmr_contacto_municipio").val();
    cpreg = $("#cpreg").val();
    callereg = $("#callereg").val();
    num_extreg = $("#num_extreg").val();


//si no existe el botón de registrarse, validamos que haya dirección
if (!$("#btnRegistrarse").length) {

    if (nombrereg!="" && estadoreg!="" && municipioreg!="" && cpreg!="" && callereg!="" && num_extreg!=""){
      $("#statusDireccion").empty();
      $("#statusDireccion").append('<i class="fas fa-check-square colorVerde"></i> Dirección');
      //$("#guardarDireccion").append("<button type='button' onclick='guardarDireccion(); validarDireccion();' class='btnAzulRedondo'>Guardar dirección</button>");
      $("#guardarDireccion").append("<button type='button' onclick='validarDireccion();' class='btnAzulRedondo' style='color: white;'>Guardar dirección</button>");
    }
  }






});


function guardarDireccion(){


    existedireccion = $("#existedireccion").val();
    id_datos_cliente = "<?php echo $idcliente; ?>";
    estadoreg = $("#jmr_contacto_estado").val();
    municipioreg = $("#jmr_contacto_municipio").val();
    ciudadreg = $("#ciudadreg").val();
    cpreg = $("#cpreg").val();
    callereg = $("#callereg").val();
    num_extreg = $("#num_extreg").val();
    num_intreg = $("#num_intreg").val();
    coloniareg = $("#coloniareg").val();


    console.log("id datos cliente"+id_datos_cliente+"cp: "+cpreg);
     console.log("existe direccion"+existedireccion);


     $(".direccionentrega").css({ "border" : "1px solid #dddddd"});


//si no existe la direccion
if (existedireccion=="0") {
  $.ajax(
{
  url : 'guardar_direccion_cliente.php',
  type: "POST",
  data : {id_datos_cliente:id_datos_cliente, estadoreg:estadoreg, municipioreg:municipioreg, ciudadreg:ciudadreg, callereg: callereg,num_extreg: num_extreg, num_intreg:num_intreg, cpreg: cpreg, coloniareg:coloniareg, existedireccion: existedireccion}
})
  .done(function(data) {
    console.log("esto regresa al guardar direccion:"+data);

//si se guardo la dirección bloqueamos los campos para que no la vuelvan a guardar
      $("#existedireccion").val("1");
      $("#id_direccion").val(data);
      $(".direccionentrega").prop("readonly", true);
      $(".direccionentrega").prop("disabled", true);

console.log("guardando direccion");
     $("#tab1").removeClass("tab-active");
     $(".content-tab1").hide("");

      $("#tab2").addClass("tab-active");
      $(".content-tab2").show("");



  })
  .fail(function(data) {
    alert("Error");

  })

}//si no existe la direccion


    
  }



  function guardarSinRegistro(){


    existedireccion = $("#existedireccion").val();
    nombrereg = $("#nombrereg").val();
    correoreg = $("#correoreg").val();
    telefonoreg = $("#telefonoreg").val();
    estadoreg = $("#jmr_contacto_estado1").val();
    municipioreg = $("#jmr_contacto_municipio1").val();
    ciudadreg = $("#ciudadreg").val();
    cpreg = $("#cpreg").val();
    callereg = $("#callereg").val();
    num_extreg = $("#num_extreg").val();
    num_intreg = $("#num_intreg").val();
    coloniareg = $("#coloniareg").val();


     $(".direccionentrega").css({ "border" : "1px solid #dddddd"});



      //le mandamos en que campos hay error
      $(".direccionentrega").css({ "border" : "1px solid #dddddd"});
        var camposvacios = 0;
          $('.direccionentrega').each(function(){
            if ($(this).val() == "" || $(this).val() == "0" || $(this).val() == "Selecciona tu municipio") {
              $(this).css({ "border" : "1px solid red"});
              camposvacios++;
            }
        });

        if (camposvacios==0) {



  $.ajax(
{
  url : 'guardar_cliente_sin_registro.php',
  type: "POST",
  data : {nombrereg:nombrereg,correoreg:correoreg, telefonoreg:telefonoreg, estadoreg:estadoreg, municipioreg:municipioreg, ciudadreg:ciudadreg, callereg: callereg,num_extreg: num_extreg, num_intreg:num_intreg, cpreg: cpreg, coloniareg:coloniareg, existedireccion: existedireccion}
})
  .done(function(data) {
    console.log("esto regresa al guardar direccion:"+data);


    $("#statusDireccion").empty();
      $("#statusDireccion").append('<i class="fas fa-check-square colorVerde"></i> Dirección');
    calcularEnvio();

      //mostramos mapa
      var codigo_pos = $("#cpreg").val();
      DrawMap(codigo_pos);
      if (existedireccion==0) {
        guardarDireccion();
      }

//si se guardo la dirección bloqueamos los campos para que no la vuelvan a guardar
      $("#existedireccion").val("1");
      $("#id_direccion").val(data);
      $(".direccionentrega").prop("readonly", true);
      $(".direccionentrega").prop("disabled", true);

console.log("guardando direccion");
     $("#tab1").removeClass("tab-active");
     $(".content-tab1").hide("");

      $("#tab2").addClass("tab-active");
      $(".content-tab2").show("");



  })
  .fail(function(data) {
    alert("Error");

  })


}//campos vacios

    
  }



  function guardarFacturacion(){


    existefacturacion = $("#existefacturacion").val();
    id_datos_cliente = "<?php echo $idcliente ?>";
    razonsocial = $("#razonsocial").val();
    rfc = $("#rfc").val();
    regimen = $("#regimen").val();
    calle = $("#calle").val();
    numero = $("#numero").val();
    colonia = $("#colonia").val();
    cp = $("#cp").val();
    correo = $("#correo").val();
    correo_alt = $("#correo_alt").val();
    estado = $("#jmr_contacto_estado1").val();
    municipio = $("#jmr_contacto_municipio1").val();
    ciudad = $("#ciudad").val();
    pais = $("#pais").val();
    usocfdi = $("#usocfdi").val();


    console.log("id datos cliente"+id_datos_cliente);
     console.log("existe facturacion"+existefacturacion);


//si no existe la direccion
if (existefacturacion=="0") {
  $.ajax(
{
  url : 'guardar_facturacion_cliente.php',
  type: "POST",
  data : {id_datos_cliente:id_datos_cliente, razonsocial:razonsocial, regimen:regimen, rfc:rfc, calle:calle, numero:numero, colonia: colonia,cp: cp, correo:correo, correo_alt: correo_alt, estado:estado,municipio:municipio,ciudad:ciudad,pais:pais,usocfdi:usocfdi,existefacturacion:existefacturacion}
})
  .done(function(data) {
    console.log(data);

//si se guardo la dirección bloqueamos los campos para que no la vuelvan a guardar
      $("#existefacturacion").val("1");
      $("#id_facturacion").val(data);
      $(".inputfacturacion").prop("readonly", true);
      $(".inputfacturacion").prop("disabled", true);

      //cambiamos el color de los input de facturación
       $('.inputfacturacion').each(function(){
              $(this).css({ "border" : "1px solid #dddddd"});
        });

      console.log("se guardo facturacion");
  
  })
  .fail(function(data) {
    alert("Error");

  })

}//si no existe la direccion


}// guardar facturacion


function validarFacturacion(){

  //validamos que el usuario ya este loggeado, si no, no lo dehamos avanzar

  var seleccionoEnvio = $('.radioEnvio:checked').val()?true:false;
  

  if ($("#btnRegistrarse").length) {
    swal({
      title: 'Por favor',
      text: 'Registrate o inicia sesión para continuar',
      type: 'warning'
    });

setTimeout(function(){ 

  $("#tab3").removeClass("tab-active");
  $(".content-tab3").hide("");

      $("#tab1").addClass("tab-active");
      $(".content-tab1").show("");

 }, 500);
      

  }else if(seleccionoEnvio==false){
    console.log("no selecciono envio");

    swal({
      title: 'Por favor',
      text: 'Selecciona la paquetería para tu envío',
      type: 'warning'
    });

    setTimeout(function(){ 

 $("#tab3").removeClass("tab-active");
    $(".content-tab3").hide();

      $("#tab2").addClass("tab-active");
      $(".content-tab2").show();

   validarDireccion();

 }, 500);

    
  }
}//function validarFacturacion()



function validarDireccion(){

  //validamos que el usuario ya este loggeado, si no, no lo dejamos avanzar

  if ($("#btnRegistrarse").length) {
    swal({
      title: 'Por favor',
      text: 'Registrate o inicia sesión para continuar',
      type: 'warning'
    });

setTimeout(function(){ 

  $("#tab2").removeClass("tab-active");
  $(".content-tab2").hide("");

      $("#tab1").addClass("tab-active");
      $(".content-tab1").show("");

 }, 500);
      

  }else{

    existedireccion = $("#existedireccion").val();
    nombrereg = $("#nombrereg").val();
    estadoreg = $('select[name=estadoreg] option').filter(':selected').val();
    municipioreg = $('select[name=municipioreg] option').filter(':selected').val();
    cpreg = $("#cpreg").val();
    callereg = $("#callereg").val();
    num_extreg = $("#num_extreg").val();
    console.log("nombre: "+ nombrereg + "Estado: "+estadoreg + "Muni: "+municipioreg +"Calle: "+callereg+"No: "+num_extreg+"cp: "+cpreg);
    if (nombrereg!="" && estadoreg!="" && municipioreg!="" && municipioreg!="Selecciona tu municipio" && cpreg!="" && callereg!="" && num_extreg!=""){
    
    console.log("hay direccion");
      $("#statusDireccion").empty();
      $("#statusDireccion").append('<i class="fas fa-check-square colorVerde"></i> Dirección');
      calcularEnvio();

      //mostramos mapa
      var codigo_pos = $("#cpreg").val();
      DrawMap(codigo_pos);
      if (existedireccion==0) {
        guardarDireccion();
      }

    }else{
      console.log("no hay direccion aq");


      //como no hay validacion de la dirección correcta, volverá a ingresar una dirección y guardarla

      //le mandamos en que campos hay error
      $(".direccionentrega").css({ "border" : "1px solid #dddddd"});
        var camposvacios = 0;
          $('.direccionentrega').each(function(){
            if ($(this).val() == "" || $(this).val() == "0" || $(this).val() == "Selecciona tu municipio") {
              $(this).css({ "border" : "1px solid red"});
              camposvacios++;
            }
        });


      $("#existedireccion").val("0");
      $(".direccionentrega").prop("readonly", false);
      $(".direccionentrega").prop("disabled", false);
      $("#guardarDireccion").empty();
      $("#guardarDireccion").append("<button type='button' onclick='validarDireccion();' class='btnAzulRedondo' style='color:white;'>Guardar dirección</button>");
      
      setTimeout(function(){ 
//esondemos tab envio
  $("#tab2").removeClass("tab-active");
  $(".content-tab2").hide("");
//esondemos tab facturacion
  $("#tab3").removeClass("tab-active");
  $(".content-tab3").hide("");

      $("#tab1").addClass("tab-active");
      $(".content-tab1").show("");

 }, 100);

      $("#statusDireccion").empty();
     $("#statusDireccion").append('<i class="fas fa-window-close colorRojo"></i> Dirección');  


    }
}
} //validarDireccion()



function validarInfoFacturacion(){

  //validamos que el usuario ya este loggeado, si no, no lo dejamos avanzar

  if ($("#btnRegistrarse").length) {
    swal({
      title: 'Por favor',
      text: 'Registrate o inicia sesión para continuar',
      type: 'warning'
    });

setTimeout(function(){ 

  $("#tab3").removeClass("tab-active");
  $(".content-tab3").hide("");

      $("#tab1").addClass("tab-active");
      $(".content-tab1").show("");

 }, 500);
      

  }else{

    existefacturacion = $("#existefacturacion").val();
    razonsocial = $("#razonsocial").val();
    rfc = $("#rfc").val();
    correo = $("#correo").val();
    regimen = $("#regimen").val();
    
    if (razonsocial!="" && rfc!="" && correo!="" && regimen!=""){
    
    console.log("hay facturacion");
      $("#statusFacturacion").empty();
      $("#statusFacturacion").append('<i class="fas fa-check-square colorVerde"></i> Facturación');
     
      if (existefacturacion==0) {
        guardarFacturacion();
      }

      setTimeout(function(){ 
          revisarChecklist();
 }, 500);

      

    }else{
      console.log("no hay direccion facturacion o está incompleta");


      //como no hay validacion de la dirección correcta, volverá a ingresar una dirección y guardarla

      //le mandamos en que campos hay error
      $(".inputfacturacion").css({ "border" : "1px solid #dddddd"});
        var camposvacios = 0;
          $('.inputfacturacion').each(function(){
            if ($(this).val() == "" || $(this).val() == "0" || $(this).val() == "Selecciona tu municipio") {
              $(this).css({ "border" : "1px solid red"});
              camposvacios++;
            }
        });


      $("#existefacturacion").val("0");
      $(".inputfacturacion").prop("readonly", false);
      $(".inputfacturacion").prop("disabled", false);
      

      $("#statusFacturacion").empty();
     $("#statusFacturacion").append('<i class="fas fa-window-close colorRojo"></i> Facturación');  


    }
}
}// validar facturacion


$('#pagarConMercadoPago').click(function(){
  console.log("paganbdo con MP");
  $("#modalMercadoPago").modal("toggle");
});



function irTabFacturacion(){

  $("#tab2").removeClass("tab-active");
  $(".content-tab2").hide("");

      $("#tab3").addClass("tab-active");
      $(".content-tab3").show("");
        $("html, body").animate({ scrollTop: 0 }, "slow");

}

  $("#cpreg").keyup(function(){
    var cp = $("#cpreg").val();
    $("#alCP").text('al código postal '+cp);
    });



// Obtener municipios
$("#jmr_contacto_estado").change(function(){
var estado = $("#jmr_contacto_estado option:selected").val();
$.ajax({
type: "POST",
url: "procesar-estados.php",
data: { municipios : estado } 
}).done(function(data){
$("#jmr_contacto_municipio").html(data);
});
});


// Obtener municipios facturacion
$("#jmr_contacto_estado1").change(function(){
var estado = $("#jmr_contacto_estado1 option:selected").val();
$.ajax({
type: "POST",
url: "procesar-estados.php",
data: { municipios : estado } 
}).done(function(data){
$("#jmr_contacto_municipio1").html(data);
});
});


//google maps

    function DrawMap(cp) {
        var geocoder = new google.maps.Geocoder();
        var address = cp;
        geocoder.geocode({ 'address': address+" Mexico" }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0].types[0] == 'postal_code') {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    var data = {};
                    data.title = results[0].formatted_address;
                    data.lat = latitude;
                    data.lng = longitude;
                    var mapOptions = { center: new google.maps.LatLng(latitude, longitude), zoom: 14, mapTypeId: google.maps.MapTypeId.ROADMAP };
                    var infoWindow = new google.maps.InfoWindow();
                    var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    var marker = new google.maps.Marker({ position: myLatlng, map: map, title: data.title });
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            infoWindow.setContent("<div style = 'width:200px;height:50px'>" + data.title + "</div>");
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                    document.getElementById("dvMap").style.display = "block";
                } else {
                    document.getElementById("dvMap").style.display = "none";
                    alert("No podemos encontrar ese código postal.\n Por favor revísalo para que la entrega sea correcta.");
                }
            } else {
                document.getElementById("dvMap").style.display = "none";
                    alert("No podemos encontrar ese código postal.\n Por favor revísalo para que la entrega sea correcta.");
            }
        });
    };
    


</script>


  


  </body>
</html>
