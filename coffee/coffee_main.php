<?php
  // // This sends a persistent cookie that lasts a year.
  // session_start([
  //   'cookie_lifetime' => 31536000,
  // ]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include '../google_head.php';?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coffee Selection - Cafe Purl | Bringing Quality Coffee and Yarn to You</title>
    <meta name="description" content="Coffee Selection - Cafe Purl | Bringing Quality Coffee and Yarn to You">
    <link rel="stylesheet" href="/assets/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/core/main_style.css">
    
    <link rel="icon" href="/assets/img/square-512.png">
  </head>
  <body class="">
  <?php include '../google_body.php';?>
	<!--- <script src="index.js"></script> --->
  <?php include '../navbar.php';?>
  <?php

 // dev mode
            // ini_set('display_errors', 1);
            // ini_set('display_startup_errors', 1);
            // error_reporting(E_ALL);

// get coffee square id and inventory (inventory will be refreshed every page reload but not squareid)
// function getProductInfo($category, $name){
//   if(!isset($_SESSION[$category][$name])){
//     $squareId = localApiCall("/server/getItemId.php", "product_name", $name);
//     $_SESSION[$category][$name] = (object) [
//       'squareId' => $squareId,
//       'inventory' => 0,
//     ];
//   }
//   // get inventory every page reload
//   $_SESSION[$category][$name]->inventory = localApiCall("/server/getInventoryCount.php", "catalog_id", $_SESSION[$category][$name]->squareId);
// }

// function getProductInfoFromId($category, $name, $id){
//     $squareId = $id;
//     $_SESSION[$category][$name] = (object) [
//       'squareId' => $squareId,
//       'inventory' => 0,
//     ];
//   // get inventory every page reload
//   $_SESSION[$category][$name]->inventory = localApiCall("/server/getInventoryCount.php", "catalog_id", $_SESSION[$category][$name]->squareId);
// }

// getProductInfo("coffee", "Light Roast Whole Coffee");
// getProductInfo("coffee", "Light Roast Ground Coffee");
// getProductInfo("coffee", "Medium Roast Whole Coffee");
// getProductInfo("coffee", "Medium Roast Ground Coffee");
// getProductInfo("coffee", "Dark Roast Whole Coffee");
// getProductInfo("coffee", "Dark Roast Ground Coffee");

// getProductInfoFromId("coffee", "Light Roast Whole Coffee", "R6HH3LSNYLYWCSRZNN5PZZ5Z");
// getProductInfoFromId("coffee", "Light Roast Ground Coffee", "DCJHLH7Z4OPRWB3C3S67SOJ4");
// getProductInfoFromId("coffee", "Medium Roast Whole Coffee", "JMXPEKQUKJX5BJEXGCNIRFVB");
// getProductInfoFromId("coffee", "Medium Roast Ground Coffee", "BC4RUILZ46SYMFOWSVIZXE6F");
// getProductInfoFromId("coffee", "Dark Roast Whole Coffee", "RHIIEP4DDDZXLISJV3VDK3T2");
// getProductInfoFromId("coffee", "Dark Roast Ground Coffee", "SDIS2BMLUNIVOWBUS7A7JNGP");
$coffeeSquareIds ["Light Roast Whole Coffee"] = "R6HH3LSNYLYWCSRZNN5PZZ5Z";
$coffeeSquareIds ["Light Roast Ground Coffee"] = "DCJHLH7Z4OPRWB3C3S67SOJ4";
$coffeeSquareIds ["Medium Roast Whole Coffee"] = "JMXPEKQUKJX5BJEXGCNIRFVB";
$coffeeSquareIds ["Medium Roast Ground Coffee"] = "BC4RUILZ46SYMFOWSVIZXE6F";
$coffeeSquareIds ["Dark Roast Whole Coffee"] = "RHIIEP4DDDZXLISJV3VDK3T2";
$coffeeSquareIds ["Dark Roast Ground Coffee"] = "SDIS2BMLUNIVOWBUS7A7JNGP";
// Café Mexicano Medium Ground 7MEL7QXG4PRVEE7MNND3FBMG
// Café Mexicano Dark Ground SB3SHA4TOL6XLTJVJOGTNBR4
?>
    <main class="no_overflow">
      <article style="gap: 20px;">
      
        <div style="margin-left: auto; margin-right: auto; text-align: center;" class="d-flex flex-column">
        <h1 style="text-align: center;">Coffee</h1>
          <img class="" src="/assets/img/coffee_process_infographic.jpg">
        
        <span class="section_margin">
          <h1 id="light-roast" style="text-align: center;">Light Roast</h1>
        </span>
        
          <section style="gap: 10px; padding: 10px;">
            <div style="display: flex; justify-content: center; flex-direction: row; gap: 20px;">
