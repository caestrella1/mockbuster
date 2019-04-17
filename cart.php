<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Cart | <?=$site["title"]?></title>
        <script>
            $(function() {
                
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <br>
            <?php include "parts/baseTable.php" ?>
            
            <div id="cartResults">
                <button class="btn btn-primary" id="finalizeCart">Update</button>
                <button class="btn btn-primary" id="clearCart">Clear</button>
            </div>

        </main>
        
        <?php include "parts/footer.php" ?>
        <script>
            addMoviesToCartPage();
            
            $("#clearCart").on("click", function(){
                console.log("clear button clicked");
                let temp = Array();
                localStorage.setItem("cart", temp);
                $("#tableBody").html("");
                // doesnt update cart total
                
            });

        </script>
    </body>
</html>