<!-- Navigation bar used on every page -->
<?php session_start(); ?>
<nav class="d-block navbar navbar-expand-lg navbar-dark <?=$site["theme-bg"]?> sticky-top shadow position-relative">
    <div class="container">
        <a class="navbar-brand" href="index.php"><?=$site["title"]?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center mr-lg-auto">
                
                <li class="nav-item pt-2 pt-lg-0 pb-lg-0">
                    <a class="nav-link" href="login.php"><i class="fas fa-user-shield mr-2"></i>Dashboard</a>
                </li>
                
                <li class="nav-item pb-2 pb-lg-0">
                    <a class="nav-link" href="search.php"><i class="fas fa-search mr-2"></i>Search</a>
                </li>
                
                <?php
                    if (isset($_SESSION['adminName'])):
                ?>
                <li class="nav-item pb-2 pb-lg-0">
                    <a class="nav-link" href="backend/logoutProcess.php"><i class="fas fa-sign-out-alt mr-2"></i>Log Out</a>
                </li>
                <?php
                    else:
                ?>
                <li class="nav-item pb-2 pb-lg-0">
                    <a class="nav-link" href="login.php"><i class="fas fa-sign-out-alt mr-2"></i>Log In</a>
                </li>
                <?php
                    endif;
                ?>
            
            </ul>
            
            <div class="my-2 my-lg-0">
                <a id="cart" href="cart.php" class="btn badge-pill btn-block btn-outline-light d-block shadow-sm font-weight-bold">
                    <i class="fas fa-shopping-cart mr-2 mr-lg-1"></i>
                    <span class="d-lg-none ">My Cart:</span>
                    <span id="cart-count">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<div id="toast-container" class="invisible position-fixed w-100 d-flex align-items-end" style="z-index:1">
    <div class="container">
        <div class="toast invisible mx-auto mx-md-0 ml-md-auto bg-info text-light mt-3" role="alert" aria-live="polite" aria-atomic="true" data-delay="1500">
            <div class="toast-body">
                <i class="fas fa-shopping-cart mr-2 mr-lg-1"></i>
                Successfully added "<span id="added-toast"></span>" to cart!
            </div>
        </div>
    </div>
</div>