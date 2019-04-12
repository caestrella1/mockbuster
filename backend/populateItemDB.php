<?php
// session_start(); //starts or resumes an existing session

include 'dbConnection.php';

$conn = getDatabaseConnection("movie");


$filename = "top20.json";
$data = file_get_contents($filename);

$array = json_decode($data, true);
// print_r($array["results"][0]);


for($i = 0; $i < 1; $i++){
    $obj = $array["results"][$i];
    // print_r($obj);
    $rand = mt_rand(10, 20);
    $rand = $rand + .99;
    // $namedParameters = array();
    // $nameParamters
     $sql = "INSERT INTO `itemTable` (`name`, `description`, `poster`, `backdrop`, `rating`, `price`) VALUES ('".$obj['title'] . "', '" .$obj['overview'] . "', '" .$obj['poster_path'] . "', '" .$obj['backdrop_path'] . "', '" .$obj['vote_average'] . "', '" . $rand . "');";
    //$sql = "INSERT into itemTable ('name', 'description', 'poster', 'backdrop', 'rating', 'price') VALUES ('".$obj['title'] . "', '" .$obj['overview'] . "', '" .$obj['poster_path'] . "', '" .$obj['backdrop_path'] . "', '" .$obj['vote_average'] . "', '" . $rand . "');";
    // $sql = "INSERT into itemTable ('name', 'description', 'poster', 'backdrop', 'rating', 'price') VALUES ( '$obj["title]', '$obj['overview']', '" .$obj['poster_path'] . "', '" .$obj['backdrop_path'] . "', '" .$obj['vote_average'] . "', " . $rand . ");";
    
    print($sql);
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    
}


// $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

// $namedParameters = array();
// $namedParameters[':username'] = $username;
// $namedParameters[':password'] = $password;


// $stmt = $conn->prepare($sql);
// $stmt->execute($namedParameters);
// $record = $stmt->fetch(PDO::FETCH_ASSOC); //we are expecting ONLY one record, so we use fetch instead of fetchAll

// // print_r($record);
 
//  if (empty($record)) {
     
//      echo "Username or Password are incorrect!";
     
     
//  }  else {
 
//     //echo $record[0]['firstName']; //using fetchAll
//     //echo $record['firstName'] . " " . $record['lastName'] ; //using fetch
    
//     $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
//     // header('location: admin.php'); //redirecting to a new file
//     echo "successful login";
    
    

// }

?>
