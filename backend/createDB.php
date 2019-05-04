<?php
/**
 ** createDB.php | 2019 | Torin, David, Carlos, Q
 * 
 * WARNING. Delete original movie database before running
 * or change name of DB on lines 37 and 40.
 * 
 * Looks Complicated, but easy.
 * This file creates a new Database called movie
 * and populates it with 4 tables
 * all with their designated fields
 * also Populates all Tables.
 * 
 */
 include 'dbConnection.php';
 function getHostConnection() {
    
        $host = "localhost";
        $username = "root";
        $password = "";
        
        //checks whether the URL contains "herokuapp" (using Heroku)
        // need this to be able to run in HEROKU
        if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbName = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        }
        $dbConn = new PDO("mysql:host=$host;", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $dbConn;
    }
    
$conn = getHostConnection();
$sql = "CREATE DATABASE movie";
$stmt = $conn->prepare($sql);
        $stmt->execute();
$conn2 = getDatabaseConnection("movie");
$create = 
"CREATE TABLE `itemTable` (
  `itemId` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `poster` varchar(300) NOT NULL,
  `backdrop` varchar(300) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `price` float NOT NULL,
  `productsPurchased` tinyint(5) NOT NULL,
  `yearReleased` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderHistory`
--

CREATE TABLE `orderHistory` (
  `id` tinyint(4) NOT NULL,
  `conNum` int(11) NOT NULL,
  `itemId` int(10) NOT NULL,
  `price` float DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `name`, `discount`) VALUES
(1, 'fiftyOff', 0.5),
(2, 'bigTen', 0.1),
(3, 'coolThirty', 0.3),
(4, 'FiveFinger', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` tinyint(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itemTable`
--
ALTER TABLE `itemTable`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `orderHistory`
--
ALTER TABLE `orderHistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemTable`
--
ALTER TABLE `itemTable`
  MODIFY `itemId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderHistory`
--
ALTER TABLE `orderHistory`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
$stmt = $conn2->prepare($create);
        $stmt->execute();


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
    // print($sql);
    try {
        $stmt = $conn2->prepare($sql);
        $stmt->execute();
    } catch (Exception $e){
        // not the best way, but I think some of the paths have a forward slash
        // in them which is messing with our query, so I'm not sure how to deal
        // that, so our table will just be missing a few movies...
        continue;
    }
}


?>
