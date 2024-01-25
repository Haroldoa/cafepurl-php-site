<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php 
    

    // ini_set( 'error_reporting', E_ALL );
    // ini_set( 'display_errors', true );

    include_once(__DIR__.'/google_head.php');?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafe Purl | Bringing Quality Coffee and Yarn to You</title>
    <meta name="description" content="Home - Cafe Purl | Bringing Quality Coffee and Yarn to You">
    <link rel="stylesheet" href="/assets/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/core/main_style.css">
    
    <link rel="icon" href="/assets/img/cafepurl_logo.png">
  </head>
  <body class="">
  
  <?php include_once(__DIR__.'/google_body.php');?>
	<!--- <script src="index.js"></script> --->
    <?php include_once(__DIR__.'/navbar.php');?>
    <main class="no_overflow">
      <article style="gap: 20px;">
      
        <div style="margin-left: auto; margin-right: auto; text-align: center;" class="d-flex flex-column">
          <h1 style="text-align: center;">Welcome to Caf&eacute; Purl!</h1>
          <p class="large_font" style="padding: 0px 20px 0px 20px;">
          Bringing Quality Coffee and Yarn to You!

          </p>
          <div style="display: flex; justify-content: center;">
              <img class="" src="/assets/img/knitting_with_coffee.jpg">
            </div>
        <h1 style="text-align: center; padding-top:30px; padding-bottom: 20px;" class="">Shop Our Products</h1>
          <section>
    
            <div style="display: flex; justify-content: center;">
              <a href="/coffee/coffee_main.php#light-roast">
               <img alt="light roast coffee product page link" class="top_bottom_margin" style="margin-top:0px"  src="/assets/img/light_roast_banner.jpg">
              </a>
            </div>
            <div style="display: flex; justify-content: center;">
              <a href="/coffee/coffee_main.php#medium-roast">
                <img alt="medium roast coffee product page link" class="top_bottom_margin" src="/assets/img/medium_roast_banner.jpg">
              </a>
            </div>
            <div style="display: flex; justify-content: center;">
              <a href="/coffee/coffee_main.php#dark-roast">
                <img alt="dark roast coffee product page link" class="top_bottom_margin" src="/assets/img/dark_roast_banner.jpg">
              </a>
            </div>
          </section>

          <section>
            <div style="display: flex; justify-content: center;">
              <a href="/yarn/yarn_main.php">
                <img alt="yarn all products selection page link" class="top_bottom_margin" src="/assets/img/yarn_banner.jpg">
              </a>
            </div>
          </section>

          <section>
            <div style="display: flex; justify-content: center;">
              <a href="/accessories/accessories_main.php">
                <img alt="accessories all products selection page link" class="top_bottom_margin" src="/assets/img/accessories_banner_light.jpg">
              </a>
            </div>
          </section>

          <section>
            <div style="display: flex; justify-content: center;">
              <img alt="message join us for a cup of coffee" class="top_bottom_margin" src="/assets/img/join_us_for_cup.jpg">
            </div>
          </section>
          
        </div>
      </article>
    </main>
    
    <?php include_once(__DIR__.'/footer.php');?>

    <script src="/assets/js/lib/bootstrap.bundle.min.js"> </script>
  </body>
</html>