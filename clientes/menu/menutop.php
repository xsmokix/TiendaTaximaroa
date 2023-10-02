 <!-- Navbar -->
    <nav class="" id="navbar-main">
      <div class="container-fluid" >
        <!-- Brand -->
        <div class="row">
          <div class="col-4">
            
          </div>
          <div class="col-4 text-center">
            <a class="h1  text-white text-uppercase d-none d-lg-block" href="panel.php">MI PANEL</a>
          </div>
          <div class="col-4">
            <!-- User -->
        <ul class="navbar-nav text-right d-none d-md-flex">
          <li class="nav-item dropdown">
            <a href="" class="notificaciones">
              <i class="fas fa-2x fa-bell"></i>
            </a> &nbsp; &nbsp;
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-block; position: relative; top: 5px;">
              <div class="media align-items-center" >
                <span class="avatar avatar-sm rounded-circle" >
                  <?php 
                  if (file_exists("assets/img/fotosclientes/".$_SESSION['idcliente'].".jpg")) {
                    $imagen_cliente = "assets/img/fotosclientes/".$_SESSION['idcliente'].".jpg";
                    ?>
                    <img alt="Image placeholder" src="assets/img/fotosclientes/<?php echo $_SESSION['idcliente'] ?>.jpg?ver=<?php echo date("H:i:s"); ?>">
                 <?php  }else{
                 $imagen_cliente = "assets/img/fotosclientes/default.jpg" ?>
                  <img alt="Image placeholder" src="assets/img/fotosclientes/default.jpg">
                <?php } ?>
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['nombre'] ?></span>
                </div>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Tu saldo: <b>$0.00</b></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">¡Bienvenido!</h6>
              </div>
              <a href="perfil.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi perfil</span>
              </a>
              <!--<a href="perfil.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Opciones</span>
              </a> -->
            
              <div class="dropdown-divider"></div>
              <a href="salir.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Salir</span>
              </a>
            </div>
          </li>
        </ul>
          </div>
        </div>
        <!-- Form -->
        
        
      </div>
    </nav>
    <!-- End Navbar -->