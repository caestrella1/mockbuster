<?php
/**
 ** purchasedProducts.php | 2019 | Torin, David, Carlos, Q
 * 
 * Used to populate our itemTable in our MySQL database.
 * Should only be called once.
 */
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

// $jArray = $_POST['hiddenF'];
$jArray = "Shazam!";
$size = sizeof($jArray);

for($i=0; $i>$size; $i++){
    $item = $jArray[$i];
    // $item = $jArray;
    // $sql = "UPDATE itemTable SET productsPurchased = productsPurchased + 1 WHERE name = '".$item."'";
    $sql = "UPDATE `itemTable` SET `productsPurchased` =  productsPurchased+1 WHERE `itemTable`.`name` = '$item'";
    $stmt = $conn->prepare($sql);
        $stmt->execute();
}
?>
