<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$event_id =  $_REQUEST['event_id'];

    

$sql = "select * from Events where event_id=".$event_id;
if(!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$e = $result->fetch_assoc();
$client_id = $e['client_id'];
$event_name = $e['event_name'];
$event_date = $e['event_date'];

$sql = "select fName from Clients where client_id=".$client_id;
if(!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$c = $result->fetch_assoc();
$fName = $c['fName'];

echo "<center><div class='title' style='width: 400px; border: 15px solid blue; padding: 25px; margin: 10px; text-align: left;'>";
echo "<center><br><h2>Add Schedule for $event_name</h2></center><br>";
echo "<b>Event date:</b><br> $event_date <br><br>";
?>
<html>

<form action='svraddschedule.php'>
<?php echo "<input name='event_id' type='hidden' value='$event_id'>"; ?> 
<b>Band Load in:</b><br>
Start: <input name='load_in' type='time'><br>
End: <input name='load_in_end' type='time'><br><br>

<b>Band Sound Check:</b><br>
Start: <input name='sound_check' type='time'><br>
End: <input name='sound_check_end' type='time'><br><br>

<b>Guest Arrival:</b><br>
<input name='guest_arrival' type='time'><br><br>

<b>Cocktail Hour:</b><br>
Start: <input name='cock' type='time'> <br>
End: <input name='cock_end' type='time'><br><br>

<b>Dining:</b><br>
Start: <input name='dining' type='time'> <br>
End: <input name='dining_end' type='time'><br><br>

<b>Reception:</b><br>
Start: <input name='reception' type='time'> <br>
End: <input name='reception_end' type='time'><br><br>
</div>
 <input type='submit' value='Add Schedule'>
 </form>


</html>
<?php
echo "<br><br><a href='clientviewevents.php?client_id=".$client_id."'>Back to ".$fName."'s Events</a></center>";
?>