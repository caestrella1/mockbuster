<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            $(function() {
                getMovieInfoSingle(<?=$_GET['id'];?>);
                
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <section id="backdrop" class="movie-backdrop">
            <div class="backdrop-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="movie-poster-container mt-5 mb-3">
                                <img id="poster" class="card-img movie-poster rounded-lg">
                            </div>
                            <!--<h5 class="text-light text-center mb-3">Price: $<span id="price"></span></h5>-->
                            <button class="btn btn-block btn-info rounded-pill font-weight-bold shadow" onclick="addToCart(<?=$_GET['id'];?>)">
                                <i class="fas fa-cart-plus mr-2"></i><span id="buy-movie"></span>
                            </button>
                        </div>
                        <div class="col-12 col-lg-9 my-5 text-light">
                            <h1 id="title" class="display-4"></h1>
                            <h5>Release Date: <span id="date" class="text-info"></span></h5>
                            <h5>
                                Rating:
                                <span id="rating" class="text-info"></span>
                                <i class="fas fa-star ml-2 text-info"></i>
                            </h5>
                            <h3 id="desc-title" class="display-4 mt-4">Overview</h3>
                            <p id="desc"></p>
                        </div>
                    </div>
                </div>
        </section>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>