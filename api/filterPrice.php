<?php
/**
 * filterPrice.php | 2019 | Torin, David, Carlos, Q
 * 
 * Gets int(0 or 1) selected by user
 * 0 is low to high
 * 1 is high to low
 * return all items 
 * 
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");
$bool = $_POST['price'];
if($bool=0){
$sql = "SELECT * FROM itemTable ORDER BY price ASC;";
}else{
    $sql = "SELECT * FROM itemTable ORDER BY price DESC;";
}

// print($sql);

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
?>
