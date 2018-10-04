<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$event_id = $_REQUEST['event_id'];

$sql = "select * from Events where event_id=".$event_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$n = $result->fetch_assoc();
$event_name = $n["event_name"];
$client_id = $n['client_id'];
echo "<center>";
echo "<h2>Notes for ".$event_name."</h2>";


$sql = "select * from Notes where event_id=".$event_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

while($id = $result->fetch_assoc()){
$subject = $id["subject"];
$body = $id["body"];
$date_added = $id["date_added"];
$note_id = $id['note_id'];

//gets note author
$client_id = $id["client_id"];
$sql = "select fName, lName from Clients where client_id=".$client_id;
if (!$result2 = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$c = $result2->fetch_assoc();
$author= $c["fName"] .' '.$c["lName"];

echo "<div class='title' style='width: 400px; border: 15px solid blue; padding: 25px; margin: 10px; text-align: left;'>";
echo "Author: ".$author."</br>";
echo "Subject: ".$subject."</br>";
echo "Date Added: ".$date_added."</br>";
echo "<div style='height: 200px; font-size: 20px; border: 2px solid black; margain: 0px; padding: 0px, 0px, 180px, 0px'>".$body."</div></br>";
echo "</div>";
echo "<a href='clteditnote.php?note_id=".$note_id."'>Edit Note</a><br>";
echo "<a href='svrdelnote.php?note_id=".$note_id."&event_id=".$event_id."'>Delete Note regarding $subject</a><br><br>";
}
echo "<a href='cltaddnote.php?event_id=".$event_id."&client_id=".$client_id."'>Add New Note</a><br>";
echo "<a href='clientviewevents.php?client_id=".$client_id."'>Back to My Events</a>";

echo "</center>";



?>