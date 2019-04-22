/* global $ localStorage */
let cart;

function getCart() {
    if (!localStorage.getItem("cart"))
        cart = new Array();
    else
        cart = JSON.parse(localStorage.getItem("cart"));
    updateCart();
}

/**/
function updateCart(itemID=null) {
    $("#cart-count").html(cart.length);
    
    if (cart.length > 0) {
        $("#cart").removeClass("btn-outline-light");
        $("#cart").addClass("btn-info");
    }
    else {
        $("#cart").removeClass("btn-info");
        $("#cart").addClass("btn-outline-light");
    }
    
    if (itemID) {
        if (cart.includes(itemID)) {
            $("#add-cart").val(1);
            $("#add-cart i").addClass("fa-minus-circle").removeClass("fa-cart-plus");
            $("#add-cart").addClass("btn-outline-light").removeClass("btn-info");
            $("#buy-movie").html(`Remove from Cart`);
        }
        else {
            $("#add-cart").val(0);
            $("#add-cart i").addClass("fa-cart-plus").removeClass("fa-minus-circle");
            $("#add-cart").addClass("btn-info").removeClass("btn-outline-light");
            $("#buy-movie").html(`Add to Cart`);
        }
    }
}

/* Run on #add-cart button click to determine if we need to add or remove from cart */
function cartAction(itemID) {
    // if value is 1 (true), the item is in the cart and should be removed
    if ($("#add-cart").val() == 1) {
        cart.forEach(function(item, i) {
            if (cart[i] == itemID) {
                cart.splice(i, 1);
                return;
            }
        });
    }
    // if value is 0 (false), the item is NOT in the cart and should be added
    else {
        cart.push(itemID);
        $("#added-toast").html($("#title").html());
        $(".toast").toast("show");
    }
    
    localStorage.setItem("cart", JSON.stringify(cart));
    console.log(cart);
    updateCart(itemID);
}

function addMoviesToCartPage(){
    if (!localStorage.getItem("cart"))
        cart = new Array();
    else
        cart = JSON.parse(localStorage.getItem("cart"));
    
    for(let i = 0; i < cart.length; i++){
        addItemToCartPage(cart[i]);
    }
}

// need to fix poster
function appendRowToCartTable(obj){
  let str = '<tr class="tableRow">'+
                '<td>' + 
                    '<div class="movie-poster-container">' +
                        ' <img class="movie-poster card-img" src="' + "https://image.tmdb.org/t/p/w500/" + obj["poster"] + '" alt="pic">' +
                    '</div>' +
                    obj["price"] + 
                    '<button class="btn btn-primary" id="remove">Remove Item</button>' + 
                '</td>' +
            '</tr>';
    $("#tableBody").append(str);
    $("#cartResults").show();
}