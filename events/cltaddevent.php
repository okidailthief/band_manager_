<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$email = $_REQUEST['email'];
$sql = "select client_id from Clients where email='$email'";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$row = $result->fetch_assoc();
$client_id = $row["client_id"];
//echo $client_id;

?>

<html>
<center>
    </br>
    <h2>Add Event</h2></br>
    <center>
    <div class="title" style="width: 400px; border: 25px solid green; padding: 25px; margin: 18px; text-align: left;">
        <form action="svraddevent.php" method="post" id="newEvent">
            Name of event <br><input name="event_name" type="text" style="width: 400px"></br>
            
            
            Type of event <br>
            <select name="event_type">
                <option value="Wedding">Wedding</option>
                <option value="Private Party">Private Party</option>
                <option value="Corporate Event">Corporate Event</option>
                <option value="Fraternity/Sorority">Fraternity/Sorority</option>
                <option value="Other">Other</option>
            </select>
            </br>
            Event date: <br><input name="event_date" type="date"></br>
            Address of event <br><input name="addr" type="text" style="width: 400px"></br>
            Approximately many people will be attending? <br><input name="attendance" type="text"></br>
            What is your estimated budget for a band?  <br>$<input name="budget" type="text"></br>
            Any additional information you'd like us to know about your event or needs?
            <br><textarea name="notes" form="newEvent" style="height: 200px; width: 400px; resize: vertical"></textarea>
            </br>
            <?php echo "<input type='hidden' name='client_id' value='".$client_id."'>";?>

            </div></br></br>
            <input type="submit" name="submit" value="Add Event">
        </form>
    </center>
</html>

