<?php
include 'connect.php';

if (isset($_GET['id'])) {
	$movie_query = 'SELECT * FROM tbl_movies WHERE movies_id ='.$_GET['id'];
}else if(isset($_GET['search'])){
	// finish sql blow and fetch the movie with title like the search string
	$movie_query = 'SELECT * FROM tbl_movies WHERE movies_title LIKE'.'"%'.trim($_GET['search']).'%"';
}else if(isset($_GET['category'])){
	//fetch all movies that under the under the searched category name
	$movie_query = 'SELECT
    *
FROM
    tbl_movies m,
    tbl_mov_genre l,
    tbl_genre g
WHERE
    g.genre_id = l.genre_id 
    AND m.movies_id = l.movies_id 
    AND g.genre_name 
    LIKE '.'"%'.trim($_GET['category']).'%"';
}
else{
	$movie_query = 'SELECT movies_id, movies_cover, movies_year, movies_title FROM tbl_movies';
}


$getMovies = $pdo->query($movie_query);

//$movies = $getMovies->fetch(PDO::FETCH_ASSOC);

$results = array();

while($row = $getMovies->fetch(PDO::FETCH_ASSOC)){
	//var_dump($row);
	$results[] = $row;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=UTF-8');
$result_json = json_encode($results, JSON_PRETTY_PRINT);
echo $result_json;
//var_dump($result_json);
?>