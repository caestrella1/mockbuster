<!-- Navigation bar used on every page -->
<nav class="d-block navbar navbar-expand-md navbar-dark bg-theme sticky-top shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fas fa-ticket-alt mr-2"></i><?=$site["title"]?></a>
        <button class="btn hamburger hamburger--squeeze navbar-toggler p-0 pt-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger-box" style="transform:scale(0.75);">
                <span class="hamburger-inner bg-light"></span>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center my-2 my-md-0 mr-md-auto">
                
                <li class="nav-item px-1">
                    <a class="nav-link" href="admin.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                </li>
                
                <li class="nav-item px-1">
                    <a class="nav-link" href="search.php"><i class="fas fa-search mr-2"></i>Search</a>
                </li>
                
                <?php if (isset($_SESSION['adminName'])): ?>
                <li class="nav-item px-1">
                    <a class="nav-link" href="backend/logoutProcess.php"><i class="fas fa-sign-out-alt mr-2"></i>Log Out</a>
                </li>
                <?php else: ?>
                <li class="nav-item px-1">
                    <a class="nav-link" href="login.php"><i class="fas fa-sign-out-alt mr-2"></i>Log In</a>
                </li>
                <?php endif; ?>
            
            </ul>
            
            <div class="dropdown-divider mb-3"></div>
            
            <div class="my-2 my-md-0">
                <a id="cart" href="cart.php" class="btn badge-pill btn-block btn-outline-light d-block shadow-sm font-weight-bold">
                    <i class="fas fa-shopping-cart mr-2 mr-md-1"></i>
                    <span class="d-md-none ">My Cart:</span>
                    <span id="cart-count">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Use z-index 1021 because .sticky-top uses 1020 -->
<div id="toast-container" class="invisible position-fixed w-100 d-flex align-items-end" style="z-index:1021">
    <div class="container">
        <div class="toast invisible mx-auto mx-md-0 ml-md-auto bg-theme mt-3" role="alert" aria-atomic="true" autohide="false">
            <div class="toast-body">
                <i class="fas fa-shopping-cart mr-2 mr-lg-1"></i>
                Successfully added "<span id="added-toast"></span>" to cart!
            </div>
        </div>
    </div>
</div>