/**** Functions for manipulating the UI ****/
/* global $ localStorage */

let cart;

/* Add movie poster to home page */
function addMoviePoster(section, id, name, image, rating, price) {
    // console.log(price);
    $(`${section}`).append(
        `<div class="col-12 col-lg-3 mb-4">` +
            `<a class="movie" href="movie.php?id=${id}">` +
                `<div class="movie-poster-container position-relative rounded-lg">` +
                    `<img src="${image}" class="movie-poster card-img" alt="${name} poster">` +
                    `<div class="badge badge-pill badge-info movie-rating shadow position-absolute mt-2 mr-2 p-2">` +
                        `<span class="rating">${rating}</span><i class="fas fa-star ml-1"></i>` +
                    `</div>` +
                `</div>` +
                `<h5 class="movie-title text-dark mt-2 mb-0">${name}</h5>` +
                `<h6 class="text-muted">$${price}</h6>` +
            `</a>` +
        `</div>`
    );
}

/* Admin movie item (not being used yet) */
function addMovieAdmin(url="", img="") {
    $("#all-movies").append(
        `<div class="col-12 col-lg-3 mb-4">` +
            `<a href="${url}"><div class="movie shadow">` +
                `<img src="${img}" class="card-img rounded-lg shadow" alt="">` +
            `</div></a>` +
            `<button class="btn btn-primary update-movie">Update</button>` +
            `<button class="btn btn-outline-danger update-movie">Delete</button>` +
        `</div>`
    );
}

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

function cartAction(id) {
    // if value is 1 (true), the item is in the cart and should be removed
    // if value is 0 (false), the item is NOT in the cart and should be added
    if ($("#add-cart").val() == 1) removeFromCart(id);
    else addToCart(id);
}

function addToCart(itemID) {
    cart.push(itemID);
    localStorage.setItem("cart", JSON.stringify(cart));
    console.log(cart);
    updateCart(itemID);
    
    // Make toast notification using movie title
    $("#added-toast").html($("#title").html());
    $(".toast").toast("show");
}

function removeFromCart(itemID) {
    cart.forEach(function(item, i) {
        if (cart[i] == itemID) {
            cart.splice(i, 1);
            return;
        }
    });
    
    cart = cart;
    localStorage.setItem("cart", JSON.stringify(cart));
    console.log(cart);
    updateCart(itemID);
    
    // Make toast notification using movie title
    // $("#added-toast").html($("#title").html());
    // $(".toast").toast("show");
}

function getCart() {
    if (!localStorage.getItem("cart"))
        cart = new Array();
    else
        cart = JSON.parse(localStorage.getItem("cart"));
    updateCart();
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

