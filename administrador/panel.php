<?php
session_start();
require_once "seguridad.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Panel Administrativo
  </title>
  <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/general.css?ver=1.01">



</head>

<body class="">
  <?php require_once "menu/izquierdo.php" ?>
  
  <div class="main-content">
    <?php require_once('menu/menutop.php'); 

$productos = $con->query("SELECT count(id) from productos");
$row = mysqli_fetch_array($productos);
$total = $row[0];

$ventas = $con->query("SELECT sum(total) from pedidos WHERE estatus = 'finalizado'");
$num_tot_ventas = $con->query("SELECT count(*) AS tot_ventas from pedidos WHERE estatus = 'finalizado'");
$tot_ventas = $con->query("SELECT estatus,COUNT(*) as total FROM pedidos GROUP BY estatus");


$estatus_pedidos = "";
while($rowventas = mysqli_fetch_object($tot_ventas)){
  $estatus_pedidos = $estatus_pedidos . "['".ucfirst($rowventas->estatus)."',     ".$rowventas->total."],";
}
 echo $estatus_pedidos; 

//total de ventas en dinero
$row = mysqli_fetch_array($ventas);
$total_ventas = $row[0];
// total ventas en número
$row1 = mysqli_fetch_array($num_tot_ventas);
$total_ventas_numero = $row1[0];

$clientes = $con->query("SELECT count(id) from datos_clientes");
$row = mysqli_fetch_array($clientes);
$total_clientes = $row[0];


//echo "<br><br><br><br><br><br><br><br><br><br>";
//grafica clientes

$tot_clientes = $con->query("SELECT count(*) AS total, MONTH(fecha_registro) AS mes FROM datos_clientes WHERE fecha_registro >= '2023-01-01' AND fecha_registro <= '2023-12-31' GROUP BY mes ORDER BY mes;");
$tot_clientes1 = "";
/*
$tot_clientes1 = "";
$x = 1;
while($row_tot_clientes = mysqli_fetch_object($tot_clientes)){
echo "<br>x= ".$x;
echo " mes: ".$mes = $row_tot_clientes->mes;

if ($mes==$x) {
  echo $tot_clientes1 = $tot_clientes1 . "['".$x."',     ".$row_tot_clientes->total."],";
}else{
  $tot_clientes1 = $tot_clientes1 . "['".$x."',     0],";
}
$x=$x+1;


  //$tot_clientes1 = $tot_clientes1 . "['".$row_tot_clientes->mes."',     ".$row_tot_clientes->total."],";
}
 echo $tot_clientes1; 
*/

 while($row_tot_clientes = mysqli_fetch_object($tot_clientes)){
    $tot_clientes1 = $tot_clientes1 . "['".$row_tot_clientes->mes."',     ".$row_tot_clientes->total."],";
 }
