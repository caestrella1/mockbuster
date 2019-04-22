<!-- Navigation bar used on every page -->
<nav class="navbar navbar-expand-lg navbar-dark <?=$site["theme-bg"]?> sticky-top shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php"><?=$site["title"]?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Purchase History</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#">Log out</a>
                    </div>
                </li>
            </ul>
            
            <div>
                <a href="cart.php"><button id="cart" class="btn badge-pill btn-block btn-outline-light d-block shadow-sm font-weight-bold">
                    <i class="fas fa-shopping-cart mr-2 mr-lg-1"></i>
                    <span class="d-lg-none ">My Cart:</span>
                    <span id="cart-count">0</span>
                </button></a>
            </div>
        </div>
    </div>
</nav>

<div id="toast-container" class="d-inline position-fixed mt-5 mx-2 mr-lg-5">
    <div class="toast bg-info text-light mt-4 mt-lg-5" role="alert" aria-live="polite" aria-atomic="true" data-delay="1500">
        <div class="toast-body">
            <i class="fas fa-shopping-cart mr-2 mr-lg-1"></i>
            Successfully added "<span id="added-toast"></span>" to cart!
        </div>
    </div>
</div>