<?php

require 'vendor/autoload.php';

use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;

$client = new SquareClient([
    'accessToken' => 'EAAAFyw32g9Fx1oexPYdmkHLXUg4hMqM3GxT7td1s27a_TXe6IfNYq74Rgdh_8hC',
    'environment' => Environment::PRODUCTION,
]);



try {

    $body = new \Square\Models\SearchCatalogItemsRequest();
    $body->setTextFilter($_GET["product_name"]);

    $api_response = $client->getCatalogApi()->searchCatalogItems($body);

    if ($api_response->isSuccess()) {
        $result = $api_response->getResult();
        
        $itemId = $result->getMatchedVariationIds()[0];
        // print_r($result);
        // $itemId = $result->getItem()->item_data->variations[0]->id;
        echo($itemId);
        // // print_r(get_class_methods($result->getItems()[0]->getItemData()));
        // print_r($result->getItems()[0]->getItemData());
    } else {
        $errors = $api_response->getErrors();
    }

} catch (ApiException $e) {
    echo "ApiException occurred: <b/>";
    echo $e->getMessage() . "<p/>";
}
