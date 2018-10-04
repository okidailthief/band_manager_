
<html><center>
<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$email =  $_REQUEST['email'];
if(!$email == ''){
    $client_id = $_REQUEST['email'];
    $sql = "SELECT * from Clients where email='$email'";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$c = $result->fetch_assoc();
$client_id = $c['client_id'];
}
else{
$client_id = $_REQUEST['client_id'];
}


$sql = "SELECT * from Clients where client_id=".$client_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$c = $result->fetch_assoc();
$fName = $c['fName'];
$lName = $c['lName'];
$email = $c['email'];
echo "</br><h2>".$fName.' '.$lName.'\'s'. " Event List</h2>";
echo "<body><br><a href='https://band-manager-okidailthief.c9users.io/clients/cltlogin.php'>Log Out</a><br><br></body>";


echo "<table border=1>";
echo "<tr>
<th>Event Name</th>
<th>Type</th>
<th>Date</th>
<th>Address</th>
<th>Attendance</th>
<th>View Notes</th>
<th>Schedule</th>
<th>Budget</th>
<th>Event ID</th>
<th>Actions</th>
</tr>";
$sql = "SELECT * from Events where client_id=".$client_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
while($e = $result->fetch_assoc()){

$event_name = $e['event_name'];
$event_type = $e['event_type'];
$event_date = $e['event_date'];
$addr = $e['addr'];
$attendance = $e['attendance'];
$budget = $e['budget'];
$event_id = $e['event_id'];

    echo "<tr>";
    echo "<td>$event_name</td>";
    echo "<td>$event_type</td>";
    echo "<td style='text-align:center;'> $event_date </td>";
    echo "<td style='text-align:center;'> $addr </td>";
    echo "<td style='text-align:center;'> $attendance </td>";
    echo "<td style='text-align:center;'><a href ='notelist.php?event_id=$event_id '> Notes</a></td>";
    echo "<td style='text-align:center;'><a href ='cltviewschedule.php?event_id=$event_id '>Schedule </a></td>";
    echo "<td style='text-align:center;'> $budget </td>";
    echo "<td style='text-align:center;'> $event_id </td>";
    echo "<td style='text-align:center;'><a href ='svrdelevent.php?event_id=$event_id '>DEL </a>";
    echo "<a href ='clteditevent.php?event_id=$event_id '> EDIT</a></td>";

    echo "</tr>";
}
echo "</table>";



echo "<a href='cltaddevent.php?email=".$email."'>Add New Event</a>";
?>
</html></center>