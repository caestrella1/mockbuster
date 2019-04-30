<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            $(document).ready(function(){
                // alert("hello");
                $.ajax({
                     method: "GET",
                        url: "api/getAveragePurchase.php",
                    dataType: "json",
                        data: {},
                     success: function(data, status) {
                    //   alert(data.avgTotal);
                    $("#numPurchase").append(data.numPurchases);
                    $("#avgTotal").append(data.avgTotal);
                    $("#avgItems").append(data.avgItemCount);
                     
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                    //   alert(status);
                    }
                }); //ajax 
            });//document ready
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <h1 class="mt-4" id="numPurchases">Admin Report</h1></br></br>
            <h4 id="numPurchase">Total number of Purchases:&ensp;&ensp;</h4></br>
            <h4 id="avgTotal">Average total of each order:&ensp;&ensp;$</h4></br>
            <h4 id="avgItems">Average number of items per order:&ensp;&ensp;</h4>
            </br></br></br>
            

            
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>
