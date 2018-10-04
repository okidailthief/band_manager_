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

$sql = "select * from Event_Schedule where event_id=".$event_id;
if(!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$s = $result->fetch_assoc();
$load_in = $s['load_in'];
$load_in_end = $s['load_in_end'];
$sound_check = $s['sound_check'];
$sound_check_end = $s['sound_check_end'];
$guest_arrival = $s['guest_arrival'];
$cock = $s['cock'];
$cock_end = $s['cock_end'];
$ceremony = $s['ceremony'];
$ceremony_end = $s['ceremony_end'];
$dining = $s['dining'];
$dining_end = $s['dining_end'];
$reception = $s['reception'];
$reception_end = $s['reception_end'];

echo "<center><div class='title' style='width: 400px; border: 15px solid blue; padding: 25px; margin: 10px; text-align: left;'>";
echo "<center><br><h2>Edit Schedule for $event_name</h2></center><br>";
echo "<b>Event date:</b><br> $event_date <br><br>";
?>
<html>

<form action='svrclienteditschedule.php' method='post'>
<?php echo "<input name='event_id' type='hidden' value='$event_id'>"; ?>
<?php echo "<input name='client_id' type='hidden' value='$client_id'>"; ?> 
<b>Band Load in:</b><br>
Start: <input name='load_in' type='time' value='<?php echo $load_in; ?>'><br>
End: <input name='load_in_end' type='time' value='<?php echo $load_in_end; ?>'><br><br>

<b>Band Sound Check:</b><br>
Start: <input name='sound_check' type='time' value='<?php echo $sound_check; ?>'><br>
End: <input name='sound_check_end' type='time' value='<?php echo $sound_check_end; ?>'><br><br>

<b>Guest Arrival:</b><br>
<input name='guest_arrival' type='time' value='<?php echo $guest_arrival; ?>'><br><br>

<b>Cocktail Hour:</b><br>
Start: <input name='cock' type='time' value='<?php echo $cock; ?>'> <br>
End: <input name='cock_end' type='time' value='<?php echo $cock_end; ?>'><br><br>

<b>Dining:</b><br>
Start: <input name='dining' type='time' value='<?php echo $dining; ?>'> <br>
End: <input name='dining_end' type='time' value='<?php echo $dining_end; ?>'><br><br>

<b>Reception:</b><br>
Start: <input name='reception' type='time' value='<?php echo $reception; ?>'> <br>
End: <input name='reception_end' type='time' value='<?php echo $reception_end; ?>'><br><br>
</div>
 <input type='submit' value='Edit Event Schedule'>
 </form>


</html>
<?php
echo "<br><br><a href='clientviewevents.php?client_id=".$client_id."'>Back to ".$fName."'s Events</a></center>";
?>