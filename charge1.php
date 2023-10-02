<?php
session_start();
// Incluye el archivo de configuración
require_once('config-stripe1.php');

// Incluye la biblioteca de Stripe
require_once('lib/stripe-php-10.8.0/init.php');

// Obtiene los datos del formulario de pago
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];
$granTotalStripe = $_GET['granTotalStripe'];

// Crea un objeto de cliente de Stripe
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

// Crea un objeto de cargo de Stripe
$charge = \Stripe\Charge::create([
    'amount' => $granTotalStripe,
    'currency' => 'mxn',
    'description' => 'Pago del pedido #'.$_SESSION['numeroDePedido'],
    'source' => $token,
    'receipt_email' => $email,
]);

// Redirige al usuario a la página de éxito de pago
header('Location: ' . STRIPE_SUCCESS_URL."?correoe=".$email);
exit();
?>