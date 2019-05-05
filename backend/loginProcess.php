<?php
session_start(); //starts or resumes an existing session

include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM users WHERE username = :username AND password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC); 
 
 if (empty($record)) {
     echo "Admin Credentials Invalid!";
 }  else {
    $_SESSION['adminName'] = $record['username']; // session variables
    header('location: ../admin.php'); //redirecting to a new file
}

?>