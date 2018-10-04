<?php

require '/home/ubuntu/workspace/db/dbconnect.php';

$title = $_REQUEST["title"];
$artist = $_REQUEST["artist"];
$genre = $_REQUEST["genre"];
$decade = $_REQUEST["decade"];

$iso = "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$iso = "START TRANSACTION";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}


//call procedure to add artist to Artist table
//returns artist id from Artist table
$sql = "CALL add_artist('$artist', @artist_num)";
if(!$result = $db->query($sql)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

//gets result from procedure add_artist
$sql = "select @artist_num";
if(!$result = $db->query($sql)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$id = $result->fetch_assoc();
$artist_id = $id['@artist_num'];

//creates new song entry
// constraint warning for duplicates
$sql = "insert into Songs (artist_id, title, decade) VALUES('$artist_id', '$title','$decade')";
if (!$db->query($sql)) {
    if( $db->errno == 1062 ){
        echo $title . " by artist " . $artist. " already exists in song list </br>";
        echo "<a href='songlist.php'>Return to Song List</a>";
        exit;
    }
    else{
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
    }
}
else{

$sql = "select max(song_id) from Songs";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$id = $result->fetch_assoc();
$song_id = $id["max(song_id)"];

if(!empty($genre)){
for($i = 0; $i < sizeof($genre); $i++){
$sql = "insert into GenreMap(song_id, genre_id) values ('$song_id', '$genre[$i]')";
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    
}
}
}



$iso = "COMMIT";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

}
?>

<script>
    window.location="songlist.php";
</script>