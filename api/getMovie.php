<?php
    /**
     * getMovie.php | 2019 | Torin, David, Carlos, Q
     * 
     * Returns all info of movie with given movie id.
     */
    
    include '../backend/dbConnection.php';
    $conn = getDatabaseConnection("movie");

    $itemId = $_GET['itemId']; /** ???CHANGE TO POST??? **/
    
    $sql = "SELECT * FROM itemTable WHERE itemId = $itemId";
    
    // print($sql);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($product);

?>