<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$event_id = $_REQUEST['event_id'];
$client_id = $_REQUEST['client_id'];

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



?>

<html>
<center>
    </br>
    <h2>Add note for <?php echo $event_name?></h2></br>
    <center>
    <div class="title" style="width: 400px; border: 25px solid green; padding: 25px; margin: 18px; text-align: left;">
        <form action="svraddnote.php" method="post" id="newNote">
            Subject: <br><input name="subject" type="text" style="width: 400px"></br>
             <br>
            Enter Note:
            <br><textarea name="body" form="newNote" style="height: 200px; width: 400px; resize: vertical"></textarea>
            </br>
            <?php echo "<input type='hidden' name='client_id' value='".$client_id."'>";?>
            <?php echo "<input type='hidden' name='event_id' value='".$event_id."'>";?>

            </div></br></br>
            <input type="submit" name="submit" value="Submit New Note">
        </form>
    </center>
</html>