<html><center></html>
<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
echo "<center><h2>View Songs By Genre</h2></center>";

$sql = "SELECT genre from GenreSongs group by genre";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
while ($gs = $result->fetch_assoc()) {
    $genre = $gs['genre'];

    $sql2 = "SELECT count(genre) from GenreSongs where genre='". $genre."'";
if (!$result2 = $db->query($sql2)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql2 . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
    
    $c = $result2->fetch_assoc();
    $count = $c['count(genre)'];
    echo "<b>$genre : $count songs</b>";
    echo "<table border=1>";
    echo "<tr><th>Song Title</th><th>Artist</th></tr>";
    
    $sql3 = "SELECT title, artist from GenreSongs where genre='".$genre."'";
if (!$result3 = $db->query($sql3)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql3 . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
while ($s = $result3->fetch_assoc()) {
    $title = $s['title'];
    $artist = $s['artist'];
    
    echo "<tr>";
    echo "<td>$title</td>";
    echo "<td style='text-align:center;'>$artist</td>";
    echo "</tr>";


}
echo "</table><br>";
}
?>
<html>
<a href="songlist.php">Back To Song List</a><br>
</center></html>
