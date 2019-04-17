/**** Functions for manipulating the UI ****/
/* global $ localStorage */

let cart;

/* Add movie poster to home page */
function addMoviePoster(section, id, name, image, rating) {
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

function updateCart() {
    $("#cart-count").html(cart.length);
    
    if (cart.length > 0) {
        $("#cart").removeClass("btn-outline-light");
        $("#cart").addClass("btn-info");
    }
    else {
        $("#cart").removeClass("btn-info");
        $("#cart").addClass("btn-outline-light");
    }
}

function addToCart(itemID) {
    cart.push(itemID);
    localStorage.setItem("cart", JSON.stringify(cart));
    console.log(cart);
    updateCart();
    
    // Make toast notification using movie title
    $("#added-toast").html($("#title").html());
    $(".toast").toast("show");
}

function getCart() {
    if (!localStorage.getItem("cart"))
        cart = new Array();
    else
        cart = JSON.parse(localStorage.getItem("cart"));
    updateCart();
}