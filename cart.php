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
                <button class="btn btn-success" id="finalizeCart">Purchase</button>
                <button class="btn btn-danger" id="clearCart">Clear</button>
            </div>

        </main>
        
        <?php include "parts/footer.php" ?>
        <script>
            $("#cartResults").hide();
            addMoviesToCartPage();
            
            
            $("#clearCart").on("click", function(){
                console.log("clear button clicked");
                cart = new Array();
                localStorage.setItem("cart", cart);
                $("#tableBody").html("");
                // doesnt update cart total
                updateCart();
                
                $("#cartResults").hide();
            });
            
            $("#finalizeCart").on("click", function(){
                    // let confirmation = rand();
                
                    if (!localStorage.getItem("cart"))
                        cart = new Array();
                    else
                        cart = JSON.parse(localStorage.getItem("cart"));
                    
                    for(let i = 0; i < cart.length; i++){
                        addItemToCartPage(cart[i]);
    }
            });

        </script>
    </body>
</html>