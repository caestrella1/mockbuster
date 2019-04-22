/**** Functions for communicating with the database ****/
/* global $ addMoviePoster updateCart */

function getRecentMovies() {
    $.ajax({
        type: "GET",
        url: "api/getAllItems.php",
        dataType: "json",
        success: function(movies, status) {
            movies.forEach(function(m, i) {
                if (i >= 12) return;
                let base = "https://image.tmdb.org/t/p/w500/";
                let rating = (parseFloat(m.rating) / 2.0).toFixed(1);
                addMoviePoster("#recent-movies", m.itemId, m.name, base + m.poster, rating, m.price); // adds movie to UI
            });
        }
    });
}

function getTopRatedMovies() {
    $.ajax({
        type: "GET",
        url: "api/getTopRatedMovies.php",
        dataType: "json",
        data: { "minRating": 0 },
        success: function(movies, status) {
            movies.forEach(function(m, i) {
                if (i >= 12) return;
                let base = "https://image.tmdb.org/t/p/w500/";
                let rating = (parseFloat(m.rating) / 2.0).toFixed(1);
                addMoviePoster("#top-movies", m.itemId, m.name, base + m.poster, rating, m.price); // adds movie to UI
            });
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
            
            let date = new Date(movie.yearReleased).toLocaleString('en-us', { month: 'long', day: 'numeric', year: 'numeric' });
            $("#date").html(date);
            
            let rating = (parseFloat(movie.rating) / 2.0).toFixed(1);
            $("#rating").html(rating + "/5");
            
            updateCart(id);
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

function addItemToCartPage(itemId){
    $.ajax({
    
        type: "GET",
        url: "api/getMovie.php",
        dataType: "json",
        data: {"itemId": itemId},
        
        success: function(data,status) {
            // console.log(data);
            $("#tableRow").html("");
            appendRowToCartTable(data);
        
        },
        
        complete: function(data, status) { //optional, used for debugging purposes
            
        }
    
    });//ajax
}  