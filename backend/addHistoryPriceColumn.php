<?php
/**
 ** addHistoryPriceColumn.php | 2019 | Torin, David, Carlos, Q
 * 
 * adds price column in orderHistory
 * Used to keep track of prices without going back to itemTable
 */
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$sql = "ALTER TABLE `orderHistory` ADD `price` FLOAT NULL DEFAULT 0 AFTER `itemId`";

try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (Exception $e){
        continue;
    }

?>
