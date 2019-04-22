<?php

/**
 * getAveragePurchase.php | 2019 | Torin, David, Carlos, Q
 * 
 * Returns array of values numPurchases, avgTotal, avgItemCount
 * numPurchases is the number of purchases completed
 * avgTotal is the average total cost of each completed purchase
 * avgItemCount is the average number of items sold in each transaction
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");


//Number of purchases
$sql = "SELECT conNum, count(*) FROM orderHistory GROUP BY conNum;" ;
$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
$size = sizeof($resp);

//gets avg price of all conNum
$sql2 = "SELECT conNum, AVG(price) FROM orderHistory GROUP BY conNum;" ;
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$resp2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

//Calculates average by adding all averages and diving by num of purchases
$avg=0;
for($i=0; $i<$size; $i++){
    $avg = $avg + $resp2[$i]["AVG(price)"];
}
$avg = $avg / $size;

//gets total num of items purchase
$sql3 = "SELECT conNum, count(*) FROM orderHistory;" ;
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
$resp3 = $stmt3->fetch(PDO::FETCH_ASSOC);

$itemCount = intval($resp3["count(*)"])/$size;

// print_r($avg);
$info = array();
$info['numPurchases'] = $size;
$info['avgTotal'] = round($avg,2);
$info['avgItemCount'] = $itemCount;
echo json_encode($info);
?>
