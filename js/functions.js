/*** Functions for manipulating the UI ***/
/* global $ localStorage */

/* Add movie poster to home page */
function addMoviePoster(section, id, name, image, rating, price) {
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
function addMovieAdmin(id, url, name, img, rating, price) {
    $("#all-movies").append(
        `<div class="col-12 col-lg-3 mb-4">` +
            `<a href="movie.php?id=${id}"><div class="movie shadow">` +
                `<img src="${img}" class="card-img rounded-lg shadow" alt="">` +
            `</div></a>` +
            `<a class="btn btn-outline-primary mr-2" href='addProducts.php?productId=${id}'>Update</a>` +
            `<form action="api/deleteItem.php" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">` +
                `<input name="id" type="hidden" value="${id}">` +
                `<button class="m-delete btn btn-outline-danger mr-2">Delete</button>` +
            `</form>` +
            // `<button class="btn btn-outline-danger delete-movie" val="${id}">Delete</button>` +
        `</div>`
    );
}

