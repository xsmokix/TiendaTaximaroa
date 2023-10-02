     <!-- hero -->

     <?php 



if (!isset($_SESSION['breadcum'])) {
$_SESSION['breadcum'] = array("", "", "");
$_SESSION['breadcumurl'] = array("", "", "");
}

//Ahora se elimina el último elemento del array
array_shift($_SESSION['breadcum']);
array_shift($_SESSION['breadcumurl']);

array_push($_SESSION['breadcum'], $nombreBreadcrumb);
array_push($_SESSION['breadcumurl'], $_SERVER["REQUEST_URI"]);
//print_r($_SESSION['breadcum']);
//print_r($_SESSION['breadcumurl']);






 ?>
    <section class="hero hero-small">
      <div class="container">
        <div class="row">
          <div class="col text-left">
            <!-- <h1 class="mb-0">Tienda virtual</h1> -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
              	<?php 
              for ($i=0; $i <= 2 ; $i++) { 
              			 echo '<li class="breadcrumb-item"><a href="'.$_SESSION['breadcumurl'][$i].'">'.$_SESSION['breadcum'][$i].'</a></li>';
					}
 				?>
               
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

<hr>