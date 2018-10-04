<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$event_id = $_REQUEST['event_id'];

$iso = "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$iso = "START TRANSACTION";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
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
$id = $result->fetch_assoc();
$client_id = $id['client_id'];


$sql = "delete from Events where event_id=".$event_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

$sql = "delete from Notes where event_id=".$event_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$iso = "COMMIT";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$iso = "COMMIT";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
header('Location: https://band-manager-okidailthief.c9users.io/events/clientviewevents.php?client_id='.$client_id);
?>
