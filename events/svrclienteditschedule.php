<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$event_id =  $_REQUEST['event_id'];
$client_id =  $_REQUEST['client_id'];
$load_in = $_REQUEST['load_in'];
$load_in_end = $_REQUEST['load_in_end'];
$sound_check = $_REQUEST['sound_check'];
$sound_check_end = $_REQUEST['sound_check_end'];
$guest_arrival = $_REQUEST['guest_arrival'];
$cock = $_REQUEST['cock'];
$cock_end = $_REQUEST['cock_end'];
$ceremony = $_REQUEST['ceremony'];
$ceremony_end = $_REQUEST['ceremony_end'];
$dining = $_REQUEST['dining'];
$dining_end = $_REQUEST['dining_end'];
$reception = $_REQUEST['reception'];
$reception_end = $_REQUEST['reception_end'];

$sql = "update Event_Schedule set load_in='$load_in', load_in_end='$load_in_end', sound_check='$sound_check', sound_check_end='$sound_check_end', guest_arrival='$guest_arrival', cock='$cock', cock_end='$cock_end', ceremony='$ceremony', ceremony_end='$ceremony_end', dining='$dining', dining_end='$dining_end', reception='$reception', reception_end='$reception_end' where event_id='$event_id'";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
echo "<center><br><h1>Event Schedule Successfully Updated</h1><br><br>";
echo "<a href='clientviewevents.php?client_id=".$client_id."'>Back to My Events</a></center>";
?>