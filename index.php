<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            $(function() {
                for (let i = 0; i < 4; i++)
                newMovie("#top-movies", "#", "https://images-na.ssl-images-amazon.com/images/I/A1t8xCe9jwL._SL1500_.jpg");
                
                for (let i = 0; i < 4; i++)
                newMovie("#trending-movies", "#", "https://images.redbox.com/Images/EPC/boxartvertical/207197.jpg");
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