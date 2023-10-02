<?php
define('ProPayPal', 0);
if(ProPayPal){
    define("PayPalClientId", "AY8TSz4eOkDynRFTil6Hkgma_cMKjph0F5S85EodQWephZxKK-FVHR3z3UQ7P8ut8QaPGea1XEdLj7DW");
    define("PayPalSecret", "ENwE3XYeoRjhvH_hQYNQh32zEVCFXqnyx9wUjfJTaSpEHHTTZOy2NnujpKs9hf0XsR7Sj3028QiB6fy3");
    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AY8TSz4eOkDynRFTil6Hkgma_cMKjph0F5S85EodQWephZxKK-FVHR3z3UQ7P8ut8QaPGea1XEdLj7DW");
    define("PayPalSecret", "ENwE3XYeoRjhvH_hQYNQh32zEVCFXqnyx9wUjfJTaSpEHHTTZOy2NnujpKs9hf0XsR7Sj3028QiB6fy3");
    define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
    define("PayPalENV", "sandbox");
}
?>