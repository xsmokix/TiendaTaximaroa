<?php require_once "db.php"; ?>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="panel.php">
        <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenido</h6>
            </div>
            <a href="perfil.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mi perfil</span>
            </a>
            <a href="perfil.php" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Opciones</span>
            </a>
            <a href="perfil.php" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Usuarios</span>
            </a>
            <a href="perfil.php" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Soporte</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="../login.html" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Salir</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item"  class="active" >
          <a class=" nav-link active " href="panel.php"> <i class="ni ni-tv-2 text-primary"></i> Inicio
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link " href="menu.php">
              <i class="ni ni-bullet-list-67 text-blue"></i> Menú general
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link " href="categorias.php">
              <i class="fas fa-list-alt text-blue"></i> Categorías
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="marcas.php">
              <i class="fas fa-file-alt text-blue"></i> Marcas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="productos.php">
             <i class="ni ni-app text-blue"></i> Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="clientes.php">
              <i class="ni ni-circle-08 text-orange"></i> Clientes &nbsp;
              <?php 
          $clientes = $con->query("SELECT COUNT(visto) AS total from datos_clientes WHERE visto = '0' LIMIT 1");
          $rowclientes = $clientes->fetch_object();
          if ($rowclientes->total >=1) { ?> 
            <span class="fa-stack" data-count="1" style="color:#32325d;">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
            </span> <?php } ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pedidos.php">
              <i class="fas fa-boxes text-orange"></i> Pedidos &nbsp;
              <?php 
          $pedidos = $con->query("SELECT COUNT(leido) AS total from pedidos WHERE leido = '0' LIMIT 1");
          $rowpedidos = $pedidos->fetch_object();
          if ($rowpedidos->total >=1) { ?> 
            <span class="fa-stack" data-count="1" style="color:#32325d;">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
            </span> <?php } ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="promociones.php">
               <i class="ni ni-notification-70 text-orange"></i> Promociones 
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="recomendados.php">
               <i class="ni ni-basket text-orange"></i> Productos recomendados 
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="slider.php">
               <i class="ni ni-image text-orange"></i> Slider principal 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="comentarios.php">
               <i class="fas fa-comments text-orange"></i> Comentarios &nbsp;

          <?php 
          $comentarios = $con->query("SELECT COUNT(leido) AS total from comentarios WHERE leido = '0' LIMIT 1");
          $rowcomentarios = $comentarios->fetch_object();
          if ($rowcomentarios->total >=1) { ?> 
            <span class="fa-stack" data-count="1" style="color:#32325d;">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
            </span> <?php } ?>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="facturacion.php">
               <i class="fas fa-file-pdf text-orange"></i> Subir facturas 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="inventario.php">
               <i class="fas fa-boxes text-orange"></i> Ajustes inventario 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="preguntas.php">
               <i class="fas fa-question-circle text-orange"></i> Preguntas 
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link " href="perfil.php">
              <i class="ni ni-single-02 text-yellow"></i> Perfil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/tables.html">
              <i class="ni ni-bullet-list-67 text-red"></i> Tables
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/login.html">
              <i class="ni ni-key-25 text-info"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/register.html">
              <i class="ni ni-circle-08 text-pink"></i> Register
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <h6 class="navbar-heading text-muted">Documentation</h6>

        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
              <i class="ni ni-spaceship"></i> Getting started
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
              <i class="ni ni-palette"></i> Foundation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
              <i class="ni ni-ui-04"></i> Components
            </a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>