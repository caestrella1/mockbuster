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
                            <button class="btn btn-block btn-info rounded-pill font-weight-bold shadow">
                                <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                            </button>
                        </div>
                        <div class="col-12 col-lg-9 my-5 text-light">
                            <h1 id="title" class="display-4"></h1>
                            <h5 id="rating-container"><span id="rating"></span><i class="fas fa-star ml-2"></i></h5>
                            <h3 id="desc-title" class="display-4 mt-3">Description</h3>
                            <p id="desc"></p>
                        </div>
                    </div>
                </div>
        </section>
        
        <!--<main class="container">-->
        <!--    <div class="row">-->
        <!--        <div class="col-3">-->
        <!--            <div class="movie-poster-container">-->
        <!--                <img id="poster" class="card-img movie-poster rounded-lg">-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <h1 id="movie-title"></h1>-->
        <!--</main>-->
        
        <?php include "parts/footer.php" ?>
    </body>
</html>