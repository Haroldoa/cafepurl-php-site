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

        $resultArray = (array) $result->getItems()[0];
        // print_r($resultArray);
        $resultArraykeys = array_keys($resultArray);
        // print_r($resultArray[$resultArraykeys[1]]);
        $catalog_id = $resultArray[$resultArraykeys[1]];


        $item_data = $resultArray[$resultArraykeys[10]];
        $item_dataArray = (array) $item_data;
        // print_r($item_dataArray);
        $item_dataArraykeys = array_keys($item_dataArray);
        $text_description = $item_dataArray[$item_dataArraykeys[1]];
        // print_r($text_description);
        
        $variations = $item_dataArray[$item_dataArraykeys[10]];
        // $variationsArray = (array) $variations;
        // print_r($variations["value"][0]);
        $variationsArray = (array) $variations["value"][0];
        // print_r($variationsArray);
        

        $variationsArrayKeys = array_keys($variationsArray);
        print_r($variationsArray[$variationsArrayKeys[7]]);


        // $itemId = $result->getMatchedVariationIds()[0];
        // print_r($result);
        // $itemId = $result->getItem()->item_data->variations[0]->id;
        // echo($itemId);
        // // print_r(get_class_methods($result->getItems()[0]->getItemData()));
        // print_r($result->getItems()[0]->getItemData());
    } else {
        $errors = $api_response->getErrors();
    }

} catch (ApiException $e) {
    echo "ApiException occurred: <b/>";
    echo $e->getMessage() . "<p/>";
}
