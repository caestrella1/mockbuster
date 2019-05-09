<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title id="page-title"> | <?=$site["title"]?></title>
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
                                        <div class="hover-shadow mb-3 bg-dark rounded-lg">
                                            <img id="poster" class="card-img movie-poster">
                                        </div>
                                        <button id="add-cart" class="btn btn-block btn-theme rounded-pill font-weight-bold shadow" onclick="cartAction(<?=$_GET['id'];?>)">
                                            <input id="price" type="hidden" name="price"/>
                                            <i class="fas fa-cart-plus mr-2"></i><span id="buy-movie">Add to Cart</span>
                                        </button>
                                    </div>
                                    
                                    <div class="col-12 col-lg-8">
                                        <h2 id="title" class="movie-title-single text-center text-lg-left"></h2>
                                        
                                        <h5 id="date" class="text-muted text-upper-sm text-center text-lg-left"></h5>
                                        <h5 id="rating" class="text-theme text-center text-lg-left"></h5>
                                        
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
        
        <?php include "parts/footer.php" ?>
    </body>
</html>