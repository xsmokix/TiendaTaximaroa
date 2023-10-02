<?php
// Incluye el archivo de configuración
require_once('config-stripe1.php');

// Imprime el formulario de pago de Stripe
echo '<form action="charge1.php" method="post">';
echo '<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"';
echo 'data-key="' . STRIPE_PUBLISHABLE_KEY . '"';
echo 'data-amount="10000"';
echo 'data-name="Ferretería Taximaroa"';
echo 'data-description="Pago del pedido #23423445"';
echo 'data-image="https://ferreteriataximaroa.com.mx/assets/images/favicon/apple-touch-icon-180x180.png"';
echo 'data-locale="auto"';
echo 'data-currency="mxn"';
echo 'data-allow-remember-me="false"';
echo 'data-label="Pagar con tarjeta">';
echo '</script>';
echo '</form>';
?>