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

$np = array();

$id = $_GET["id"];
$np[":name"] = $_GET["name"];
$np[":desc"] = $_GET["description"];
$np[":poster"] = $_GET["poster"];
$np[":backdrop"] = $_GET["backdrop"];
$np[":year"] = $_GET["year"];
$rating = $_GET["rating"];
$price = $_GET["price"];

if ($id == "NaN") {
    $sql = "INSERT INTO itemTable (name, description, poster, backdrop, rating, price, yearReleased)";
    $sql .= " VALUES (:name, :desc, :poster, :backdrop, $rating, $price, :year);";
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    echo $conn->lastInsertId();
}
else {
    $sql = "UPDATE itemTable SET name = :name, description = :desc, poster = :poster, backdrop = :backdrop, 
        rating = $rating, price = $price, yearReleased = :year WHERE itemId = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
}
?>