<!---               <img class="max_height_viewport" src="/assets/img/coffee_trees_hill.jpg"> --->

                <div class="">
                  <img class="card-img-top" src="/assets/img/light_roast_coffee_whole.jpg" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="card-title">Whole Coffee (1lb)</h4>
                    <p class="card-text">Price: $24.99</p>
                    <a href="" 
                    data-square_id="R6HH3LSNYLYWCSRZNN5PZZ5Z"
                    data-inventory=""
                    style="pointer-events: none; background-color:red;"

                    data-name="Light Roast Whole Coffee (1lb)" 
                    data-price="24.99" 
                    
                    data-img_src="/assets/img/light_roast_coffee_whole.jpg" 
                    
                    data-pounds_per_unit="1"
                    class="add-to-cart btn brown_button addToCartAnchor">Sold Out
                    </a>
                  </div>
                </div>
                
                <div class="">
                  <img class="card-img-top" src="/assets/img/light_roast_coffee_ground.jpg" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="card-title">Ground Coffee (1lb)</h4>
                    <p class="card-text">Price: $24.99</p>
                    <a href="" 
                    data-square_id="DCJHLH7Z4OPRWB3C3S67SOJ4"
                    data-inventory=""
                    style="pointer-events: none; background-color:red;"

                    data-name="Light Roast Ground Coffee (1lb)" 
                    data-price="24.99" 
                    data-img_src="/assets/img/light_roast_coffee_ground.jpg" 
                    data-pounds_per_unit="1"
                    class="add-to-cart btn brown_button addToCartAnchor">Sold Out
                    </a>
                  </div>
                </div>

                
            </div>
<!---             <div style="text-align: center; padding: 10px;" class="large_font"> 
            We specialize in Nicaraguan Single Origin coffee; our coffee is grown in the Central American mountains of Nicaragua. Our award winning coffee comes from our family farm, in business for more than 30 years. It's hard to describe how good it tastes. It's uniquely pleasant and very different from most coffee. 
            </div>

            <div style="display: flex; justify-content: center;">
              <img class="max_height_viewport" src="/assets/img/coffee_bucket.jpg">
            </div>
            <div style="text-align: center; padding: 10px;" class="large_font">
             Our coffee is picked when ripe, milled, washed, sun dried and roasted. We bring quality coffee from our home to yours. 
            </div>--->
          </section>

          <span class="section_border border_coffee section_margin">
            <h1 id="medium-roast" style="text-align: center;">Medium Roast</h1>
          </span>
          <section style="gap: 10px; padding: 10px;">
          <div class="flex_row_mobile_column" style="display: flex; justify-content: center; flex-direction: column; gap: 20px;">
