<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$note_id = $_REQUEST['note_id'];

/*
$sql = "select event_name from Events where event_id=".$event_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$n = $result->fetch_assoc();
$event_name = $n["event_name"];
echo "<center>";
echo "<h2>Edit note for '$event_name'</h2>";
*/

$sql = "select * from Notes where note_id='$note_id'";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

$id = $result->fetch_assoc();
$subject = $id["subject"];
$body = $id["body"];
$date_added = $id["date_added"];
$note_id = $id['note_id'];
$client_id = $id['client_id'];

//gets note author
$client_id = $id["client_id"];
$sql = "select fName, lName from Clients where client_id='$client_id'";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$c = $result->fetch_assoc();
echo "<center><h2>Edit Note</h2>";
$author= $c["fName"] .' '.$c["lName"];
echo "<form action='svreditnote.php'>";
echo "<div class='title' style='width: 400px; border: 15px solid blue; padding: 25px; margin: 10px; text-align: left;'>";
echo "<input name='note_id' type='hidden' value=".$note_id.">";
echo "Author: ".$author."</br>";
echo "Subject: ".$subject."</br>";
echo "Date Added: ".$date_added."</br>";
echo "<div id='note'; style='height: 200px; font-size: 20px; border: 2px solid black;",
"margain: 0px; padding: 0px, 0px, 180px, 0px'",
"contenteditable= true onkeyup='changeBody()'>".$body."</div></br>";
echo "<input id='new' name='new_body' type='hidden' value=''>";
echo "</div>";
echo "<input type='submit' value='Edit Note'>";
echo "</form>";
echo "</center>";

?>
<script>
    function changeBody(){
        document.getElementById('new').value = document.getElementById('note').innerHTML;
    }
</script>