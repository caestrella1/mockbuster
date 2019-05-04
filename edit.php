<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Edit Movie | <?=$site["title"]?></title>
        <script>
            $(function() {
                /* global $ getMovieInfoAdmin showMovieImages */
                let id = parseInt("<?=($_GET['productId']) ? $_GET['productId'] : 'null';?>");
                if (id) getMovieInfoAdmin(id);
                
                showMovieImages();
                
                $("#submit").on("click", function() {
                    $.ajax({
                        type: "GET",
                        url: "api/addProduct.php",
                        dataType: "json",
                        data: {
                            "id": id,
                            "name": $("#name").val(),
                            "description" : $("#description").val(),
                            "poster" : $("#poster").val(),
                            "backdrop" : $("#backdrop").val(),
                            "rating" : parseInt($("#rating").val()),
                            "price" : parseInt($("#price").val()),
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mt-4">Edit Movie</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-3">
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
                <div class="col-9">
                    
                    <!--<form>-->
                    <label for="input-name">Name</label><br>
                    <input class="form-control" type="text" id="input-name"><br>
                    
                    <label for="input-description">Description</label><br>
                    <textarea class="form-control" id="input-description" rows="5"></textarea><br>
                    
                    <label for="input-poster">Poster</label><br>
                    <input class="form-control" type="text" id="input-poster"><br>
                    
                    <label for="input-backdrop">Backdrop</label><br>
                    <input class="form-control" type="text" id="input-backdrop"><br>
                    
                    <label for="input-rating">Rating</label><br>
                    <input class="form-control" type="number" id="input-rating"><br>
                    
                    <label for="input-price">Price</label><br>
                    <div id="price-group" class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" class="form-control" id="input-price">
                    </div>
                    
                    <label for="input-date">Release Date</label><br>
                    <input class="form-control" type="date" id="input-date"><br>
                    
                    <input type="submit" id="submit" class="btn btn-lg btn-primary">
                <!--</form>-->
                    
                </div>
            </div>
            
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>
