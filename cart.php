<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Cart | <?=$site["title"]?></title>
        <script>
            /* global $ localStorage cart showCartItems completePurchase removeItem clearCart updateCartTotal */
            $(function() {
                getCartPage();
                
                let str = "";
                if (cart.length > 1) str = `${cart.length} Movies`;
                else str = `${cart.length} Movie`;
                $("#cart-item-count, #summary-count").html(str);
                
                /* Button Interaction */
                
                $(document).on("click", "#remove", function() {
                    removeItem($(this));
                });
                
                $("#clearCart").on("click", function(){
                    clearCart();
                    $("#cartResults").hide();
                });
                
                $("#finalizeCart").on("click", function() {
                   completePurchase($("#finalPrice").val()) ;
                });
                
      
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            
            <div class="row">
                <div class="col-12">
                    <h2 class="mt-4">Shopping Cart</h2>
                    <h4 id="cart-item-count" class="mb-4 text-theme"></h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">

                    <div id="item-table" class="mb-5"></div>
                    
                </div><!-- col-8 -->
                
                <div class="col-12 col-md-5 col-lg-4">
                    
                    
                    <div class="card mb-5 movie-poster-container">
                        <div class="card-body">
                            <h2 class="mb-0">Checkout</h2>
                            
                            <h5 id="summary-count" class="text-theme mb-2"></h5>
                            
                            <div id="cartResults">
                                <h5>Promo Code</h5>
                                <div class="input-group mb-2">
                                    <input id="promo-input" type="text" class="form-control" placeholder="Enter a promo code">
                                    <div class="input-group-append">
                                        <button id="applyPromo" class="btn btn-success" type="button" onclick="applyDiscount()">Apply</button>
                                    </div>
                                </div>
                                <div id="promoOut" class="mb-4"></div>
                            </div>
                            
                            <div id="prices">
                                
                                <div class="d-flex justify-content-between text-muted">
                                    <h5>Subtotal</h5>
                                    <h5 id="subtotal">$0.00</h5>
                                </div>
                                
                                <div id="discount-field" class="d-none justify-content-between text-theme">
                                    <h5>Discount</h5>
                                    <h5>-$<span id="discount"></span></h5>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <h4>Grand Total</h4>
                                    <h4 id="finalPrice"></h4>
                                </div>

                                <button class="btn btn-success btn-block rounded-pill mt-2" id="finalizeCart">Complete Purchase</button>
                                <button class="btn btn-outline-danger btn-block rounded-pill mt-2" id="clearCart">Empty Cart</button>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div><!-- row -->
            
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>