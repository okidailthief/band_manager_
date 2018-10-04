<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
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
//$sql = "SELECT * from Songs where song_id=" . $_REQUEST['song_id'];
$song_id = $_REQUEST['song_id'];
$title = $_REQUEST["title"];
$artist_id = $_REQUEST["artist_id"];
$artist = $_REQUEST["artist"];
$genre = $_REQUEST["genre"];
$decade = $_REQUEST["decade"];


//updates song in song table
$sql = "update Songs SET
title='$title',
decade='$decade' where song_id=".$song_id;
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}


$sql = "update Artists SET artist='$artist' where artist_id=".$artist_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}


//empties song's entries in GenreMap table
$sql = "delete from GenreMap where song_id=".$song_id;
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}


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
?>
<script>
window.location="songlist.php";
</script>