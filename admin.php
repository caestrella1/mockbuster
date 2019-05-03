<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php"; ?>
        <title>Admin Dashboard | <?=$site["title"]?></title>
        <script>
            /* global $ getAllMovies */
            $(function() {
                getAllMovies();
            });
        </script>
    </head>
    <body>
       <?php include "parts/nav.php"; ?>
       
       <main class="container">
           <div class="row">
               <div class="d-flex mt-4 align-items-center justify-content-between">
                    <h2>Admin Dashboard</h2>
                    <a href="addProducts.php" class="btn btn-success">Add Movie</a>
                </div>
           </div>
           
           <div id="all-movies" class="row"></div>
           
       </main>

        <?php include "parts/footer.php"; ?>
    </body>
</html>
