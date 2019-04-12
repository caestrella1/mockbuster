<?php
/**
 * getItemsByConfirmation.php | 2019 | Torin, David, Carlos, Q
 * 
 * Returns all items purchased in an order specified by conNum.
 * 
 * CURRENTLY NOT WORKING!!!
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$num = $_GET['conNum'];

$sql = "SELECT * FROM orderHistory NATURAL JOIN itemTable WHERE conNum = $num";

// print($sql);

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
?>