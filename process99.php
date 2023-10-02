

<?php
//include('include/function.php');
//include('include/conexion.php');
//abrir_conexion();//Abre la conexion a la base de datos
if (isset($_GET['total'])){

// Configuración de la cuenta de PayPal
$paypal_email = 'ortizortizosvaldo@gmail.com';
$currency = 'MXN';

// Detalles del producto o servicio
$item_name = 'Nombre del producto';
$item_amount = $_GET['total'];

// URL de retorno después del pago
$return_url = 'https://ferreteriataximaroa.com.mx/finalizar-pedido-paypal.php';
$cancel_url = 'https://ferreteriataximaroa.com.mx/pagar.php';

	
	
?>
<form name="myform" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
<input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
<input type="hidden" name="amount" value="<?php echo $item_amount; ?>">
<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
<input type="hidden" name="return" value="<?php echo $return_url; ?>">
<input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>">
<!-- <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!">-->
</form>
<script type="text/javascript">
document.myform.submit();
</script>
<?php	
	
} else {
	header("location:pagar.php");
	exit;
}
?>