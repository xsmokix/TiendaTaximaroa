<?php require_once('config-stripe.php'); ?>
<form action="charge.php" method="post">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="<?php echo $stripe['publishable_key']; ?>"
        data-description="Realiza el pago de tu pedido"
        data-amount="100"
        data-currency="MXN"
        data-locale="es-419"></script>
</form>