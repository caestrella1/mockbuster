<?php
/**
 * deleteItem.php | 2019 | Torin, David, Carlos, Q
 * 
 * PARAMS: 
 *  id: item id 
 * 
 * RETURNS: 
 * 
 * Deletes the item with id from itemTable.
 */
session_start();
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

// checks whether user has logged in
// if (!isset($_SESSION['adminName'])) {
//     header('location: index.php'); //sends users to login screen if they haven't logged in
// }

$id = $_POST['id']; // Dr. Lara said to use POST when using something like DELETE
$sql = "DELETE FROM itemTable WHERE itemId = " . $id;

print($sql);

// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($resp);
?>