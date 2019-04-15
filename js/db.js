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
            let imgBase = "https://image.tmdb.org/t/p/w500/";
            let rating = (parseFloat(movie.rating) / 2.0).toFixed(1);
            addMoviePoster(id, movie.name, imgBase + movie.poster, rating); // adds movie to UI
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
            "itemId": id
        },
        success: function(movie, status) {
            let imgBasePoster = "https://image.tmdb.org/t/p/w500";
            let imgBaseBD = "https://image.tmdb.org/t/p/original";
            $("#title").html(movie.name);
            $("#desc").html(movie.description);
            $("#poster").attr("src", imgBasePoster + movie.poster);
            $("#backdrop").css("background-image", `url(${imgBaseBD + movie.backdrop})`);
            
            let rating = (parseFloat(movie.rating) / 2.0).toFixed(1);
            $("#rating").html(rating + "/5");
            $("#price").html(movie.price);
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