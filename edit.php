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
                                        <h2 class="mb-0"><?=isset($_GET['productId']) ? "Edit" : "Add";?> Movie</h2>
                                        <h5 id="movie-id" class="text-muted">Movie ID: N/A</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                        <div class="hover-shadow mb-3">
                                            <img id="poster" class="card-img movie-poster rounded-lg">
                                        </div>
                                        <?php if (isset($_GET['productId'])): ?>
                                        <a id="view-movie" class="btn btn-block btn-info rounded-pill text-light font-weight-bold shadow-sm">
                                            <span><i class="fas fa-eye mr-2"></i>View Movie</span>
                                        </a>
                                        
                                        <form action="api/deleteItem.php" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                            <button class="btn btn-block btn-danger rounded-pill my-2 font-weight-bold shadow-sm" name="id">
                                                <i class="fas fa-trash mr-2"></i>Delete Movie
                                            </button>
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="col-12 col-lg-8">
                                        
                                        <?php include "parts/editform.php"; ?>
                                        
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
