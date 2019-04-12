<?php
/**
 * getPromoCode.php | 2019 | Torin, David, Carlos, Q
 * 
 * Returns a discount of promocode.
 * If promo code not valid zero is returned.
 * 
 * NEED TO PREVENT SQL INJECTION
 */
include '../backend/dbConnection.php';
$conn = getDatabaseConnection("movie");

$code = $_GET['code'];


$sql = "SELECT discount FROM promo WHERE name = '$code'";

// $noInjection = array();
// $noInjection[':code'] = $code

// print($sql);

$stmt = $conn->prepare($sql);
$stmt->execute();
$resp = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($resp) || is_null($resp)){
    $obj = array();
    $obj['discount'] = '0.0';
    echo json_encode($obj);
}
else {
    echo json_encode($resp);
}
?>