?>

    <!-- Header -->


  <!-- Header -->
    <div class="header bg-gradient-primary pb-3 pt-3 pt-md-3">      
    </div>



    <div class="header bg-gradient-primary pb-8 pt-5">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Visitas</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Usuarios nuevos</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total_clientes ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <!--<p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p> -->
                </div>
              </div>
            </div>



            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Productos</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fab fa-product-hunt"></i>
                      </div>
                    </div>
                  </div>
                  <!--<p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                 <span class="text-nowrap">Since last month</span> 
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase mb-0">Número de Ventas: <b class="textoAzul"><?php echo  $total_ventas_numero; ?></b></h5>
                      <span class="h2 font-weight-bold mb-0"></span>
                      <h5 class="card-title text-uppercase text-muted mb-0">Monto total de Ventas:</h5>
                      <span class="h2 font-weight-bold mb-0">$<?php echo  number_format($total_ventas, 2); ?></span>
                      
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                 <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
    //require_once "db.php";
    //$pedidos = $con->query("SELECT p.id as idPedido, p.id_datos_cliente, p.total, p.estatus, pd.numero_pedido,pd.id_producto, dc.nombreCompleto, (select count(numero_pedido) from pedidos_detalles where pd.numero_pedido = numero_pedido) AS totProductos FROM pedidos p INNER JOIN pedidos_detalles pd ON p.id=pd.numero_pedido INNER JOIN datos_clientes dc ON p.id_datos_cliente=dc.id GROUP BY p.id ORDER BY p.id ASC");
    $pedidos = $con->query("SELECT p.*, dc.* from pedidos p INNER JOIN datos_clientes dc ON p.id_datos_cliente=dc.id WHERE p.leido='0' OR p.estatus = 'creado' ORDER BY p.id DESC LIMIT 5");
      ?>


    <div class="container-fluid mt--7">


      <div class="row">
        <div class="col-md-6">
          <div id="chart_div1" class="chart"></div> <br>
          <div id="piechart" style="width: 100%; height: 500px;"></div> <br>
          <div id="chart_div2" class="chart"></div> <br>
        </div>
        <div class="col-md-6">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Últimos pedidos</h3>
            </div>
            <div class="table-responsive">
              <table id="tabla-pedidos" class="table align-items-center table-flush table-striped">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"># Pedido</th>
                    
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-center">Total</th>
            
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>

                   <?php while($rowpedidos = $pedidos->fetch_object()){
                    $num_pedido = $rowpedidos->numero_pedido; ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="mb-0 text-sm">#<?php echo strtoupper($rowpedidos->numero_pedido); ?><br>
                            <small>
                            <?php 
                      //       setlocale(LC_ALL,"es_ES");
                      setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
                      //echo $new_date_format = date('Y-m-d H:i:s', strtotime($rowpedidos->fecha));
                      echo iconv('ISO-8859-2', 'UTF-8', strftime("%d de %B de %Y", strtotime($rowpedidos->fecha)));
                       ?></small></span><br>
                       <?php 
                        if ($rowpedidos->leido==0) {
                         ?><button onclick="pedidoVisto('<?php echo $rowpedidos->numero_pedido; ?>'); return false;" class="btn-xs btn-success">Marcar como visto</button> <?php
                       } ?>
                        </div>
                      </div>
                    </th>
                    
                    <td class="text-center">
                      <span class="badge badge-dot mr-4" style="white-space: normal;">
                        <?php 
                        if ($rowpedidos->estatus == "creado") {
                          $color = '<i class="bg-warning" style="width: 1.5rem; height: 1.5rem;"></i><br>';} 
                        elseif ($rowpedidos->estatus == "cancelado" || $rowpedidos->estatus == "cancelacionsolicitada") {
                          $color = '<i class="bg-danger" style="width: 1.5rem; height: 1.5rem;"></i><br>';}
                        elseif ($rowpedidos->estatus == "proceso") {
                          $color = '<i class="bg-info" style="width: 1.5rem; height: 1.5rem;"></i><br>';}  
                        else {
                          $color = '<i class="bg-success" style="width: 1.5rem; height: 1.5rem;"></i><br>';} 
                         echo $color . $rowpedidos->estatus;
                        if ($rowpedidos->estatus=="cancelacionsolicitada" || $rowpedidos->estatus=="cancelacionaceptada"){
                        echo "<br><br><b>Motivo:</b> ".$rowpedidos->motivo;
                        if ($rowpedidos->estatus=="cancelacionsolicitada"){
                        ?>
                        <br><badge onclick="aceptarCancelacion('<?php echo $rowpedidos->numero_pedido; ?>'); return false;" class="badge badge-warning">Aceptar cancelación</badge> 
                      <?php  }} ?>
                      </span>
                    </td>
                   
                    <td class="">
                     <div class="row">
                       <div class="col-sm-7 text-right">
                        $<?php echo number_format((float)$rowpedidos->total, 2, '.', ',') ?> <br>
                      <badge style="cursor: pointer;" class="badge badge-info"><?php if($rowpedidos->metodoPago=="Stripe"){ echo '<a href="https://dashboard.stripe.com/test/payments?status[0]=successful" target="_blank">'.$rowpedidos->metodoPago.'</a>'; }else{
                        echo $rowpedidos->metodoPago;
                      } ?></badge>
                     </div>
                     <div class="col-sm-5 text-left">
                        <img src="../assets/images/paqueterias/<?php echo $rowpedidos->paqueteria ?>.png" style="max-height: 45px;">
                     </div>
                     </div>
                    </td>
                    
                    <td class="text-center">
                      

                      <a class="btn btn-sm btn-info" href="pedidos_detalles.php?numero_pedido=<?php echo $num_pedido; ?>">Ver detalles <br> del pedido</a>
                    </td>
                  </tr>


<?php } ?>

                 
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-md-6">
            
      </div>
      <div class="col-md-6"></div>
      </div>


      <!-- Table -->
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          
        </div>
      </div>
      
      <!-- Footer -->
      <?php require_once "footer.php" ?>
     
    </div>


    <!-- Modal Enviar-->
