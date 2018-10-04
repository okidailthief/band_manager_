<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$event_id =  $_REQUEST['event_id'];
$sql = "select * from Event_Schedule where event_id=".$event_id;
if(!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

if(!$s = $result->fetch_assoc()){
    echo "<center><br><h1>No Schedule added for this event<br>";
    echo "<a href='cltaddschedule.php?event_id=".$event_id."'>Create Schedule</a></h1></center>";
}
else{
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
echo "<center><br><h2>Schedule for $event_name</h2></center><br>";
echo "<b>Event date:</b><br> $event_date <br><br>",
"<b>Band Load in:</b><br>",
"Start: $load_in <br>",
"End: $load_in_end<br><br>",

"<b>Band Sound Check:</b><br>",
"Start: $sound_check <br>",
"End: $sound_check_end<br><br>",

"<b>Guest Arrival:</b><br>",
"$guest_arrival<br><br>",

"<b>Cocktail Hour:</b><br>",
"Start: $cock <br>",
"End: $cock_end<br><br>",

"<b>Dining:</b><br>",
"Start: $dining <br>",
"End: $dining_end<br><br>",

"<b>Reception:</b><br>",
"Start: $reception <br>",
"End: $reception_end<br><br>",
"</div>",
"<a href='clienteditschedule.php?event_id=".$event_id."'>Edit Event Schedule</a><br>",
"<a href='cltdelschedule.php?event_id=".$event_id."'>Delete Schedule</a><br><br>",
"<a href='clientviewevents.php?client_id=".$client_id."'>Back to ".$fName."'s Events</a>",
//echo "<a href='cltaddevent.php?email=".$email."'>Add New Event</a>";
"</center>";

}
?>
