<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo "entrando agregar al carrito";

if (isset($_POST['agregarAlCarrito'])) {		


	$id_producto=$_POST['id_producto'];
	$nombre=$_POST['nombre'];
	$precio_venta=$_POST['precio_venta'];
	$cantidad=$_POST['cantidad'];	

			if (!isset($_SESSION['carrito'])) {
	
				$producto=array(
					'id_producto'=>$id_producto,
					'nombre'=>$nombre,
					'cantidad'=>$cantidad,
					'precio_venta'=>$precio_venta
				);

				$_SESSION['carrito'][0]=$producto;
				
				echo "no habia carrito";
				
			}else{

				$idProductos=array_column($_SESSION['carrito'], "id_producto");


				if (in_array($id_producto, $idProductos)) {

					echo "numprod:". $numeroProductos = count($_SESSION['carrito'])."<br>";
					echo $_SESSION['carrito'][0]['id_producto']."<br>";
					echo $_SESSION['carrito'][1]['id_producto']."<br>";
		
					for ($i=0; $i < $numeroProductos; $i++) { 
						if($_SESSION['carrito'][$i]['id_producto'] === $id_producto){
					        $_SESSION['carrito'][$i]['cantidad'] = $_SESSION['carrito'][$i]['cantidad']+1;
					    }
					}

					echo "habia carrito y ya existia el producto";
				
				}else{

				

				$numeroProductos = count($_SESSION['carrito']);
				$producto=array(
					'id_producto'=>$id_producto,
					'nombre'=>$nombre,
					'cantidad'=>$cantidad,
					'precio_venta'=>$precio_venta
				);
				$_SESSION['carrito'][$numeroProductos]=$producto;

				echo "habia carrito, y ese producto no";
			
				} 
		}

	}

	








 ?>