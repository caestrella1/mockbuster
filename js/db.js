/**** Functions for communicating with the database ****/
/* global $, addMoviePoster */

function getAllMovies() {
    $.ajax({
        type: "GET",
        url: "api/getAllItems.php",
        dataType: "json",
        success: function(movies, status) {
            // TODO: Implement once getAllItems is working
        }
    });
}

function getTopRatedMovies() {
    $.ajax({
        type: "GET",
        url: "api/getTopRatedMovies.php",
        dataType: "json",
        success: function(movies, status) {
            // TODO: Implement once getTopRatedMovies is working
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
            addMoviePoster(id, movie.name, movie.poster, movie.rating); // adds movie to UI
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
    // ask to confirm, then execute 'delete' command
    let result = confirm("Are you sure you want to delete this item? This action cannot be undone.");
    if (result) {
        $.ajax({
            type: "POST",
            url: "api/deleteItem.php",
            dataType: "json",
            data: {
                "id": id
            }
        });
    }
}

function addMovie() {
    $.ajax({
        type: "GET",
        url: "api/addItem.php",
        dataType: "json",
        data: {
            "name": $("#name").val(),
            "description": $("#description").val(),
            "rating": $("#rating").val(),
            "poster": $("#poster").val(),
            "backdrop": $("#backdrop").val(),
            "price": $("#price").val()
        }
    });
}

function updateMovie(id) {
    $.ajax({
        type: "GET",
        url: "api/updateItem.php",
        dataType: "json",
        data: {
            "id": $("#id").html(),
            "name": $("#name").val(),
            "description": $("#description").val(),
            "rating": $("#rating").val(),
            "poster": $("#poster").val(),
            "backdrop": $("#backdrop").val(),
            "price": $("#price").val()
        }
    });
}