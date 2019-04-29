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

//Hardcode for testing
// $phrase = "captain";
// $rating = 3;
// $price = 0;

$phrase = $_POST['phrase'];
$rating = intval($_POST['rating']) * 2;
$price = intval($_POST['price']);

if($price==0){
    $order="ASC";
}else{
    $order="DESC";
}

if($phrase==""){
    $sql = "SELECT * FROM itemTable WHERE rating>$rating ORDER BY price $order;";
}else{
$sql = "SELECT * FROM itemTable WHERE 
(name LIKE '%$phrase%' OR description LIKE '%$phrase%') AND (rating>$rating) ORDER BY price $order;";
}

//runs statement
$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
?>
