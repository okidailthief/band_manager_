<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$event_id = $_REQUEST["event_id"];
$event_name = $_REQUEST["event_name"];
$event_date = $_REQUEST["event_date"];
$addr = $_REQUEST["addr"];
$attendance = $_REQUEST["attendance"];
$budget = $_REQUEST["budget"];
$event_type = $_REQUEST["event_type"];

$sql = "update Events set event_name='$event_name', event_date='$event_date', addr='$addr', attendance='$attendance', budget='$budget', event_type='$event_type' where event_id='$event_id'";
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

$sql = "select client_id from Events where event_id=".$event_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$id = $result -> fetch_assoc();
$client_id = $id['client_id'];

echo "<center><br><h1>Event details Successfully Updated</h1><br><br>";
echo "<a href='clientviewevents.php?client_id=".$client_id."'>Back to My Events</a></center>";

?>