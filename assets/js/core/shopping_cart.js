// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function () {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];

  // Constructor
  function Item(name, price, count, img_src, inventory, square_id, pounds_per_unit) {
    this.name = name;
    this.price = price;
    this.count = count;
    this.img_src = img_src;
    this.inventory = inventory;
    this.square_id = square_id;
    this.pounds_per_unit = pounds_per_unit;
  }

  // display sold out on add to cart or shopping cart
  function displaySoldOut(element){
    // uses jquery
    $(element).css("pointer-events", "none");
    $(element).css("background-color", "red");
    $(element).html("Sold Out");
  }
  // display sold out on add to cart or shopping cart
  function undoSoldOut(element){
    // uses jquery
    $(element).css("pointer-events", "initial");
    $(element).css("background-color", "#483224");
    $(element).html("Add to cart");
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }

  // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }


  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // Add to cart
  obj.addItemToCart = function (name, price, count, img_src, inventory, square_id, pounds_per_unit) {
    console.log(`addItemtoCart(${name}, ${price}, ${count}, ${img_src}, ${inventory}, ${square_id}, ${pounds_per_unit})`);
    var itemInCart = false;
    for (var item in cart) {
        if(name === cart[item].name){
          itemInCart = true;
        }
        if((cart[item].count + 1) > cart[item].inventory ){
            // $('button[data-name="' + cart[item].name + '"].plus-item').css("visibility", "hidden");
            // saveCart();
            // return;
            continue;
            // not enough inventory to add to cart
        }
        else{
            if (cart[item].name === name) {
                cart[item].count++;
                if(cart[item].count  >= cart[item].inventory ){
                    displaySoldOut("a[data-name='" + cart[item].name + "']");
                }
                saveCart();
                return;
              }
        }
      
    }
    if(itemInCart === false){
      var item = new Item(name, price, count, img_src, inventory, square_id, pounds_per_unit);
      cart.push(item);
      saveCart();
    }
    
  }
  // Set count from item
  obj.setCountForItem = function (name, count) {
    for (var i in cart) {
      if (cart[i].name === name) {
        if(count > cart[i].inventory ){
            cart[i].count = cart[i].inventory;
            displaySoldOut("a[data-name='" + cart[i].name + "']");
            return;
            // not enough inventory to add to cart
        }
        else{
            cart[i].count = count;
            break;
        }
        
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function (name) {
    // console.log("removeItemFromCart called");
    // console.log("name = " + name);
    for (var item in cart) {
        // console.log(cart[item]);
      if (cart[item].name === name) {
        cart[item].count--;
        // console.log("cartItem count--");
        if (cart[item].count === 0) {
          cart.splice(item, 1);
        }
        else{
            undoSoldOut("a[data-name='" + cart[item].name + "']");
        }
        break;
      }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function (name) {
    for (var item in cart) {
      if (cart[item].name === name) {
        undoSoldOut("a[data-name='" + cart[item].name + "']");
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function () {
    for (var item in cart) {
      undoSoldOut("a[data-name='" + cart[item].name + "']");
    }
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function () {
    var totalCount = 0;
    for (var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function () {
    var totalCart = 0;
    for (var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function () {
    var cartCopy = [];
    for (i in cart) {
      item = cart[i];
      itemCopy = {};
      for (p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function (event) {
  event.preventDefault();
  var name = $(this).data('name');
  var img_src = $(this).data('img_src');
  var price = Number($(this).data('price'));
  var inventory = Number($(this).data('inventory'));
  var squareId = $(this).data('square_id');
  var pounds_per_unit = $(this).data('pounds_per_unit');
  shoppingCart.addItemToCart(name, price, 1, img_src, inventory, squareId, pounds_per_unit);
  displayCart();
});

// Clear items
$('.clear-cart').click(function () {
  shoppingCart.clearCart();
  displayCart();
});


function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "";
  // Create our number formatter.
  const formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
    
      // These options are needed to round to whole numbers if that's what you want.
      //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
      minimumFractionDigits: 2,
      //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
    });
  for (var i in cartArray) {
    // remove items not in stock
    if(cartArray[i].count > cartArray[i].inventory){
        shoppingCart.removeItemFromCartAll(cartArray[i].name);
        return;
    }
    // console.log("displayCart[i].name=" + cartArray[i].name);
    output += "<tr>"
      + "<td style='font-weight: bolder;'>" + cartArray[i].name + "<br>(" + formatter.format(cartArray[i].price) + ")</td>"
      + "<td><img class='thumbnail' alt='" + cartArray[i].name + "' " + "src='" + cartArray[i].img_src + "'>" + "</td>"
      + "<td></td>"
      + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name='" + cartArray[i].name + "'>-</button>"
      + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
      + "<button class='plus-item btn btn-primary input-group-addon' data-name='" + cartArray[i].name + "'>+</button></div></td>"
      // + "<td><button class='delete-item btn btn-danger' data-name='" + cartArray[i].name + "'>X</button></td>"
      + " = "
      + "<td>" + formatter.format(cartArray[i].total) + "</td>"
      + "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(formatter.format(shoppingCart.totalCart()));
  $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function (event) {
  var name = $(this).data('name');
//   console.log("name below= " + name);
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
})


// -1
$('.show-cart').on("click", ".minus-item", function (event) {
  var name = $(this).data('name');
//   console.log("name below= " + name);
  shoppingCart.removeItemFromCart(name);
  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function (event) {
  var name = $(this).data('name');
//   console.log("name below= " + name);
  shoppingCart.addItemToCart(name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function (event) {
  var name = $(this).data('name');
  var count = Number($(this).val());
  shoppingCart.setCountForItem(name, count);
  displayCart();
});

// Example POST method implementation:
async function postData(url = "", data = {}) {
  // Default options are marked with *
  const response = await fetch(url, {
    method: "POST", // *GET, POST, PUT, DELETE, etc.
    mode: "cors", // no-cors, *cors, same-origin
    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
    credentials: "same-origin", // include, *same-origin, omit
    headers: {
      "Content-Type": "application/json",
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: "follow", // manual, *follow, error
    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    // body: JSON.stringify(data), // body data type must match "Content-Type" header
    body: data,
  });
  return response.json(); // parses JSON response into native JavaScript objects
}

function redirectToSquareCheckout(){
// send shoppingCart
  cartJSON = JSON.stringify(shoppingCart.listCart());
  console.log(cartJSON);
  postData("/server/getCheckoutLink.php", cartJSON).then((data) => {
  console.log(data); // JSON data parsed by `data.json()` call
  window.setTimeout(function(){

    // If you give the link immediately to square there is an error
    window.location.href = data;

}, 1000);
});
}

displayCart();