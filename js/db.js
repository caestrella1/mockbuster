/**** Functions for communicating with the database ****/
/* global $ */

function getAllMovies(n=5) {
    $.ajax({
        type: "GET",
        url: "api/getAllItems.php",
        dataType: "json",
        success: function(movies, status) {
            console.log(movies);
        }
    });
}

/* Pull the movie poster and ID for displaying on home page */
function getMovieInfoShort(id) {
    $.ajax({
        type: "GET",
        url: "api/getMovie.php",
        dataType: "json",
        data: {
            "itemId": id
        },
        success: function(movie, status) {
            addMoviePoster(id, movie.poster);
        }
    });
}

/* Get all the movie's info for displaying on a single page */
function getMovieInfoSingle(id) {
    $.ajax({
        type: "GET",
        url: "api/getMovie.php",
        dataType: "json",
        data: {
            "id": id
        },
        success: function(movie, status) {
            $("#movie-name").html(movie.name);
            $("#movie-desc").html(movie.description);
            $("#movie-poster").attr("src", movie.poster);
            $("#movie-backdrop").attr("src", movie.backdrop);
            $("#movie-rating").html(movie.rating);
            $("#movie-price").html(movie.price);
        }
    });
}

function searchMovies(query) {
    $.ajax({
        type: "GET",
        url: "api/search.php",
        dataType: "json",
        data: {
            "q": query
        },
        success: function(results) {
            
        }
    });
}

function deleteMovie(id) {
    // ask to confirm then execute delete command
    let result = confirm("Are you sure you want to delete this item? This action cannot be undone.");
    if (result) {
        
    }
}

function UpdateMovie(id) {
    // Send admin to update page
}