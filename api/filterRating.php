<?php
/**
 * filterRating.php | 2019 | Torin, David, Carlos, Q
 * 
 * Gets int(1-5) selected by user
 * Searches for movies with rating specified and up
 * returns all items that match
 * 
 * 
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$rating = $_POST['rating'];
$sql = "SELECT * FROM itemTable WHERE rating>$rating;";

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
?>
