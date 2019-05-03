<?php
/**
 * addItemToOrder.php | 2019 | Torin, David, Carlos, Q
 * 
 * PARAMS: 
 *  
 *  conNum: confirmation number
 *  id: item id 
 * 
 * RETURNS: 
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");


$id = $_GET['id']; 
$conNum = $_GET['conNum']; 

// $id = 4;
// $conNum =111;

$sql = "SELECT price FROM `itemTable` WHERE itemId=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if(!empty($val)) {
    $price = $val['price'];
}

// add to the order history table
$sql = "INSERT INTO orderHistory (itemId, conNum, price) VALUES ($id, $conNum, $price)";
$stmt = $conn->prepare($sql);
$stmt->execute();

// update the purchase count

$sql = "SELECT productsPurchased from itemTable WHERE itemId = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
$temp = intval($resp['productsPurchased']) + 1;
$temp = $temp + 1;
// print($temp );
$sql = "UPDATE itemTable SET productsPurchased=$temp WHERE itemId = $id";
// print($sql);
$stmt = $conn->prepare($sql);
$stmt->execute();
// echo json_encode($resp);
?>
