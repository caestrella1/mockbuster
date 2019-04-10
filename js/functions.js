/**** Functions for manipulating the UI ****/
/* global $ */

function newMovie(id="", url="", img="") {
    $(`${id}`).append(
        `<div class="col-12 col-lg-3 mb-4">` +
            `<a href="${url}"><div class="movie shadow">` +
                `<img src="${img}" class="card-img rounded-lg shadow" alt="">` +
            `</div></a>` +
        `</div>`
    );
}