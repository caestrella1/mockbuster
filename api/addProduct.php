<?php
//session_start();

header('Access-Control-Allow-Origin: *');
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

// checks whether admin has logged in
// if no user is redirected back to index.php
//if (!isset($_SESSION['adminName'])) {
//    header('location: ../index.php'); //sends users to login screen if they haven't logged in
//}

// $sql = "INSERT INTO itemTable ('itemId', 'name', 'description', 'poster', 'backdrop', 'rating', 'price') 
//         VALUES (NULL, :name, :description, :poster, :backdrop, :rating, :price)";
        print($sql);
$np = array();

$np[":name"] = $_GET["name"];
$np[":description"] = $_GET["description"];
$np[":poster"] = $_GET["poster"];
$np[":backdrop"] = $_GET["backdrop"];
$np[":rating"] = $_GET["rating"];
$np[":price"] = $_GET["price"];

$sql = "INSERT INTO itemTable ('itemId', 'name', 'description', 'poster', 'backdrop', 'rating', 'price') 
        VALUES (NULL, :name, :description, :poster, :backdrop, :rating, :price)";
        print($sql);

$stmt = $conn->prepare($sql);
$stmt->execute($np);
?>
