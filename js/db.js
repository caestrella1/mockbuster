/**** Functions for communicating with the database ****/
/* global $ addMoviePoster updateCart localStorage */

function getRecentMovies() {
    $.ajax({
        type: "GET",
        url: "api/getAllItems.php",
        dataType: "json",
        data: { "order": "recent" },
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

function getAllMovies() {
    $.ajax({
        type: "GET",
        url: "api/getAllItems.php",
        dataType: "json",
        data: { "order": "abc" },
        success: function(movies, status) {
            movies.forEach(function(m, i) {
                let base = "https://image.tmdb.org/t/p/w500/";
                let rating = (parseFloat(m.rating) / 2.0).toFixed(1);
                addMovieAdmin(m.itemId, "", m.name, base + m.poster, rating, m.price); // adds movie to UI
            });
        }
    });
}

function getTopRatedMovies() {
    $.ajax({
        type: "GET",
        url: "api/getAllItems.php",
        dataType: "json",
        data: { "order": "rating" },
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
            getRating(rating);
            
            updateCart(id);
        }
    });
}

/* Get all the movie's info for displaying on a single page */
function getMovieInfoAdmin(id) {
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
            $("#input-name").val(movie.name);
            $("#input-description").val(movie.description);
            $("#input-poster").val(imgBasePoster + movie.poster);
            $("#input-backdrop").val(imgBaseBD + movie.backdrop);
            $("#input-rating").val(movie.rating);
            $("#input-date").val(movie.yearReleased);
            $("#input-price").val(movie.price);
            
            showMovieImages();
            $("#view-movie").attr("href", `movie.php?id=${id}`);
        }
    });
}

function searchMovies() {
    console.log(`Price: ${$("#filter-price").val()}`);
    $.ajax({
        method: "POST",
        url: "api/filterAll.php",
        dataType: "json",
        data: {
            "phrase": $("#input-search").val(),
            "rating": $(".active [name='filter-stars']").val(),
            "price": $("#filter-price").val()
        },
        success: function(movies) {
            $("#search-results").html("");
            movies.forEach(function(m) {
                let imgBase = "https://image.tmdb.org/t/p/w500/";
                let rating = (parseFloat(m.rating) / 2.0).toFixed(1);
                addMoviePoster("#search-results", m.itemId, m.name, imgBase + m.poster, rating, m.price); // adds movie to UI
            }); 
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

/* Cart Page */

function addItemToCartPage(itemId) {
    $.ajax({
        type: "GET",
        url: "api/getMovie.php",
        dataType: "json",
        data: {"itemId": itemId},
        success: function(data, status) {
            $("#tableRow").html("");
            appendRowToCartTable(data);
            
            let currsubtotal = parseFloat(localStorage.subtotal);
            let thisPrice = parseFloat(data['price']);
            
            localStorage.subtotal = (currsubtotal + thisPrice).toFixed(2);
            localStorage.grandTotal = localStorage.subtotal;
            
            updateCartTotal();
        }
    });
}