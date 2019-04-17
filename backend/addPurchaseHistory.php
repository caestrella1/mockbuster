<?php
/**
 ** addPurchaseHistory.php | 2019 | Torin, David, Carlos, Q
 * 
 * Used to populate our purchase History in our MySQL database.
 * Should only be called once per button submission
 */
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$cArray = $_GET['cart'];
$conNumber = $_GET['conNum'];
// $cArray = "Shazam!";
// $conNumber = 324;
$size = sizeof($cArray);
for($i=0; $i<$size; $i++){

$ran = "SELECT price FROM itemTable WHERE name = '$cArray[$i]'";    
$stmt = $conn->prepare($ran);
        $stmt->execute();
$resp = $stmt->fetch(PDO::FETCH_ASSOC);
    
$sql = "INSERT INTO `orderHistory` (`id`, `conNum`, `itemId`, `price`) VALUES (NULL, '$conNumber', '$cArray[$i]', '$resp')";
$stmt = $conn->prepare($sql);
        $stmt->execute();
}

?>
