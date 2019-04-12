<?php
session_start(); //starts or resumes an existing session
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

/** CHANGE BACK TO POST ***** */
$username = $_GET['username'];
$password = sha1($_GET['password']);

$sql = "SELECT * FROM users WHERE username = :username AND password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we are expecting ONLY one record, so we use fetch instead of fetchAll
 
 if (empty($record)) {
     echo "Username or Password are incorrect!";
 }  else {
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName']; // session variables
    // header('location: admin.php'); //redirecting to a new file
    echo "successful login";
}

?>