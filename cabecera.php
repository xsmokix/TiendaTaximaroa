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
  <div class="overlay"></div>
  <?php require_once "carrito.php"; ?>
  <div id="cookies">
    <p>
      Bienvenido a Taximaroa, al navegar en nuestro portal asumimos que estás de acuerdo y <b>aceptas los términos y condiciones</b><button class="btn-terminos" id="close-cookies">OK</button>&nbsp;<a style="color: white;" href="terminos-y-condiciones.php" class="btn-terminos">Ver más</a>
    </p>
  </div>
<?php
require_once "db.php";
$menu = $con->query("SELECT * FROM menu WHERE activo = '1' ORDER BY orden ASC"); 
?> 
<!-- header -->
<header class="header header-dark header-sticky" style="background: rgba(0,0,104, 1)">
<div class="container">
  <div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark">
    <a href="index.php" class="navbar-brand order-1 order-lg-2" style="position: fixed; top:-10px; left: 50%; transform: translateX(-50%); max-width: 200px;"><img src="assets/images/logo-ferreteria.svg" height="142px" alt="Logo"></a>
    <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse order-3 order-lg-1" id="navbarMenu">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
        <a class="nav-link menuhover link-1 dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categorías </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color:#000068;">
          <?php 
          $categorias = $con->query("SELECT * FROM categorias WHERE estado = '1'"); while($rowcategorias = $categorias->fetch_object()){ ?>
          <li class="dropdown-submenu" style="background-color:#000068;">
          <a class="dropdown-item dropdown-toggle" style="color:#F6CB19 !important;" href="#"><?php echo $rowcategorias->nombre ?></a>
          <ul class="dropdown-menu" style="background-color:#000068;">
            <?php 
            $subcat = $con->query("SELECT * FROM submenu WHERE activo = '1' AND idmenu='$rowcategorias->id'"); while($rowsubcategorias = $subcat->fetch_object()){ ?>
            <li><a class="dropdown-item" style="color:#F6CB19 !important;" href="#"><?php echo $rowsubcategorias->nombre ?></a></li>
            <?php } ?>
          </ul>
          </li>
          <?php } ?>
        </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link menuhover link-1" href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas">
        Productos </a>
        </li>
        <li class="nav-item">
        <a class="nav-link menuhover link-1" href="ver_marcas.php">Marcas</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse order-4 order-lg-3" id="navbarMenu2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link menuhover link-1" href="nosotros.php">Nosotros </a>
        </li>
        <li class="nav-item">
        <a class="nav-link menuhover link-1" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item cart d-none d-sm-none d-md-block d-lg-block">
        <a href="mostrarCarrito.php" class="nav-link"><i class="fas fa-2x fa-shopping-cart"></i><span class="itemsCarrito">
        <div class="numeroitemsCarrito">
            <?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?>
        </div>
        </span></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="index-carousel.html#!" id="navbarDropdown-11" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-2x fa-user-circle"></i>
        </a>
        <?php 
        if (isset($_SESSION['nombre'])) {            ?>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown-11" style="margin: 0 !important; padding: 0 !important;">
          <li style="pointer-events:none;">
          <div style="cursor: default;">
            Hola <b><?php echo $_SESSION['nombre']; ?>
            </b>
          </div>
          </li>
          <li><a class="dropdown-item" href="clientes/perfil.php">Mi Cuenta</a></li>
          <li><a class="dropdown-item" href="cerrar-sesion.php">Cerrar sesión</a></li>
        </ul>
        <?php }else{ ?>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown-11">
          <li><a class="dropdown-item" href="" data-toggle="modal" data-target="#iniciarSesion">Iniciar sesión</a></li>
          <li><a class="dropdown-item" href="clientes/registrarse.php">Registrarse</a></li>
        </ul>
        <?php } ?>
        </li>
      </ul>
    </div>
    </nav>
  </div>
</div>
<!-- icono carrito siempre visible -->
<div class="menuCarritoMovil d-block d-sm-block d-md-none d-lg-none">
  <a href="mostrarCarrito.php"><i class="fas fa-2x fa-shopping-cart"></i>
  <div class="itemsCarritoMovil">
    <div class="numeroitemsCarrito">
      <?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?>
    </div>
  </div>
  </a>
</div>
</header>
<!-- <div class="container-fluid d-none d-sm-none d-md-block d-lg-block" style="padding: 0 !important; margin: 0 !important;">
  <div class="row">
    <div class="col-lg-2">
      <nav class="nav-mobile">
      <ul class="nav-menu">
        <?php 
      if(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])=="ver_categoria.php" AND $_GET['categoria_seleccionada']!="todas"){
       $categoria_seleccionada = $_GET['categoria_seleccionada']; ?>
        <li>
        <?php 
              $submenu = $con->query("SELECT * FROM submenu WHERE activo = '1' AND idmenu='$categoria_seleccionada' order by orden ASC"); while($rowsubmenu = $submenu->fetch_object()){ ?> <a href="" onclick="filtrarPorSubmenu('<?php echo $categoria_seleccionada ?>','<?php echo $rowsubmenu->id ?>'); return false;"><span class="catMinusculas"><?php echo $rowsubmenu->nombre ?></span></a>
        <?php } ?>
        </li>
        <li>
        <a class="regresar" href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas"><i class="fas fa-undo"></i> Regresar</a>
        </li>
        <?php  }else{
         while($rowmenu = $menu->fetch_object()){ ?>
        <li>
        <a href="ver_categoria.php?categoria_seleccionada=<?php echo $rowmenu->id_categoria ?>&marca_seleccionada=todas&nombreBreadcrumb=<?php echo $rowmenu->nombre ?>"><i class="fas <?php echo $rowmenu->icono ?> iconosMenuLateral"></i>&nbsp;<span class="catMinusculas"><?php echo $rowmenu->nombre ?></span></a>
        </li>
        <?php 
      } } ?>
        <li>
        <div class="cotizacion2" data-toggle="modal" data-target="#cotizacion">
          <i class="fas fa-2x fa-file-invoice-dollar"></i>
          <p>
            COTIZACIÓN <br>
             Cotiza fácil y rápido
          </p>
        </div>
        </li>
      </ul>
      </nav>
    </div>
  </div>
</div> -->
<?php //require_once "buscador.php" ?>