<div class="modal fade" id="modalEnviar" tabindex="-1" role="dialog" aria-labelledby="modalEnviar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">

          <h3 class="textoAzul">Listos para enviar el pedido <br>por favor ingresa el número de guía <br>
            para el pedido #<b id="numero_pedido"></b></h3>
          <input type="text" class="form-control" id="numero_guia" name="numero_guia" value="">
          <hr>
          <button class="btn btn-success" onclick="enviarPedido(); return false;">Actualizar pedido y enviar</button>
        


  </div>
    </div>
  </div>
</div>



    <!-- Modal Enviar-->
<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="modalCancelar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">

          <h3 class="textoAzul">El pedido #<b id="numero_pedido_cancelar"></b> ha sido cancelado</h3>
          

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        


  </div>
    </div>
  </div>
</div>


    <!-- Modal Ver facturación-->
<div class="modal fade" id="modalFacturacion" tabindex="-1" role="dialog" aria-labelledby="modalFacturacion" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">Datos de facturación del cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
       <div class="contenedorFacturacion">
         
       </div>

    </div>
  </div>
</div>





  </div><!-- main content -->
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>


<script src="https://www.google.com/jsapi"></script>


  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

      function enviarPedido(){
        var numero_pedido = $("#numero_pedido").text();
        var numero_guia = $("#numero_guia").val();

        console.log("numero_pedido: "+numero_pedido+" guia: "+numero_guia);


        $.ajax(
{
  url : 'actualizar.php',
  type: "POST",
  data : { actualizar_pedido:"1",numero_pedido: numero_pedido,numero_guia: numero_guia}
})
  .done(function(data) {
console.log(data);
      location.reload();


  })
  .fail(function(data) {
    alert("Error");

  })

      }

      function enviar(numero_pedido){
        $("#numero_pedido").text(numero_pedido);
        $("#modalEnviar").modal("show");
      }


       function cancelarPedido(numero_pedido){

        $("#numero_pedido_cancelar").text(numero_pedido);
        $("#modalCancelar").modal("show");


        

        setTimeout(function(){ 

     location.reload();

 }, 1500);
       


        $.ajax(
{
  url : 'actualizar.php',
  type: "POST",
  data : { cancelar_pedido:"1",numero_pedido: numero_pedido}
})
  .done(function(data) {
console.log(data);
      //location.reload();


  })
  .fail(function(data) {
    alert("Error");

  })

      }


      function verFacturacion(id_facturacion){
        

           $.ajax(
            {
              url : 'ver_datos_facturacion.php',
              type: "POST",
              data : { id_facturacion: id_facturacion}
            })
              .done(function(data) {
            console.log(data);
                  $("#modalFacturacion").modal("toggle");
                  $(".contenedorFacturacion").empty();
                  $(".contenedorFacturacion").append(data);


              })
              .fail(function(data) {
                alert("Error");

              })

      }



google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
     ['Mes', 'Ventas', 'Utilidad'],
    ['Ene',  1000,      400],
    ['Feb',  1170,      460],
    ['Mar',  660,       300],
    ['Abr',  1030,      540],
    ['May',  1500,       120],
    ['Jun',  740,       220],
    ['Jul',  850,       420],
    ['Ago',  2660,       960],
    ['Sep',  1660,       820],
  ]);

  var options = {
    title: 'Ventas mensuales',
    hAxis: {title: 'Mes', titleTextStyle: {color: 'red'}}
 };

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart2);
function drawChart2() {
  var data = google.visualization.arrayToDataTable([
    ['Mes', 'Clientes'],
    <?php echo $tot_clientes1; ?>
  ]);

  var options = {
    title: 'Clientes nuevos por mes',
    hAxis: {title: 'Mes',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0}
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
  chart.draw(data, options);
}

$(window).resize(function(){
  drawChart1();
  drawChart2();
});


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php echo $estatus_pedidos; ?>
        ]);

        var options = {
          title: 'Estatus de los pedidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

// Reminder: you need to put https://www.google.com/jsapi in the head of your document or as an external resource on codepen //


  </script>
</body>

</html>