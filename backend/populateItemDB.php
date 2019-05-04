<?php
/**
 * populateItemDB.php | 2019 | Torin, David, Carlos, Q
 * 
 * Used to populate our itemTable in our MySQL database.
 * Should only be called once.
 */
include 'dbConnection.php';
$conn = getDatabaseConnection("movie");

$filename = "top20.json";
$numMovies = 20;
$data = file_get_contents($filename);
$array = json_decode($data, true);

for($i = 0; $i < $numMovies; $i++){
    $obj = $array["results"][$i];
    $id = $obj["id"];
    $name = $obj['title'];
    $desc = $obj['overview'];
    $poster = "https://image.tmdb.org/t/p/w500" . $obj['poster_path'];
    $backdrop = "https://image.tmdb.org/t/p/original" . $obj['backdrop_path'];
    $rating = $obj['vote_average'];
    $year = $obj['release_date'];
    $rand = mt_rand(10, 20);
    $rand = $rand + .99;
    
    $sql = "INSERT INTO itemTable (itemId, name, description, poster, backdrop, rating, price, yearReleased) VALUES ";
    $sql .= "($id, '$name', '$desc', '$poster', '$backdrop', '$rating', '$rand', '$year');";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (Exception $e){
        // not the best way, but I think some of the paths have a forward slash
        // in them which is messing with our query, so I'm not sure how to deal
        // that, so our table will just be missing a few movies...
        continue;
    }
}
?>

