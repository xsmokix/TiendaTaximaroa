   <?php

   $totalFinal = $_POST['totalFinal'];


   // SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-4319992401844659-111303-4ac629fafaf1f3d494fa8a4d458d99d6-483591003');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

              //guardamos todos los valores obtenidos para pasarlos a mercado pago
              // Crea un ítem en la preferencia
              $item = new MercadoPago\Item();
              $item->title = 'Pedido 1003 de';
              $item->quantity =  1;
              $item->unit_price = $totalFinal;
              $preference->items = array($item);
              $preference->save();
              ?>