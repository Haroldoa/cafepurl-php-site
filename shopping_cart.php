<?php 
            // dev mode
            // ini_set('display_errors', 1);
            // ini_set('display_startup_errors', 1);
            // error_reporting(E_ALL);
            function localApiCall($url_path, $param_name, $param_value){

            
            $url = "https://" . ($_SERVER["SERVER_NAME"] . $url_path . "?" . $param_name . "=" . urlencode($param_value));
						if($_SERVER["SERVER_NAME"] == "localhost"){
							$url = ($_SERVER["SERVER_NAME"] . $url_path . "?" . $param_name . "=" . urlencode($param_value));
						}
						
            // make request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
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
          ?>

<!-- <!doctype html>
<html>
  <head> -->
    <link rel="stylesheet" href="/assets/css/core/shopping_cart.css">
    <!-- <link rel="stylesheet" href="/assets/css/lib/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="/assets/css/core/main_style.css"> --> 


  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
	integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->

<!-- Nav -->
<!-- <nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded">
	<div class="row">
		<div class="col">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</button>
		</div>
	</div>
</nav> -->


<!-- Main -->
<!--- <div class="container"> 
	<div class="row">
		<div class="col">
			<div class="card" style="width: 20rem;">
				<img class="card-img-top" src="http://www.azspagirls.com/files/2010/09/orange.jpg" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Orange</h4>
					<p class="card-text">Price: $0.50</p>
					<a href="#" 
          data-square_id="

          "
          data-name="Medium Roast Coffee Whole" data-price="0.50" data-img_src="http://www.azspagirls.com/files/2010/09/orange.jpg" class="add-to-cart btn brown_button">Add to cart</a>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card" style="width: 20rem;">
				
				<div class="card-block">
					<h4 class="card-title">Banana
          <img class="card-img-top" src="http://images.all-free-download.com/images/graphicthumb/vector_illustration_of_ripe_bananas_567893.jpg" alt="Card image cap">
          </h4>
					<p class="card-text">Price: $1.22</p>
					<a href="#" data-name="Banana" data-price="1.22" class="add-to-cart btn btn-primary">Add to cart</a>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card" style="width: 20rem;">
				<img class="card-img-top" src="https://3.imimg.com/data3/IC/JO/MY-9839190/organic-lemon-250x250.jpg" alt="Card image cap">
				<div class="card-block">
					<h4 class="card-title">Lemon</h4>
					<p class="card-text">Price: $5</p>
					<a href="#" data-name="Lemon" data-price="5" class="add-to-cart btn btn-primary">Add to cart</a>
				</div>
			</div>
		</div>
	</div>
</div>
--->


<!-- Modal harold-->
<div style="z-index: 9999;" class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div style="z-index: 9999;" class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Shopping Cart</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			<div class="modal-body">
				<table class="show-cart table">

				</table>
				<div style='text-align: right; font-weight: bolder;'>Total price: <span class="total-cart"></span></div>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button class="clear-cart btn btn-danger">Clear Cart</button>
				<button onClick="redirectToSquareCheckout();" type="button" class="btn btn-primary">Checkout</button>
			</div>
		</div>
	</div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script> -->
<!-- <script src ="/assets/js/lib/jquery-3.5.1.slim.min.js"></script>
<script src="/assets/js/lib/popper.min.js"></script>
<script src="/assets/js/lib/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
	integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
	integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script> -->
<!-- <script src="/assets/js/core/shopping_cart.js">// 
</script> -->
<!-- 
</body>
<html> -->