<!---               <img class="max_height_viewport" src="/assets/img/coffee_trees_hill.jpg"> --->

                <div style="display: flex; justify-content: center; flex-direction: row; gap: 20px;" class="flex_row_mobile_column">

                  <div class="">
                    <img class="card-img-top" src="/assets/img/medium_roast_coffee_whole.jpg" alt="Card image cap">
                    <div class="card-block">
                      <h4 class="card-title">Whole Coffee (1lb)</h4>
                      <p class="card-text">Price: $24.99</p>
                      <a href="" 
                      data-square_id="JMXPEKQUKJX5BJEXGCNIRFVB"
                      data-inventory=""
                      style="pointer-events: none; background-color:red;"

                      data-name="Medium Roast Whole Coffee (1lb)" 
                      data-price="24.99" 
                      
                      data-img_src="/assets/img/medium_roast_coffee_whole.jpg" 
                      
                      data-pounds_per_unit="1"
                      class="add-to-cart btn brown_button addToCartAnchor">Sold Out</a>
                    </div>
                  </div>
                  
                  <div class="">
                    <img class="card-img-top" src="/assets/img/medium_roast_coffee_ground.jpg" alt="Card image cap">
                    <div class="card-block">
                      <h4 class="card-title">Ground Coffee (1lb)</h4>
                      <p class="card-text">Price: $24.99</p>
                      <a href="" 
                      data-square_id="BC4RUILZ46SYMFOWSVIZXE6F"
                      data-inventory=""
                      style="pointer-events: none; background-color:red;"

                      data-name="Medium Roast Ground Coffee (1lb)" 
                      data-price="24.99" 
                      data-img_src="/assets/img/medium_roast_coffee_ground.jpg" 
                      data-pounds_per_unit="1"
                      class="add-to-cart btn brown_button addToCartAnchor">Sold Out</a>
                    </div>
                  </div>

                </div>

                <!-- <div class="">
                  <img class="card-img-top" src="/assets/img/medium_roast_coffee_ground.jpg" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="card-title">Rumbo Al Sur<br>Ground Coffee (8oz)</h4>
                    <p class="card-text">Price: $13.99</p>
                    <a href="" 
                    data-square_id="7MEL7QXG4PRVEE7MNND3FBMG"
                    data-inventory=""
                    style="pointer-events: none; background-color:red;"

                    data-name="Medium Roast Rumbo Al Sur Ground Coffee (8oz)" 
                    data-price="13.99" 
                    data-img_src="/assets/img/medium_roast_coffee_ground.jpg" 
                    data-pounds_per_unit="1"
                    class="add-to-cart btn brown_button addToCartAnchor">Sold Out</a>
                  </div>
                </div> -->

                <!-- 1 -->
                <div style="margin-left: auto; margin-right: auto;" class="">
                  <!-- <img class="card-img-top" src="/assets/img/dark_roast_coffee_whole.jpg" alt="Card image cap"> -->
                  <div id="carouselIndicatorsRumboMediumGround" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselIndicatorsRumboMediumGround" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselIndicatorsRumboMediumGround" data-slide-to="1"></li>
                      <li data-target="#carouselIndicatorsRumboMediumGround" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img loading="lazy" class="d-block" src="/assets/img/chiapas-medium1.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img loading="lazy" class="d-block" src="/assets/img/chiapas-medium2.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img loading="lazy" class="d-block" src="/assets/img/chiapas-medium3.jpg" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselIndicatorsRumboMediumGround" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselIndicatorsRumboMediumGround" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <div class="card-block">
                    <h4 class="card-title">Rumbo Al Sur<br>Ground Coffee (8oz)</h4>
                    <p class="card-text">Price: $13.99</p>
                    <a href="" 
                    data-square_id="7MEL7QXG4PRVEE7MNND3FBMG"
                    data-inventory=""
                    style="pointer-events: none; background-color:red;"

                    data-name="Rumbo Al Sur Medium Ground Coffee (8oz)" 
                    data-price="13.99" 
                    
                    data-img_src="/assets/img/chiapas-medium1.jpg" 
                    
                    data-pounds_per_unit="1"
                    class="add-to-cart btn brown_button addToCartAnchor">Sold Out
                    </a>
                  </div>
                </div>

            </div>
<!---             <div style="text-align: center; padding: 10px;" class="large_font"> 
             
            </div>--->
          </section> 

          <span class="section_border border_coffee section_margin">
            <h1 id="dark-roast" style="text-align: center;">Dark Roast</h1>
          </span>
          <section style="gap: 10px; padding: 10px;">
          <div class="flex_row_mobile_column" style="display: flex; justify-content: center; flex-direction: column; gap: 20px;">
