/**** Functions for manipulating the UI ****/
/* global $ */

function addMoviePoster(id, imgEndpoint) {
    let image = "https://image.tmdb.org/t/p/w500/" + imgEndpoint;
    $("#top-movies").append(
        `<div class="col-12 col-lg-3 mb-4">` +
            `<a href="movie?id=${id}"><div class="movie shadow">` +
                `<img src="${image}" class="card-img rounded-lg shadow" alt="">` +
            `</div></a>` +
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