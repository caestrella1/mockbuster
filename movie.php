<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            /* global $ getMovieInfoSingle */
            $(function() {
                getMovieInfoSingle("<?=$_GET['id'];?>");
                
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <section id="backdrop" class="movie-backdrop">
            
            <main class="container h-100 py-3">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-lg-9">
                        <div class="card" style="background-color: rgba(255, 255, 255, 0.85);">
                            <div class="card-body m-3">
                                <div class="row">
                                    <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                        <div class="movie-poster-container mb-3">
                                            <img id="poster" class="card-img movie-poster rounded-lg">
                                        </div>
                                        <button id="add-cart" class="btn btn-block btn-info rounded-pill font-weight-bold shadow" onclick="cartAction(<?=$_GET['id'];?>)">
                                            <i class="fas fa-cart-plus mr-2"></i><span id="buy-movie">Add to Cart</span>
                                        </button>
                                    </div>
                                    
                                    <div class="col-12 col-lg-8">
                                        <h2 id="title" class="movie-title-single text-center text-lg-left"></h2>
                                        
                                        <h5 id="date" class="text-muted text-upper-sm text-center text-lg-left"></h5>
                                        <h5 id="rating" class="text-info text-center text-lg-left"></h5>
                                        
                                        <h3 id="desc-title" class="display-4 mt-3">Overview</h3>
                                        <p id="desc"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
                
        </section>
        
        <!-- Old movie page (remove later) -->
        
        <!--<section id="backdrop" class="movie-backdrop">-->
        <!--    <div class="backdrop-overlay"></div>-->
        <!--        <div class="container">-->
        <!--            <div class="row">-->
        <!--                <div class="col-12 col-lg-3">-->
        <!--                    <div class="movie-poster-container mt-5 mb-3">-->
        <!--                        <img id="poster" class="card-img movie-poster rounded-lg">-->
        <!--                    </div>-->
        <!--                    <button id="add-cart" class="btn btn-block btn-info rounded-pill font-weight-bold shadow" onclick="cartAction(<?=$_GET['id'];?>)">-->
        <!--                        <i class="fas fa-cart-plus mr-2"></i><span id="buy-movie">Add to Cart</span>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--                <div class="col-12 col-lg-9 my-5 text-light">-->
        <!--                    <h1 id="title" class="display-4"></h1>-->
        <!--                    <h5>Release Date: <span id="date" class="text-info"></span></h5>-->
        <!--                    <h5>-->
        <!--                        Rating:-->
        <!--                        <span id="rating" class="text-info"></span>-->
        <!--                    </h5>-->
        <!--                    <h3 id="desc-title" class="display-4 mt-4">Overview</h3>-->
        <!--                    <p id="desc"></p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--</section>-->
        
        <?php include "parts/footer.php" ?>
    </body>
</html>