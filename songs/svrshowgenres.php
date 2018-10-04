<html><center>
<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$song_id = $_REQUEST["song_id"];
//get data from Songs table
    $sql = "SELECT * from Songs where song_id=".$song_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$s = $result->fetch_assoc();
$artist_id = $s['artist_id'];
    $sql = "SELECT artist from Artists where artist_id=".$artist_id;
if (!$result2 = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$a = $result2->fetch_assoc();
$artist = $a['artist'];

//display song title and artist
echo "<table border=1>";
    echo "<tr><th>Song Title</th><th>Artist</th>";
    echo "<tr>";
    echo "<td>" . $s["title"] . "</td>";
    echo "<td style='text-align:center;'>$artist</td>";
    echo "</tr>";
    echo "</table>";
    
    //get genres from genre map table
    $sql = "SELECT genre_id from GenreMap where song_id=".$song_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
echo "</br>";
echo "</br>";
//$s is genre_id
echo "<table border=1>";
echo "<tr><th>Genres</th></tr>";
while ($s = $result->fetch_assoc()) {
    //retrieves genre name
    $sql = "SELECT genre from Genres where genre_id=".$s[genre_id];
if (!$result2 = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
else{
$g = $result2->fetch_assoc();
    //display genres

    echo "<tr>";
    echo "<td>" . $g["genre"] . "</td>";
    echo "</tr>";
}
}
echo "</table>";
    ?>
    </br>
    <a href="songlist.php">Return to Song List</a>
    </center></html>