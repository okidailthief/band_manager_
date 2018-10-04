<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$sql = "SELECT * from Songs where song_id=" . $_REQUEST['song_id'];
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$row = $result->fetch_assoc();
$title = $row["title"];
$artist_id = $row["artist_id"];
$decade = $row["decade"];
$song_id = $_REQUEST['song_id'];

//find artist name from artist_id
$sql = "SELECT artist from Artists where artist_id=".$artist_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

$row = $result->fetch_assoc();
$artist = $row["artist"];

echo "<form action='svreditsong.php'>";
echo "<input type='hidden' name='song_id' value='$song_id'>";
echo "<input type='hidden' name='artist_id' value='$artist_id'>";
echo "Song Title: <input type='text' name='title' value='$title'></br>";
echo "Artist: <input type='text' name='artist' value='$artist'></br>";

//display empty select boxes for genres
$sql = "SELECT * from Genres";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

while ($row = $result->fetch_assoc()) {

echo "<input id=".$row['genre_id']." type='checkbox' name='genre[]' value=". $row['genre_id'] .">
". $row['genre'] ."<br>";
}

//select current genres of song
$sql = "SELECT genre_id from GenreMap where song_id=".$song_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

//uses js to check song's genre boxes
while ($row = $result->fetch_assoc()) {
echo '<script type=text/javascript>',
      'document.getElementById("'.$row['genre_id'].'").checked = true;',
      '</script>';
}

?>

<br>
Select a Decade:
<select name="decade">
  <option value="<?php echo $decade; ?>" selected><?php echo $decade; ?></option>
  <option value="50s"> 50s</option>
  <option value="60s"> 60s</option>
  <option value="70s"> 70s</option>
  <option value="80s"> 80s</option>
  <option value="90s"> 90s</option>
  <option value="00s"> 00s</option>
  <option value="10s"> 10s</option>
</select>
</br>
<input type="submit" value="Edit Song">
</form>




