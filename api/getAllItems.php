<?php
/**
 * getAllItems.php | 2019 | Torin, David, Carlos, Q
 * 
 * Returns all the movies with itemTable.
 * 
 * CURRENTLY NOT WORKING!!!
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$sql = "SELECT * FROM itemTable WHERE 1";

// print($sql);

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
?>