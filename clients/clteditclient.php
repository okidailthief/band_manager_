<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$client_id = $_REQUEST['client_id'];
$sql = "SELECT * from Clients where client_id=" . $client_id;
if (!$result = $db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

$row = $result->fetch_assoc();
$fName = $row["fName"];
$lName = $row["lName"];
$phone = $row["phone"];
$email = $row["email"];
$relation = $row['relation'];
?>
<html>
<center>
    </br>
    <h2>Edit Client</h2></br>
    <div class="title" style="width: 400px; border: 25px solid green; padding: 25px; margin: 18px; text-align: left;">
</html>
<?php
echo "<br>";
echo "<form action='svreditclient.php'>";
echo "<input type='hidden' name='client_id' value='$client_id'>";
echo "First Name: <input type='text' name='fName' value='$fName'></br>";
echo "Last Name: <input type='text' name='lName' value='$lName'></br>";
echo "Phone: <input type='text' name='phone' value='$phone'></br>";
echo "Email: <input type='text' name='email' value='$email'></br>";
echo "Relation: <input type='text' name='relation' value='$relation'></br>";
echo "</div>";

echo "<br>";
echo "<input type='submit' value='Edit Song'>";
echo "</form>";
echo "</center>";

?>


