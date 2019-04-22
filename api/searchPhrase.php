<?php
/**
 * searchPhrase.php | 2019 | Torin, David, Carlos, Q
 * 
 * Gets Phrase entered by user
 * Searches through DB and returns whatever items matches search
 * 
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$phrase = $_POST['phrase'];
$sql = "SELECT * FROM itemTable WHERE name LIKE '%$phrase%' OR description LIKE '%$phrase%'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
?>
