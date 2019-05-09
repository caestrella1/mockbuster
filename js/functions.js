/*** Functions for manipulating the UI ***/
/* global $ localStorage */

/* Add movie poster to home page */
function addMoviePoster(section, id, name, image, rating, price) {
    $(`${section}`).append(
        `<div class="col-6 col-md-4 col-lg-3 mb-4">` +
            `<a class="movie" href="movie.php?id=${id}">` +
                `<div class="bg-dark hover-shadow position-relative rounded-lg">` +
                    `<img src="${image}" class="movie-poster card-img" alt="${name} poster">` +
                    `<div class="badge badge-pill badge-theme movie-rating shadow position-absolute mt-2 mr-2 p-2">` +
                        `<span class="rating">${rating}</span><i class="fas fa-star ml-1"></i>` +
                    `</div>` +
                `</div>` +
            `</a>` +
            `<h5 class="movie-title mt-2 mb-0">${name}</h5>` +
            `<h6 class="text-muted">$${parseFloat(price).toFixed(2)}</h6>` +
        `</div>`
    );
}

/* Admin movie item (not being used yet) */
function addMovieAdmin(id, url, name, img, rating, price) {
    $("#all-movies").append(
        `<div class="col-6 col-md-4 col-lg-3 mb-4">` +
                `<div class="admin-movie hover-shadow bg-dark position-relative rounded-lg">` +
                
                    /* action sheet overlay */
                    `<div class="movie-overlay position-absolute w-100 h-100">` +
                    
                        `<div class="card-body h-100 d-flex flex-column justify-content-center">` +
                        
                            `<a class="btn btn-info rounded-pill my-2" href="movie.php?id=${id}">` +
                            `<i class="fas fa-eye mr-0 mr-md-2"></i><span class="d-none d-md-inline">View</span></a>` +
                            
                            `<a class="btn btn-primary rounded-pill my-2" href="edit.php?productId=${id}">` +
                            `<i class="fas fa-edit mr-0 mr-md-2"></i><span class="d-none d-md-inline">Edit</span></a>` +
                            
                            `<form action="api/deleteItem.php" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">` +
                                `<button class="m-delete btn btn-block btn-danger rounded-pill my-2" name="id" value="${id}">` +
                                `<i class="fas fa-trash mr-0 mr-md-2"></i><span class="d-none d-md-inline">Delete<span></button>` +
                            `</form>` +
                            
                        `</div>` +
                        
                    `</div>` +
                    
                    /* the movie poster */
                    `<img src="${img}" class="movie-poster card-img" alt="${name} poster">` +
                `</div>` +
                
            `<h5 class="movie-title text-dark mt-2 mb-0">${name}</h5>` +
            `<h6 class="text-muted">$${parseFloat(price).toFixed(2)}</h6>` +
        `</div>`
    );
}

function imageExists(url) {
    let image = new Image();
    image.src = url;
    return image.width != 0;
}

function validatePoster(imageURL) {
    if (imageURL == '' || !imageExists(imageURL)) {
        return "backend/placeholder.png";
    }
    return imageURL;
}

function showMovieImages() {
    let img = $("#input-poster").val();
    $("#poster").attr("src", img);
    $("#backdrop").css("background-image", `url(${$("#input-backdrop").val()})`);
}

function setStars(rating) {
    $("#rating").html("");
    // if (action == "inc") rating += 0.5;
    // else if (action == "dec") rating -= 0.5;
    for (let i = 1; i <= 5; i++, rating--) {
        if (rating >= 1) $("#rating").append(`<i class="fas fa-star"></i>`);
        else if (rating == 0.5) $("#rating").append(`<i class="fas fa-star-half-alt"></i>`);
        else $("#rating").append(`<i class="far fa-star"></i>`);
    }
}

function getRating(action) {
    let rating = parseFloat($("#rating-count").val());
    
    if (action == "rating-down") {
        if (rating > 0) rating -= 0.5;
    }
    else if (action == "rating-up") {
        if (rating < 5) rating += 0.5;
    }
    
    /* Verify valid button states */
    if (rating == 0) {
            $("#rating-down").attr("disabled", true);
            $("#rating-up").attr("disabled", false);
    }
    else if (rating == 5) {
        $("#rating-up").attr("disabled", true);
        $("#rating-down").attr("disabled", false);
    }
    else {
        $("#rating-down").attr("disabled", false);
        $("#rating-up").attr("disabled", false);
    }
    
    $("#rating-count").val(rating);
    setStars(rating);
}