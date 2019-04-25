<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Add New Product| <?=$site["title"]?></title>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        <h2>Add New Prodcuts</h2>
        
        <form>
            Name: <br>
            <input type="text" id="name">
            <br>
            Description: <br>
            <input type="text" id="description">
            <br>
            Poster:<br>
            <input type="text" id="poster">
            <br>
            Backdrop:<br>
            <input type="text" id="backdrop">
            <br>
            Rating:<br>
            <input type="text" id="rating">
            <br>
            Price:<br>
            <input type="text" id="price">
            <br><br>
            <input type="submit">
        </form>
        <?php include "parts/footer.php" ?>
        <script>
            $("#submit").on("click", function(){
                $.ajax({

                    type: "GET",
                    url: "api/addProduct.php",
                    dataType: "json",
                    data: { 
                        "name": $("#name").val(),
                        "description" : $("#description").val(),
                        "poster" : $("#poster").val(),
                        "backdrop" : $("#backdrop").val(),
                        "rating" : $("#rating").val(),
                        "price" : $("#price").val()
                    },
                    
                    success: function(data,status) {
                        console.log(status);
                    
                    },
                    
                    complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        //go back to admin page 
                        window.location = "admin.php";
                    }
                
                });//ajax
            });
            </script>
    </body>
</html>
