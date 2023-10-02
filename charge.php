<?php
require_once('config-stripe.php');
 
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];
 
$customer = \Stripe\Customer::create([
  'email' => $email,
  'source'  => $token,
]);
 
$charge = \Stripe\Charge::create([
  'customer' => $customer->id,
  'amount'   => 10000,
  'currency' => 'MXN',
  'description'=> 'Pago del pedido No: 10234',
]);
 
echo '<h1>Pago realizado correctamente, en breve nos comunicaremos contigo</h1>';
?>