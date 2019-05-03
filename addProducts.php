<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Add New Product| <?=$site["title"]?></title>
        <script>
            $(function() {
                let id = <?php echo $_GET['productId']; ?>;
                getMovieInfoAdmin(id);
            });
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        <h2>Add New Prodcuts</h2>
        
        <!--<form>-->
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
            Date Released:<br>
            <input type="date" id="date">
            <br><br>
            <input type="submit" id="submit">
        <!--</form>-->
        <?php include "parts/footer.php" ?>
        <script>
            $("#submit").on("click", function(){
                // console.log($("#name").val());
                // console.log($("#description").val());
                // console.log($("#poster").val());
                // console.log($("#backdrop").val());
                // console.log($("#rating").val());
                // console.log($("#price").val());
                $.ajax({
                    type: "GET",
                    url: "api/addProduct.php",
                    dataType: "json",
                    data: {
                        "id": id,
                        "name": $("#name").val(),
                        "description" : $("#description").val(),
                        "poster" : $("#poster").val(),
                        "backdrop" : $("#backdrop").val(),
                        "rating" : parseInt($("#rating").val()),
                        "price" : parseInt($("#price").val()),
                    },
                    
                    success: function(data,status) {
                        console.log(status);
                    
                    },
                    
                    complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        console.log(status);
                        //go back to admin page 
                        // window.location = "admin.php";
                    }
                
                });//ajax
            });
        </script>
    </body>
</html>
