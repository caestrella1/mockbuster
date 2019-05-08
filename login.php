<!DOCTYPE html>
<html>
    <head>
        <?php session_start(); ?>
        <?php include "parts/head.php" ?>
        <title>Log in | <?=$site["title"]?></title>
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
                    <div class="card hover-shadow">
                        <div class="card-body">
                            
                            <h1>Log in</h1>
                            <p class="text-muted">
                                <!--<i class="fas fa-info-circle"></i>-->
                                Please log in as an administrator to view this page.
                            </p>
                        
                            <form method="POST">
                                <input id="username" name="username" class="form-control mb-3" type="email" placeholder="Username"/>
                                <input id="password" name="password" class="form-control mb-3" type="password" placeholder="Password"/>
                                <p id="results" class="d-none text-danger">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span>Invalid Username/Password!</span>
                                </p>
                                <button id="submit" class="btn btn-lg btn-block btn-theme rounded-pill">Log in</button>
                            </form>

                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
        
        <script>
            $('#submit').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                        method: "POST",
                        dataType: "text",
                        data: {
                            "username": $("#username").val(),
                            "password": $("#password").val()
                        },
                        url: "backend/loginProcess.php",
                        success: function(data, success) {
                            if (data == 'true') {
                                window.location.replace("admin.php");
                            }
                            else {
                                $("#results").removeClass("d-none");
                            }
                        }
                    });
            });
        </script>
        
        <?php include "parts/footer.php" ?>
    </body>
</html>
