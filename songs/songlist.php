<html><center>
<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
//stored function call
$sql = "select countsongs() as songcount";
if(!$result = $db->query($sql)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$row = $result ->fetch_assoc();
$song_count = $row['songcount'];
echo "Showing info for ". $song_count." songs";
//create songlist table
echo "<table border=1>";
echo "<tr><th>Song Title</th>
<th>Artist</th>

<th>Genres</th>
<th>Decade</th>
<th>Actions</th></tr>";

$sql = "SELECT * from Songs";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
while ($s = $result->fetch_assoc()) {
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

    echo "<tr>";
    echo "<td>" . $s["title"] . "</td>";
    echo "<td style='text-align:center;'>$artist</td>";
    echo "<td style='text-align:center;'><a href ='svrshowgenres.php?song_id=" . $s["song_id"] . "'>View</a>";
    echo "<td style='text-align:center;'>" . $s["decade"] . "</td>";
    echo "<td style='text-align:center;'><a href ='svrdelsong.php?song_id=" . $s["song_id"] . "&artist_id=".$artist_id."'>DEL </a>";
    echo "<a href ='clteditsong.php?song_id=" . $s["song_id"] . "'> EDIT</a></td>";
    echo "</tr>";
}

echo "</table>";
?>

<a href="cltaddsong.php">Add New Song</a><br>
<a href="cltviewgenresongs.php">View Songs by Genre</a><br>
<a href="cltviewartistsongs.php">View Songs by Artist</a><br>
<a href="svrdelallsongs.php" onclick="alert('Are you sure you want to delete all songs?')">Delete All Songs</a><br><br>
<a href="https://band-manager-okidailthief.c9users.io/clients/cltlogin.php">Book Your Event With (band name here)!</a>
</html></center>

