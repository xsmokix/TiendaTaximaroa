<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/carousel.css">

    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="assets/images/favicon/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon-180x180.png" />


    <title>Ferretería Taximaroa - Tienda Virtual</title>
    
   

  </head>
  <body>


    <!-- header -->
    <header class="header header-dark header-sticky" style="background: rgba(0,0,104, 1)">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- <a href="index.html" class="navbar-brand order-1 order-lg-2"><img src="assets/images/logo.svg" alt="Logo"></a> -->
            <a href="index.php" class="navbar-brand order-1 order-lg-2" style="position: fixed; top:0px; left: 50%; transform: translateX(-50%);"><img src="assets/images/logo.png" alt="Logo"></a>
            
            <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3 order-lg-1" id="navbarMenu">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">
                    Inicio
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="nosotros.php" >
                    Nosotros
                  </a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=todas">
                    Productos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ver_marcas.php">Marcas</a>
                </li>
              </ul>
            </div>

            <div class="collapse navbar-collapse order-4 order-lg-3" id="navbarMenu2">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#">Catalogo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                  <a data-toggle="modal" data-target="#search" class="nav-link"><i class="icon-search"></i></a>
                </li>
                <li class="nav-item cart">
                  <a href="mostrarCarrito.php" class="nav-link"><span>Carrito</span><span><?php 
                  echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?></span></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>


<div id="yeti-left-nav" class="cleanslate">
  <div class="yeti yeti-left-nav">
    <div class="yeti-left-left">
      <a class="yeti yeti-left-menu-button ">
        
        <img src="assets/images/iconito.png" style="max-width: 25px; max-height: 25px;" alt="">
      </a>
      <a class="yeti yeti-left-menu-button yeti-open-sections-list-button">
        
        <img src="assets/images/list.png" style="max-width: 25px; max-height: 25px;" alt="">
      </a>
      <a class="yeti yeti-left-menu-button yeti-open-add-section-button">
        <img src="assets/images/tools.png" style="max-width: 25px; max-height: 25px;" alt="">
      </a>
      <div class="yeti-align-button-bottom">
        <a class="yeti yeti-left-menu-button yeti-unlock-button">
          <i class="ion-ios-gear-outline"></i>
        </a>
        <a class="yeti yeti-left-menu-button yeti-unlock-button">
          <i class="ion-ios-locked-outline"></i>
        </a>
      </div>
    </div>
    
    <div class="yeti-left-two yeti-one">
      <div class="yeti-left-title">
        Categorías
      </div>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Eléctricos
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Ferretería
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Herraje
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Herramienta eléctrica
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Miscelaneos
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Eléctricos
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Plomería
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Químicos y pinturas
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Tornillería
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Construcción
      </a>
      <a class="yeti yeti-left-menu-button yeti-align-left">
        <i class="ion-ios-drag"></i>
        <span class="yeti-text"></span>
        Infraestructura
      </a>
     
      
    </div>

    <div class="yeti-left-two yeti-two">
      <div class="yeti-left-title">
        Marcas
      </div>
      <a class="yeti yeti-left-menu-button">
        <img src="http://wsite.io/assets/minimalist-basic/thumbnails/b14.png" alt="" />
        <span class="yeti-text yeti-thumbnail-label">Truper</span>
      </a>
      <a class="yeti yeti-left-menu-button">
        <img src="http://wsite.io/assets/minimalist-basic/thumbnails/b14.png" alt="" />
        <span class="yeti-text yeti-thumbnail-label">Skil</span>
      </a>
      <a class="yeti yeti-left-menu-button">
        <img src="http://wsite.io/assets/minimalist-basic/thumbnails/b14.png" alt="" />
        <span class="yeti-text yeti-thumbnail-label">Makita</span>
      </a>
      <a class="yeti yeti-left-menu-button">
        <img src="http://wsite.io/assets/minimalist-basic/thumbnails/b14.png" alt="" />
        <span class="yeti-text yeti-thumbnail-label">Dewalt</span>
      </a>
      <a class="yeti yeti-left-menu-button">
        <img src="http://wsite.io/assets/minimalist-basic/thumbnails/b14.png" alt="" />
        <span class="yeti-text yeti-thumbnail-label">Bosch</span>
      </a>
      
    </div>
  </div>
</div>













    <?php require_once "buscador.php" ?>