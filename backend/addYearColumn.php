<?php
/**
 * addYeadColumn.php | 2019 | Torin, David, Carlos, Q
 * 
 * Adds another column to itemTable called yearReleased
 * 
 */
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$sql = "ALTER TABLE `itemTable` ADD `yearReleased` VARCHAR(25) NOT NULL AFTER `productsPurchased`";

try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (Exception $e){
        continue;
    }
?>
