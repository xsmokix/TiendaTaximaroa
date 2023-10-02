<?php
require_once('vendor/autoload.php');
 
$stripe = array(
    'secret_key' => 'sk_test_EUJjpsvkVgYWyvbEFmoqu5EH007n5A14DJ',
    'publishable_key' => 'pk_test_Ua5wEmfBDWCq9eJR7dYhtyuN00rJTP0OkC',
);
 
\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>