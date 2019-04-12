<?php

/**
 * getTopRatedMovies.php | 2019 | Torin, David, Carlos, Q
 * 
 * Returns all the movies with a rating above given threshold
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$minRating = $_GET['minRating'];

$sql = "SELECT * FROM itemTable WHERE rating >= $minRating";

// print($sql);

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);

?>