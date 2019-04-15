<?php
/**
 ** addPurchaseHistory.php | 2019 | Torin, David, Carlos, Q
 * 
 * Used to populate our purchase History in our MySQL database.
 * Should only be called once per button submission
 */
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$cArray = $_POST['cart'];
$conNumber = $_POST['conNum'];
$size = sizeof($cArray);
for($i=0; $i<$size; $i++){
$sql = "INSERT INTO `orderHistory` (`id`, `conNum`, `itemId`, `timestamp`) VALUES (NULL, '$conNumber', '$cArray[$i]', '')";
$stmt = $conn->prepare($sql);
        $stmt->execute();
}

?>
