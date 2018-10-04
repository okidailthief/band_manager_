<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$event_id = $_REQUEST['event_id'];

$sql = "delete from Event_Schedule where event_id=".$event_id;
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}


header('Location: https://band-manager-okidailthief.c9users.io/events/cltviewschedule.php?event_id='.$event_id);

?>