<?php 
    /**
     * Creates a stylesheet using the specified color as an accent
     */
    
    header("Content-type: text/css; charset: UTF-8");
    $color = "#17a2b8"; // bootstrap-info
    // $color = "#303030"; // dark
?>

.bg-theme, .btn-theme, .badge-theme {
    color: white !important;
    background-color: <?=$color?> !important;
}

.btn-outline-theme {
    color: <?=$color?> !important;
    border-color: <?=$color?> !important;
}

.btn-outline-theme:hover {
    color: white !important;
    background-color: <?=$color?> !important;
}

.btn-outline-theme.active {
    color: white !important;
    background-color: <?=$color?> !important;
}

.text-theme {
    color: <?=$color?> !important;
}

.btn-theme-light {
    color: <?=$color?> !important;
    background-color: white !important;
}

nav .dropdown-divider {
    border-top: 1px solid rgba(255, 255, 255, 0.4) !important;
}