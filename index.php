<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            $(function() {
                //getAllMovies();
                for (let i = 1; i < 15; i++) {
                    getMovieInfoShort(i);
                }
                
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <h2 class="mt-4">Top Movies</h2>
            <section id="top-movies" class="row my-4"></section>
            <h2 class="mt-4">Trending Movies</h2>
            <section id="trending-movies" class="row my-4"></section>
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>