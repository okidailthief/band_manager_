<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$event_id = $_REQUEST['event_id'];

$sql = "SELECT * from Events where event_id=" . $event_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

$row = $result->fetch_assoc();
$event_name = $row["event_name"];
$event_date = $row["event_date"];
$addr = $row["addr"];
$attendance = $row["attendance"];
$budget = $row["budget"];
$event_type = $row["event_type"];
?>
<html>
<center>
    </br>
    <h2>Edit Event</h2></br>
    <div class="title" style="width: 400px; border: 25px solid green; padding: 25px; margin: 18px; text-align: left;">
</html>
<?php
echo "<br>";
echo "<form action='svreditevent.php' method='post'>";
echo "<input type='hidden' name='event_id' value='$event_id'>";
echo "Event Name: <input type='text' name='event_name' value='$event_name'></br>";
echo "Event Name: <input type='date' name='event_date' value='$event_date'></br>";
echo "Event Address: <input type='text' style='width: 250px' name='addr' value='$addr'></br>";
echo "Attendance: <input type='text' name='attendance' value='$attendance'></br>";
echo "Budget: <input type='text' name='budget' value='$budget'></br>";
echo "<br>Event Type:<br><select name='event_type' selected='".$event_type."'>
                <option value='Wedding'>Wedding</option>
                <option value='Private Party'>Private Party</option>
                <option value='Corporate Event'>Corporate Event</option>
                <option value='Fraternity/Sorority'>Fraternity/Sorority</option>
                <option value='Other'>Other</option>
            </select>
            </br>";
echo "</div>";

echo "<br>";
echo "<input type='submit' value='Submit Event Changes'>";
echo "</form>";
echo "</center>";

?>


