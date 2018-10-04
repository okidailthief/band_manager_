<?php
require '/home/ubuntu/workspace/db/dbconnect.php';

$client_id = $_REQUEST['client_id'];
$fName = $_REQUEST["fName"];
$lName = $_REQUEST["lName"];
$phone = $_REQUEST["phone"];
$email = $_REQUEST["email"];
$relation = $_REQUEST['relation'];

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

$sql = "update Clients set fName='$fName', lName='$lName', phone='$phone', email='$email', relation='$relation' where client_id='$client_id'";
if (!$db->query($sql)) {
    if( $db->errno == 1062 ){
        echo "Client with email " . $email . " already exists in song list </br>";
        echo "<a href='clientlist.php'>Return to Client List</a>";
        exit;
    }
    else{
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
    }
}

$iso = "COMMIT";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
?>
<script>
window.location="clientlist.php";
</script>