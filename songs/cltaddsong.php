
<html><center>
</br>
</br>
<form action="svraddsong.php" method="post">
Song Title: <input type="text" name="title"></br>
Artist/Band: <input type="text" name="artist"></br>





Select Genre(s): <br>

<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$sql = "select * from Genres";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}

//displays genre checkboxes associated with Genre's table
$i = 1;
while ($s = $result->fetch_assoc()) {
  echo "<input type='checkbox' name='genre[]' value=". $s['genre_id'] ."> ". $s['genre'] . " ";
  if($i % 4 == 0){
    echo "</br>";
  }
  $i++;
}
?>


<br>
Select a Decade:
<select name="decade">
  <option disabled selected value> --Select a Decade-- </option>
  <option value="50s"> 50s</option>
  <option value="60s"> 60s</option>
  <option value="70s"> 70s</option>
  <option value="80s"> 80s</option>
  <option value="90s"> 90s</option>
  <option value="00s"> 00s</option>
  <option value="10s"> 10s</option>
</select>


</br>
</br>
<input type="submit" name="submit" value="Add New Song">
</form>
</center>
</html>



