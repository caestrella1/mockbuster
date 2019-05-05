<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Edit Movie | <?=$site["title"]?></title>
        <script>
            $(function() {
                /* global $ getMovieInfoAdmin showMovieImages getRating */
                let id = parseInt("<?=($_GET['productId']) ? $_GET['productId'] : 'null';?>");
                if (id) getMovieInfoAdmin(id);
                else getRating();
                showMovieImages();
                
                $(document).on("click", "#rating-up, #rating-down", function() {
                    getRating(this.id);
                });
                
                $("#submit").on("click", function(e) {
                    e.preventDefault();
                    console.log($("#input-date").val());
                    $.ajax({
                        type: "GET",
                        url: "api/addProduct.php",
                        dataType: "json",
                        data: {
                            "id": id,
                            "name": $("#input-name").val(),
                            "description" : $("#input-description").val(),
                            "poster" : $("#input-poster").val(),
                            "backdrop" : $("#input-backdrop").val(),
                            "rating" : $("#rating-count").val() * 2,
                            "price" : parseFloat($("#input-price").val()),
                            "year": $("#input-date").val(),
                        },
                        success: function(id) {
                            var editPage = document.location.href + `?productId=${id}`;
                            document.location = editPage;
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <section id="backdrop" class="movie-backdrop">
            <main class="container h-100 py-3 py-lg-5">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-lg-9">
                        <div class="card" style="background-color: rgba(255, 255, 255, 0.85);">
                            <div class="card-body mx-3 mb-3 mt-0">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h2 class="mb-0">Edit Movie</h2>
                                        <h5 id="movie-id" class="text-muted">Movie ID: N/A</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                        <div class="movie-poster-container mb-3">
                                            <img id="poster" class="card-img movie-poster rounded-lg">
                                        </div>
                                        <a id="view-movie" class="btn btn-block btn-info rounded-pill font-weight-bold shadow-sm">
                                            <span><i class="fas fa-film mr-2"></i>View Movie</span>
                                        </a>
                                        
                                        <form action="api/deleteItem.php" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                            <button class="btn btn-block btn-danger rounded-pill my-2 font-weight-bold shadow-sm" name="id">
                                                <i class="fas fa-trash mr-2"></i>Delete Movie
                                                </button>
                                        </form>
                                    </div>
                                    
                                    <div class="col-12 col-lg-8">
                                        
                                        <form>
                                            <input class="form-control" type="text" id="input-name" placeholder="Movie title"><br>
                                            
                                            <textarea class="form-control" id="input-description" rows="8" placeholder="Movie description"></textarea><br>
                                        
                                            <input class="form-control" type="text" id="input-poster" placeholder="Poster image URL"><br>
                                            
                                            <input class="form-control" type="text" id="input-backdrop" placeholder="Backdrop image URL"><br>
                                            
                                            <!-- Rating Picker with hidden input for tracking numeric value -->
                                            <div class="d-flex flex-row align-items-center justify-content-center mb-3">
                                                <button id="rating-down" class="btn btn-danger rounded-lg" onclick="return false;">-</button>
                                                <h4 id="rating" class="d-inline text-info align-middle px-1 px-md-4 mb-0"></h4>
                                                <input id="rating-count" type="hidden" value="0">
                                                <button id="rating-up" class="btn btn-info rounded-lg" onclick="return false;">+</button>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div id="price-group" class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" step="0.01" class="form-control" id="input-price" placeholder="Price">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input class="form-control" type="date" id="input-date">
                                                </div>
                                            </div>

                                            <input type="submit" id="submit" class="btn btn-block btn-lg btn-info rounded-pill shadow-sm">
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </section>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>
