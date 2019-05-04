<!DOCTYPE html>
<html>
    <head>
        <?php session_start(); ?>
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
                        console.log("loginProcess Data: " + data);
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                    //   alert(status);
                    }
                }); //ajax 
            }
        </script>
    </head>
    <body>
        <?php
            if(isset($_SESSION['adminName'])) {
                header('location: admin.php');
            }
        ?>
        <?php include "parts/nav.php" ?>
        
        <main class="container">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-lg-4">
                    <div class="card movie-poster-container">
                        <div class="card-body">
                            
                            <h1>Log in</h1>
                            <p class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Please log in as an administrator to view this page.
                            </p>
                            
                            <form method="POST" action="backend/loginProcess.php">
                                <input id="username" name="username" class="form-control mb-3" type="text" placeholder="Username"/>
        
                                <input id="password" name="password" class="form-control mb-3" type="password" placeholder="Password"/>
                        
                                <input type="submit" value="Log in" class="btn btn-lg btn-block btn-info" >
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>
