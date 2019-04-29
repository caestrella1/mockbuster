<!DOCTYPE html>
<html>
    <head>
        <?php include "parts/head.php" ?>
        <title>Home | <?=$site["title"]?></title>
        <script>
            function login(){
                // alert("hello");
                $.ajax({
                     method: "POST",
                        url: "backend/loginProcess.php",
                    dataType: "json",
                        data: {
                            "username":$("#usernameInput").val(),
                            "password":$("#passwordInput").val()
                        },
                     success: function(data, status) {
                    //   alert(data.avgTotal);
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                    //   alert(status);
                    }
                }); //ajax 
            }
        </script>
    </head>
    <body>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <h1 style="text-align:center;">Login</h1>
         <form method="POST" action="backend/loginProcess.php">
            </br></br>
            <p style="text-align:center;">Username: <input type="text" name="username" id="username"/> <br/></p>
            
            <p style="text-align:center;">Password: <input type="password" name="password"/> <br/></p>
            
            <div class="col-md-15 text-center">
            <input type="submit" value="Login!" class="btn btn-primary" >
            </div>
            </br></br></br>
        </form>
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>
