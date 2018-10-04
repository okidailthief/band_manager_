<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$event_name = $_REQUEST['event_name'];
$event_type = $_REQUEST['event_type'];
$event_date = $_REQUEST['event_date'];
$addr = $_REQUEST['addr'];
$attendance = $_REQUEST['attendance'];
$budget = $_REQUEST['budget'];
$notes = $_REQUEST['notes'];
$client_id = $_REQUEST['client_id'];


$sql = "insert into Events(client_id, event_name, event_type, event_date, addr, attendance, budget) values
('$client_id','$event_name', '$event_type', '$event_date', '$addr', '$attendance', '$budget')";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

if(!$notes == ''){
$sql = "select max(event_id) from Events";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$e = $result->fetch_assoc();
$event_id = $e['max(event_id)'];
$subject = "Initial notes";

$sql = "insert into Notes(event_id, subject, body, client_id) values
($event_id, '$subject', '$notes', '$client_id')";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
}


header('Location: https://band-manager-okidailthief.c9users.io/events/clientviewevents.php?client_id='.$client_id);

?>