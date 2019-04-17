<?php
/**
 * Adds an item to the current cart.
 * 
 * Params:
 *  name: item name
 *  description: item description
 *  poster: poster jpg
 *  backdrop: backdrop jpg
 *  rating: item rating [0 - 10]
 *  price: item price
 */

include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$name = $_GET['name'];
$desc = $_GET['description'];
$poster = $_GET['poster'];
$backdrop = $_GET['backdrop'];
$rating = $_GET['rating'];
$price = $_GET['price'];


// $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we are expecting ONLY one record, so we use fetch instead of fetchAll
 
?>