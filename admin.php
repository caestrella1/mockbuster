<!DOCTYPE html>
<html>
    <head>
        <?php session_start(); ?>
        <?php include "parts/head.php"; ?>
        <title>Dashboard | <?=$site["title"]?></title>
        <script>
            /* global $ getAllMovies */
            $(function() {
                getAllMovies();
                
                $.ajax({
                     method: "GET",
                        url: "api/getAveragePurchase.php",
                    dataType: "json",
                        data: {},
                     success: function(data, status) {
                    //   alert(data.avgTotal);
                    $("#numPurchase").html(data.numPurchases);
                    $("#avgTotal").html("$" + data.avgTotal);
                    $("#avgItems").html(data.avgItemCount.toFixed(1));
                     
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                    //   alert(status);
                    }
                }); //ajax 
                
            });
        </script>
    </head>
    <body>
        <?php
            if(!isset($_SESSION['adminName'])) {
                header('location: login.php');
            }
        ?>
       <?php include "parts/nav.php"; ?>
       
        <main class="container">
            
            <div class="row">
                <div class="col-12 mt-4">
                    <h2>Dashboard</h2>
                    <h4 class="text-upper-sm text-muted">Welcome, <?= $_SESSION['adminName'] ?></h4>
                </div>
            </div>
           
            <?php include "parts/report.php"; ?>
           
           <div class="row">
               <div class="col-12">
                   <h2 class="mb-0">All Inventory</h2>
                   <h4 id="movie-count" class="mb-4 text-theme">0 Movies</h4>
               </div>
           </div>
           <div id="all-movies" class="row"></div>
           
           <div class="fixed-bottom invisible">
               <div class="container text-right mb-5">
                   <a href="edit.php" style="transform:scale(1.35)"
                   class="btn btn-lg btn-theme rounded-circle visible movie-poster-container mr-2">+</a>
               </div>
           </div>
           
       </main>

        <?php include "parts/footer.php"; ?>
    </body>
</html>
