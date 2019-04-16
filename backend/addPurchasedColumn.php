<?php
/**
 * addPurchasedColumn.php | 2019 | Torin, David, Carlos, Q
 * 
 * Adds another column to itemTable called productsPurchased
 * 
 */
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$sql = "ALTER TABLE `itemTable` ADD `productsPurchased` TINYINT(5) NULL DEFAULT NULL AFTER `price`";

try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (Exception $e){
        continue;
    }
?>
