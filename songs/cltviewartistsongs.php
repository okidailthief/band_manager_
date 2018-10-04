<html><center></html>
<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
echo "<center><h2>View Songs By Artist</h2></center>";

$sql = "SELECT artist from ArtistSongs group by artist";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
while ($gs = $result->fetch_assoc()) {
    $artist = $gs['artist'];

    $sql2 = "SELECT count(title) from ArtistSongs where artist='". $artist."'";
if (!$result2 = $db->query($sql2)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql2 . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
    
    $c = $result2->fetch_assoc();
    $count = $c['count(title)'];
    echo "<b>$artist : $count songs</b>";
    echo "<table border=1>";
    echo "<tr><th>Songs</th></tr>";
    
    $sql3 = "SELECT title from ArtistSongs where artist='".$artist."'";
if (!$result3 = $db->query($sql3)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql3 . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
while ($s = $result3->fetch_assoc()) {
    $title = $s['title'];
    
    echo "<tr>";
    echo "<td>$title</td>";
    echo "</tr>";


}
echo "</table><br>";
}
?>
<html>
<a href="songlist.php">Back To Song List</a><br>
</center></html>
