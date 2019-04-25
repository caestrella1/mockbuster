<?php
session_start();

header('Access-Control-Allow-Origin: *');
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

// checks whether admin has logged in
// if no user is redirected back to index.php
if (!isset($_SESSION['adminName'])) {
    header('location: ../index.php'); //sends users to login screen if they haven't logged in
}

$sql = "INSERT INTO itemTable (itemId, name, description, poster, backdrop, rating, price) 
        VALUES (NULL, :name, :description, :poster, :backdrop, :rating, :price);";
$np = array();

$np[":name"] = $name;
$np[":description"] = $description;
$np[":poster"] = $poster;
$np[":backdrop"] = $backdrop;
$np[":rating"] = $rating;
$np[":price"] = $price;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
?>
