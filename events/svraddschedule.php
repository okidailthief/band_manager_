<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$event_id = $_REQUEST['event_id'];
$load_in = $_REQUEST['load_in'];
$load_in_end = $_REQUEST['load_in_end'];
$sound_check = $_REQUEST['sound_check'];
$sound_check_end = $_REQUEST['sound_check_end'];
$guest_arrival = $_REQUEST['guest_arrival'];
$cock = $_REQUEST['cock'];
$cock_end = $_REQUEST['cock_end'];
$dining = $_REQUEST['dining'];
$dining_end = $_REQUEST['dining_end'];
$reception = $_REQUEST['reception'];
$reception_end = $_REQUEST['reception_end'];

$sql = "insert into Event_Schedule(event_id, load_in, load_in_end, sound_check, sound_check_end, guest_arrival, cock, cock_end, dining, dining_end, reception, reception_end) values ('$event_id', '$load_in', '$load_in_end', '$sound_check', '$sound_check_end', '$guest_arrival', '$cock', '$cock_end', '$dining', '$dining_end', '$reception', '$reception_end')";
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

header("Location: https://band-manager-okidailthief.c9users.io/events/cltviewschedule.php?event_id=".$event_id);


?>