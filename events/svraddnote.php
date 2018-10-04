<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$client_id = $_REQUEST['client_id'];
$event_id = $_REQUEST['event_id'];
$subject = $_REQUEST['subject'];
$body = $_REQUEST['body'];


$sql = "insert into Notes(event_id, subject, body, client_id) values ('$event_id', '$subject', '$body', '$client_id')";
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

echo "<center><br><h1>New Note Successfully Added</h1><br>";
echo "<a href='notelist.php?event_id=".$event_id."'>Back to Event Notes</a><br><br>";
echo "<a href='clientviewevents.php?client_id=".$client_id."'>Back to My Events</a></center>";

?>