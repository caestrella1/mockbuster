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
    background-color: <?=$color?> !important; /* bg-info */
}

.btn-outline-theme {
    color: <?=$color?> !important;
    border-color: <?=$color?> !important; /* bg-info */
}

.btn-outline-theme:hover {
    color: white !important;
    background-color: <?=$color?> !important; /* bg-info */
}

.text-theme {
    color: <?=$color?> !important; /* text-info */
}

.btn-theme-light {
    color: <?=$color?> !important; /* text-info */
    background-color: white !important;
}