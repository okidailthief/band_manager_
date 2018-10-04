<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$note_id = $_REQUEST['note_id'];
$event_id = $_REQUEST['event_id'];

$sql = "delete from Notes where note_id=".$note_id;
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}


header('Location: https://band-manager-okidailthief.c9users.io/events/notelist.php?event_id='.$event_id);

?>