<!---               <img class="max_height_viewport" src="/assets/img/coffee_trees_hill.jpg"> --->
              <div  class="flex_row_mobile_column" style="display: flex; justify-content: center; flex-direction: row; gap: 20px;">
                  <div class="">
                    <img class="card-img-top" src="/assets/img/dark_roast_coffee_whole.jpg" alt="Card image cap">
                    <div class="card-block">
                      <h4 class="card-title">Whole Coffee (1lb)</h4>
                      <p class="card-text">Price: $24.99</p>
                      <a href="" 
                      data-square_id="RHIIEP4DDDZXLISJV3VDK3T2"
                      data-inventory=""
                      style="pointer-events: none; background-color:red;"

                      data-name="Dark Roast Whole Coffee (1lb)" 
                      data-price="24.99" 
                      
                      data-img_src="/assets/img/dark_roast_coffee_whole.jpg" 
                      
                      data-pounds_per_unit="1"
                      class="add-to-cart btn brown_button addToCartAnchor">Sold Out
                      </a>
                    </div>
                  </div>
                  
                  <div class="">
                    <img class="card-img-top" src="/assets/img/dark_roast_coffee_ground.jpg" alt="Card image cap">
                    <div class="card-block">
                      <h4 class="card-title">Ground Coffee (1lb)</h4>
                      <p class="card-text">Price: $24.99</p>
                      <a href="" 
                      data-square_id="SDIS2BMLUNIVOWBUS7A7JNGP"
                      data-inventory=""
                      style="pointer-events: none; background-color:red;"

                      data-name="Dark Roast Ground Coffee (1lb)" 
                      data-price="24.99" 
                      data-img_src="/assets/img/dark_roast_coffee_ground.jpg" 
                      data-pounds_per_unit="1"
                      class="add-to-cart btn brown_button addToCartAnchor">Sold Out</a>
                    </div>
                  </div>
                </div>
                <!-- <div class="">
                  <img class="card-img-top" src="/assets/img/dark_roast_coffee_ground.jpg" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="card-title">Rumbo Al Sur Ground Coffee (8oz)</h4>
                    <p class="card-text">Price: $13.99</p>
                    <a href="" 
                    data-square_id="SB3SHA4TOL6XLTJVJOGTNBR4"
                    data-inventory=""
                    style="pointer-events: none; background-color:red;"

                    data-name="Dark Roast Rumbo Al Sur Ground Coffee (8oz)" 
                    data-price="13.99" 
                    data-img_src="/assets/img/dark_roast_coffee_ground.jpg" 
                    data-pounds_per_unit="1"
                    class="add-to-cart btn brown_button addToCartAnchor">Sold Out</a>
                  </div>
                </div> -->

                <!-- 2 -->
                <div style="margin-left: auto; margin-right: auto;" class="">
                  <!-- <img class="card-img-top" src="/assets/img/dark_roast_coffee_whole.jpg" alt="Card image cap"> -->
                  <div id="carouselIndicatorsRumboDarkGround" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselIndicatorsRumboDarkGround" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselIndicatorsRumboDarkGround" data-slide-to="1"></li>
                      <li data-target="#carouselIndicatorsRumboDarkGround" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img loading="lazy" class="d-block" src="/assets/img/chiapas-dark1.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img loading="lazy" class="d-block" src="/assets/img/chiapas-dark2.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img loading="lazy" class="d-block" src="/assets/img/chiapas-dark3.jpg" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselIndicatorsRumboDarkGround" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselIndicatorsRumboDarkGround" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <div class="card-block">
                    <h4 class="card-title">Rumbo Al Sur<br>Ground Coffee (8oz)</h4>
                    <p class="card-text">Price: $13.99</p>
                    <a href="" 
                    data-square_id="SB3SHA4TOL6XLTJVJOGTNBR4"
                    data-inventory=""
                    style="pointer-events: none; background-color:red;"

                    data-name="Rumbo Al Sur Dark Ground Coffee (8oz)" 
                    data-price="13.99" 
                    
                    data-img_src="/assets/img/chiapas-dark1.jpg" 
                    
                    data-pounds_per_unit="1"
                    class="add-to-cart btn brown_button addToCartAnchor">Sold Out
                    </a>
                  </div>
                </div>

            </div>
          </section> 
          
        </div>
      </article>
    </main>

    <script>
      
      document.addEventListener('DOMContentLoaded', async () => {
      const addToCartAnchors = document.getElementsByClassName('addToCartAnchor');

        for await (const anchor of addToCartAnchors) {
          const productId = anchor.getAttribute('data-square_id');

          try {
            const inventoryCount = await fetchInventoryCount(productId);
            updateInventoryDisplay(anchor, inventoryCount);
            // console.log(`anchor: ${anchor} with inventory count= ${inventoryCount}`);
          } catch (error) {
            // Handle the error appropriately
          }
        }
      });

      async function fetchInventoryCount(productId) {
        const response = await fetch(`../server/getInventoryCount.php?catalog_id=${productId}`);
        const data = await response.json();
        console.log(`fetchInventoryCount data = ${data}`);
        return data;
      }

      function updateInventoryDisplay(anchor, count) {
         console.log(`anchor: ${anchor} with inventory count= ${count}`);
        // const inventoryCountElement = document.createElement('span');
        // inventoryCountElement.textContent = count;

        if (count >= 1) {
          anchor.textContent = "Add To Cart";
          // enable clicking style
          // anchor.style = "";
          // save inventory amount
          // anchor["data-inventory"] = `${count}`;
          anchor.setAttribute("style", "");
          // // save inventory amount
          anchor.setAttribute("data-inventory", `${count}`);
        } else {
          // const outOfStockElement = document.createElement('span');
          // outOfStockElement.textContent = 'Out of Stock';
          // anchor.text("Sold Out");
          // // disable clicking style
          anchor.setAttribute("style", "pointer-events: none; background-color:red;");
          // // save inventory amount
          anchor.setAttribute("data-inventory", `${count}`);
          anchor.textContent = "Sold Out";
          // enable clicking style
          // anchor.style = "pointer-events: none; background-color:red;";
          // save inventory amount
          // anchor["data-inventory"] = `${count}`;
        }
      }

      
    </script>
    
    <?php include '../footer.php';?>

    <script src="/assets/js/lib/bootstrap.bundle.min.js"> </script>
  </body>
</html>