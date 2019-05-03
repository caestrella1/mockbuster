<?php
/**
 * getAllItems.php | 2019 | Torin, David, Carlos, Q
 * 
 * No params.
 * 
 * Returns all the movies with itemTable.
 * 
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$order = $_GET["order"];
$sql = "SELECT * FROM itemTable WHERE 1";

if ($order == "abc") $sql .= " ORDER BY name ASC";
else if ($order == "recent") $sql .= " ORDER BY cast(yearReleased as datetime) DESC";
else if ($order == "rating") $sql .= " ORDER BY rating DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
?>