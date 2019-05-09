/* global $ localStorage location addItemToCartPage */

var cart /* cart containing movie IDs */

/*** Global Cart functions ***/

function getCart() {
    if (!localStorage.getItem("cart"))
        cart = new Array();
    else
        cart = JSON.parse(localStorage.getItem("cart"));
    updateCart();
}

function updateCart(itemID=null) {
    $("#cart-count").html(cart.length);
    
    if (cart.length > 0) {
        $("#cart").removeClass("btn-outline-light");
        $("#cart").addClass("btn-theme-light");
    }
    else {
        $("#cart").removeClass("btn-theme-light");
        $("#cart").addClass("btn-outline-light");
    }
    
    if (itemID) {
        if (cart.includes(itemID)) {
            $("#add-cart").val(1);
            $("#add-cart i").addClass("fa-minus-circle").removeClass("fa-cart-plus");
            $("#add-cart").addClass("btn-danger").removeClass("btn-theme");
            $("#buy-movie").html(`Remove from Cart`);
        }
        else {
            $("#add-cart").val(0);
            $("#add-cart i").addClass("fa-cart-plus").removeClass("fa-minus-circle");
            $("#add-cart").addClass("btn-theme").removeClass("btn-danger");
            $("#buy-movie").html(`Buy for $${$("#price").val()}`);
        }
    }
}

/* Single movie: Run on #add-cart button click to determine if we need to add or remove from cart */
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
        $(".toast").removeClass("invisible").addClass("visible");
        $(".toast").toast("show");
        
        /* add .invisible so that the container doesn't overlap page elements on hover */
        $('.toast').on('hidden.bs.toast', function () {
          $(".toast").addClass("invisible").removeClass("visible");
        });
    }
    
    localStorage.setItem("cart", JSON.stringify(cart));
    console.log(cart);
    updateCart(itemID);
}

/*** Cart Page ***/

function getCartPage() {
    localStorage.subtotal = 0;
    localStorage.discountPercent = 0;
    localStorage.discountAmount = 0;
    localStorage.grandTotal = 0;
    
    getCart();
    
    for(let i = 0; i < cart.length; i++) {
        /* found in db.js */
        addItemToCartPage(cart[i]);
    }
    
    if (cart.length == 0) {
        $("#cart-populated").addClass("d-none");
        $("#cart-empty").removeClass("d-none");
    }
    else {
        $("#cart-populated").removeClass("d-none");
        $("#cart-empty").addClass("d-none");
    }
}

function appendRowToCartTable(obj){
    let year = obj.yearReleased.substr(0, 4);
    
    let str =   `<div class="card mb-3">` +
                    `<table class="table table-hover table-borderless m-0">` +
                        `<tr>` +
                            `<td class="td-poster">` +
                                `<a href="movie.php?id=${obj["itemId"]}">` +
                                `<div class="hover-shadow">` +
                                    `<img class="movie-poster card-img" src="${obj["poster"]}" alt="pic">` +
                                `</div></a>` +
                            `</td>` +
                
                            `<td class="align-middle">${obj["name"]} (${year})<br>` +
                            `<span class="font-weight-bold text-success">$${obj["price"]}<span></td>` +
                            // `<td class="td-info align-middle">$${obj["price"]}</td>` +
                            
                            `<td class="align-middle text-right">` +
                                `<button class="btn btn-outline-danger rounded-pill mr-2" id="remove" value="${obj['itemId']}">` +
                                    `<i class="fas fa-trash"></i>` +
                                `</button>` +
                            `</td>` + 
                        `</tr>` +
                    `</table>` +
                `</div>`;
            
    $("#item-table").append(str);
    $("#cartResults").show();
}

function removeItem(item) {
    console.log('button clicked');
	console.log(item.val());
	
	// this will only be called when the cart is at least length 1
	// so no need to checkif cart is null
	console.log(JSON.parse(localStorage.getItem("cart")));
	let cart = JSON.parse(localStorage.getItem("cart"));
	let temp = new Array();
	for(let i = 0; i < cart.length; i++){
	    if(cart[i] != item.val()) // will remove all instances
	        temp.push(cart[i]);
	}
// 	console.log("temp: " + temp);
	localStorage.setItem("cart", JSON.stringify(temp));
	console.log(JSON.parse(localStorage.getItem("cart")));
	location.reload(); //redirecting to a new file
}

function completePurchase(orderTotal) {
    let confirmation = parseInt(Math.random() * 1000000) + 1;
    if (!localStorage.getItem("cart"))
        cart = new Array();
    else
        cart = JSON.parse(localStorage.getItem("cart"));
    
    for(let i = 0; i < cart.length; i++){
        addItemToOrder(cart[i], confirmation, localStorage.grandTotal);
    }
    $("#tableBody").html("");
    // $("#tableBody").html("Success! Your order went through<br>Confirmation Number: " + confirmation);
    updateCartTotal();
    localStorage.setItem("cart", new Array());
    alert("Success! Your order went through\nConfirmation Number: " + confirmation);
    clearCart();
    window.location.replace("index.php");
}

function addItemToOrder(id, confirmation, orderTotal) {
    $.ajax({
        type: "GET",
        url: "api/addItemToOrder.php",
        dataType: "json",
        data: { 
            "id": id,
            "conNum": confirmation,
            "orderTotal": parseFloat(orderTotal),
        },
        success: function(data,status) {
            console.log(status);
        }
    });
}

function clearCart() {
    console.log("clear button clicked");
    cart = new Array();
    localStorage.setItem("cart", cart);
    $("#item-table").html("");
    // doesnt update cart total
    updateCart();
    location.reload();
}

function applyDiscount() {
    $.ajax({
        type: "GET",
        url: "api/getPromoCode.php",
        dataType: "json",
        data: { "code": $("#promo-input").val() },
        
        success: function(data,status) {
            console.log("data: " + data['discount']);
            if(data['discount'] == 0.0){
                $("#promoOut").html("Invalid Promo Code!");
                $("#promoOut").addClass("text-danger").removeClass("text-success");
                $("#discount-field").removeClass("d-flex").addClass("d-none");
            }
            else {
                localStorage.discountPercent = data['discount'] * 100;
                $("#promoOut").html("Success! " + localStorage.discountPercent + "% discount applied!");
                
                $("#promoOut").addClass("text-success").removeClass("text-danger");
                $("#discount-field").removeClass("d-none").addClass("d-flex");
                
                localStorage.discountAmount = (localStorage.subtotal * data['discount']);
                $("#discount").html(localStorage.discountAmount);
                
                localStorage.grandTotal = (localStorage.subtotal - localStorage.discountAmount).toFixed(2);
                updateCartTotal();
            }
        
        }
    
    });
}

function updateCartTotal() {
    $("#subtotal").html("$" + localStorage.subtotal);
    $("#finalPrice").html("$" + localStorage.grandTotal);
}