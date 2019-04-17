<?php

/**
 * getTotalProfit.php | 2019 | Torin, David, Carlos, Q
 * 
 * Returns profit from all items sold
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");



$sql = "SELECT sum(price * productsPurchased) total FROM itemTable" ;

// print($sql);

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($resp);
?>
