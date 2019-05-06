<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            $(function() {
                /* global getTopRatedMovies getRecentMovies */
                getTopRatedMovies();
                getRecentMovies();
                
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <h2 class="mt-4 mb-0">Top Rated Movies</h2>
            <p class="text-muted">Don't know what to watch next? We've got you covered.</p>
            <section id="top-movies" class="row my-4"></section>
            
            <h2 class="mt-4 mb-0">New Releases</h2>
            <p class="text-muted">Bring home your favorite movie today.</p>
            <section id="recent-movies" class="row my-4"></section>
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>