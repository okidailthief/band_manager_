
<html><center>
<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$sql = "SELECT * from Clients";
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
echo "</br><h2>Clients</h2></br>";
echo "<table border=1>";
echo "<tr><th>Client Name</th>
<th>Phone</th>
<th>Email</th>
<th>Date Added</th>
<th>Relation</th>
<th>Associated Events</th>
<th>Actions</th>
</tr>";

    
while ($c = $result->fetch_assoc()) {
    /*
    $sql = "select artist from Artists where artist_id=".$s["artist_id"];
if (!$result = $db->query($sql)) {
    
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$id = $result->fetch_assoc();
$artist = $id["artist"];
*/
    $client_id = $c['client_id'];
    $fName = $c['fName'];
    $lName = $c['lName'];
    $phone = $c['phone'];
    $email = $c['email'];
    $date_added = $c['date_added'];
    $relation = $c['relation'];

    echo "<tr>";
    echo "<td>$fName $lName</td>";
    echo "<td style='text-align:center;'> $phone </td>";
    echo "<td style='text-align:center;'> $email </td>";
    echo "<td style='text-align:center;'> $date_added </td>";
    echo "<td style='text-align:center;'> $relation </td>";
    echo "<td style='text-align:center;'><a href ='eventlist.php?client_id= $client_id'> VIEW </a></td>";
    echo "<td style='text-align:center;'><a href ='svrdelclient.php?client_id=$client_id '>DEL </a>";
    echo "<a href ='clteditclient.php?client_id=$client_id '> EDIT</a></td>";

    echo "</tr>";
}
echo "</table>";
?>

<a href="cltlogin.php">Add New Client</a>
</html></center>
