<?php 
require_once "seguridad.php"; 
require_once "db.php";
 ?>

 <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Panel Administrador</a>
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <!-- <img alt="Image placeholder" src="https://www.ascento.co.uk/hs-fs/hubfs/Staff_Pictures/Oct%202018%20500%20x%20500%20Staff%20Photos/Stuart%20Wharmby%20500%20x%20500.jpg?width=500&height=500&name=Stuart%20Wharmby%20500%20x%20500.jpg"> -->
                  <img alt="Image placeholder" src="assets/img/usuarios/usuario.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['nombre'] ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">¡Bienvenido!</h6>
              </div>
              <!--<a href="perfil.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi perfil</span>
              </a> -->
              <a href="usuarios.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Usuarios</span>
              </a>
            
              <div class="dropdown-divider"></div>
              <a href="salir.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Salir</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->