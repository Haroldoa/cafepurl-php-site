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
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

try {
    $api_response = $client->getInventoryApi()->retrieveInventoryCount($_GET["catalog_id"]);

    if ($api_response->isSuccess()) {
        $result = $api_response->getResult();
        $resultArray = (array) $result->getCounts()[0];
        $inventoryCount = $resultArray[array_keys($resultArray)[4]]['value'];
        echo($inventoryCount);
        // print_r($result);
    } else {
        $errors = $api_response->getErrors();
        // print_r($errors);
    }
} catch (ApiException $e) {
    echo "ApiException occurred: <b/>";
    echo $e->getMessage() . "<p/>";
}
?>
