<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$note_id = $_REQUEST['note_id'];
$body = $_REQUEST['new_body'];
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
$sql = "update Notes set body='$body' where note_id=".$note_id;
if (!$db->query($sql)) {
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

$sql = "select * from Notes where note_id=".$note_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$id = $result -> fetch_assoc();
$event_id = $id['event_id'];
$client_id = $id['client_id'];

echo "<center><br><h1>Note Successfully Updated</h1><br>";
echo "<a href='notelist.php?event_id=".$event_id."'>Back to Event Notes</a><br><br>";
echo "<a href='clientviewevents.php?client_id=".$client_id."'>Back to My Events</a></center>";

?>