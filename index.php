<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            $(function() {
                //getAllMovies();
                for (let i = 1; i < 9; i++) {
                    getMovieInfoShort(i);
                }
                
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <h2 class="mt-4">Top Rated Movies</h2>
            <p>Don't know what to watch next? We've got you covered.</p>
            <section id="top-movies" class="row my-4"></section>
            
            <h2 class="mt-4">New Releases</h2>
            <p>Bring home your favorite movie today.</p>
            <section id="trending-movies" class="row my-4"></section>
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>