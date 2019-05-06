<?php
/**
 * addItemToOrder.php | 2019 | Torin, David, Carlos, Q
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$id = $_GET['id']; 
$conNum = $_GET['conNum']; 
$orderTotal = $_GET['orderTotal'];

// add to the order history table
$sql = "INSERT INTO orderHistory (itemId, conNum, price) VALUES ($id, $conNum, $orderTotal)";
$stmt = $conn->prepare($sql);
$stmt->execute();

// update the purchase count, in the item table
$sql = "SELECT productsPurchased from itemTable WHERE itemId=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
$temp = intval($resp['productsPurchased']) + 1;
$temp = $temp + 1;

$sql = "UPDATE itemTable SET productsPurchased=$temp WHERE itemId=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
