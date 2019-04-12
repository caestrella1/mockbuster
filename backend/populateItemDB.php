<?php
/**
 * populateItemDB.php | 2019 | Torin, David, Carlos, Q
 * 
 * Used to populate our itemTable in our MySQL database.
 */

include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$filename = "top20.json";
$data = file_get_contents($filename);
$array = json_decode($data, true);

for($i = 0; $i < 1; $i++){
    $obj = $array["results"][$i];

    $name = $obj['title'];
    $desc = $obj['overview'];
    $poster = $obj['poster_path'];
    $backdrop = $obj['backdrop_path'];
    $rating = $obj['vote_average'];
    $rand = mt_rand(10, 20);
    $rand = $rand + .99;

     $sql = "INSERT INTO itemTable (name, description, poster, backdrop, rating, price) VALUES ";
     $sql .= "('$name', '$desc', '$poster', '$backdrop', '$rating', '$rand');";
    print($sql);
    try {
        // $stmt = $conn->prepare($sql);
        // $stmt->execute();
    } catch (Exception $e){
        // not the best way, but I think some of the paths have a forward slash
        // in them which is messing with our query, so I'm not sure how to deal
        // that, so our table will just be missing a few movies...
        continue;
    }
    
}
?>
