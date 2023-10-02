
<style>
	.lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #fff;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>
<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<?php

if (isset($_GET['total'])){

// Configuración de la cuenta de PayPal
$paypal_email = 'vendedor@business.example.com';
$currency = 'MXN';

// Detalles del producto o servicio
$item_name = 'Nombre del producto';
$item_amount = $_GET['total'];

// URL de retorno después del pago
$return_url = 'https://ferreteriataximaroa.com.mx/finalizar-pedido-paypal.php';
$cancel_url = 'https://ferreteriataximaroa.com.mx/pagar.php';

	
	
?>
<form name="myform" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
<input type="hidden" name="item_name" value="Pedido numero 873646475">
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