<?php
// Configuración de la cuenta de PayPal
$paypal_email = 'ortizortizosvaldo@gmail.com';
$currency = 'MXN';

// Detalles del producto o servicio
$item_name = 'Nombre del producto';
$item_amount = 10.00;

// URL de retorno después del pago
$return_url = 'https://ferreteriataximaroa.com.mx/finalizar-pedido-paypal.php';
$cancel_url = 'https://ferreteriataximaroa.com.mx/finalizar-pedido-paypal.php';

// Generar el botón de pago de PayPal
echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_xclick">';
echo '<input type="hidden" name="business" value="'.$paypal_email.'">';
echo '<input type="hidden" name="item_name" value="'.$item_name.'">';
echo '<input type="hidden" name="amount" value="'.$item_amount.'">';
echo '<input type="hidden" name="currency_code" value="'.$currency.'">';
echo '<input type="hidden" name="return" value="'.$return_url.'">';
echo '<input type="hidden" name="cancel_return" value="'.$cancel_url.'">';
echo '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!">';
echo '</form>';
?>