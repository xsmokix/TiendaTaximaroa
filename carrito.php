<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//unset($_SESSION['usuario']);
//unset($_SESSION['id_cliente']);
if (isset($_SESSION['pedidoFinalizado'])) {
	unset($_SESSION['carrito']);
	unset($_SESSION['numeroDePedido']);
	unset($_SESSION['pedidoFinalizado']);
}

$mensaje="";


if (isset($_POST['btnAccionPagar'])) {
	switch($_POST['btnAccionPagar']){

		case 'Agregar':

			if (is_numeric($_POST['id_producto'])) {
				$id_producto=$_POST['id_producto'];
				$mensaje.="OK id correcto".$id_producto;
			}else{
				$mensaje.= "id_producto incorrecto".$id_producto; break;
			}
			if (is_string($_POST['nombre'])) {
				$nombre=$_POST['nombre'];
				$mensaje.="OK nombre correcto".$nombre;
			}else{
				$mensaje.= "nombre incorrecto".$nombre; break;
			}
			if (is_numeric($_POST['precio_venta'])) {
				$precio_venta=$_POST['precio_venta'];
				$mensaje.="OK precio correcto".$precio_venta;
			}else{
				$mensaje.= "precio_venta incorrecto".$precio_venta; break;
			}if (is_numeric($_POST['cantidad'])) {
				$cantidad=$_POST['cantidad'];
				$mensaje.="OK cantidad correcto".$cantidad;
			}else{
				$mensaje.= "cantidad incorrecto".$cantidad; break;
			}

			if (!isset($_SESSION['carrito'])) {
	
				$producto=array(
					'id_producto'=>$id_producto,
					'nombre'=>$nombre,
					'cantidad'=>$cantidad,
					'precio_venta'=>$precio_venta
				);

				$_SESSION['carrito'][0]=$producto;
				$mensaje ="Producto agregado correctamente al carrito";
			}else{

				$idProductos=array_column($_SESSION['carrito'], "id_producto");
				if (in_array($id_producto, $idProductos)) {
					//echo "<script>alert('El producto ya está en el carrito');</script>";
					$mensaje = "";
					echo '<script>window.location.href = "mostrarCarrito.php"</script>';
				}else{

				

				$numeroProductos = count($_SESSION['carrito']);

				$producto=array(
					'id_producto'=>$id_producto,
					'nombre'=>$nombre,
					'cantidad'=>$cantidad,
					'precio_venta'=>$precio_venta
				);
				$_SESSION['carrito'][$numeroProductos]=$producto;
				$mensaje ="Producto agregado correctamente al carrito";

			} 
		}

			$mensaje = print_r($_SESSION,true);

			//header("Location: mostrarCarrito.php");
			echo '<script>window.location.href = "mostrarCarrito.php"</script>';




break;







		
	}
}

