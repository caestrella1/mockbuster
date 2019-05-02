<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php"; ?>
        <title>Admin Page| <?=$site["title"]?></title>
    </head>
    <body>
       <?php include "parts/nav.php"; ?> 
    
        <h2>Add New Product</h2>
        <!-- button that redirects to add product page. -->
        
        <a href="addProducts.php"> Add New Movies </a>
        
        <h2>Films</h2>
    
        <div class="row">
            
            <div id="all-movies">
                
            </div>
            
        </div>
        
        <!-- for delete and update buttons -->
        <script>
        
        getAllMovies();
            
        </script>
        

        <?php include "parts/footer.php"; ?>

    </body>
</html>
