<?php
// Clave API pública de Stripe
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_Ua5wEmfBDWCq9eJR7dYhtyuN00rJTP0OkC');

// Clave API privada de Stripe
define('STRIPE_SECRET_KEY', 'sk_test_EUJjpsvkVgYWyvbEFmoqu5EH007n5A14DJ');

// URL de retorno de Stripe después de que se complete el pago
define('STRIPE_SUCCESS_URL', 'https://ferreteriataximaroa.com.mx/finalizar-pedido-stripe.php');

// URL de retorno de Stripe si el pago falla
define('STRIPE_FAILURE_URL', 'https://ferreteriataximaroa.com.mx/pago.php');
?>