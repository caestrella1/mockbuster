/**** Functions for manipulating the UI ****/
/* global $ */

function addMoviePoster(id, name, imgEndpoint, rating) {
    let image = "https://image.tmdb.org/t/p/w500/" + imgEndpoint;
    rating = parseFloat(rating) / 2.0;
    $("#top-movies").append(
        `<div class="col-12 col-lg-3 mb-4">` +
            `<div class="movie">` +
                `<div class="movie-poster-container rounded-lg">` +
                    `<img src="${image}" class="movie-poster card-img" alt="${name} poster">` +
                `</div>` +
                `<h5 class="movie-title text-dark mt-2 mb-0">${name}</h5>` +
                `<i class="fas fa-star mr-1 text-warning"></i><span class="text-dark">${rating}</span>` +
            `</div>` +
        `</div>`
    );
}

function admin_newMovie(url="", img="") {
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

/* Updates the color of the cart according to whether or not it's empty */
function updateCartColor() {
    let cartCount = parseInt($("#cart-count").html());
    
    if (cartCount > 0) {
        $("#cart").removeClass("btn-outline-light");
        $("#cart").addClass("btn-info");
    }
    else {
        $("#cart").removeClass("btn-info");
        $("#cart").addClass("btn-outline-light");
    }
}

/* DEBUGGING: test function for updateCartColor */
function incrementCart() {
    let cartCount = parseInt($("#cart-count").html());
    $("#cart-count").html(++cartCount);
    updateCartColor();
}