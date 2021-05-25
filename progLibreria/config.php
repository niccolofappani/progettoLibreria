<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'Ab6HcQ0KTZnJqScNX1HuoKy0Ox9qR5ZwBhJiS1x9d8dPz5iu70w_M7g6hKIcoituD33BRmJFIhHY1ttz');
define('CLIENT_SECRET', 'EGgp9cWhRn82_4Co2V8kfPyQMn7eRwoWTio_RBBQ_axdbdy77Tzs-Fm0AkhUVWiKUDmOqUheB8JwPbZo');
 
define('PAYPAL_RETURN_URL', 'localhost/progLibreria/success.php');
define('PAYPAL_CANCEL_URL', 'YOUR_SITE_URL/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here
 
// Connect with the database
$db = new mysqli('localhost', 'root', '', 'libreria'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live