if (isset($_POST['btnAccion'])) {
	switch($_POST['btnAccion']){

		case 'Agregar':

			if (is_numeric($_POST['id_producto'])) {
				$id_producto=$_POST['id_producto'];
				$mensaje.="OK id correcto".$id_producto;
			}else{
				$mensaje.= "id_producto incorrecto".$id_producto; break;
			}
			if (is_string($_POST['nombre'])) {
				$nombre=$_POST['nombre'];
				$mensaje.="OK nombre correcto".$nombre;
			}else{
				$mensaje.= "nombre incorrecto".$nombre; break;
			}
			if (is_numeric($_POST['precio_venta'])) {
				$precio_venta=$_POST['precio_venta'];
				$mensaje.="OK precio correcto".$precio_venta;
			}else{
				$mensaje.= "precio_venta incorrecto".$precio_venta; break;
			}if (is_numeric($_POST['cantidad'])) {
				$cantidad=$_POST['cantidad'];
				$mensaje.="OK cantidad correcto".$cantidad;
			}else{
				$mensaje.= "cantidad incorrecto".$cantidad; break;
			}

			if (!isset($_SESSION['carrito'])) {
	
				$producto=array(
					'id_producto'=>$id_producto,
					'nombre'=>$nombre,
					'cantidad'=>$cantidad,
					'precio_venta'=>$precio_venta
				);

				$_SESSION['carrito'][0]=$producto;
				$mensaje ="Producto agregado correctamente al carrito";
				echo "<script>mensajeProductoAgregado();</script>";
				/*echo "
					<script>
   					swal({
                 		title: 'Producto',
                  		text: 'agregado al carrito',
                  		type: 'success',
                  		showConfirmButton: false,
                  		timer: 2000
              		});
				</script>";*/
			}else{

				$idProductos=array_column($_SESSION['carrito'], "id_producto");
				if (in_array($id_producto, $idProductos)) {


					
					/*foreach ($players as &$player) {
					  if ($player["id"] == $i) {
					    $player["points"] = ${"points".$i};
					  }
					  $i++;
					}*/


					//si voiene desde el select ingresamos la cantidad del select, si no sólo agregamos +1
					if (isset($_POST['desdeSelect'])) {
						$numeroProductos = count($_SESSION['carrito']);
					for ($i=0; $i <= $numeroProductos; $i++) { 
						if($_SESSION['carrito'][$i]['id_producto'] === $_POST['id_producto']){
					        $_SESSION['carrito'][$i]['cantidad'] = $_POST['cantidad'];
					        break; // Stop the loop after we've found the item
					    }
					}
					}else{

					$numeroProductos = count($_SESSION['carrito']);
					for ($i=0; $i <= $numeroProductos; $i++) { 
						if($_SESSION['carrito'][$i]['id_producto'] === $_POST['id_producto']){
					        $_SESSION['carrito'][$i]['cantidad'] = $_SESSION['carrito'][$i]['cantidad']+1;
					        break; // Stop the loop after we've found the item
					    }
					}
				}
						
					    /*if($_SESSION['carrito'][$i]['id_producto'] === '11'){
					        $_SESSION['carrito'][$i]['cantidad'] = 25;
					        break; // Stop the loop after we've found the item
					    } */
					

					echo "<script>mensajeProductoAgregado();</script>";
					/*echo "
					<script>
					   swal({
					                 title: 'Cantidad',
					                  text: '".$_SESSION['carrito'][0]['nombre']." actualizado',
					                  type: 'success',
					                  showConfirmButton: false,
					                  timer: 2000
					              });
					</script>"; */
					$mensaje = "";




					/*
					
					echo "
					<script>
   swal({
                 title: 'Este Producto',
                  text: 'ya esta en tu carrito',
                  type: 'warning',
                  showConfirmButton: false,
                  timer: 2000
              });
</script>";
					$mensaje = "";
				

				*/}else{

				

				$numeroProductos = count($_SESSION['carrito']);

				$producto=array(
					'id_producto'=>$id_producto,
					'nombre'=>$nombre,
					'cantidad'=>$cantidad,
					'precio_venta'=>$precio_venta
				);
				$_SESSION['carrito'][$numeroProductos]=$producto;
				$mensaje ="Producto agregado correctamente al carrito";
				echo "
					<script>
   swal({
                 title: 'Producto',
                  text: 'agregado al carrito',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              });
</script>";

			} 
		}

			$mensaje = print_r($_SESSION,true);




break;

case 'Eliminar':
			if (is_numeric($_POST['id_producto_carrito'])) {
				$id_producto=$_POST['id_producto_carrito'];

				foreach ($_SESSION['carrito'] as $indice => $producto) {
					if ($producto['id_producto']==$id_producto) {
						unset($_SESSION['carrito'][$indice]);
						
						// remove item at index 0
						$_SESSION['carrito'] = array_values($_SESSION['carrito']); // 'reindex' array

						//echo "<script>alert('Producto eliminado del carrito');</script>";
						echo "
					<script>
   swal({
                 title: 'Producto',
                  text: 'eliminado del carrito',
                  type: 'success',
                  showConfirmButton: false,
                  timer: 2000
              });
</script>";
						//header("Location: mostrarCarrito.php");
					}
				}
				


			}else{
				$mensaje.= "id_producto incorrecto".$id_producto; break;
			}





break;





		
	}
}





 ?>