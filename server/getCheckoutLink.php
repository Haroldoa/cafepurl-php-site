<?php

require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;

$client = new SquareClient([
    'accessToken' => 'EAAAFyw32g9Fx1oexPYdmkHLXUg4hMqM3GxT7td1s27a_TXe6IfNYq74Rgdh_8hC',
    'environment' => Environment::PRODUCTION,
]);

// dev mode
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function localApiCall($url_path, $param_name, $param_value){

            
    $url = "https://" . ($_SERVER["SERVER_NAME"] . $url_path . "?" . $param_name . "=" . urlencode($param_value));
    if($_SERVER["SERVER_NAME"] == "localhost"){
        $url = ($_SERVER["SERVER_NAME"] . $url_path . "?" . $param_name . "=" . urlencode($param_value));
    }
    // make request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $output = curl_exec($ch);   

    // convert response
    // $output = json_decode($output);

    // // handle error; error output
    // if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {

    //   var_dump($output);
    // // }

    // echo "<pre>";
    // var_dump( curl_getinfo($ch) ) . '<br/>';
    // echo curl_errno($ch) . '<br/>';
    // echo curl_error($ch) . '<br/>';

    curl_close($ch); 
    // $squareId = $output;
    return $output;
  }

try {
    // $api_response = $client->getInventoryApi()->retrieveInventoryCount('JMXPEKQUKJX5BJEXGCNIRFVB');

    // if ($api_response->isSuccess()) {
    //     $result = $api_response->getResult();
    //     $resultArray = (array) $result->getCounts()[0];
    //     $inventoryCount = $resultArray[array_keys($resultArray)[4]]['value'];
    //     echo($inventoryCount);
    // } else {
    //     $errors = $api_response->getErrors();
    // }

    

    // calculate shipping fee (add 7.49 for each 10 pounds)
    $shoppingCartArray = json_decode(file_get_contents('php://input', true));
    // debug
    // print_r($shoppingCartArray);
    $totalUntaxedCost = 0;
    $line_items = [];
    for($i = 0; $i < count($shoppingCartArray); $i++){
        // First check if you have the inventorycount of each product available to sell, if not cancel
        $realtimeInventoryCount = localApiCall("/server/getInventoryCount.php", "catalog_id", $shoppingCartArray[$i]->square_id);
        if ($realtimeInventoryCount >= $shoppingCartArray[$i]->count){
            $totalUntaxedCost = $totalUntaxedCost + ($shoppingCartArray[$i]->count * ($shoppingCartArray[$i]->price * 100));
            
            $order_line_item = new \Square\Models\OrderLineItem($shoppingCartArray[$i]->count);
            $order_line_item->setCatalogObjectId($shoppingCartArray[$i]->square_id);
            $line_items[$i] = $order_line_item; 
        }
        else{
            // cancel order if even one item is not in stock
            echo(json_encode("https://cafepurl.com"));
            // return;
        }

    }

    // $order_line_item = new \Square\Models\OrderLineItem('1');
    // $order_line_item->setCatalogObjectId('7LH32K67ST4ZGUORYGADV7ON');

    // $order_line_item1 = new \Square\Models\OrderLineItem('40');
    // $order_line_item1->setCatalogObjectId('R6HH3LSNYLYWCSRZNN5PZZ5Z');

    // $line_items = [$order_line_item, $order_line_item1];
    $pricing_options = new \Square\Models\OrderPricingOptions();
    $pricing_options->setAutoApplyTaxes(true);

    $order = new \Square\Models\Order('DGFFMP32HAAWF');
    $order->setLineItems($line_items);
    $order->setPricingOptions($pricing_options);

    $charge = new \Square\Models\Money();

    // print_r($shoppingCartArray);

    // $taxCharged = $order->total_tax_money->amount;
    // $totalWithTax = $order->total_money->amount;
    // $totalUntaxedCost = $totalWithTax - $taxCharged;
    $shipping_fee = 749;
    // calculate shipping
    if ($totalUntaxedCost > 3000){
        $shipping_fee = 0;
    }

    $charge->setAmount($shipping_fee);
    $charge->setCurrency('USD');

    $shipping_fee = new \Square\Models\ShippingFee($charge);
    $shipping_fee->setName('3 - 5 Business Days (Free Shipping Over $30)');

    $accepted_payment_methods = new \Square\Models\AcceptedPaymentMethods();
    $accepted_payment_methods->setAfterpayClearpay(true);

    $checkout_options = new \Square\Models\CheckoutOptions();
    $checkout_options->setRedirectUrl('https://cafepurl.com');
    $checkout_options->setMerchantSupportEmail('dulce@cafepurl.com');
    $checkout_options->setShippingFee($shipping_fee);
    $checkout_options->setAskForShippingAddress(true);
    $checkout_options->setAcceptedPaymentMethods($accepted_payment_methods);

    $body = new \Square\Models\CreatePaymentLinkRequest();
    $body->setOrder($order);
    $body->setCheckoutOptions($checkout_options);

    $api_response = $client->getCheckoutApi()->createPaymentLink($body);

    if ($api_response->isSuccess()) {
        $result = $api_response->getResult();
        // print_r(get_class_methods($result));
        // print_r(get_class_methods($result->getPaymentLink()));
        echo(json_encode($result->getPaymentLink()->getUrl()));
        // echo(file_get_contents('php://input', true));
    } else {
        $errors = $api_response->getErrors();
        echo(json_encode("https://cafepurl.com"));
        // print_r($errors);
    }
} catch (ApiException $e) {
    echo "ApiException occurred: <b/>";
    echo $e->getMessage() . "<p/>";
}
