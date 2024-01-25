<!-- Facebook pixel inserted here -->
<div id="schemaDiv" style="display: none;">

</div>

<script>
//   inventory add async
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
        // also generates schema.org for google search
        addToFacebookPixel("Cafe Purl", anchor.getAttribute("data-name"), anchor.getAttribute("data-square_id"), window.location.href, "https://cafepurl.com" + anchor.getAttribute("data-img_src"), "all_sold_products", anchor.getAttribute("data-price"));
      }

      function addToFacebookPixel(brand, title, product_id, url, imgHref, group_id, price){
        // each product needs:
        // <div itemscope itemtype="http://schema.org/Product">
            // <meta itemprop="brand" content="facebook">
            // <meta itemprop="name" content="Facebook T-Shirt">
            // <meta itemprop="description" content="Unisex Facebook T-shirt, Small">
            // <meta itemprop="productID" content="facebook_tshirt_001">
            // <meta itemprop="url" content="https://example.org/facebook">
            // <meta itemprop="image" content="https://example.org/facebook.jpg">
            // <div itemprop="value" itemscope itemtype="http://schema.org/PropertyValue">
            //     <span itemprop="propertyID" content="item_group_id"></span>
            //     <meta itemprop="value" content="fb_tshirts"></meta>
            // </div>
            // <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            //     <link itemprop="availability" href="http://schema.org/InStock">
            //     <link itemprop="itemCondition" href="http://schema.org/NewCondition">
            //     <meta itemprop="price" content="7.99">
            //     <meta itemprop="priceCurrency" content="USD">
            // </div>
        // </div>
        var individual_product_div = document.createElement("div");
        individual_product_div.innerHTML = `
        <div itemscope itemtype="http://schema.org/Product">
            <meta itemprop="brand" content="${brand}">
            <meta itemprop="name" content="${title}">
            <meta itemprop="description" content="${title}">
            <meta itemprop="productID" content="${product_id}">
            <meta itemprop="url" content="${url}">
            <meta itemprop="image" content="${imgHref}">
            <div itemprop="value" itemscope itemtype="http://schema.org/PropertyValue">
                <span itemprop="propertyID" content="item_group_id"></span>
                <meta itemprop="value" content="${group_id}"></meta>
            </div>
            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <link itemprop="availability" href="http://schema.org/InStock">
                <link itemprop="itemCondition" href="http://schema.org/NewCondition">
                <meta itemprop="price" content="${price}">
                <meta itemprop="priceCurrency" content="USD">
            </div>
        </div>`;

      const main_schema_div = document.getElementById("schemaDiv");
        main_schema_div.appendChild(individual_product_div);
      }

</script>

<footer style="padding-top: 20px;">
    <div id="accordion">
        <div class="card">
            <div class="card-header brown_banner" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color: white;">
                Café Purl &blacktriangledown;
                </button>
            </h5>
            </div>

            <div id="collapseOne" class="collapse normal_collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                A place that knits us together!
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header brown_banner" id="headingTwo">
            <h5 class="mb-0" style="color: white;">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: white;">
                    Shop &blacktriangledown;
                </button>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse normal_collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body" style="display: flex; flex-direction: column">
                <a class="brown_links" href="/coffee/coffee_main.php">Coffee</a>
                <a class="brown_links" href="/yarn/yarn_main.php">Yarn</a>
                <a class="brown_links" href="/accessories/accessories_main.php">Accessories</a>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header brown_banner" id="headingThree">
            <h5 class="mb-0" style="color: white;">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: white;">
                Our Coffee   &blacktriangledown;
                </button>
            </h5>
            </div>
            <div id="collapseThree" class="collapse normal_collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
            The beans are grown using sustainable practices which creates and maintains conditions in which the people and nature can exist in productive harmony. So, the coffee “cherries” are hand picked, milled, washed, sun dried and roasted. All this from our family farm in Nicaragua. 
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header brown_banner" id="headingFour">
            <h5 class="mb-0" style="color: white;">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color: white;">
                The Flavor   &blacktriangledown;
                </button>
            </h5>
            </div>
            <div id="collapseFour" class="collapse normal_collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
            Natural process coffees will bring an earthy and intense flavor, often with notes of deep fruit and complex sweetness.<br>
            The flavor that brings coffee lovers together.
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header brown_banner" id="headingFive">
            <h5 class="mb-0" style="color: white;">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color: white;">
                Info  &blacktriangledown;
                </button>
            </h5>
            </div>
            <div id="collapseFive" class="collapse normal_collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
            Ships in 3-5 business days in the U.S.
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header brown_banner" id="headingSix">
            <h5 class="mb-0" style="color: white;">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="color: white;">
                Payment Options  &blacktriangledown;
                </button>
            </h5>
            </div>
            <div id="collapseSix" class="collapse normal_collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">
                <img style="width: 60px" alt="visa payment method" src="/assets/img/visa.png">
                <img style="width: 60px" alt="mastercard payment method" src="/assets/img/mastercard.png">
                <img style="width: 60px" alt="american express payment method" src="/assets/img/americanexpress.png">
                <img style="width: 60px" alt="Discover payment method" src="/assets/img/discover.png">
                <img style="width: 60px" alt="JCB payment method" src="/assets/img/jcb.png">
                <img style="width: 60px" alt="Google pay payment method" src="/assets/img/googlepay.png">
                <img style="width: 60px" alt="Apple pay payment method" src="/assets/img/applepay.png">
                <img style="width: 60px" alt="Afterpay pay payment method" src="/assets/img/afterpay.png">
            </div>
            </div>
        </div>
    </div>
    <div style="gap: 20px; margin-top: 20px; padding: 5px;" class="d-flex flex-row">
        <div style="text-align: center; margin: auto; gap: 20px; justify-content: center;" class="d-flex flex-row">
        <span style="margin: auto;"><strong>Find Us On</strong></span>
            <a class="nav-link" target="_blank" rel="noopener noreferrer"  href="https://www.facebook.com/CafePurl/"><img loading="lazy" class="navbar_social_media_link" alt="Facebook Cafe Purl Link" src="/assets/img/Facebook_Logo.png"/></a>
            <a class="nav-link" target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/cafe.purl/"><img class="navbar_social_media_link" loading="lazy" alt="Instagram Cafe Purl Link" src="/assets/img/Instagram_icon.png"/></a>

        </div>
        
        
    </div>
</footer>

<script src ="/assets/js/lib/jquery-3.5.1.slim.min.js"></script>
<script src="/assets/js/lib/popper.min.js"></script>
<script src="/assets/js/lib/bootstrap.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
	integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script> -->
<script src="/assets/js/core/shopping_cart.js">// 
</script>