<div class="brown_banner" id="top_banner" style="position: relative; height: 185px; font-size: 20px; color: black; margin-bottom: 20px; z-index:10;"> 
  <nav style="position: fixed; width: calc(100vw); right: 0px; padding: 0px 20px 0px 35px;" class="navbar navbar-expand-lg">
  <div style="display: flex; width: 100%;">
    <a style="margin-right: auto;" class="navbar-brand" href="/"><img src="/assets/img/cafepurl_logo.png" alt="cafe purl logo" style="height: 120px;"/></a>

    <button style="background-color: #130d0a; margin-left: auto; height: 30px; justify-content: flex-end; align-self: center;" class="navbar-toggler rounded_corners" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span style="color: white;">&#9776</span>
    </button>
  </div>
  
    
      
    <div style="gap: 15vw; width: 100%; margin-left: auto; margin-right: auto; flex-wrap:nowrap;" class="container-fluid navbar-nav me-auto mb-2 mb-lg-0 collapse collapse-horizontal">
      <ul id="navbarSupportedContent" style="width: 100%; gap: 20px; justify-content: flex-end; text-align: left; flex-wrap: nowrap;" class="navbar-nav me-auto mb-2 mb-lg-0 collapse collapse-horizontal">
          <li style="flex-wrap: nowrap;" class="nav-item">
            <a class="nav-link" href="/coffee/coffee_main.php">Coffee</a>
          </li>
          <li style="flex-wrap: nowrap;" class="nav-item">
            <a class="nav-link" href="/yarn/yarn_main.php">Yarn</a>
          </li>
          <li style="flex-wrap: nowrap;" class="nav-item">
            <a class="nav-link" href="/accessories/accessories_main.php">Accessories</a>
          </li>

          <li style="flex-wrap: nowrap;" class="nav-item">
              <a class="nav-link" href="/about_us.php">About&nbsp;Us</a>
            </li>
          <li style="flex-wrap: nowrap;" class="nav-item">
            <a class="nav-link active" aria-current="page" href="/contact_us.php">Contact&nbsp;Us</a>
          </li>
          
          
      </ul>
    </div>
    
    <div style="display: flex; flex-direction: column; margin-left: auto; ">
    

    <ul style="" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
              <!-- <a class="nav-link active" aria-current="page" href="/"></a> -->
              <button style="color: white; margin: auto; display: flex; flex-direction: row;" type="button" class="btn nav-link" data-toggle="modal" data-target="#cart">&#x1F6D2; 
              <div>(<span style="color: yellow; font-weight: bolder;" class="total-count"></span>)</div></button>
            </li>
    </ul>
    </div>
  </nav>
</div>
<?php
  include 'shopping_cart.php';
?>